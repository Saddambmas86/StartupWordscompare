<?php
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$sitemapUrl = $argv[1] ?? '';
if ($sitemapUrl === '') {
    fwrite(STDERR, "Usage: php maintenance/validate-sitemap.php <sitemap-url>\n");
    exit(2);
}

$siteRoot = dirname(__DIR__);
$canonicalHost = 'www.wordscompare.com';
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
    'text-comparision',
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

$expected = [];
$addExpected = static function (string $route, string $type, string $filePath) use (&$expected, $isPublicPage): void {
    if (
        ($route !== '' && !preg_match('/^(?:[a-z0-9]+(?:-[a-z0-9]+)*|guides\/[a-z0-9]+(?:-[a-z0-9]+)*)$/D', $route))
        || !$isPublicPage($filePath)
    ) {
        return;
    }

    $expected[$route] = $type;
};

$addExpected('', 'homepage', $siteRoot . '/index.php');
foreach ($staticRoutes as $route) {
    $addExpected($route, 'static', $siteRoot . '/views/' . $route . '.php');
}
foreach ($categoryRoutes as $route) {
    $addExpected($route, 'category', $siteRoot . '/views/category/' . $route . '.php');
}

$guideDir = $siteRoot . '/views/guides';
$addExpected('guides', 'guide', $guideDir . '/index.php');
if (is_dir($guideDir) && ($guideFiles = @scandir($guideDir)) !== false) {
    foreach ($guideFiles as $fileName) {
        if (substr($fileName, -4) !== '.php' || $fileName === 'index.php') {
            continue;
        }

        $slug = substr($fileName, 0, -4);
        if (!in_array($slug, $legacyRedirects, true)) {
            $addExpected('guides/' . $slug, 'guide', $guideDir . '/' . $fileName);
        }
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

        $addExpected($slug, 'tool', $toolDir . '/' . $fileName);
    }
}

$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'timeout' => 15,
        'ignore_errors' => true,
        'follow_location' => 0,
        'max_redirects' => 0,
        'header' => "Accept: application/xml\r\n",
    ],
]);
$xmlText = @file_get_contents($sitemapUrl, false, $context);
$responseHeaders = $http_response_header ?? [];
if ($xmlText === false) {
    fwrite(STDERR, "Unable to fetch sitemap: {$sitemapUrl}\n");
    exit(1);
}

$statusCode = 0;
$contentType = '';
$hasLocation = false;
foreach ($responseHeaders as $responseHeader) {
    if ($statusCode === 0 && preg_match('/^HTTP\/\S+\s+(\d{3})/', $responseHeader, $match)) {
        $statusCode = (int) $match[1];
    }
    if (preg_match('/^Content-Type:\s*([^;]+)/i', $responseHeader, $match)) {
        $contentType = strtolower(trim($match[1]));
    }
    if (preg_match('/^Location:/i', $responseHeader)) {
        $hasLocation = true;
    }
}

libxml_use_internal_errors(true);
$xml = simplexml_load_string($xmlText, 'SimpleXMLElement', LIBXML_NONET | LIBXML_NOBLANKS);
$xmlErrors = libxml_get_errors();
libxml_clear_errors();
$validXml = $xml !== false
    && $xml->getName() === 'urlset'
    && (($xml->getNamespaces(true)[''] ?? '') === 'http://www.sitemaps.org/schemas/sitemap/0.9');

$urls = [];
$locCountErrors = 0;
if ($validXml) {
    foreach ($xml->children('http://www.sitemaps.org/schemas/sitemap/0.9')->url as $urlNode) {
        $locs = $urlNode->children('http://www.sitemaps.org/schemas/sitemap/0.9')->loc;
        if (count($locs) !== 1) {
            $locCountErrors++;
            continue;
        }
        $urls[] = trim((string) $locs[0]);
    }
}

$exactSeen = [];
$normalizedSeen = [];
$routesFound = [];
$httpUrls = [];
$localhostUrls = [];
$wrongDomains = [];
$typoRoutes = [];
$redirectRoutes = [];
$nonexistentRoutes = [];
$badCanonicalUrls = [];
$counts = ['homepage' => 0, 'static' => 0, 'category' => 0, 'guide' => 0, 'tool' => 0];
$duplicateCount = 0;
$normalizedDuplicateCount = 0;

foreach ($urls as $url) {
    if (isset($exactSeen[$url])) {
        $duplicateCount++;
    }
    $exactSeen[$url] = true;

    $parts = parse_url($url);
    if ($parts === false || !isset($parts['host'])) {
        $badCanonicalUrls[] = $url;
        continue;
    }

    $host = strtolower($parts['host']);
    $path = $parts['path'] ?? '/';
    if (($parts['scheme'] ?? '') === 'http') {
        $httpUrls[] = $url;
    }
    if (in_array($host, ['localhost', '127.0.0.1', '::1'], true)) {
        $localhostUrls[] = $url;
    }
    if ($host !== $canonicalHost) {
        $wrongDomains[] = $url;
    }
    if (
        ($parts['scheme'] ?? '') !== 'https'
        || $host !== $canonicalHost
        || isset($parts['query'])
        || isset($parts['fragment'])
        || preg_match('~(?:^|/)index\.php(?:/|$)~i', $path)
        || ($path !== '/' && substr($path, -1) === '/')
    ) {
        $badCanonicalUrls[] = $url;
    }

    $normalizedPath = strtolower(rawurldecode($path));
    if ($normalizedPath !== '/') {
        $normalizedPath = '/' . trim($normalizedPath, '/');
    }
    if (isset($normalizedSeen[$normalizedPath])) {
        $normalizedDuplicateCount++;
    }
    $normalizedSeen[$normalizedPath] = true;

    $route = trim($normalizedPath, '/');
    if (in_array($route, $legacyRedirects, true)) {
        $redirectRoutes[] = $url;
        if ($route === 'text-comparision') {
            $typoRoutes[] = $url;
        }
    }
    if (isset($expected[$route])) {
        $routesFound[$route] = true;
        $counts[$expected[$route]]++;
    } else {
        $nonexistentRoutes[] = $url;
    }
}

$missingRoutes = array_values(array_diff(array_keys($expected), array_keys($routesFound)));
$invalidUrlCount = count(array_unique(array_merge(
    $httpUrls,
    $localhostUrls,
    $wrongDomains,
    $typoRoutes,
    $redirectRoutes,
    $nonexistentRoutes,
    $badCanonicalUrls
))) + $locCountErrors;

echo 'HTTP_STATUS: ' . $statusCode . PHP_EOL;
echo 'CONTENT_TYPE: ' . ($contentType !== '' ? $contentType : '(missing)') . PHP_EOL;
echo 'REDIRECT: ' . ($hasLocation ? 'yes' : 'no') . PHP_EOL;
echo 'VALID_XML: ' . ($validXml && count($xmlErrors) === 0 ? 'yes' : 'no') . PHP_EOL;
echo 'URL_COUNT: ' . count($urls) . PHP_EOL;
echo 'HOMEPAGE_COUNT: ' . $counts['homepage'] . PHP_EOL;
echo 'STATIC_PAGE_COUNT: ' . $counts['static'] . PHP_EOL;
echo 'CATEGORY_PAGE_COUNT: ' . $counts['category'] . PHP_EOL;
echo 'GUIDE_PAGE_COUNT: ' . $counts['guide'] . PHP_EOL;
echo 'TOOL_PAGE_COUNT: ' . $counts['tool'] . PHP_EOL;
echo 'DUPLICATE_COUNT: ' . $duplicateCount . PHP_EOL;
echo 'NORMALIZED_DUPLICATE_COUNT: ' . $normalizedDuplicateCount . PHP_EOL;
echo 'HTTP_URL_COUNT: ' . count($httpUrls) . PHP_EOL;
echo 'LOCALHOST_URL_COUNT: ' . count($localhostUrls) . PHP_EOL;
echo 'WRONG_DOMAIN_COUNT: ' . count($wrongDomains) . PHP_EOL;
echo 'TYPO_ROUTE_COUNT: ' . count($typoRoutes) . PHP_EOL;
echo 'REDIRECT_ROUTE_COUNT: ' . count($redirectRoutes) . PHP_EOL;
echo 'NONEXISTENT_ROUTE_COUNT: ' . count($nonexistentRoutes) . PHP_EOL;
echo 'BAD_CANONICAL_URL_COUNT: ' . count($badCanonicalUrls) . PHP_EOL;
echo 'MISSING_ROUTE_COUNT: ' . count($missingRoutes) . PHP_EOL;
echo 'INVALID_URL_COUNT: ' . $invalidUrlCount . PHP_EOL;

$failed = $statusCode !== 200
    || $contentType !== 'application/xml'
    || $hasLocation
    || !$validXml
    || count($xmlErrors) > 0
    || $duplicateCount > 0
    || $normalizedDuplicateCount > 0
    || $invalidUrlCount > 0;
exit($failed ? 1 : 0);