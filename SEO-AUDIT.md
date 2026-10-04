# WordsCompare SEO Audit

**Audit type:** Static source audit of the local workspace, 2026-10-02  
**Scope:** PHP templates, rewrite rules, metadata, tool/category registries, sitemap and robots files, content fragments, front-end scripts, and API endpoints. No source files were changed. This is not a live crawl; production responses, indexing, traffic, Core Web Vitals, and external-service behavior remain **Needs verification**.

## 1. Project Overview

WordsCompare is a custom PHP application with server-rendered HTML templates and JavaScript-driven tools. It is not built on a detected CMS or PHP framework.

- **Local PHP:** XAMPP PHP CLI 8.2.12 was available. No project declaration pins a required PHP version; the production PHP version is **Needs verification**. `str_contains()` is used, so the source relies on PHP 8+.
- **Entry point:** [index.php](index.php); shared markup is provided by [includes/header.php](includes/header.php) and [includes/footer.php](includes/footer.php).
- **Routing:** Apache `mod_rewrite` rules in [.htaccess](.htaccess) map root pages, category views, guides, aliases, and tool slugs to PHP files.
- **Templates/data:** [includes/category-data.php](includes/category-data.php) is the tool/category registry; [includes/category-template.php](includes/category-template.php) renders category pages; [includes/tool-seo.php](includes/tool-seo.php) adds tool breadcrumbs and related links.
- **CSS/JS:** `assets/css/{style,homepage,design-system}.css`; `assets/js/{script,search}.js`; tool-specific JavaScript is embedded in many PHP tool pages.
- **Database:** No database connection or persistence layer was found in the inspected PHP source. Browser `localStorage` is used for some preferences/history. This is a static-source finding, not a production infrastructure claim.
- **Build/deployment:** Apache `.htaccess` is the only web-server configuration found. No Composer manifest, PHP framework config, CI workflow, or application build pipeline was found. `test_pdf/package.json` is a test folder package with one dependency and a placeholder failing `npm test` script.
- **Third parties:** Bootstrap 5.3, Font Awesome, SweetAlert2, PDF.js, SheetJS, PDF-Lib, jsPDF, Chart.js, ConvertAPI, Google Analytics/Tag Manager, and AdSense appear in the source. Versions and loading vary by page; several script URLs are unpinned.

## 2. Site and Page Inventory

There are **152 primary routed HTML templates**: 1 homepage, 4 informational/legal pages, 9 category pages, 15 guide pages, and 123 tool pages. The rewrite table adds **10 text-comparison alias URLs**, yielding **162 routed page URLs** (some resolve to duplicate text-comparison content). The static `sitemap.html` is one additional browser-visible HTML document, for **163 HTML addresses** in this source inventory. `/404.php` is an error response, not an indexable landing page. JSON/XML/API resources are listed separately in `seo-inventory.json`.

| Page group | Public path(s) | Rendering source | Purpose and indexability signals |
|---|---|---|---|
| Homepage | `/` | `index.php` | Tool discovery; shared header emits `index, follow`, title, description, canonical, OG/Twitter, Organization and WebSite schema. One H1. |
| Informational/legal | `/about`, `/contact`, `/privacy`, `/disclaimer` | `views/{about,contact,privacy,disclaimer}.php` | Unique page content, title/description and H1; shared metadata marks them indexable. About/contact/privacy/disclaimer have brand-copy or implementation concerns below. |
| Categories | `/developer-tools`, `/qa-tools`, `/api-testing-tools`, `/devops-tools`, `/json-tools`, `/text-tools`, `/pdf-tools`, `/calculators`, `/converters` | `views/category/*.php` + shared category template/data | Nine public landing pages with category-specific intro, groups, tool links, H1, breadcrumb UI/schema and shared metadata. |
| Guides | `/guides` and 14 `/guides/{slug}` routes | `views/guides/*.php` | 15 public guide/hub pages. All 15 declare title, description and H1. Article schema is conditionally emitted for guide article routes; the hub pages are not all substantive articles. |
| Tools | `/{tool-slug}` | `views/tools/{tool-slug}.php` | 123 routable tool views. All 123 statically declare a page title, description and H1. Many include a matching long-form content fragment; see tool inventory findings. |
| Text-comparison aliases | `/compare-two-text-files-online`, `/compare-text-line-by-line`, `/compare-json-files-online`, `/compare-xml-files-online`, `/compare-html-files-online`, `/compare-css-files-online`, `/compare-code-files-online`, `/online-text-diff-tool`, `/text-difference-checker`, `/compare-text-documents` | `.htaccess` rewrites each to `views/tools/text-comparison.php` | Public duplicate-content URLs. Current canonical generation uses the requested path, so aliases can self-canonicalize instead of consolidating to `/text-comparison`. |
| HTML sitemap | `/sitemap.html` | `sitemap.html` | Static third-party-generated link list with an old “114 pages” count and January 2026 timestamp. No shared metadata/canonical. |
| XML sitemap | `/sitemap.xml` | Rewrite to `sitemap.php` | Dynamic XML response; source-level execution fails XML parsing (details below). The checked-in `sitemap.xml` is not what Apache serves for this path when the rewrite applies. |
| Search endpoint | `/search.php?q=...` | `search.php` | JSON search results, not an HTML landing page. Searches the 49 distinct tools in `category-data.php`, not all 123 tool files. |
| API endpoints | `/api/convert-pdf-to-word.php`, `/api/convert-word-to-pdf.php`, `/api/convert-pdf-to-mobi.php`, `/api/test-pdf2docx.php` | `api/*.php` | Machine/service endpoints; not HTML landing pages. One endpoint is empty; another is a diagnostic script. |
| Robots and assistant resource | `/robots.txt`, `/llms.txt` | root text files | Crawl directives and descriptive text; `llms.txt` contains claims that conflict with server/external processing observed in code. |
| Error page | ErrorDocument `/404.php` | `404.php` | Sets HTTP 404 and has an H1; shared header still emits `index, follow`. Direct/production handling needs verification. |

The complete tool and guide route lists are in [seo-inventory.json](seo-inventory.json). “Appears indexable” reflects source metadata and routes only; live robots/canonical/HTTP behavior needs verification.

## 3. Tool Inventory

- **Tool view files/routes:** 123.
- **Distinct tool slugs in the category registry:** 49, referenced 104 times across categories.
- **Tool view files not in the registry:** 74. These pages are not represented in category groups or the `search.php` registry feed. Some may have homepage or sitemap links, so they are not all proven orphans without a rendered crawl.
- **Metadata:** All 123 tool files have a source-declared title, description, and H1; source-title and source-description values were unique in the static scan. The shared header can alter the final title and description by appending/truncating text.
- **Long-form content:** 116 tool pages include a matching `views/content/*-content.php` fragment. Seven do not: Base64 Encoder, Hash Generator, JSON Formatter, JSON Viewer, JWT Decoder, Text Comparison, and URL Encoder. There are 123 non-demo content fragments. Forty-six matching fragments include an FAQ section; FAQPage JSON-LD was not found.
- **Inputs/outputs:** Tools mix text, numeric/date controls, file uploads, generated results, downloads, and browser-side JavaScript. The accepted extensions, option values, and processing path are specific to each file. They must be read from the relevant `views/tools/{slug}.php` before tool copy is rewritten; unknown per-tool details are explicitly marked **Needs verification** in the JSON inventory rather than inferred from slugs.
- **Processing:** Many calculators and text utilities run client-side. This is not true for every tool: several converters call ConvertAPI directly from browser JavaScript; PDF-to-Word calls a PHP endpoint that calls ConvertAPI; PDF-to-MOBI has a PHP/Python/Calibre server implementation. Do not describe the entire site as browser-only.
- **Known tool-content mismatch:** `pdf-to-csv.php` calls ConvertAPI’s PDF-to-XLSX endpoint; the URL and page label say PDF to CSV. The PDF-to-Word UI offers DOCX/DOC/RTF while its PHP ConvertAPI endpoint requests DOCX; effective output behavior/options need runtime verification.

For every tool route, the JSON records its source, page-specific metadata presence, route family, registry/content coverage, and a pointer to source-level input/output details. Unsupported options/formats are not invented.

## 4. Current SEO Implementation

[includes/header.php](includes/header.php) emits the title, meta description, keywords, robots, canonical, Open Graph and Twitter/X card metadata for pages that include the shared header. Organization and WebSite JSON-LD are global. Guide article pages add Article/BreadcrumbList JSON-LD. Categories add BreadcrumbList JSON-LD. Tool SEO markup adds WebPage/BreadcrumbList JSON-LD when the request path maps directly to a tool source file. No FAQPage schema was found.

The header constructs canonical URLs from the request host/path while forcing HTTPS in metadata. `.htaccess` separately redirects non-local requests to `https://www.wordscompare.com`. Text-comparison aliases are not consolidated by the current canonical fallback. The header also appends generic sentences to descriptions below 120 characters and truncates descriptions above 160; final metadata is therefore not always identical to the page variable. The `keywords` meta value is echoed without HTML escaping and is not a material Google ranking signal.

## 5. Technical SEO Audit

### Crawlability and routing

- Apache rewrites route pages and removes trailing slashes for non-directory paths. It redirects non-local requests to HTTPS `www`, sets a custom 404 handler, and blocks direct requests to `views/tools` and `views/content` PHP files.
- `robots.txt` allows `/`, disallows `/views/`, `/includes/`, `/tmp/`, `/test_pdf/`, and `/vendor/`, and contains two wildcard user-agent groups plus two sitemap declarations (one relative and one hard-coded production URL). No route is explicitly disallowed by a `noindex` meta.
- The production redirect behavior, redirect chains, HTTP response codes, TLS configuration, host/proxy behavior, and public `www`/non-`www` response need live verification.
- The shared header computes tool-helper paths from the request URI. Production root routes match the source layout; behavior when deployed under a subdirectory needs verification.

### Sitemap/indexability

- The checked-in `sitemap.xml` parses as XML and contains 123 URLs, but omits all 9 category routes, all 15 guide routes, and 6 tool routes in this static comparison.
- `.htaccess` rewrites `/sitemap.xml` to `sitemap.php`. A local PHP 8.2.12 CLI execution of that script failed XML parsing: it emits literal backslash-n sequences from single-quoted PHP strings. The dynamic sitemap includes static root pages, categories, and tool files but has no guide-page loop and no text-alias routes.
- `sitemap.html` is a separate stale snapshot reporting 114 pages and last updated January 29, 2026. It does not match the 123-URL XML snapshot or the 162 routed page URLs.
- The 404 handler sets a 404 status in source; confirm the live response. Its shared metadata still says `index, follow`.

### Rendering, mobile and performance signals

- Main page copy is server-rendered PHP; tool interactions are often JavaScript-dependent. Search results come from `search.php` and require JavaScript. Static HTML content fragments are included server-side on matching tool pages.
- Shared header declares a viewport. Responsive Bootstrap classes are used. Actual mobile UX and rendered accessibility were not browser-tested in this static audit.
- Third-party libraries/CDN scripts are numerous; versions vary, some are unpinned, and content fragments can include Bootstrap JS despite the global footer loading Bootstrap. `assets/js/script.js` also uses a timestamp query for its script URL, defeating normal browser cache reuse.
- No field CWV, Lighthouse, server response timing, or image payload measurement was run. These are **Needs verification**.

### Security and external processing

- ConvertAPI secrets are literal strings in browser-delivered JavaScript in CSV-to-PDF, Excel-to-PDF, PDF-to-CSV, PDF-to-Excel, PDF-to-PPT, and Word-to-PDF implementations. The values are intentionally omitted from this report. These are exposed to every visitor and should be treated as compromised.
- The PDF-to-Word PHP endpoint also contains a fallback secret and disables cURL TLS peer/host verification. ConvertAPI requests use `StoreFile=true` in relevant flows and may return a cloud download URL.
- PDF-to-MOBI source uses temporary server files and shells out to Calibre/Python. Production dependencies, retention, size limits, rate limiting, and upload limits are **Needs verification**.
- `api/convert-word-to-pdf.php` is empty. `api/test-pdf2docx.php` is a diagnostic endpoint that checks local runtime dependencies and creates/removes a temporary test file; exposure in production needs review.
- No SQL/database connection code was found. Do not extrapolate that to hosting/logging/analytics retention.

## 6. On-Page SEO Audit

- **Titles/descriptions/H1:** 123/123 tool templates and 15/15 guide templates have source values for title, description, and H1; all 9 category wrappers set title/description and use the shared category H1. Homepage title is generated from the configured default. About/contact/privacy/disclaimer pages set titles/descriptions and H1s.
- **Uniqueness:** Tool title and description source values were unique in the static scan. Alias URLs reuse the same tool content. Final generated title/description strings can change in the header.
- **Brand accuracy:** About, contact, privacy and disclaimer source descriptions refer to “Snapy Tools” while the site brand is WordsCompare. About copy also claims all tools work directly in-browser; that is not true for all observed conversions.
- **Search intent/content:** Tool pages generally have named functions and page-specific copy. Seven lack a corresponding included content fragment. The remaining content ranges from instructions and options to generated FAQ/use-case sections; each claims about formats, accuracy, privacy, and limitations should be checked against actual behavior. Some fragments share generic boilerplate.
- **Headings:** H1 presence was detected in all tool, guide, and category pages; a full rendered heading hierarchy audit is **Needs verification**.
- **Images:** The shared header references `assets/img/og-image.png`, which is not present in the workspace. No structured social preview asset was found at that path. Static `<img>` audit/rendered alt coverage needs verification.
- **Social/schema:** OG and Twitter metadata are global but use the missing default image unless an override exists. No FAQPage schema. `llms.txt` is descriptive, not a substitute for page metadata or sitemap coverage.

## 7. Internal-Link Audit

- Category pages render links from the 49-slug registry and include related-category links. Homepage navigation/cards and the footer link selected categories/tools. Search uses the same registry, so 74 tool routes are absent from category/search discovery.
- Tool pages get a generated breadcrumb and related-tool panel when the requested slug maps to an existing tool file. Unregistered tools fall back to `developer-tools` as their parent category, which can miscategorize their breadcrumb.
- `includes/tool-seo.php` searches content files for related guides, but the emitted guide-link check looks for `views/content/{slug}.php` while the content fragments are named `*-content.php` and public guides live in `views/guides/`. The related-guide list is therefore unlikely to render the intended guide links.
- Guide pages have some contextual tool links (for example `guides/format-json-online` links to JSON Formatter, JSON Viewer, and Text Compare). The `/guides` index links to four guide hubs but does not enumerate the ten article routes.
- The contact form posts to `/includes/process_contact.php`; that file is not present in the workspace. The submission target is suspicious/broken and should be confirmed.
- Ten comparison aliases duplicate `/text-comparison`; static/dynamic sitemap coverage and canonical consolidation do not agree.
- A complete orphan/broken-link claim requires crawling rendered pages and testing HTTP status for every route. This is **Needs verification**.

## 8. Content-Quality Audit

| Page group | Classification | Evidence and reason |
|---|---|---|
| Homepage | IMPROVE | Has a clear tool purpose and internal links, but general claims and default metadata should be aligned with actual processing and destination coverage. |
| 123 tool pages | KEEP / IMPROVE | All have unique source title/description/H1. Keep accurate tool UI/content; improve missing fragments, mismatched outputs, limitations and inconsistent FAQ coverage. |
| 7 tools with no matching content fragment | EXPAND | Base64 Encoder, Hash Generator, JSON Formatter, JSON Viewer, JWT Decoder, Text Comparison, URL Encoder have no matching content include from the tool file scan. |
| 9 category pages | EXPAND | Useful group/tool lists and intros exist; extend with distinct, evidence-based category explanations and related links. |
| Guide hub and guide pages | KEEP / EXPAND | 15 pages exist, but `/guides` lists only four hub links and does not provide a complete article index. Check article depth and freshness individually. |
| About/contact/privacy/disclaimer | REWRITE / REVIEW | Several descriptions still say Snapy Tools. Privacy and browser-processing claims conflict with third-party/server conversion paths. Contact form action is not backed by a file in this workspace. |
| HTML sitemap | NOINDEX / REVIEW | Old, static 114-page snapshot; does not match current route inventory. |
| 404 page | NOINDEX / REVIEW | Correct status is set in source, but global robots metadata is index/follow; verify live behavior and avoid indexing direct error URLs. |
| Search/API/sitemap response endpoints | NOINDEX / REVIEW | These are service/resource endpoints, not content landing pages; verify response headers and indexing behavior. |

FAQ content is present in 46 matching tool fragments, not all 123 tool pages. FAQ content is not accompanied by FAQPage schema. Static code does not establish whether every FAQ is accurate, helpful, or visible after rendering.

## 9. Critical Issues

1. **C-01 — ConvertAPI credentials exposed in browser code.** The keys are embedded in six tool pages and requests go directly to ConvertAPI. This permits extraction and unauthorized use and undermines user trust. Evidence: `views/tools/{csv-to-pdf,excel-to-pdf,pdf-to-csv,pdf-to-excel,pdf-to-ppt,word-to-pdf}.php`; a server-side credential also exists in `api/convert-pdf-to-word.php`. Rotate/revoke before production use and move credentials out of client code.

## 10. High-Priority Issues

1. **H-01 — Served XML sitemap is malformed.** `/sitemap.xml` rewrites to `sitemap.php`; PHP single-quoted output strings contain literal `\n`. Local CLI output failed XML parsing. Evidence: `.htaccess`, `sitemap.php`.
2. **H-02 — Sitemap inventory is incomplete and inconsistent.** The static XML has 123 URLs but misses 9 category routes, 15 guide routes, and 6 tool routes. The dynamic generator omits guides and aliases; the HTML sitemap reports 114 pages from January 2026. Evidence: `sitemap.xml`, `sitemap.php`, `sitemap.html`.
3. **H-03 — 74 tool routes are outside the discoverability registry.** `category-data.php` contains 49 distinct tool slugs vs 123 tool view files; `search.php` and category pages draw from that registry. These routes are not exposed by those discovery surfaces. Evidence: `includes/category-data.php`, `search.php`, `includes/category-template.php`.
4. **H-04 — Ten text-comparison aliases can self-canonicalize.** All rewrite to the same tool file, while the canonical fallback uses the requested path. Evidence: `.htaccess`, `includes/header.php`.
5. **H-05 — Default social preview points to a missing asset.** Header emits `assets/img/og-image.png`, absent from the workspace; default OG/Twitter cards therefore reference a missing file. Evidence: `includes/header.php`, `assets/img/`.

## 11. Medium- and Low-Priority Issues

### Medium (7)

1. **M-01 — Seven tools lack matching long-form content includes; FAQ coverage is incomplete.** 116/123 tools have matching fragments and 46 matching fragments contain FAQs. Evidence: `views/tools/`, `views/content/`.
2. **M-02 — Privacy and processing descriptions are not aligned.** Privacy and `llms.txt` describe browser-only/no-upload behavior while ConvertAPI and server/Python paths are present; third-party analytics/ads are also included. Reconcile claims with actual flows and retention terms. Evidence: `views/privacy.php`, `llms.txt`, `index.php`, tool/API sources.
3. **M-03 — Brand metadata is stale.** About/contact/privacy/disclaimer descriptions reference “Snapy Tools.” Evidence: `views/about.php`, `views/contact.php`, `views/privacy.php`, `views/disclaimer.php`.
4. **M-04 — Contact submission target is absent.** Contact posts to `/includes/process_contact.php`, which is not present. Evidence: `views/contact.php`.
5. **M-05 — Word-to-PDF API stub is empty.** `api/convert-word-to-pdf.php` exists but has no content. The tool page uses a direct ConvertAPI request instead; remove ambiguity between the UI and advertised endpoint after verification.
6. **M-06 — Generated related-guide links resolve against the wrong directory/filename pattern.** Tool SEO code looks for a non-`-content` PHP file in `views/content`, while public guide routes are under `views/guides`. Evidence: `includes/tool-seo.php`.
7. **M-07 — Tool output descriptions/options need validation against behavior.** PDF-to-CSV calls a PDF-to-XLSX endpoint; PDF-to-Word UI offers multiple formats while the endpoint requests DOCX. Review each output label, accepted format, limits and documented steps. Evidence: `views/tools/pdf-to-csv.php`, `views/tools/pdf-to-word.php`, `api/convert-pdf-to-word.php`.

### Low (3)

1. **L-01 — Metadata is mutated by shared fallback logic.** Short descriptions receive generic appended sentences, long descriptions are truncated, and keyword meta values are raw-emitted. Review final rendered metadata, not only source variables. Evidence: `includes/header.php`.
2. **L-02 — Robots directives are duplicated.** Two `User-agent: *` groups and two sitemap declarations create avoidable ambiguity. Evidence: `robots.txt`.
3. **L-03 — No PHP dependency/build/runtime manifest was found.** Production PHP/extensions and external converter dependencies are not pinned in a root manifest. Evidence: root file list, `test_pdf/package.json`, API source. Confirm deployment prerequisites.

## 12. SEO Opportunities

- Create a complete registry-driven route inventory and ensure every intended tool is linked from a relevant category and search results.
- Give each tool page accurate supported formats, inputs, output type, settings, limits, error states, examples, and troubleshooting based on implementation.
- Expand category pages with unique category-specific explanations and direct contextual links; link all guide articles from `/guides` and related tool pages.
- Consolidate comparison aliases to one canonical URL or explicitly decide whether each alias is a separate search landing page.
- Make sitemap route generation valid, complete, canonical-host aware, and based on intended indexable URLs; retire stale snapshots.
- Provide a real default social image and verify per-page OG/Twitter URLs.
- Review privacy, About, and `llms.txt` claims against the ConvertAPI, Python/Calibre, analytics, and ad code.
- Add structured data only where visible page content supports it; FAQPage is absent and must not be fabricated.
- After code changes, validate with a production-like crawl, live status/canonical checks, mobile render, Search Console/Bing indexing data, and performance measurements. No external analytics/search-console credentials or field data were available in this source audit.

## 13. Recommended Next Steps

1. Revoke/rotate the exposed ConvertAPI secrets; move conversion credentials server-side and review external file storage and retention.
2. Correct and validate the sitemap response; compare its URLs with the route inventory and exclude aliases/utility endpoints unless intentionally indexable.
3. Decide canonical handling for the ten text-comparison aliases.
4. Add the 74 unregistered tool routes to the appropriate registry or explicitly decide their indexation and discoverability status.
5. Confirm the seven tools with no matching content include, check FAQ visibility/accuracy, and reconcile tool labels with real formats/outputs.
6. Verify the contact form target, empty API file, production PHP/runtime requirements, live redirects, robots response, and 404 status.
7. Review privacy/brand copy and the default OG image before beginning Phase 2 SEO implementation.

## Audit Limits

This audit reads local source and performs local static checks only. The committed `sitemap.xml` was XML-parsed successfully; the dynamic `sitemap.php` output was executed with the local PHP 8.2.12 CLI and failed XML parsing. No production crawl, browser rendering, web-server response-header inspection, third-party API transaction, Search Console/Bing data, backlink data, or Core Web Vitals test was performed. Production-specific behavior is **Needs verification**.

## Post-Cleanup Update (2026-10-02)

After the baseline audit, 15 unregistered tool pages with no references in homepage, shared navigation/footer, category, guide, or remaining content-fragment source were removed, along with their 15 paired content fragments. Tools that had any such UI/content reference were retained. The removed slugs were: `gratuity-calculator`, `inflation-calculator`, `lumpsum-calculator`, `nsc-calculator`, `pdf-to-svg`, `pdf-to-tiff`, `png-to-pdf`, `reverse-mortgage-calculator`, `simple-interest-calculator`, `step-up-sip-calculator`, `swp-calculator`, `timesheet-calculator`, `unlock-pdf`, `webp-to-pdf`, and `xml-to-pdf`.

Current source counts are 108 tool views, 137 primary HTML templates, and 147 routed HTML URLs including the ten comparison aliases. The category registry still contains 49 tools; 59 remaining tool views are outside it. The original counts above remain the pre-cleanup baseline. `seo-inventory.json` records both snapshots.
