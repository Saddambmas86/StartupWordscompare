# WordsCompare SEO Content Blueprint

**Phase:** Planning only. No PHP, HTML, CSS, JavaScript, routes, metadata, sitemap or robots files were changed.  
**Prepared:** 2026-10-03, using current source, the Phase 1 audit, and the Phase 2 research.

## 1. Executive Summary

The current workspace has **108 tool views, 9 categories, 15 guide routes, one homepage and four informational/legal pages**: 137 primary HTML pages. Ten text-comparison aliases produce 147 routed HTML URLs. Phase 1’s old 123-tool count is retained only as a pre-cleanup baseline; all decisions below use the current 108-file set.

The blueprint approves focused content for 10 source-verified text/utility tools. It holds the other 98 tools for review, including all 59 tools outside the category registry. All nine category pages are held until tool discoverability is resolved; five of the 15 guides need review, and the remaining 10 are supporting pages. All 10 text-comparison aliases are review-only and receive individual technical recommendations.

Search evidence is qualitative. Google search fetches were challenged, Brave returned 429, Bing RSS was usable only for selected queries, and DataForSEO/Search Console data was unavailable. No volume, ranking, traffic, or difficulty figures are claimed.

## 2. Current Inventory and Status Counts

| Status | Count | Scope |
|---|---:|---|
| **IMPLEMENT** | 10 | Fully specified, straightforward tools whose current input/output controls were verified. Planning approval only; no changes applied. |
| **REVIEW** | 126 | 98 other tool pages, 9 categories, 10 aliases, 5 guides, and 4 info/legal pages with technical, taxonomy, factual, or overlap questions. |
| **SUPPORTING** | 11 | Homepage plus 10 informational/procedural guide pages that support the main tool/category structure. |
| **NOINDEX_REVIEW** | 8 | Search/sitemap/error/API utilities; these are not normal content landing pages. Confirm suitable response-level directives in a later phase. |

The 147 routed public HTML URLs total 10 IMPLEMENT + 126 REVIEW + 11 SUPPORTING. The eight NOINDEX_REVIEW resources are separate endpoints/documents, not part of that routed landing-page count.

### Priority Groups

- **Priority 1:** 10 approved tools below; categories are still review-gated because 59 routes are absent from their discovery registry.
- **Priority 2:** Remaining registered tools and category hubs after the registry decision.
- **Priority 3 / SUPPORTING:** Homepage, 10 guides and informational/legal pages after factual fixes.
- **REVIEW:** 59 unregistered tools, 10 aliases, YMYL/calculator pages, converter mismatches and thin/overlapping guides.
- **NOINDEX_REVIEW:** `/search.php`, `/sitemap.xml`, `/sitemap.html`, four `/api/*` endpoints and `/404.php`.

## 3. Approved Tool Blueprints

These are content specifications, not production copy. All canonical examples assume the intended production host `https://www.wordscompare.com`; verify it against live configuration before implementation. The shared header currently provides global title/description, canonical, OG/Twitter, Organization/WebSite schema and page-specific schema hooks.

### 3.1 JSON Formatter

- **URL/status:** `/json-formatter` — IMPLEMENT.
- **Intent/topic:** Action intent: format, minify, or syntax-check pasted JSON.
- **Primary keyword:** `JSON formatter online`.
- **Secondary/long-tail:** format JSON; pretty print JSON; JSON beautifier; minify JSON; validate JSON syntax; how to format JSON online; why is this JSON invalid?
- **SEO title:** `JSON Formatter & Validator | WordsCompare`
- **Meta description:** `Format, minify and check JSON syntax. Choose two or four spaces or tabs, review parse errors, and copy the output for your next step.`
- **Canonical:** `https://www.wordscompare.com/json-formatter`
- **H1:** `JSON Formatter`
- **Introduction:** Explain that the page accepts pasted JSON text and returns formatted or minified text, with a separate syntax-validation action. Identify developers, QA and people reviewing API/configuration payloads as relevant users.
- **Sections:** `Format or minify JSON`; `Choose indentation`; `Check JSON syntax`; `Common parse errors`; `What this tool does not check` (syntax only, not JSON Schema/business rules).
- **How-to:** Paste JSON into Input JSON; choose 2 spaces, 4 spaces or tabs; select Format or Minify; inspect the status/output; use Copy output or Clear.
- **Features:** Browser-side JSON.parse/JSON.stringify; format, minify, syntax check, indentation choice, copy, clear. **CODE_VERIFIED.**
- **Input/output:** Pasted text; JSON text result. No file input is shown. **CODE_VERIFIED.**
- **Example:** Input `{"name":"Ada","active":true}`; formatted output with indentation. Do not claim field/schema validation.
- **Limitations:** Invalid JSON returns the parser error message; no schema validator or semantic API contract validation. Error-position precision needs runtime verification.
- **Troubleshooting:** Check double-quoted keys/strings, commas and balanced braces; explain that comments/trailing commas are not standard JSON if confirmed by parser behavior.
- **FAQs:** Does it validate JSON Schema? **No; source implements JSON syntax parsing only.** Can I minify JSON? **Yes.** Which indentation options are shown? **2 spaces, 4 spaces and tabs.** Can I upload a `.json` file? **No upload control is shown.** What happens with invalid JSON? **The page displays a parse error message.**
- **Related links:** JSON Viewer (“inspect formatted JSON”), Text Comparison (“compare two JSON strings after formatting”), `/guides/format-json-online`, `/guides/validate-json`.
- **Breadcrumb:** Home → Developer Tools or JSON Tools → JSON Formatter; parent breadcrumb schema should match chosen category.
- **Schema:** WebPage + BreadcrumbList from shared template. SoftwareApplication is optional only after verifying properties; no ratings, offers or aggregateRating.
- **OG/X:** Use page title and short description above; require an approved shared/default social image because `assets/img/og-image.png` is absent.
- **Verification:** **CODE_VERIFIED:** input, controls, browser JSON parsing/stringifying, outputs. **NEEDS_VERIFICATION:** parser message/line-position behavior across browsers and any server response rendering.

### 3.2 Base64 Encoder / Decoder

- **URL/status:** `/base64-encoder` — IMPLEMENT.
- **Intent/topic:** Encode pasted text to Base64 or decode a Base64 text value.
- **Primary keyword:** `Base64 encoder and decoder online`.
- **Secondary/long-tail:** encode text to Base64; decode Base64 string; Base64 to text; is Base64 encryption?
- **SEO title:** `Base64 Encoder & Decoder | WordsCompare`
- **Meta description:** `Encode pasted text to Base64 or decode a Base64 string. Review the output, copy it, and learn why encoding is not encryption.`
- **Canonical:** `https://www.wordscompare.com/base64-encoder`
- **H1:** `Base64 Encoder / Decoder`
- **Introduction:** State that the page takes text and provides Base64 encoding/decoding. It is useful for developers/QA inspecting text payloads; it is not an encryption tool.
- **Sections:** `Encode text`; `Decode Base64 text`; `Text encoding details`; `Base64 is not encryption`; `Invalid input`.
- **How-to:** Paste text/Base64 into Input; choose Encode or Decode; inspect Output; copy result or clear fields.
- **Features:** Text input/output, UTF-8 conversion wrappers, Encode, Decode, Clear and Copy Result. **CODE_VERIFIED.**
- **Input/output:** Text only; Base64/text result. No upload control. **CODE_VERIFIED.**
- **Example:** `Man` → `TWFu`; decode `TWFu` → `Man`.
- **Limitations:** Base64 is reversible encoding, not confidentiality. Decoder reports invalid Base64; binary file conversion is not offered by this page. Character-set/error behavior should be runtime checked.
- **Troubleshooting:** Remove unrelated prefixes/whitespace only if source supports it; otherwise paste a valid Base64 string and distinguish Base64URL from standard Base64.
- **FAQs:** Does Base64 encrypt data? **No.** Can this encode/decode text? **Yes.** Can I upload a file? **No file control is present on this page.** Why does decoding fail? **The supplied value must be valid Base64 text for the current decoder.** Does it support Base64URL? **Not established by this UI; Needs verification.**
- **Related links:** JWT Decoder, URL Encoder, `/guides/base64-vs-encryption`, `/guides/decode-jwt-token`.
- **Breadcrumb/schema:** Home → Developer Tools → Base64 Encoder; WebPage + BreadcrumbList.
- **OG/X:** Unique text labels; approved image asset required, no URL invented.
- **Verification:** **CODE_VERIFIED:** textareas and browser `btoa`/`atob` flow. **NEEDS_VERIFICATION:** Base64URL handling, Unicode edge cases and clipboard availability.

### 3.3 URL Encoder / Decoder

- **URL/status:** `/url-encoder` — IMPLEMENT.
- **Intent/topic:** Encode/decode a string component using JavaScript URI-component methods.
- **Primary keyword:** `URL encoder decoder online`.
- **Secondary/long-tail:** URL encode online; percent encode a string; decode percent-encoded text; encode special characters.
- **SEO title:** `URL Encoder & Decoder | WordsCompare`
- **Meta description:** `Encode a text value for use in a URL component or decode percent-encoded text. See the result and copy it for your request.`
- **Canonical:** `https://www.wordscompare.com/url-encoder`
- **H1:** `URL Encoder / Decoder`
- **Introduction:** Explain that the tool encodes or decodes entered text as a URI component. Do not call it a whole-URL parser or general web validator.
- **Sections:** `Encode text`; `Decode percent-encoded text`; `Reserved characters`; `Malformed encoding errors`; `URI component vs complete URL`.
- **How-to:** Enter a string; click Encode or Decode; inspect output/error; copy or clear.
- **Features:** Textareas; `encodeURIComponent` / `decodeURIComponent`; error handling; copy/clear. **CODE_VERIFIED.**
- **Input/output:** Text string → percent-encoded/decoded string; no file formats. **CODE_VERIFIED.**
- **Example:** `hello world` → `hello%20world` with component encoding.
- **Limitations:** Component encoding is not a URL parser; it may encode delimiters as data. Do not claim form-urlencoded `+` space behavior unless separately verified.
- **FAQs:** What is percent encoding? What does Encode change? Why does Decode report an error? Is this a whole-URL validator? **No; source applies component functions to the entered string.** Does it convert files? **No.**
- **Related links:** Base64 Encoder, Text to Slug, JSON Formatter, `/guides/generate-test-data`.
- **Schema/social:** WebPage + BreadcrumbList; OG/X use approved asset only.
- **Verification:** **CODE_VERIFIED:** component functions and text UI. **NEEDS_VERIFICATION:** exact output for reserved characters and browser-specific malformed sequences.

### 3.4 Text Comparison Tool

- **URL/status:** `/text-comparison` — IMPLEMENT as the single canonical content page; all aliases remain REVIEW.
- **Intent/topic:** Compare two pasted text versions and locate differences.
- **Primary keyword:** `compare text online`.
- **Secondary/long-tail:** text comparison tool; text diff tool; diff checker; compare two texts; compare text ignoring case/spaces.
- **SEO title:** `Text Comparison Tool: Compare Two Texts | WordsCompare`
- **Meta description:** `Paste two text versions, compare their differences, and use the available case and space options to review the result.`
- **Canonical:** `https://www.wordscompare.com/text-comparison`
- **H1:** `Text Comparison Tool`
- **Introduction:** Describe two text inputs, a comparison action, difference display and the checkboxes shown in source. Avoid claiming file upload, structured JSON/XML diff or syntax highlighting.
- **Sections:** `Compare two text inputs`; `Read the difference view`; `Ignore case/spaces`; `Use for API response text`; `Limitations and common false positives`.
- **How-to:** Paste original text; paste modified text; choose Ignore case and/or Ignore spaces if desired; click Compare; review highlighted differences; use previous/next difference and copy/share only if source confirms.
- **Features:** Two text areas, Compare/Switch/Clear, ignore-case/space options, counts, difference table, next/previous controls. **CODE_VERIFIED** where control exists; exact behavior should be runtime checked.
- **Input/output:** Plain text strings; rendered difference view. No file input shown. **CODE_VERIFIED.**
- **Examples:** Simple old/new text with one word changed; JSON text comparison example only after formatting both values, labeled as text comparison rather than structural diff.
- **Limitations:** No file upload; no evidence of language-aware JSON/XML/HTML/CSS comparison or syntax highlighting; aliases do not add features.
- **FAQs:** How do I compare two texts? Can I ignore case? Can I ignore spaces? Can I compare JSON? **Only as text; no structural JSON mode is evidenced.** Can I upload files? **No file picker is present.**
- **Related links:** JSON Formatter, JSON Viewer, Word Counter, Case Converter; `/guides/compare-api-responses`, `/guides/compare-json-objects`.
- **Breadcrumb/schema:** Home → Text Tools or QA Tools → Text Comparison; WebPage + BreadcrumbList.
- **Social:** Single canonical social card for the one page; no alias-specific card copy; approved asset required.
- **Verification:** **CODE_VERIFIED:** visible controls and route aliases. **NEEDS_VERIFICATION:** diff algorithm, exactly which whitespace is ignored, matching rules and keyboard controls.

### 3.5 Text Case Converter

- **URL/status:** `/case-converter` — IMPLEMENT.
- **Primary keyword:** `text case converter`.
- **Secondary/long-tail:** uppercase converter; lowercase converter; title case converter; sentence case converter; toggle case.
- **SEO title:** `Text Case Converter | WordsCompare`
- **Meta description:** `Change pasted text to uppercase, lowercase, title case, sentence case, toggle case or inverse case, then copy the converted result.`
- **Canonical/H1:** `https://www.wordscompare.com/case-converter`; `Text Case Converter`.
- **Introduction/sections:** Paste text; select a displayed case mode; explain output and likely use cases for editing/code identifiers; clearly list only the six visible modes.
- **How-to:** Enter text; choose one of UPPERCASE/lowercase/Title/Sentence/toggle/inverse; review output; Copy Output or Clear Text.
- **Features/input/output:** Text input, character/word counters, six conversion buttons, output, copy and clear. Text → transformed text. **CODE_VERIFIED.**
- **Example:** `hello WORLD` with uppercase/lowercase/title/sentence outputs; carefully verify exact sentence/title casing before publishing example.
- **Limitations:** Current UI does not expose camelCase/snake_case despite metadata/description claims. Unicode/title-case edge behavior needs test.
- **FAQs:** Which case styles are available? Can I convert multiple lines? Does it generate camelCase or snake_case? **Not shown in the current UI.** Can I copy output? **Copy Output is present.**
- **Links:** Text to Slug, Find and Replace, Remove Extra Spaces, Word Counter.
- **Schema/social:** WebPage + BreadcrumbList; no fabricated app ratings; shared social asset requirement.
- **Verification:** **CODE_VERIFIED:** modes/control IDs. **NEEDS_VERIFICATION:** exact casing behavior for punctuation, contractions and non-Latin text.

### 3.6 Find and Replace Text

- **URL/status:** `/find-replace-text` — IMPLEMENT.
- **Primary keyword:** `find and replace text online`.
- **Secondary/long-tail:** replace text in string; case-sensitive find and replace; whole-word replacement; regex replace text.
- **SEO title:** `Find and Replace Text Online | WordsCompare`
- **Meta description:** `Paste text, enter a search value and replacement, and choose case-sensitive, whole-word or regular-expression options before replacing.`
- **Canonical/H1:** `https://www.wordscompare.com/find-replace-text`; `Find and Replace Text`.
- **Introduction:** This is an in-page text transformation tool; it does not search the web or edit uploaded documents.
- **Sections/how-to:** Input Text → Find What → Replace With (empty means delete) → optional case/whole-word/regex toggles → Replace All → review/copy output.
- **Features/input/output:** Textarea + search/replacement inputs + three checkboxes + output and changes badge. Text → replaced text. **CODE_VERIFIED.**
- **Example:** Replace `cat` with `dog` in a short sentence; show case/whole-word option as a separate example only if verified.
- **Limitations/troubleshooting:** Regex errors and escaping rules need runtime check; no file batch editing evidenced; “bulk” only refers to all matches within entered text.
- **FAQs:** Can replacement be blank to delete? (UI explicitly says yes.) Is matching case-sensitive by default? Checkbox is unchecked; confirm exact JS default before stating. What does whole-word mean? What regex syntax is supported? Can it modify files? **No file upload shown.**
- **Links:** Case Converter, Text Compare, Remove Extra Spaces, Word Counter.
- **Schema/social:** WebPage + BreadcrumbList; approved asset needed.
- **Verification:** **CODE_VERIFIED:** fields and toggles. **NEEDS_VERIFICATION:** whole-word/regex implementation and error cases.

### 3.7 Remove Extra Spaces

- **URL/status:** `/remove-extra-spaces` — IMPLEMENT.
- **Primary keyword:** `remove extra spaces from text online`.
- **Secondary/long-tail:** remove multiple spaces; trim leading and trailing whitespace; remove extra line breaks; replace tabs with spaces.
- **SEO title:** `Remove Extra Spaces from Text | WordsCompare`
- **Meta description:** `Paste text and choose whether to trim edges, collapse repeated spaces, replace tabs or reduce/remove line breaks. Review and copy the result.`
- **Canonical/H1:** `https://www.wordscompare.com/remove-extra-spaces`; `Remove Extra Spaces`.
- **How-to/features:** Select five available cleanup controls (trim leading/trailing; collapse multiple spaces; replace tabs; collapse line breaks; remove all line breaks), enter text, click Clean Text, review output and copy/reset.
- **Input/output:** Pasted text → cleaned text. No upload control in page UI. **CODE_VERIFIED.**
- **Limitations:** The phrase “spaces” can obscure tabs/line-break behavior; describe toggles exactly, and test treatment of non-breaking spaces/unicode whitespace before claiming.
- **FAQs:** Can I remove leading/trailing spaces? Can I collapse repeated spaces? Can I keep a single line break? Can I remove every line break? Does it support file upload? **No upload control is shown.**
- **Links:** Case Converter, Find & Replace, Word Counter, Text Compare.
- **Schema/social:** WebPage + BreadcrumbList; shared image asset unresolved.
- **Verification:** **CODE_VERIFIED:** UI settings. **NEEDS_VERIFICATION:** regex behavior for tabs/newline variants/unicode whitespace.

### 3.8 Reverse Text

- **URL/status:** `/reverse-text` — IMPLEMENT.
- **Primary keyword:** `reverse text online`.
- **Secondary/long-tail:** reverse characters; reverse words; flip text backwards.
- **SEO title:** `Reverse Text Online: Characters or Words | WordsCompare`
- **Meta description:** `Paste text and choose whether to reverse its characters or reverse the order of its words. Review the result and copy it.`
- **Canonical/H1:** `https://www.wordscompare.com/reverse-text`; `Reverse Text`.
- **How-to/features:** Enter text; choose Reverse Characters or Reverse Words; click Reverse; review output; copy or reset.
- **Input/output:** Pasted text → transformed text; no file formats. **CODE_VERIFIED.**
- **Limitations:** Not a mirror-text generator; “reverse words” wording suggests word-order reversal. Confirm punctuation/spacing preservation and Unicode grapheme behavior.
- **FAQs:** Can I reverse letters? Can I reverse word order? Does it translate/mirror text? What happens to punctuation and spaces? Can I upload a document? **No upload control is shown.**
- **Links:** Case Converter, Text Comparison, Text to Slug.
- **Schema/social:** WebPage + BreadcrumbList; approved social image required.
- **Verification:** **CODE_VERIFIED:** two radio modes. **NEEDS_VERIFICATION:** implementation behavior for punctuation, repeated spaces and Unicode.

### 3.9 Text to Slug Converter

- **URL/status:** `/text-to-slug` — IMPLEMENT.
- **Primary keyword:** `text to slug converter`.
- **Secondary/long-tail:** generate URL slug; convert title to URL-friendly text; spaces to hyphens; lowercase slug.
- **SEO title:** `Text to Slug Converter | WordsCompare`
- **Meta description:** `Turn pasted text into a URL-style slug. Choose lowercase, hyphen replacement and special-character removal, then copy the result.`
- **Canonical/H1:** `https://www.wordscompare.com/text-to-slug`; `Text to Slug Converter`.
- **How-to/features:** Paste text; choose lowercase, replace spaces with hyphens, remove special characters (all shown checked by default); click Convert; inspect slug; copy or reset.
- **Input/output:** Text → URL-style slug text. **CODE_VERIFIED.**
- **Limitations:** Do not say “SEO-friendly” guarantees rankings. The UI’s allowed-character label lists Latin A-Z/a-z, digits, hyphen; test non-ASCII handling before claiming transliteration.
- **FAQs:** What is a slug? Can I lowercase text? Can spaces become hyphens? Can I keep punctuation? Does it transliterate accents/non-English characters? **Needs verification.**
- **Links:** Case Converter, URL Encoder, Find & Replace, Developer Tools.
- **Schema/social:** WebPage + BreadcrumbList; shared image asset requirement.
- **Verification:** **CODE_VERIFIED:** toggles and output/copy controls. **NEEDS_VERIFICATION:** transliteration, repeated hyphen cleanup and Unicode behavior.

### 3.10 Word Counter

- **URL/status:** `/word-counter` — IMPLEMENT with explicit counting-method limitations.
- **Primary keyword:** `word counter online`.
- **Secondary/long-tail:** count words; character counter with/without spaces; sentence counter; paragraph count; reading-time estimate.
- **SEO title:** `Word Counter: Words, Characters & Sentences | WordsCompare`
- **Meta description:** `Enter text to count words, characters, sentences and paragraphs, with estimated reading and speaking time. Review the counting notes.`
- **Canonical/H1:** `https://www.wordscompare.com/word-counter`; `Word Counter`.
- **Introduction:** Explain that users submit text to get several text statistics. Do not say real-time: current PHP calculates on POST.
- **How-to/features:** Enter/paste text; select Analyze Text; review word/character/sentence/paragraph and read/speaking estimates; Clear.
- **Input/output:** Pasted text via POST; numeric/statistical output. **CODE_VERIFIED.**
- **Limitations:** PHP `str_word_count()` and regex sentence splitting are basic; Unicode/non-English counting and abbreviations may not behave like linguistic tokenization. Reading/speaking rates are estimates in code (200/130 wpm), not personal predictions.
- **FAQs:** Does it count spaces in characters? (Source has with/without spaces.) Is it real-time? **No; server code handles POST submission.** How are sentences counted? (Basic punctuation split.) Are reading/speaking times exact? **No, they are rate-based estimates.** Does it support all languages? **Needs verification; do not claim.**
- **Links:** Text Comparison, Case Converter, Find & Replace, Remove Extra Spaces.
- **Schema/social:** WebPage + BreadcrumbList; no keyword stuffing or false accuracy claim.
- **Verification:** **CODE_VERIFIED:** POST path, displayed metrics, rate constants. **NEEDS_VERIFICATION:** runtime behavior for Unicode, punctuation and newline cases.

## 4. Other Tool Pages

All 108 tool URLs receive a source-backed decision in `seo-content-plan.json`. The remaining 98 tool pages are **REVIEW**, not automatically noindex or delete:

- **59 unregistered:** tool page route exists, but `category-data.php`/`search.php` do not enumerate it. Each receives a separate record with source H1/title-derived purpose, candidate parent category, route/registry state, completeness note, overlap candidate and decision. Category/search publication is a separate decision from route existence.
- **39 registered but not approved for immediate content implementation:** includes complex converters/calculators and tools not yet fully traced in this phase. They remain valid tool pages; the blueprint records specific source/rate/output/format verification gates.
- Specific **REVIEW** blockers: `/pdf-to-csv` output mismatch; `/pdf-to-word` output list vs endpoint; `/pdf-to-text` OCR claim; `/jwt-decoder` “validate” wording; tax-year/formula pages; health/financial assumptions; complex conversion formats and external processing.
- The 10 IMPLEMENT pages have full title, description, H1, intro, section outline, how-to, inputs/outputs, limitations, example, five FAQs, links, schema/social and verification fields in the JSON.

## 5. Category Blueprints

The category registry counts below are **registered child tools only**, not all tool files. All nine category pages are **REVIEW** until the 59-route taxonomy/discoverability decision is resolved. A content outline is still provided.

| URL/status | Proposed SEO title / H1 | Introduction and sections | Child tools and links | FAQ topics |
|---|---|---|---|---|
| `/developer-tools` REVIEW | `Developer Tools for JSON, Text & Encoding | WordsCompare` / `Developer Tools` | Explain practical data/text helpers; groups: JSON; encoding/token; security/hash; web; text; date/unit. State manual tools, not an IDE/API client. | JSON Formatter, JSON Viewer, Base64, URL, JWT, Hash; links to JSON/QA/API/DevOps. | Can tools send API requests? Which tasks are text input? Does JWT Decoder verify signatures? |
| `/qa-tools` REVIEW | `QA & Testing Tools for Payloads and Text | WordsCompare` / `QA Testing Tools` | Manual test-data, format-inspection and text comparison workflows; no test-runner claim. | 12 actual registry children; link API Testing, Text, JSON, Developer hubs. | Can the tools run tests? How to compare expected/actual text? Does JSON formatting validate schemas? |
| `/api-testing-tools` REVIEW | `API Testing Utilities for JSON and Tokens | WordsCompare` / `API Testing Tools` | Manually prepare/inspect payload strings, JWTs and encoded values; make clear no HTTP request client is evidenced. | 13 registered children; Formatter, Viewer, Compare, JWT, Base64, URL. | Does it send requests? Does Text Compare parse JSON? Does JWT decoding verify signatures? |
| `/devops-tools` REVIEW | `DevOps Utilities for Hashes and Payloads | WordsCompare` / `DevOps Tools` | Hash/checksum, encoding and payload inspection; avoid deployment/CI integrations. | Six registered children; links Developer/API/JSON; hub `/guides/devops` is a placeholder. | Does the site integrate with pipelines? Which hash operations exist? |
| `/json-tools` REVIEW | `JSON Tools: Format, View and Convert | WordsCompare` / `JSON Tools` | Separate formatting, reading/viewing and PDF conversion; no schema validator or structural diff unless implemented. | Six registry children; Formatter, Viewer, JSON-to-PDF, PDF-to-JSON; link Developer/API/QA. | Format vs validate? Does Viewer enforce schemas? Can it structurally diff? |
| `/text-tools` REVIEW | `Text Tools for Cleanup, Counting and Comparison | WordsCompare` / `Text & Content Tools` | Organize transformations, cleanup, count and comparison. | Seven registered children; link Developer/QA and relevant guides. | What is changed by whitespace cleanup? Can compare files? How are words counted? |
| `/pdf-tools` REVIEW | `PDF Tools for Editing, Conversion and Organization | WordsCompare` / `PDF Tools` | Actual registered edit/manage/conversion groups; do not list unregistered routes as linked until registry decision. | 16 registered children; link Converters and text extraction tools. | Which operations require upload? Which outputs are available? Does OCR occur? |
| `/calculators` REVIEW | `Calculators for Loans, Tax and Everyday Use | WordsCompare` / `Calculators` | Group finance, saving/planning and health/everyday calculators; make rates/as-of assumptions visible. | 13 registered children; link loans/income/GST/BMI/age. | Which tax year? Are results advice? What assumptions are inputs vs defaults? |
| `/converters` REVIEW | `Document, Text and Unit Converters | WordsCompare` / `Converters` | Show only verified source→target pairs and textual/unit conversions. | Nine registered child routes; direction-specific links. | Which exact input/output format? What happens to complex layouts? |

For all categories: visible breadcrumb Home → current category; BreadcrumbList schema already exists. Use WebPage/BreadcrumbList, no FAQPage unless visible answers are written and validated. Shared OG/Twitter metadata requires an approved existing image or a separately approved asset; the configured `assets/img/og-image.png` is absent.

## 6. Guide Blueprint

Guides are supporting informational content; their tool pages own transactional terms. Existing 15 routes are covered in `seo-content-plan.json` with title/meta/H1 suggestions or review flags, section outlines, FAQs/topics, tool links, schema and cannibalization checks.

- Keep `/guides/base64-vs-encryption` educational and link the Base64 action page.
- Keep format/validation/how-to pages procedural, distinguish JSON syntax from schema checks.
- Expand compare/API response guides around a manual workflow; say the tool does not call APIs and compare UI is text-based.
- Review JWT authentication guide: decoder does not verify signatures or make auth requests.
- Expand `/guides` and Developer/QA/API hubs into complete directories with actual child links.
- Review `/guides/devops`: current content is a “more guides will be added” placeholder.
- Review overlap of `/guides/validate-json`, `/guides/validate-json-api-responses`, `/guides/compare-json-objects` and `/guides/compare-api-responses`; separate target audience and task or consolidate later.
- Article schema may remain only for substantive articles with visible content; hub/index pages should not be marked Article by assumption. BreadcrumbList for visible navigational trail; no FAQPage unless actual FAQs are visible.

## 7. Homepage Blueprint

- **Status:** SUPPORTING.
- **Title concept:** `WordsCompare | PDF, Text, Calculator and Developer Tools`.
- **Description concept:** Describe the actual categories and direct tool discovery, without “100+”, “free”, “no signup”, browser-only or privacy claims until reconciled with live routes and external/server processing.
- **H1:** Keep the clear overall developer/QA tools proposition; do not target a specific tool query as the site’s primary topic.
- **Outline:** Site value/purpose; actual category selector; selected current tool links; workflow sections for developer/QA; privacy/process note only after policy/code review; complete guides link; About/contact/legal references.
- **Featured tools:** Use a small selected set with actual homepage links (for example JSON Formatter, JWT Decoder, Text Compare, selected PDF tools, calculator links); validate each destination and the intended category listing first.
- **Metadata/schema:** Canonical root on `https://www.wordscompare.com/`; Organization/WebSite schema exists; OG/Twitter from shared header; default social image path missing. Do not create testimonials, user stats or ratings.
- **FAQ:** Optional and only if genuine user questions are researched and visibly answered; no FAQPage by default.

## 8. Text-Comparison Alias Decisions

All aliases rewrite to the same `/text-comparison` source, with no separate application functionality. None should receive an independent SEO copy/H1/schema blueprint now. Each decision is **REVIEW** pending analytics/backlink/log and redirect impact review.

| Alias URL | Implied intent vs actual tool | Recommendation (not implemented) |
|---|---|---|
| `/compare-two-text-files-online` | Files vs two pasted textareas | Canonicalize/redirect to `/text-comparison` after checking inbound links; otherwise alias noindex. |
| `/compare-text-line-by-line` | Line comparison, closest match to existing diff view | Canonicalize to primary tool; retain redirect alias if needed for legacy traffic. |
| `/compare-json-files-online` | JSON-aware comparison vs generic text comparison | No separate indexable page; review, then redirect/canonicalize or noindex until a distinct supported mode exists. |
| `/compare-xml-files-online` | XML-aware comparison vs generic text comparison | Same as JSON alias; no XML-specific promise. |
| `/compare-html-files-online` | HTML/DOM-aware diff vs generic text comparison | No separate indexable page; technical/feature review then canonicalize or noindex. |
| `/compare-css-files-online` | CSS-aware diff vs generic text comparison | No selector/property mode evident; review then canonicalize or noindex. |
| `/compare-code-files-online` | Syntax-aware source-code diff vs generic text comparison | No syntax highlighting evidenced; review then canonicalize or noindex. |
| `/online-text-diff-tool` | Generic text diff synonym | Strongest exact duplicate; redirect/canonicalize to primary after impact review. |
| `/text-difference-checker` | Generic change detection synonym | Same duplicate intent; redirect/canonicalize after impact review. |
| `/compare-text-documents` | Document upload comparison vs text-only inputs | No upload mode; do not publish distinct content. Review for redirect/noindex. |

## 9. The 59 Unregistered Tools

All 59 below are **REVIEW**, not automatic remove/noindex. They remain tool-view routes, and some content fragments or sitemap snapshots mention them. The registry omission means they are not represented as child entries in the central category/search registry; confirm actual rendered inbound links and production indexing separately. Each tool has source title/H1 and most have a corresponding `*-content.php` fragment; exact controls/output must be checked before inclusion.

| Tool / URL | Function indicated by current source | Candidate category | Decision/reason |
|---|---|---|---|
| APY Calculator `/apy-calculator` | Calculate annual percentage yield | Calculators | REVIEW; verify compounding formula and category placement. |
| Brokerage Calculator `/brokerage-calculator` | Calculate trading brokerage/fees | Calculators | REVIEW; verify market, fee structure and user-entered assumptions. |
| Calendar Generator `/calendar-generator` | Generate calendar output | Developer/utility | REVIEW; verify date range/options/output/download. |
| Car Loan EMI Calculator `/car-loan-emi-calculator` | Estimate car-loan EMI | Calculators | REVIEW; compare formulas with general EMI and vehicle-specific fields. |
| Compress PDF `/compress-pdf` | Reduce PDF size with three displayed levels | PDF Tools | REVIEW; homepage has a link, but validate actual compression effect/limits. |
| CSV to PDF `/csv-to-pdf` | Convert CSV to PDF | Converters | REVIEW; inspect API output behavior and credentials before SEO. |
| DWG to PDF `/dwg-to-pdf` | Convert DWG input to PDF | Converters/PDF Tools | REVIEW; check dependency, support and output behavior. |
| EPF Calculator `/epf-calculator` | Estimate Employee Provident Fund values | Calculators | REVIEW; verify statutory rates, date and assumptions. |
| EPUB to PDF `/epub-to-pdf` | Convert EPUB input to PDF | Converters | REVIEW; verify accepted EPUB variants and rendering. |
| FD Calculator `/fd-calculator` | Fixed-deposit calculation | Calculators | REVIEW; verify rates, compounding and tenure. |
| Flat vs Reducing Rate Calculator `/flat-vs-reducing-rate-calculator` | Compare flat/reducing interest | Calculators | REVIEW; verify comparison formula and explained assumptions. |
| Flatten PDF `/flatten-pdf` | Flatten interactive PDF content | PDF Tools | REVIEW; document what is flattened and what forms/layers remain. |
| Home Equity Loan Calculator `/home-equity-loan-calculator` | Estimate home-equity loan payments | Calculators | REVIEW; jurisdiction/product model and rates need verification. |
| Home Loan EMI Calculator `/home-loan-emi-calculator` | Estimate housing-loan EMI | Calculators | REVIEW; differentiate from general EMI by actual behavior. |
| HRA Calculator `/hra-calculator` | Estimate HRA exemption | Calculators | REVIEW; tax rules, city/salary assumptions and year need official review. |
| Investment Returns Calculator `/investment-returns-calculator` | Estimate investment returns | Calculators | REVIEW; return formula and non-advisory context need verification. |
| IPYNB to PDF Converter `/ipynb-to-pdf` | Convert notebook file to PDF | Converters/Developer Tools | REVIEW; confirm whether outputs render code/output cells, dependencies and formats. |
| JFIF to PDF Converter `/jfif-to-pdf` | Convert image files including JFIF to PDF | Converters | REVIEW; accept list includes several image extensions; test each. |
| Loan Eligibility Calculator `/loan-eligibility-calculator` | Estimate possible loan eligibility | Calculators | REVIEW; formula/assumptions are not a bank approval decision. |
| Margin Calculator `/margin-calculator` | Calculate margin/markup values | Calculators | REVIEW; define margin vs markup from code. |
| Markdown to PDF Converter `/markdown-to-pdf` | Convert Markdown/TXT input to PDF | Converters | REVIEW; verify accepted inputs and Markdown renderer output. |
| MOBI to PDF Converter `/mobi-to-pdf` | Convert MOBI input to PDF | Converters | REVIEW; inspect local/server dependency, format support and temp handling. |
| Mutual Fund Returns Calculator `/mutual-fund-returns-calculator` | Estimate mutual-fund returns | Calculators | REVIEW; calculation mode/returns assumptions and non-advisory text needed. |
| NPS Calculator `/nps-calculator` | Estimate National Pension System values | Calculators | REVIEW; current scheme, annuity and tax assumptions need official review. |
| Offer Letter Generator `/offer-letter-generator` | Generate an offer-letter document | Developer/Office Tools | REVIEW; verify exact fields, templates and output file format. |
| Payroll Sheet Generator `/payroll-sheet-generator` | Generate payroll sheet/report | Developer/Office Tools | REVIEW; verify fields, tax/jurisdiction logic and output format. |
| PDF Editor `/pdf-editor` | Edit PDF using the displayed modes | PDF Tools | REVIEW; feature list/output/save behavior must be traced before copy. |
| PDF to CSV Converter `/pdf-to-csv` | UI says CSV and exposes delimiter/encoding/OCR options | Converters/PDF Tools | REVIEW BLOCKED; code calls PDF→XLSX endpoint. Technical fix before content. |
| PDF to EPUB Converter `/pdf-to-epub` | Convert PDF to EPUB | Converters | REVIEW; verify output structure and readability. |
| PDF to IPYNB Converter `/pdf-to-ipynb` | Convert PDF to notebook | Converters/Developer Tools | REVIEW; verify output content/schema and viable workflow. |
| PDF to JFIF Converter `/pdf-to-jfif` | Convert PDF pages to JFIF images | Converters | REVIEW; verify actual output MIME/extension and page controls. |
| PDF to Markdown Converter `/pdf-to-markdown` | Extract/convert PDF content to Markdown | Converters/Developer Tools | REVIEW; verify structure/links/tables and output limits. |
| PDF to MOBI Converter `/pdf-to-mobi` | Convert PDF to MOBI | Converters | REVIEW; backend relies on Calibre/Python candidates; verify endpoint wiring and deploy dependencies. |
| PDF to PNG Converter `/pdf-to-png` | Render PDF pages as PNG | Converters | REVIEW; verify resolution/page selection and archive/download behavior. |
| PDF to PowerPoint `/pdf-to-ppt` | Convert PDF to PPT | Converters | REVIEW; external API credentials and output format need verification. |
| PDF to PSD Converter `/pdf-to-psd` | Convert PDF pages/document to PSD | Converters | REVIEW; determine actual raster/output representation. |
| PDF to Text Converter `/pdf-to-text` | Extract PDF text | PDF Tools | REVIEW BLOCKED; metadata advertises OCR but OCR implementation is not confirmed on this route. |
| PDF to WebP Converter `/pdf-to-webp` | Convert PDF pages to WebP images | Converters | REVIEW; verify output behavior and file packaging. |
| PDF to XML Converter `/pdf-to-xml` | Convert/extract PDF content to XML | Converters | REVIEW; define XML structure/schema and verify. |
| Percentage Calculator `/percentage-calculator` | Calculate percentages | Calculators | REVIEW; source-specific operations need documentation; registry/search missing. |
| Personal Loan Calculator `/personal-loan-calculator` | Estimate personal-loan payment/interest | Calculators | REVIEW; distinguish from general EMI only where actual model differs. |
| PNR to PDF Converter `/pnr-to-pdf` | Generate PDF from PNR/text/JSON input per accept attribute | Converters/Utility | REVIEW; determine whether it parses PNR data or simply formats provided text/JSON. |
| PowerPoint to PDF `/ppt-to-pdf` | Convert PPT/PPTX input to PDF | Converters | REVIEW; verify exact file validation and external/client processing. |
| PTO Calculator `/pto-calculator` | Calculate paid-time-off balance | Calculators/Workplace Utility | REVIEW; verify accrual models and region/workplace assumptions. |
| RD Calculator `/rd-calculator` | Estimate recurring-deposit maturity | Calculators | REVIEW; verify compounding, deposit schedule and rates. |
| Refinance Calculator `/refinance-calculator` | Estimate refinancing savings | Calculators | REVIEW; verify old/new loan inputs, costs and savings equation. |
| Rotate PDF `/rotate-pdf` | Rotate PDF pages | PDF Tools | REVIEW; verify angle choices, page selection and output. |
| RTF to PDF Converter `/rtf-to-pdf` | Convert RTF to PDF | Converters | REVIEW; input `.rtf` appears; verify output fidelity and backend. |
| Salary Calculator `/salary-calculator` | Estimate take-home salary/CTC | Calculators | REVIEW; income tax/benefit assumptions, jurisdiction and current tax year need verification. |
| Scientific Calculator `/scientific-calculator` | Perform scientific calculations | Calculators | REVIEW; verify implemented operations and numeric edge handling. |
| Shreelipi to PDF Converter `/shreelipi-to-pdf` | Convert Shreelipi text to PDF | Converters | REVIEW; verify supported font, script and output embedding. |
| Speech to PDF Converter `/speech-to-pdf` | Capture/transcribe speech and generate PDF per title | Converters/Utility | REVIEW; browser speech recognition support, language and permissions need verification. |
| Split PDF `/split-pdf` | Split PDF into multiple files | PDF Tools | REVIEW; homepage includes a link, but verify page-selection and output packaging. |
| Sukanya Samriddhi Yojana Calculator `/sukanya-samriddhi-yojana-calculator` | Estimate SSY returns | Calculators | REVIEW; government rate/date assumptions require official references. |
| SVG to PDF Converter `/svg-to-pdf` | Convert SVG input to PDF | Converters | REVIEW; `.svg`/SVG MIME shown; verify embedded resources and output. |
| Tax Calculator `/tax-calculator` | Income and sales tax sliders | Calculators | REVIEW BLOCKED; title says FY 2024-25, UI has generic tax sliders, description says India regimes; compare/replace with current specific income tax tool. |
| TDS Calculator `/tds-calculator` | Estimate Tax Deducted at Source for payment types | Calculators | REVIEW; source shows several sections/currency types but rates/thresholds must be checked against official tax-year sources. |
| Text to PDF Converter `/text-to-pdf` | Convert text file/text to PDF | Converters | REVIEW; verify paste/file options and output. |
| TIFF to PDF Converter `/tiff-to-pdf` | Convert TIFF/TIF images to PDF | Converters | REVIEW; accepted extension list and multipage behavior need verification. |

**Registry decision:** do not blindly index or delete these 59. Confirm business intent, live links/logs/search performance, category child lists and actual conversions; then add intended tools to the registry/search or move the URL to Review/noindex/retirement plan.

## 10. Canonical, Breadcrumb and Schema Plan

- **Canonical host:** recommend `https://www.wordscompare.com` consistently, matching `.htaccess` production-host normalization. Production host/TLS still needs verification. Do not use local XAMPP host or invent alternate domains.
- **Tool pages:** self-canonical on the intended root slug. Keep direction-specific converter routes separate only when behavior/output differs. Current shared header may derive alias canonical from requested path; text aliases require explicit consolidation decision.
- **Categories:** self-canonical `/developer-tools` etc. Build breadcrumbs Home → Category and preserve existing BreadcrumbList pattern.
- **Guides:** self-canonical `/guides/{slug}`. Use Article only for substantive article pages with matching visible headline/content; hub pages should use WebPage/BreadcrumbList, not blanket Article.
- **Homepage:** canonical root.
- **Info/legal:** self-canonical only after brand/content review; legal policy pages should remain accessible and accurately described.
- **Aliases:** recommended eventual canonical target is `/text-comparison` for exact synonyms; format/file aliases may be redirect/noindex/review until product capability, redirect impact and links are checked. No implementation now.
- **Schema:** keep Organization/WebSite global; WebPage/BreadcrumbList for tools/categories; BreadcrumbList for visible breadcrumb trails; Article for real guides. SoftwareApplication can be evaluated if the application description is accurate. No reviews, ratings, offers or FAQPage generated from assumptions. FAQPage only if the FAQ is visible, genuine, accurate, and complies with current search-engine policies.

## 11. Social Metadata Plan

Shared header emits OG and Twitter/X title/description/image, with current fallback `assets/img/og-image.png` absent from workspace. Do not invent a URL. Before implementation:

- Approve/create a real shared social-card image and confirm it is accessible on production host.
- Use page-specific title/description and the canonical URL; keep converter directions distinct.
- Do not put fake user counts, testimonials, ratings, or unsupported feature claims in social cards.
- Add tool/category-specific images only when real assets are available and accurately represent that page.

## 12. Sitemap and Robots Plan

### Sitemap inclusion decisions

- **Candidate for inclusion after technical repair:** homepage, selected SUPPORTING pages, approved tool pages, and categories/guides once their status/content/route completeness has been settled.
- **Review before inclusion:** 98 reviewed tools, all 9 categories (registry incomplete), 5 reviewed guides, 4 info/legal pages (content/brand/form issues), all 59 unregistered tools.
- **Exclude by default:** all 10 text aliases (until a distinct-content decision), `/search.php?q=...`, API endpoints, diagnostic endpoint, `/404.php`, stale `/sitemap.html`, and non-page assets.
- **Technical gate:** current `.htaccess` routes `/sitemap.xml` to malformed `sitemap.php`; do not claim the served sitemap is valid until it parses as XML and a route comparison confirms its intended URL set. Do not duplicate alias and canonical URLs.

### Robots.txt plan

- Keep the current blocks for private/internal `/views/`, `/includes/`, temp/test/vendor paths if they remain nonpublic; separately ensure CSS/JS/image assets needed for rendering are not blocked.
- Use one `User-agent: *` group and one absolute production `Sitemap: https://www.wordscompare.com/sitemap.xml` line after that endpoint is repaired.
- Robots disallow is not noindex; API/search/diagnostic URLs need response-level noindex/auth/404 policy as appropriate, not guessed robots-only handling.
- Keep this as a recommendation only; `robots.txt` remains unchanged.

## 13. YMYL and Factual Verification Requirements

| Page family | Must verify before content publication | Authoritative reference starting points |
|---|---|---|
| `/income-tax-calculator` | FY 2026-27 title/source slabs, resident individual scope, old/new regime, age categories, rebate, marginal relief, 4% cess, ₹50 lakh cap, excluded surcharge/special-rate income. The existing tool content links CBDT pages; verify those URLs/rules at publication. | Income Tax Department/CBDT: `https://www.incometax.gov.in/iec/foportal/`; source links in current content: `https://www.incometaxindia.gov.in/tax-rates` and `https://www.incometaxindia.gov.in/income-tax-calculator` (validate endpoints live). |
| `/tax-calculator` | The page title says FY 2024-25 but it exposes generic income/sales tax percentage sliders; determine whether it duplicates or should be separated from the current income tax tool. | Income Tax Department/CBDT and, only for sales tax jurisdiction, local revenue authority. |
| `/gst-calculator` | Current rates, GST type (CGST/SGST/IGST), inclusive/exclusive formulas and applicable jurisdiction. UI shows 5/12/18/28 rates and add/remove modes; content claims ITC/reverse charge not shown in UI. | CBIC `https://cbic-gst.gov.in/`; GST Portal `https://www.gst.gov.in/` (check current official rates/rules). |
| `/tds-calculator`, `/hra-calculator`, EPF/FD/RD/NPS/PPF/SSY calculators | Relevant tax year, statutory sections/thresholds, contribution/rates, age/status assumptions, and whether output uses official/current rates or user inputs. | Income Tax Department/CBDT; EPFO `https://www.epfindia.gov.in/`; National Savings Institute `https://www.nsiindia.gov.in/`; verify scheme-specific official notifications. |
| Loan/financial calculators | Formula, compounding, fees, currency, repayment model, rate source (user input or fixed), and statement that estimate is not an offer/financial advice. | Reserve Bank of India `https://www.rbi.org.in/` for relevant published policy context; cite product-specific official documents only when applicable. |
| `/bmi-calculator` | Adult vs child scope; BMI interpretation; age/gender/activity fields’ impact; avoid diagnosis or treatment advice. | CDC adult BMI `https://www.cdc.gov/bmi/adult-calculator/index.html`; NHS BMI tool `https://www.nhs.uk/health-assessment-tools/calculate-your-body-mass-index/`; NIH/NHLBI `https://www.nhlbi.nih.gov/calculate-your-bmi`. |

Do not publish rate slabs, health interpretations, “accurate” claims, or professional recommendations until a reviewer checks current official sources and tests calculations. Tax and health content may require qualified review.

## 14. Supporting and Noindex-Review Pages

### SUPPORTING

- Homepage `/`: site/category discovery, not an all-keyword page.
- Ten guides: `/guides/api-testing`, `/guides/base64-vs-encryption`, `/guides/compare-api-responses`, `/guides/decode-jwt-token`, `/guides/developers`, `/guides/format-json-online`, `/guides/generate-test-data`, `/guides/http-status-codes-api-testing`, `/guides/qa`, and `/guides/validate-json`.
- Info/legal pages are not treated as keyword landing content here; see Review gates below.

### REVIEW before publication

- `/about`: meta description names Snapy Tools and site copy makes broad product/privacy promises.
- `/contact`: form posts to a PHP file not found in the workspace; validate functionality and contact details.
- `/privacy`: claims about collection, third parties and local/server processing require policy/legal verification.
- `/disclaimer`: review accuracy/legal text and site brand.
- `/404.php`: error response, not landing page; confirm status and indexing directives.
- `/sitemap.html`: stale generated snapshot; review whether to keep public.

### NOINDEX_REVIEW resources (8)

`/search.php?q=...`, `/sitemap.xml`, `/sitemap.html`, `/api/convert-pdf-to-word.php`, `/api/convert-word-to-pdf.php`, `/api/convert-pdf-to-mobi.php`, `/api/test-pdf2docx.php`, `/404.php`. These are resource/API/error URLs, not normal SEO landing pages. The structured plan recommends reviewing response-level indexing/security handling; no `noindex` implementation is made.

## 15. Final Implementation Checklist

- [ ] Rotate exposed ConvertAPI secrets; complete the security and file-processing architecture review.
- [ ] Repair the dynamic sitemap and verify XML/route coverage before relying on it.
- [ ] Decide inclusion/category/search/indexation for 59 unregistered tools; do not infer removal from registry absence.
- [ ] Resolve the 10 text alias/canonical decisions using analytics/backlinks/logs and actual intent.
- [ ] Resolve PDF-to-CSV/XLSX mismatch; verify PDF-to-Word output options and endpoint behavior.
- [ ] Verify PDF-to-Text/OCR, JWT signature-verification wording, Word Counter timing, and all calculator formulas/rates.
- [ ] Confirm all supported file formats from both `accept` attributes and runtime validation/output code.
- [ ] Replace/remove unverified privacy, free, signup, fidelity, security, file deletion and browser-only claims.
- [ ] Correct the tax calculator year/content mismatch and obtain YMYL review.
- [ ] Review About/contact/privacy/disclaimer brand/form/policy details.
- [ ] Approve a real social image; confirm page canonical, OG/X image URLs and rendered metadata.
- [ ] Only then write/implement per-page content and visible FAQs; add matching schema only where appropriate.
- [ ] Re-crawl production routes and validate titles, descriptions, H1s, canonicals, sitemaps, redirects, links and mobile rendering.
