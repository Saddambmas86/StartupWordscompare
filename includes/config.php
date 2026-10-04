<?php
// config.php
$site_name = "WordsCompare";
$default_title_suffix = "Free PDF, Calculator & Text Tools"; // For homepage

// BASE URL ---------------------------------------
//$base_url = "http://localhost/mywebtools1.0.2/"; // Optional for absolute paths
// Detect protocol (http/https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
// Get domain (e.g., localhost or example.com)
$domain = $_SERVER['HTTP_HOST'] ?? 'localhost';
// Get the correct base path (project root, not current file location)
$script_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', dirname(__DIR__)));
$base_path = rtrim($script_path, '/') . '/';
$base_url = $protocol . $domain . $base_path;

// Keep local canonical URLs usable while fixing the production origin.
$canonical_host = strtolower(preg_replace('/:\\d+$/', '', $domain));
$is_local_development = in_array($canonical_host, ['localhost', '127.0.0.1', '::1', '[::1]'], true)
	|| preg_match('/\\.(?:test|local)$/', $canonical_host) === 1;
$canonical_base_url = $is_local_development ? $base_url : 'https://www.wordscompare.com/';
// expose to templates
$GLOBALS['base_url'] = $base_url;
$GLOBALS['canonical_base_url'] = $canonical_base_url;
// Default brand icons array (used to pick 'fab' prefix). Keep empty if none.
if (!isset($brandIcons) || !is_array($brandIcons)) {
	$brandIcons = [];
}
$GLOBALS['brandIcons'] = $brandIcons;
?>