<?php
// Enhanced SEO panel: determine parent category and related tools/guides for this tool page
include_once __DIR__ . '/category-data.php';
if (!isset($slug)) {
    $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $slug = trim($request_path, '/');
}

$tool_title = isset($page_title) ? $page_title : ucwords(str_replace('-', ' ', $slug));
$tool_description_short = isset($page_description) ? $page_description : '';
$canonical = isset($canonical_url) && !empty($canonical_url) ? $canonical_url : rtrim($canonical_base_url, '/') . '/' . $slug;

// Find parent category and group
$parent_category_key = null;
$parent_group_title = null;
foreach ($wordscompare_categories as $cat_key => $cat_data) {
    foreach ($cat_data['groups'] as $group) {
        foreach ($group['tools'] as $t) {
            if (isset($t['slug']) && $t['slug'] === $slug) {
                $parent_category_key = $cat_key;
                $parent_group_title = $group['title'];
                break 3;
            }
        }
    }
}
if (!$parent_category_key) {
    // fallback: developer-tools
        $parent_category_key = 'developer-tools';
}
$parent_category = $wordscompare_categories[$parent_category_key];

// Small breadcrumb and intro block placed under the navbar for tool pages
?>
<div class="container mt-3">
    <nav aria-label="Breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $base_url . $parent_category['slug']; ?>" class="text-decoration-none"><?php echo htmlspecialchars($parent_category['title']); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($tool_title); ?></li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3 p-md-4">
            <h1 class="h4 mb-2"><?php echo htmlspecialchars($tool_title); ?></h1>
            <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool_description_short); ?></p>
        </div>
    </div>
</div>

<?php
// Build related tools list (3-6 links) using category proximity
$candidates = [];

// 1) Siblings in same group
foreach ($wordscompare_categories[$parent_category_key]['groups'] as $group) {
    if ($group['title'] === $parent_group_title) {
        foreach ($group['tools'] as $t) {
            if ($t['slug'] !== $slug) $candidates[$t['slug']] = $t['title'];
        }
        break;
    }
}

// 2) Other tools in same category
foreach ($wordscompare_categories[$parent_category_key]['groups'] as $group) {
    foreach ($group['tools'] as $t) {
        if ($t['slug'] !== $slug && !isset($candidates[$t['slug']])) $candidates[$t['slug']] = $t['title'];
    }
}

// 3) Tools from related categories
foreach ($parent_category['related'] as $rel_cat_key) {
    if (!isset($wordscompare_categories[$rel_cat_key])) continue;
    foreach ($wordscompare_categories[$rel_cat_key]['groups'] as $group) {
        foreach ($group['tools'] as $t) {
            if ($t['slug'] !== $slug && !isset($candidates[$t['slug']])) $candidates[$t['slug']] = $t['title'];
        }
    }
}

// Filter candidates to existing tool view files and limit 6
$related = [];
foreach ($candidates as $cslug => $ctitle) {
    $file = __DIR__ . '/../views/tools/' . $cslug . '.php';
    if (file_exists($file)) {
        $related[$cslug] = $ctitle;
    }
    if (count($related) >= 6) break;
}

// If still too few, include some hardcoded fallbacks if available
if (count($related) < 3) {
    $fallbacks = ['json-formatter'=>'JSON Formatter','text-comparison'=>'Text Compare','json-viewer'=>'JSON Viewer','jwt-decoder'=>'JWT Decoder','base64-encoder'=>'Base64 Encoder'];
    foreach ($fallbacks as $fslug => $flabel) {
        if ($fslug === $slug) continue;
        if (!isset($related[$fslug]) && file_exists(__DIR__ . '/../views/tools/' . $fslug . '.php')) {
            $related[$fslug] = $flabel;
        }
        if (count($related) >= 3) break;
    }
}

// Find a short list of actual guides that match this tool by route or topic.
$related_guides = [];
$guide_dir = __DIR__ . '/../views/guides';
if (is_dir($guide_dir)) {
    foreach (scandir($guide_dir) as $cf) {
        if ($cf === '.' || $cf === '..' || substr($cf, -4) !== '.php') continue;
        $gslug = preg_replace('/\.php$/', '', $cf);
        if ($gslug === 'index') continue;

        $match_keywords = [
            str_replace('-', ' ', $slug),
            str_replace('-', '', $slug),
            preg_replace('/[-_]/', ' ', $slug),
        ];
        $path = $guide_dir . '/' . $cf;
        $contents = file_get_contents($path);
        $guide_title = ucwords(str_replace(['-', '_'], ' ', $gslug));
        $should_include = false;
        foreach ($match_keywords as $keyword) {
            if ($keyword !== '' && stripos($contents ?: '', $keyword) !== false) {
                $should_include = true;
                break;
            }
        }
        if ($should_include || strpos(strtolower($gslug), strtolower($slug)) !== false || strpos(strtolower($cf), strtolower($slug)) !== false) {
            $related_guides[$gslug] = $guide_title;
        }
        if (count($related_guides) >= 2) break;
    }
}

// Preserve the related links for footer.php, which renders them after the tool UI.
$render_tool_related_sections = true;
$tool_related_items = $related;
$tool_related_guides = $related_guides;

// Structured data: basic WebPage schema for the tool
?>
<script type="application/ld+json">
<?php echo json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebPage",
    "name" => strip_tags($tool_title),
    "description" => strip_tags($tool_description_short),
    "url" => $canonical,
    "inLanguage" => "en-US",
]); ?>
</script>

<!-- BreadcrumbList structured data -->
<script type="application/ld+json">
<?php echo json_encode([
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Home",
            "item" => rtrim($canonical_base_url, '/')
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => $parent_category['title'],
            "item" => rtrim($canonical_base_url, '/') . '/' . $parent_category['slug']
        ],
        [
            "@type" => "ListItem",
            "position" => 3,
            "name" => strip_tags($tool_title),
            "item" => $canonical
        ]
    ]
]); ?>
</script>
