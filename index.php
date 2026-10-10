<?php
$page_title = "Free Online Text, QA, Developer, PDF & Conversion Tools";
$page_description = "Free online tools for text comparison, QA testing, developers, PDFs, file conversion and calculations. Fast, easy to use, mobile-friendly and no signup required.";
$page_keywords = "free online tools, text comparison, text compare online, text diff, QA tools, QA testing tools, developer tools, JSON formatter, JSON validator, JSON diff, API testing tools, API tools, debugging tools, PDF tools, PDF converter, file conversion tools, online calculators, WordsCompare";
include 'includes/header.php';
?>


<!-- Queue analytics immediately, then fetch Google Analytics after the page load. -->
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-ZVG71163ZG');

    (function () {
        var analyticsLoaded = false;
        function loadAnalytics() {
            if (analyticsLoaded) return;
            analyticsLoaded = true;
            var script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id=G-ZVG71163ZG';
            document.head.appendChild(script);
        }
        function scheduleAnalytics() {
            // Preserve queued page-view data while keeping analytics off the critical path.
            window.setTimeout(function () {
                if ('requestIdleCallback' in window) {
                    window.requestIdleCallback(loadAnalytics, { timeout: 2000 });
                } else {
                    loadAnalytics();
                }
            }, 5000);
        }
        if (document.readyState === 'complete') {
            scheduleAnalytics();
        } else {
            window.addEventListener('load', scheduleAnalytics, { once: true });
        }
    })();
</script>

<div class="home-page-ad-layout">
    <div class="home-page-content">
<main class="container-fluid my-1 px-0 home-page-shell">
    <?php
    $categoryCards = [
        ['title' => 'Developer', 'description' => 'JSON, Encoding, JWT, Code, URLs and more', 'url' => $base_url . 'developer-tools', 'icon' => 'fa-code', 'accent' => 'developer'],
        ['title' => 'QA & Testing', 'description' => 'JSON Diff, Validation, Test Data, Regex and more', 'url' => $base_url . 'qa-tools', 'icon' => 'fa-vial', 'accent' => 'qa'],
        ['title' => 'API Testing', 'description' => 'API Tools, Responses, Headers, Auth and more', 'url' => $base_url . 'api-testing-tools', 'icon' => 'fa-plug', 'accent' => 'api'],
        ['title' => 'PDF Tools', 'description' => 'Convert, Merge, Split, Compress, OCR and more', 'url' => $base_url . 'pdf-tools', 'icon' => 'fa-file-pdf', 'accent' => 'pdf'],
        ['title' => 'Text Tools', 'description' => 'Compare, Count, Clean, Transform and more', 'url' => $base_url . 'text-tools', 'icon' => 'fa-file-alt', 'accent' => 'text'],
        ['title' => 'Calculators', 'description' => 'Finance, Math, Date, Percentage and more', 'url' => $base_url . 'calculators', 'icon' => 'fa-calculator', 'accent' => 'calc'],
    ];

    $developerTools = [
        ['title' => 'JSON Formatter', 'description' => 'Format and validate JSON payloads.', 'url' => $base_url . 'json-formatter', 'icon' => 'fa-code'],
        ['title' => 'JSON Viewer', 'description' => 'Browse structured JSON content clearly.', 'url' => $base_url . 'json-viewer', 'icon' => 'fa-eye'],
        ['title' => 'Base64 Encoder', 'description' => 'Encode and decode Base64 values.', 'url' => $base_url . 'base64-encoder', 'icon' => 'fa-lock'],
        ['title' => 'URL Encoder', 'description' => 'Encode and decode URL-safe strings.', 'url' => $base_url . 'url-encoder', 'icon' => 'fa-link'],
        ['title' => 'Hash Generator', 'description' => 'Create MD5, SHA and other hashes.', 'url' => $base_url . 'hash-generator', 'icon' => 'fa-fingerprint'],
        ['title' => 'JWT Decoder', 'description' => 'Inspect JWT headers and payloads.', 'url' => $base_url . 'jwt-decoder', 'icon' => 'fa-key'],
    ];

    $qaTools = [
        ['title' => 'Text Compare', 'description' => 'Compare text blocks and spot differences.', 'url' => $base_url . 'text-comparison', 'icon' => 'fa-code-branch'],
        ['title' => 'Word Counter', 'description' => 'Check word and character counts quickly.', 'url' => $base_url . 'word-counter', 'icon' => 'fa-font'],
        ['title' => 'Find & Replace Text', 'description' => 'Find and replace repeated text values.', 'url' => $base_url . 'find-replace-text', 'icon' => 'fa-search'],
        ['title' => 'Case Converter', 'description' => 'Convert text to sentence, title, and lower case.', 'url' => $base_url . 'case-converter', 'icon' => 'fa-text-height'],
        ['title' => 'JSON Viewer', 'description' => 'Inspect JSON output and response payloads.', 'url' => $base_url . 'json-viewer', 'icon' => 'fa-eye'],
        ['title' => 'Remove Extra Spaces', 'description' => 'Clean up formatting and white space issues.', 'url' => $base_url . 'remove-extra-spaces', 'icon' => 'fa-eraser'],
    ];

    $apiTools = [
        ['title' => 'JSON Formatter', 'description' => 'Format API JSON responses clearly.', 'url' => $base_url . 'json-formatter', 'icon' => 'fa-code'],
        ['title' => 'JSON Viewer', 'description' => 'Inspect structured API payloads.', 'url' => $base_url . 'json-viewer', 'icon' => 'fa-eye'],
        ['title' => 'JWT Decoder', 'description' => 'Decode and validate JWT tokens.', 'url' => $base_url . 'jwt-decoder', 'icon' => 'fa-key'],
        ['title' => 'Base64 Encoder', 'description' => 'Encode Base64 payloads in the browser.', 'url' => $base_url . 'base64-encoder', 'icon' => 'fa-lock'],
        ['title' => 'URL Encoder', 'description' => 'Prepare request values for APIs and URLs.', 'url' => $base_url . 'url-encoder', 'icon' => 'fa-link'],
        ['title' => 'Hash Generator', 'description' => 'Generate hash values for verification.', 'url' => $base_url . 'hash-generator', 'icon' => 'fa-fingerprint'],
    ];

    $textTools = [
        ['title' => 'Case Converter', 'description' => 'Change casing for clean text output.', 'url' => $base_url . 'case-converter', 'icon' => 'fa-text-height'],
        ['title' => 'Remove Extra Spaces', 'description' => 'Clean white space and formatting noise.', 'url' => $base_url . 'remove-extra-spaces', 'icon' => 'fa-eraser'],
        ['title' => 'Text Compare', 'description' => 'Compare content and review changes.', 'url' => $base_url . 'text-comparison', 'icon' => 'fa-code-branch'],
        ['title' => 'Word Counter', 'description' => 'Review counts and text stats instantly.', 'url' => $base_url . 'word-counter', 'icon' => 'fa-font'],
        ['title' => 'Find & Replace Text', 'description' => 'Update repeated values across content.', 'url' => $base_url . 'find-replace-text', 'icon' => 'fa-search'],
        ['title' => 'Text to Slug', 'description' => 'Convert names into URL-friendly slugs.', 'url' => $base_url . 'text-to-slug', 'icon' => 'fa-link'],
    ];

    $pdfTools = [
        ['title' => 'Compress PDF', 'description' => 'Reduce PDF size quickly.', 'url' => $base_url . 'compress-pdf', 'icon' => 'fa-file-pdf'],
        ['title' => 'Merge PDF', 'description' => 'Combine multiple PDFs into one.', 'url' => $base_url . 'merge-pdf', 'icon' => 'fa-object-group'],
        ['title' => 'Split PDF', 'description' => 'Separate a PDF into smaller files.', 'url' => $base_url . 'split-pdf', 'icon' => 'fa-scissors'],
        ['title' => 'Add Watermark to PDF', 'description' => 'Apply a watermark to your document.', 'url' => $base_url . 'add-watermark-to-pdf', 'icon' => 'fa-water'],
        ['title' => 'PDF to Word', 'description' => 'Convert PDF files to Word format.', 'url' => $base_url . 'pdf-to-word', 'icon' => 'fa-file-word'],
        ['title' => 'PDF to JSON', 'description' => 'Extract structured content from PDF to JSON.', 'url' => $base_url . 'pdf-to-json', 'icon' => 'fa-file-code'],
    ];

    $calculatorTools = [
        ['title' => 'EMI Calculator', 'description' => 'Estimate monthly loan repayments.', 'url' => $base_url . 'emi-calculator', 'icon' => 'fa-calculator'],
        ['title' => 'GST Calculator', 'description' => 'Calculate GST on product values.', 'url' => $base_url . 'gst-calculator', 'icon' => 'fa-receipt'],
        ['title' => 'Compound Interest', 'description' => 'Model investment growth with compounding.', 'url' => $base_url . 'compound-interest-calculator', 'icon' => 'fa-chart-line'],
        ['title' => 'BMI Calculator', 'description' => 'Check body mass index quickly.', 'url' => $base_url . 'bmi-calculator', 'icon' => 'fa-heartbeat'],
        ['title' => 'Age Calculator', 'description' => 'Calculate age from date of birth.', 'url' => $base_url . 'age-calculator', 'icon' => 'fa-user-clock'],
        ['title' => 'Unit Converter', 'description' => 'Convert units for everyday work.', 'url' => $base_url . 'unit-converter', 'icon' => 'fa-arrows-alt'],
    ];

    $guideCards = [
        ['title' => 'Developer tools', 'description' => 'Format, encode and validate data in your browser.', 'url' => $base_url . 'developer-tools'],
        ['title' => 'QA & Testing tools', 'description' => 'Compare content, inspect output and review changes.', 'url' => $base_url . 'qa-tools'],
        ['title' => 'PDF tools', 'description' => 'Edit, compress and convert PDFs without installing software.', 'url' => $base_url . 'pdf-tools'],
    ];
    ?>

    <section class="hero-section app-hero-section">
        <div class="container hero-shell">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6">
                    <div class="hero-copy">
                        <span class="hero-badge">QA &amp; Developer Tools</span>
                        <h1 class="hero-title">Text Comparison, QA &amp; Developer Tools to <span class="gradient-text">Compare &amp; Debug Faster</span></h1>
                        <p class="hero-subtitle">Compare text, validate JSON, inspect API payloads, and streamline everyday release checks with practical browser-based utilities.</p>
                        <div class="hero-search-wrap">
                            <button id="global-search-trigger" class="hero-search-btn" type="button" data-wc-search aria-label="Open search (Ctrl/Cmd+K)" aria-expanded="false">
                                <span class="hero-search-icon"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <span class="hero-search-label">Search tools...</span>
                                <span class="hero-search-shortcut">⌘ K</span>
                            </button>
                        </div>

                        <div class="hero-tags-wrap">
                            <span class="hero-tags-label">Popular searches:</span>
                            <div class="hero-tags">
                                <a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a>
                                <a href="<?php echo $base_url; ?>text-comparison">Text Compare</a>
                                <a href="<?php echo $base_url; ?>jwt-decoder">JWT Decoder</a>
                                <a href="<?php echo $base_url; ?>base64-encoder">Base64</a>
                                <a href="<?php echo $base_url; ?>url-encoder">URL Encode</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-visual d-none d-lg-block" aria-hidden="true">
                        <div class="hero-visual-panel hero-panel-main">
                            <div class="hero-panel-header">
                                <span class="dot dot-purple"></span>
                                <span class="dot dot-cyan"></span>
                                <span class="dot dot-green"></span>
                            </div>

                            <div class="hero-console">
                                <div class="hero-console-line line-lg"></div>
                                <div class="hero-console-line"></div>
                                <div class="hero-console-line"></div>
                                <div class="hero-console-line line-mid"></div>
                                <div class="hero-console-line line-sm"></div>
                            </div>

                            <div class="hero-floating-card hero-card-json">
                                <span class="hero-card-label">JSON</span>
                                <div class="hero-json-row"><span></span><span></span><span></span></div>
                                <div class="hero-json-row small"><span></span><span></span></div>
                                <div class="hero-json-row small"><span></span><span></span><span></span></div>
                            </div>

                            <div class="hero-floating-card hero-card-search">
                                <span class="hero-card-label">Search</span>
                                <div class="hero-search-mini">
                                    <i class="fas fa-search"></i>
                                    <span>json formatter</span>
                                </div>
                            </div>

                            <div class="hero-floating-card hero-card-qa">
                                <span class="hero-card-label">QA</span>
                                <div class="hero-qa-bars">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trust-strip">
        <div class="container">
            <div class="trust-grid">
                <div class="trust-item">
                    <div class="trust-icon"><i class="fas fa-circle-dollar-to-slot" aria-hidden="true"></i></div>
                    <div>
                        <h3>Free to use</h3>
                        <p>Practical utility tools for common tasks</p>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon"><i class="fas fa-user-check" aria-hidden="true"></i></div>
                    <div>
                        <h3>Fast access</h3>
                        <p>Start using most tools quickly</p>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon"><i class="fas fa-window-maximize" aria-hidden="true"></i></div>
                    <div>
                        <h3>Browser and file tools</h3>
                        <p>Works in-browser where supported and via secure processing for file workflows</p>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon"><i class="fas fa-shield-heart" aria-hidden="true"></i></div>
                    <div>
                        <h3>Privacy focused</h3>
                        <p>Data handling is kept minimal and aligned with the tool's processing model</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="working-section py-3 py-md-4 py-lg-5">
        <div class="container">
            <div class="working-header mb-4">
                <h2>What are you working on?</h2>
            </div>

            <div class="working-grid">
                <?php foreach ($categoryCards as $category): ?>
                    <a href="<?php echo $category['url']; ?>" class="working-card card-accent-<?php echo $category['accent']; ?>">
                        <div class="working-card-icon">
                            <i class="fas <?php echo $category['icon']; ?>" aria-hidden="true"></i>
                        </div>

                        <div class="working-card-content">
                            <h3><?php echo htmlspecialchars($category['title']); ?></h3>
                            <p><?php echo htmlspecialchars($category['description']); ?></p>
                        </div>

                        <div class="working-card-arrow" aria-hidden="true">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="developer-tools" class="developer-home-section py-5">
        <div class="container">
            <div class="developer-home-shell">
                <div class="developer-home-copy">
                    <p class="eyebrow mb-2">Built for QA &amp; Developers</p>
                    <h2>Built for QA and developers</h2>
                    <p>Fast browser-based utilities for JSON validation, API inspection, text comparison, regex cleanup, and everyday engineering checks.</p>
                </div>

                <div class="developer-home-panel" aria-label="Developer tool categories">
                    <div class="developer-home-panel-header">
                        <a href="<?php echo $base_url; ?>developer-tools" class="home-section-open-category text-decoration-none fw-semibold">Open category</a>
                    </div>
                    <div class="developer-chip-group">
                        <span class="developer-chip">JSON</span>
                        <span class="developer-chip">Encoding</span>
                        <span class="developer-chip">JWT</span>
                        <span class="developer-chip">Web</span>
                        <span class="developer-chip">Code</span>
                        <span class="developer-chip">Security</span>
                        <span class="developer-chip">URLs</span>
                        <span class="developer-chip">Date &amp; Time</span>
                    </div>

                    <div class="developer-mini-cards">
                        <a href="<?php echo $base_url; ?>json-formatter" class="developer-mini-card">
                            <span class="mini-card-icon"><i class="fas fa-code"></i></span>
                            <span>JSON Formatter</span>
                        </a>
                        <a href="<?php echo $base_url; ?>jwt-decoder" class="developer-mini-card">
                            <span class="mini-card-icon"><i class="fas fa-key"></i></span>
                            <span>JWT Decoder</span>
                        </a>
                        <a href="<?php echo $base_url; ?>url-encoder" class="developer-mini-card">
                            <span class="mini-card-icon"><i class="fas fa-link"></i></span>
                            <span>URL Encoder</span>
                        </a>
                        <a href="<?php echo $base_url; ?>hash-generator" class="developer-mini-card">
                            <span class="mini-card-icon"><i class="fas fa-fingerprint"></i></span>
                            <span>Hash Generator</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="qa-api-home-section py-5">
        <div class="container">
            <div class="qa-api-home-shell">
                <div class="qa-api-home-header">
                    <div class="qa-api-home-copy">
                        <p class="eyebrow mb-2">QA &amp; API Testing</p>
                        <h2>QA &amp; API Testing</h2>
                        <p>Tools for QA engineers, SDETs, automation engineers and API testers.</p>
                    </div>
                    <a href="<?php echo $base_url; ?>qa-tools" class="home-section-open-category text-decoration-none fw-semibold">Open category</a>
                </div>

                <div class="qa-api-workflow" aria-label="QA and API testing workflow">
                    <a href="<?php echo $base_url; ?>json-formatter" class="qa-api-step">
                        <span class="qa-api-step-name">JSON Formatter</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>json-formatter" class="qa-api-step">
                        <span class="qa-api-step-name">JSON Validator</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>text-comparison" class="qa-api-step">
                        <span class="qa-api-step-name">JSON Diff</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>jwt-decoder" class="qa-api-step">
                        <span class="qa-api-step-name">JWT Decoder</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>base64-encoder" class="qa-api-step">
                        <span class="qa-api-step-name">Base64</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>guides/http-status-codes-api-testing" class="qa-api-step">
                        <span class="qa-api-step-name">HTTP Status</span>
                    </a>
                </div>

                <div class="qa-api-actions">
                    <a href="<?php echo $base_url; ?>api-testing-tools" class="qa-api-link">Explore API Testing Tools <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </section>

    <section id="text-tools" class="tool-category-section py-5">
        <div class="container">
            <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <p class="eyebrow mb-1">Content workflows</p>
                    <h2 class="mb-0">Text &amp; Content tools</h2>
                </div>
                <a href="<?php echo $base_url; ?>text-tools" class="text-decoration-none fw-semibold">Open category</a>
            </div>
            <div class="row g-3">
                <?php foreach ($textTools as $tool): ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="<?php echo $tool['url']; ?>" class="tool-list-card card h-100 border-0 shadow-sm rounded-4 text-decoration-none text-body">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="mini-tool-icon"><i class="fas <?php echo $tool['icon']; ?>"></i></span>
                                    <h3 class="h6 mb-0"><?php echo htmlspecialchars($tool['title']); ?></h3>
                                </div>
                                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="pdf-tools" class="tool-category-section py-5 bg-light-subtle">
        <div class="container">
            <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <p class="eyebrow mb-1">Document processing</p>
                    <h2 class="mb-0">PDF tools</h2>
                </div>
                <a href="<?php echo $base_url; ?>pdf-tools" class="text-decoration-none fw-semibold">Open category</a>
            </div>
            <div class="row g-3">
                <?php foreach ($pdfTools as $tool): ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="<?php echo $tool['url']; ?>" class="tool-list-card card h-100 border-0 shadow-sm rounded-4 text-decoration-none text-body">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="mini-tool-icon"><i class="fas <?php echo $tool['icon']; ?>"></i></span>
                                    <h3 class="h6 mb-0"><?php echo htmlspecialchars($tool['title']); ?></h3>
                                </div>
                                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="calculators" class="tool-category-section py-5">
        <div class="container">
            <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <p class="eyebrow mb-1">Planning and decision making</p>
                    <h2 class="mb-0">Calculators</h2>
                </div>
                <a href="<?php echo $base_url; ?>calculators" class="text-decoration-none fw-semibold">Open category</a>
            </div>
            <div class="row g-3">
                <?php foreach ($calculatorTools as $tool): ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="<?php echo $tool['url']; ?>" class="tool-list-card card h-100 border-0 shadow-sm rounded-4 text-decoration-none text-body">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="mini-tool-icon"><i class="fas <?php echo $tool['icon']; ?>"></i></span>
                                    <h3 class="h6 mb-0"><?php echo htmlspecialchars($tool['title']); ?></h3>
                                </div>
                                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="privacy-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <p class="eyebrow mb-2">Privacy-first</p>
                    <h2 class="mb-3">Most tools work in your browser</h2>
                    <p class="mb-3">WordsCompare is built for fast, lightweight productivity. Most tools process content locally in the browser, which means less friction, more privacy, and no unnecessary uploads.</p>
                    <p class="mb-0">This approach keeps the experience quick, secure, and accessible for developers, testers, and everyday users working on real tasks.</p>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="feature-icon bg-success-subtle text-success"><i class="fas fa-shield-alt"></i></span>
                                <h3 class="h5 mb-0">Browser processing</h3>
                            </div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Local processing reduces upload dependence</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Faster results for everyday edits and checks</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Better fit for content, JSON, text and PDF work</li>
                                <li><i class="fas fa-check text-success me-2"></i> Straightforward access on desktop and mobile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-guides py-5 bg-light-subtle">
        <div class="container">
            <div class="section-header mb-4">
                <p class="eyebrow mb-1">Helpful starting points</p>
                <h2 class="mb-0">Popular guides</h2>
            </div>
            <div class="row g-3">
                <?php foreach ($guideCards as $guide): ?>
                    <div class="col-12 col-md-4">
                        <a href="<?php echo $guide['url']; ?>" class="guide-card card border-0 shadow-sm h-100 rounded-4 text-decoration-none text-body">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="feature-icon"><i class="fas fa-book-open"></i></span>
                                    <i class="fas fa-arrow-right text-muted"></i>
                                </div>
                                <h3 class="h5 mb-2"><?php echo htmlspecialchars($guide['title']); ?></h3>
                                <p class="text-muted mb-0"><?php echo htmlspecialchars($guide['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <style>
        .home-page-shell .eyebrow {
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.75rem;
            font-weight: 700;
            color: #dc3545;
        }

        .hero-panel {
            background: linear-gradient(135deg, #ffffff 0%, #f7f8fb 100%);
            border-bottom: 1px solid #edf0f5;
        }

        .hero-copy h1 {
            letter-spacing: -0.05em;
            line-height: 1.05;
            color: #111827;
        }

        /* Homepage uses the global search widget now; local inline search removed. */

        .search-result-item,
        .search-result-empty {
            display: block;
            padding: 0.8rem 1rem;
            color: #1f2937;
            text-decoration: none;
            border-bottom: 1px solid #eef2f7;
            font-size: 0.95rem;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-item:hover,
        .search-result-item:focus-visible {
            background: #f8f9fb;
            color: #111827;
            text-decoration: none;
        }

        .hero-feature-card,
        .tool-card-link,
        .category-tile,
        .tool-list-card,
        .guide-card {
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .hero-feature-card:hover,
        .tool-card-link:hover,
        .category-tile:hover,
        .tool-list-card:hover,
        .guide-card:hover {
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08) !important;
            transform: translateY(-2px);
        }

        .feature-icon,
        .tool-icon,
        .mini-tool-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #fff5f5;
            color: #dc3545;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
        }

        .mini-tool-icon {
            width: 34px;
            height: 34px;
            font-size: 0.85rem;
            background: #f3f6fb;
            color: #2b2d42;
        }

        .category-icon {
            width: 52px;
            height: 52px;
            font-size: 1.1rem;
        }

        .tool-card-link .card-body,
        .tool-list-card .card-body,
        .guide-card .card-body,
        .category-tile .card-body {
            height: 100%;
        }

        .tool-list-card,
        .guide-card,
        .category-tile,
        .tool-card-link {
            border-radius: 1.25rem !important;
        }

        .section-header a,
        .category-tile,
        .tool-list-card,
        .guide-card,
        .tool-card-link {
            text-decoration: none !important;
        }

        @media (max-width: 991.98px) {
            .hero-copy h1 {
                font-size: clamp(2.25rem, 6vw, 3.3rem);
            }
        }

        @media (max-width: 575.98px) {
            .hero-panel,
            .popular-tools,
            .tool-category-section,
            .privacy-section,
            .popular-guides {
                padding-top: 2.5rem !important;
                padding-bottom: 2.5rem !important;
            }

            .section-header {
                align-items: flex-start !important;
            }
        }
    </style>
    <!-- How It Works -->
    <section class="py-5 bg-light" aria-labelledby="how-it-works-title">
        <div class="container">
            <div class="text-center mb-5">
                <h2 id="how-it-works-title">How It Works</h2>
                <p class="text-muted mb-0">Use WordsCompare tools in four simple steps.</p>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-3">
                    <div class="h-100 p-4 bg-white rounded-3 shadow-sm">
                        <div class="mb-3"><i class="fas fa-mouse-pointer fa-2x text-danger" aria-hidden="true"></i></div>
                        <h3 class="h5">1. Choose a Tool</h3>
                        <p class="mb-0">Select a text, QA, developer, PDF, converter, or calculator tool.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="h-100 p-4 bg-white rounded-3 shadow-sm">
                        <div class="mb-3"><i class="fas fa-keyboard fa-2x text-danger" aria-hidden="true"></i></div>
                        <h3 class="h5">2. Enter or Upload</h3>
                        <p class="mb-0">Paste your text, enter values, or upload a supported file when required.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="h-100 p-4 bg-white rounded-3 shadow-sm">
                        <div class="mb-3"><i class="fas fa-cogs fa-2x text-danger" aria-hidden="true"></i></div>
                        <h3 class="h5">3. Process</h3>
                        <p class="mb-0">Let the selected tool compare, validate, convert, calculate, or transform your input.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="h-100 p-4 bg-white rounded-3 shadow-sm">
                        <div class="mb-3"><i class="fas fa-check-circle fa-2x text-danger" aria-hidden="true"></i></div>
                        <h3 class="h5">4. Get Your Result</h3>
                        <p class="mb-0">Review your result, then copy, download, or use it as needed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

    <!-- FAQ Section -->
    <section class="faq-section bg-light">
        <div class="container">
            <h2 class="mb-5">Frequently Asked Questions <span class="emoji"></span></h2>
            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion1">
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <i class="fas fa-info-circle text-danger me-2"></i> What is WordsCompare?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">WordsCompare is a collection of practical online tools for text comparison, QA and testing, developers, PDFs, file conversion, and everyday calculations.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <i class="fas fa-code-compare text-danger me-2"></i> What is the Text Compare tool used for?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">Text Compare helps you compare two pieces of text and identify differences. It can be useful for reviewing revisions, proofreading, checking copied content, and comparing document versions.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <i class="fas fa-vial text-danger me-2"></i> What QA and developer tools are available?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">The site includes tools such as JSON formatters and validators, JSON comparison, API utilities, JWT tools, encoders and decoders, regex utilities, and other developer and QA helpers.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <i class="fas fa-shield-alt text-danger me-2"></i> Is my data secure?
                                </button>
                            </h3>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">Many text and data tools process input directly in your browser. Some file or document tools may use server-side processing. Check the individual tool page for its processing and privacy details before using sensitive content.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion2">
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq5">
                                    <i class="fas fa-dollar-sign text-danger me-2"></i> Is WordsCompare free to use?
                                </button>
                            </h3>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Most tools are free to use without an account. Individual tools may have file-size, format, feature, or processing limits depending on how they work.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq6">
                                    <i class="fas fa-file-pdf text-danger me-2"></i> What PDF and conversion tools are available?
                                </button>
                            </h3>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">WordsCompare includes tools for common PDF operations and file conversions, including PDF merging, splitting, compression, PDF-to-document conversion, image-to-PDF conversion, and other formats. Supported formats and processing details are provided on each tool page.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq7">
                                    <i class="fas fa-mobile-alt text-danger me-2"></i> Can I use WordsCompare on mobile?
                                </button>
                            </h3>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">The website is designed to work across desktop, tablet, and mobile browsers. Individual tools may have different interface or file-processing requirements.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq8">
                                    <i class="fas fa-user-check text-danger me-2"></i> Do I need an account?
                                </button>
                            </h3>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Most tools can be used without creating an account. If a particular tool has a different requirement, its tool page should provide the relevant details.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Focused SEO Content Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-center mb-4">Text Comparison, QA & Developer Tools</h2>
                    <p class="lead text-center mb-4">
                        WordsCompare brings practical tools for comparing text, validating JSON, testing API data,
                        debugging development output, and handling everyday document and calculation tasks.
                    </p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="h5">Text Comparison</h3>
                            <p>Compare two texts and identify differences quickly. Text Compare is useful for
                                proofreading, reviewing revisions, checking copied content, and comparing document
                                versions. Explore related text tools for word counting, case conversion, find and
                                replace, and text cleanup.</p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="h5">QA & Developer Workflows</h3>
                            <p>Use JSON formatters, validators, JSON comparison, API utilities, encoders, JWT tools,
                                regex utilities, and test-data helpers to inspect and debug everyday QA and development
                                tasks without installing extra software.</p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="h5">PDF, Conversion & Calculator Tools</h3>
                            <p>Find dedicated tools for common PDF operations, file conversions, and calculations.
                                Use the relevant category or tool page for detailed instructions, supported formats,
                                limits, and processing information.</p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="h5">Simple & Accessible</h3>
                            <p>Most everyday utilities are designed for quick browser-based use with no account
                                required. Many text and data tools can process input directly in your browser.
                                Where server-side processing is required, the relevant tool provides the applicable
                                processing details.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
    </div>

    <aside class="home-page-ad-rail" aria-label="Advertisement">
        <span class="home-page-ad-label">Advertisement</span>
        <ins class="adsbygoogle"
            style="display:block; min-height:600px"
            data-ad-client="ca-pub-2923840482782912"
            data-ad-slot="9449189538"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </aside>
</div>

<?php include 'includes/footer.php'; ?>
