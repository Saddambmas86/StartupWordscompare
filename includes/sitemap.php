<?php
ini_set('display_errors', '0');
ini_set('log_errors', '1');
header('Content-Type: application/xml; charset=UTF-8');

$siteRoot = __DIR__;
$siteUrl = 'https://www.wordscompare.com';

$legacyRedirects = [
    'compare-two-text-files-online',
    'compare-text-line-by-line',
    'compare-json-files-online',
    'compare-xml-files-online',
    'compare-html-files-online',
    'compare-css-files-online',
    'compare-code-files-online',
    'online-text-diff-tool',
    'text-difference-checker',
    'compare-text-documents',
    'text-comparision'
];

$categoryRoutes = [
    'developer-tools',
    'qa-tools',
    'api-testing-tools',
    'devops-tools',
    'json-tools',
    'text-tools',
    'pdf-tools',
    'calculators',
    'converters',
];

$staticRoutes = ['about', 'contact', 'privacy', 'disclaimer'];
$reservedToolRoutes = array_merge($staticRoutes, $categoryRoutes, ['guides']);
$pages = [];

$isPublicPage = static function (string $filePath): bool {
    if (!is_file($filePath) || !is_readable($filePath)) {
        return false;
    }

    $handle = @fopen($filePath, 'rb');
    if ($handle === false) {
        return false;
    }
    $source = fread($handle, 16384);
    fclose($handle);

    if ($source === false || !preg_match('/\$page_title\s*=/', $source)) {
        return false;
    }

    if (preg_match('/<meta\b(?=[^>]*\bname\s*=\s*[\"\']robots[\"\'])(?=[^>]*\bcontent\s*=\s*[\"\'][^\"\']*\bnoindex\b)[^>]*>/i', $source)) {
        return false;
    }

    return !preg_match('/header\s*\(\s*[\"\']Location\s*:/i', $source);
};

$addPage = static function (string $route, string $filePath, string $type) use (&$pages, $isPublicPage): void {
    if ($route !== '' && !preg_match('/^(?:[a-z0-9]+(?:-[a-z0-9]+)*|guides\/[a-z0-9]+(?:-[a-z0-9]+)*)$/D', $route)) {
        return;
    }

    if (!$isPublicPage($filePath)) {
        return;
    }

    $pages[$route] = $type;
};

$addPage('', $siteRoot . '/index.php', 'homepage');

foreach ($staticRoutes as $slug) {
    $addPage($slug, $siteRoot . '/views/' . $slug . '.php', 'static');
}

$categoryDir = $siteRoot . '/views/category';
foreach ($categoryRoutes as $slug) {
    $addPage($slug, $categoryDir . '/' . $slug . '.php', 'category');
}

$guideDir = $siteRoot . '/views/guides';
$guideLandingPage = $guideDir . '/index.php';
$addPage('guides', $guideLandingPage, 'guide');
if (is_dir($guideDir) && ($guideFiles = @scandir($guideDir)) !== false) {
    foreach ($guideFiles as $fileName) {
        if (substr($fileName, -4) !== '.php' || $fileName === 'index.php') {
            continue;
        }

        $slug = substr($fileName, 0, -4);
        if (in_array($slug, $legacyRedirects, true)) {
            continue;
        }

        $addPage('guides/' . $slug, $guideDir . '/' . $fileName, 'guide');
    }
}

$toolDir = $siteRoot . '/views/tools';
if (is_dir($toolDir) && ($toolFiles = @scandir($toolDir)) !== false) {
    foreach ($toolFiles as $fileName) {
        if (substr($fileName, -4) !== '.php' || $fileName === 'index.php') {
            continue;
        }

        $slug = substr($fileName, 0, -4);
        if (
            in_array($slug, $legacyRedirects, true)
            || in_array($slug, $reservedToolRoutes, true)
            || preg_match('/^(?:test|demo)(?:-|$)/', $slug)
        ) {
            continue;
        }

        $addPage($slug, $toolDir . '/' . $fileName, 'tool');
    }
}

$routes = array_keys($pages);
sort($routes, SORT_STRING);
$xml = [];
$xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
$xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach ($routes as $route) {
    $loc = $siteUrl . ($route === '' ? '/' : '/' . $route);
    $xml[] = '  <url>';
    $xml[] = '    <loc>' . htmlspecialchars($loc, ENT_XML1 | ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</loc>';
    $xml[] = '  </url>';
}

$xml[] = '</urlset>';
echo implode("\n", $xml) . "\n";
exit;
