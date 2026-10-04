# WordsCompare SEO Keyword & Content Research

**Research date:** 2026-10-02  
**Phase:** Research and planning only. No application source, UI, functionality, URLs, or metadata were changed.

## 1. Executive Summary

The current post-cleanup workspace has **108 tool views, 9 categories, 15 guide routes, 1 homepage and 4 informational/legal routes**: 137 primary HTML pages. Ten text-comparison aliases bring the routed HTML URL count to 147. The 108 tools are inventoried below; 49 unique tools appear in the category registry, leaving 59 routable tools outside category/search discovery.

The strongest opportunity is to make existing tool pages accurately answer a narrow action query, then support them with concise how-to, limitations, examples and contextual links. High-value topics include JSON formatting/validation, text comparison, PDF-to-Word and Word-to-PDF, common PDF editing/conversion, word counting, Base64/JWT, and the existing loan/tax/health calculators. This is qualitative prioritization, not a traffic forecast.

**Research confidence:** local control/input/output findings are code-verified. Competitor content patterns below are based on direct page fetches on the research date. Google SERPs were blocked by a JavaScript retry page; Brave returned HTTP 429. Bing RSS returned useful results for some queries but was incomplete/irrelevant for others and carried use restrictions, so this report does not treat it as a reliable complete SERP dataset. No DataForSEO, Search Console, keyword-volume, difficulty, or trend data was available. Keyword opportunities are qualitative; no numeric demand claims are made.

## 2. Current Inventory and Evidence Rules

| Inventory group | Current count | Notes |
|---|---:|---|
| Tool page routes | 108 | Verified in `views/tools/*.php` after the 15-file cleanup. |
| Category routes | 9 | The categories in `includes/category-data.php`. |
| Guide routes | 15 | `/guides` plus 14 guide/hub pages. |
| Homepage + info/legal | 5 | `/`, `/about`, `/contact`, `/privacy`, `/disclaimer`. |
| Primary HTML pages | 137 | 108 + 9 + 15 + 5. |
| Comparison aliases | 10 | All rewrite to `views/tools/text-comparison.php`. |
| Routed HTML URLs | 147 | 137 primary + 10 aliases; excludes utility endpoints and static HTML sitemap. |
| Tools in registry | 49 distinct | Category/search discovery currently uses this registry. |
| Tool views outside registry | 59 | Route files still exist; source links vary. Treat discovery/indexability as **Review** until deliberately resolved. |

**Evidence labels used here:**

- **Code-verified:** visible in current PHP/JS: page inputs, labels, options, processing implementation, and links.
- **Competitor observation:** content structure or terminology from a directly fetched competitor page. It does not prove that WordsCompare has the same feature.
- **Query hypothesis:** a natural phrase likely to match the visible tool purpose, but not independently validated with a reliable live SERP or keyword-volume dataset.
- **Needs verification:** production behavior, output/format edge cases, legal/tax/health facts, limits, or external processing.

No keyword volume or keyword-difficulty number is included. Do not adopt competitor claims about free use, privacy, deletion, accuracy, file limits, OCR, or offline/browser-only processing unless WordsCompare’s implementation and operations substantiate them.

## 3. Search-Intent Research

### Strong action intent

Tool pages that accept an input and return a result should satisfy a direct task: format JSON, compare two strings, encode/decode a value, count text, calculate a value, or convert/edit a file. The page should foreground the actual control and output before explanatory copy. A searcher for “PDF to Word converter” expects to select a PDF and obtain a Word output, not read a broad PDF guide first.

### Informational intent

The 10 guide/article routes cover how-to/explanation intent: JSON format/validation, comparing JSON/API responses, JWT decoding/testing, Base64 vs encryption, test data, and HTTP status codes. Keep these distinct from tool pages by answering a process or concept question and linking to the actual tool. Several current guides are extremely short and repeat the tool workflow; they should be expanded only where they add useful instruction not already present in the tool UI.

### Category and navigational intent

The 9 category pages are discovery hubs. Their purpose is to help users select from actual tools, not to target every individual-tool query. Category content should accurately represent the current registry; the 59 unregistered tool routes should not be described as linked until discovery decisions are made.

### Research result formats observed

Google result fetches returned a JavaScript retry interstitial. Brave search returned 429. Therefore **ranked SERP feature claims and PAA counts are unavailable**. Direct competitor pages show recurring page formats (not proof of exact rankings): a task-oriented landing page, an immediate tool UI, short how-to steps, feature/options explanations, input/output formats, related tools, and question/answer sections. The research source list names the pages examined.

## 4. Tool-by-Tool Keyword and Content Recommendations

The following entries are the focused research set. All supported-function statements refer to local source code. Candidate terms are not search-volume claims.

| Current page | Primary keyword candidate | Related terminology / secondary candidates | Intent | Useful content topics and questions | Important limits / internal links |
|---|---|---|---|---|---|
| `/json-formatter` | JSON formatter online | format JSON, JSON beautifier, pretty print JSON, JSON minifier, JSON validator | Tool/action | How to format/minify/validate; indent choices; invalid JSON error; example before/after | Code supports text input, format/minify/validate, 2/4 spaces or tabs, copy. Link JSON Viewer, Text Compare, JSON guides. No file upload evidenced on the page. |
| `/json-viewer` | JSON viewer online | view JSON, JSON tree viewer (candidate only if UI supports tree), inspect JSON | Tool/action | How to inspect nested data; paste limits and error handling | Verify exact view mode/output before using “tree” or “visualizer” terms. Link JSON Formatter and Text Compare. |
| `/text-comparison` | compare text online | text compare, text diff, diff checker, compare two texts | Tool/action | Added/removed/changed text; ignore-case/ignore-space options; line-by-line differences; paste workflow | Current UI provides two text areas and case/space toggles; no file upload found. Do not claim format-aware JSON/XML/CSS diff or syntax highlighting. Review all 10 aliases together. |
| `/pdf-to-word` | PDF to Word converter | convert PDF to DOCX, PDF to editable Word | Tool/action | Upload steps, page range and format controls, expected output, conversion caveats, scanned-PDF/OCR question | UI lists DOCX/DOC/RTF, but server endpoint requests DOCX via ConvertAPI. Verify effective output and external processing before describing. Link Word to PDF and PDF tools. |
| `/word-to-pdf` | Word to PDF converter | DOCX to PDF, DOC to PDF, RTF to PDF | Tool/action | Supported input shown as DOCX/DOC/RTF; select, convert, preview/download; formatting limitations | Code calls ConvertAPI from browser and includes a client-visible secret (critical technical blocker). Do not claim “secure,” “browser-only,” or server-free. Link PDF to Word. |
| `/merge-pdf` | merge PDF files online | combine PDF files, join PDFs, reorder PDFs before merge | Tool/action | Upload multiple PDFs, reorder, merge, download; invalid/large-file troubleshooting | Local PDF-Lib implementation is present. Exact size/page limits need runtime check. Link Split PDF, Reorder Pages, PDF tools. |
| `/compress-pdf` | compress PDF online | reduce PDF file size, PDF compressor | Tool/action | Compression level, original vs output size, quality/size trade-off, when compression helps | UI has High/Medium/Low options and warns that higher compression can reduce image quality. Verify actual output effect and limits before claims. Link PDF-to-Word, Merge PDF, PDF-to-JPG. |
| `/word-counter` | word counter online | count words, character counter, sentence counter | Tool/action | Words/chars with and without spaces, sentences, paragraphs, estimated read/speaking time | Code uses PHP `str_word_count()` and simple regex/time estimates; not a true real-time client counter. Test Unicode/non-English counting before claiming multilingual support. Link Case Converter, Text Compare, Remove Extra Spaces. |
| `/base64-encoder` | Base64 encoder and decoder | encode text to Base64, decode Base64 string, Base64 to text | Tool/action | Text input, UTF-8 handling, invalid input, Base64 vs encryption | UI is text areas and browser `btoa`/`atob`; do not claim file conversion. Link JWT Decoder and Base64-vs-encryption guide. |
| `/jwt-decoder` | JWT decoder online | decode JWT token, JWT debugger, inspect JWT header/payload | Tool/action | Three token segments, header/payload, claims and expiry fields, invalid token handling | Code decodes parts but does not establish signature verification; “validate” wording is misleading. Warn not to paste sensitive tokens. Link Base64 and JWT guides. |
| `/url-encoder` | URL encoder and decoder online | percent encode, URL decode, encode special characters | Tool/action | URI component encoding/decoding, reserved characters, malformed escape input | Uses `encodeURIComponent`/`decodeURIComponent`; not a general URL parser. Link Base64 and JSON Formatter. |
| `/hash-generator` | hash generator online | MD5 hash generator, SHA-256 generator, SHA-512 hash, CRC32 | Tool/action | Text/file input, output algorithm labels, copy results, hashes vs encryption | UI exposes MD5/SHA1/SHA256/SHA512/CRC32/Base64-like output and file selection; cryptographic claims must distinguish weak/legacy checksums from security. Verify algorithms and file limits. Link Password Generator, Base64, DevOps. |
| `/pdf-to-jpg` | convert PDF to JPG online | PDF to JPEG, convert PDF pages to images | Tool/action | Page range, quality, resolution, selected output format, per-page download | UI offers JPG/PNG, page range, quality and DPI. Link JPG to PDF and PDF-to-PNG. Verify actual settings are applied. |
| `/jpg-to-pdf` | JPG to PDF converter | JPEG to PDF, images to PDF | Tool/action | Multiple images, reorder, page size, orientation, fit, margins, optional page numbers | Source accepts JPG/JPEG/PNG/BMP/GIF. Link PDF-to-JPG and Add Page Number. Avoid claiming TIFF/WebP unless separately verified. |
| `/pdf-to-excel` | PDF to Excel converter | PDF to XLSX, extract PDF tables to Excel | Tool/action | Upload, table extraction expectations, output type, scanned vs text PDF | ConvertAPI request returns XLSX; quality and OCR support need testing. Link PDF-to-CSV only after output mismatch is resolved. |
| `/pdf-to-csv` | PDF table to CSV conversion | extract PDF tables to CSV, PDF to spreadsheet | Tool/action | Page range, delimiters, encoding, header-row option, OCR checkbox | UI presents CSV/XLSX; code calls ConvertAPI PDF-to-XLSX, a material mismatch. Treat as **Review**, not a settled landing page. |
| `/pdf-to-text` | extract text from PDF online | PDF text extractor, convert PDF to TXT | Tool/action | Page range, whitespace/line endings, encoding, text layer vs scanned document | Source page advertises scanned-PDF OCR, but PDF.js extraction is visible and OCR operation is not confirmed here. Link PDF OCR; do not promise OCR until verified. |
| `/pdf-to-ocr` | OCR PDF online | extract text from scanned PDF | Tool/action | What OCR does, language/support/runtime, readable scan requirements, output | Tesseract.js is included in source. Supported languages, limits and output accuracy need verification. Link PDF-to-Text and PDF-to-Word. |
| `/emi-calculator` | EMI calculator | loan EMI calculator, monthly instalment calculator, loan payment calculator | Calculator/action | Amount, interest rate, tenure, monthly EMI, total interest/payment, yearly amortization | Code provides loan amount/rate/tenure sliders, currency selector, chart and year-wise schedule. Distinguish from home/car/personal loan calculators. Do not imply bank offers/advice. |
| `/gst-calculator` | GST calculator India | add GST, remove GST, GST inclusive/exclusive price | Calculator/action | Enter amount, select rate, add/remove tax, gross/net amount | Code exposes 5/12/18/28 rates; verify current legal applicability with CBIC before describing as current. Link tax calculator and calculators category. |
| `/age-calculator` | age calculator by date of birth | calculate exact age, age in years months days | Calculator/action | Date of birth and target date, age output, date edge cases | Source has DOB and “calculate up to” dates. Only state granular output after verifying current JS result. Link BMI and calculator category. |
| `/bmi-calculator` | BMI calculator | body mass index calculator, calculate BMI from height and weight | Calculator/action; YMYL review | Metric/imperial inputs, calculation, interpretation limits, adult/child applicability | Code also collects age/gender/activity; explain only verified output. Include reputable health references/disclaimer, no diagnosis claims. Link calculator category, not medical treatment tools. |
| `/compound-interest-calculator` | compound interest calculator | calculate compound interest, investment growth calculator | Calculator/action; finance | Principal, rate, time/frequency, result and formula where code supports it | Verify compounding controls, currency assumptions and outputs in source before writing formulas. Link SIP/PPF/FD only if registered and target intent differs. |
| `/income-tax-calculator` | income tax calculator India FY 2026-27 | calculate income tax, old vs new tax regime | Calculator/action; YMYL | Tax year, income inputs, regime, assumptions, official rate citations and update date | Page title currently indicates FY 2026-27; verify source rates/current official law before planning content. Link tax/TDS calculators only after separating purposes. |
| `/pdf-tools` | PDF tools online | PDF converter, PDF editor, merge/compress/convert PDF | Category discovery | Organize by edit/manage, compress, convert, extract; feature actual registered tools | Category registry includes 16 tool routes, but 59 other tool pages include many PDF conversions not listed. Treat the registry gap as a major taxonomy/discovery decision. |
| `/calculators` | online calculators | financial calculators, loan calculators, everyday calculators | Category discovery | Financial, savings/planning, health/everyday groups using actual category data | Category has 13 registry tools; many calculator view files (for example FD/EPF/HRA) are outside registry. Decide which are intended before linking/claiming coverage. |

### Remaining Tool Pages: Source-Based Keyword Candidates

The following pages are in the current source inventory. Their primary phrases are **candidates inferred from actual page purpose/title**, not separately validated keywords. Confirm each tool’s input, output, file formats, settings and limits in source/runtime before writing page content. Priority defaults to P2; pages missing category registry placement are **Review**.

| URL | Primary keyword candidate | Page-specific angle to verify |
|---|---|---|
| `/add-page-number-to-pdf` | add page numbers to PDF online | position, format, numbering options and limits |
| `/add-watermark-to-pdf` | add watermark to PDF online | text/image watermark options and placement |
| `/apy-calculator` | APY calculator | compounding assumptions and effective-yield output |
| `/brokerage-calculator` | brokerage calculator | market/jurisdiction and fee inputs |
| `/calendar-generator` | calendar generator printable | date range, layout, export format |
| `/car-loan-emi-calculator` | car loan EMI calculator | vehicle-specific assumptions; distinguish general EMI |
| `/case-converter` | text case converter | exact casing modes and Unicode behavior |
| `/color-picker` | online color picker | source supports HEX/RGB/HSL; inspect palette/export behavior |
| `/cagr-calculator` | CAGR calculator | start/end value and time period |
| `/delete-pdf-pages` | delete PDF pages online | page selection and output behavior |
| `/discount-calculator` | discount calculator | base price, discount type and final price |
| `/dwg-to-pdf` | DWG to PDF converter | file compatibility and server/client processing |
| `/epf-calculator` | EPF calculator India | contribution assumptions and applicable rates |
| `/epub-to-pdf` | EPUB to PDF converter | accepted EPUB variants and output handling |
| `/excel-to-pdf` | Excel to PDF converter | code accepts XLS/XLSX/ODS; verify actual outputs |
| `/fd-calculator` | fixed deposit calculator | rate/tenure/compounding assumptions |
| `/find-replace-text` | find and replace text online | match options and replacement scope |
| `/flatten-pdf` | flatten PDF online | supported form/layer content and output |
| `/flat-vs-reducing-rate-calculator` | flat vs reducing rate calculator | loan comparison assumptions |
| `/home-equity-loan-calculator` | home equity loan calculator | HELOC-specific inputs and currency/jurisdiction |
| `/home-loan-emi-calculator` | home loan EMI calculator | housing loan assumptions, distinct from general EMI |
| `/hra-calculator` | HRA calculator India | tax-year, salary/rent inputs and rule references |
| `/html-to-pdf` | HTML to PDF converter | source accepts HTML/file or URL? verify implemented path and limitations |
| `/investment-returns-calculator` | investment returns calculator | return/risk assumptions and output type |
| `/ipynb-to-pdf` | Jupyter notebook to PDF | notebook assets, execution vs static export, format support |
| `/jfif-to-pdf` | JFIF to PDF converter | actual accepted image extension list |
| `/json-to-pdf` | JSON to PDF converter | formatting, pagination and input acceptance |
| `/loan-eligibility-calculator` | loan eligibility calculator | formula/assumptions and jurisdiction |
| `/lock-pdf` | password protect PDF | encryption implementation and limits; avoid strength claims |
| `/margin-calculator` | profit margin calculator | margin vs markup distinction |
| `/markdown-to-pdf` | Markdown to PDF converter | accepted MD/TXT and rendering behavior |
| `/mobi-to-pdf` | MOBI to PDF converter | local/server dependency and format variant support |
| `/mutual-fund-returns-calculator` | mutual fund returns calculator | return method, tax/fee assumptions |
| `/nps-calculator` | NPS calculator India | contribution/annuity/tax rules and update date |
| `/offer-letter-generator` | offer letter generator | template fields and export format |
| `/payroll-sheet-generator` | payroll sheet generator | required fields and generated file output |
| `/pdf-editor` | edit PDF online | actual editing modes/limits; distinguish from annotation/forms if unsupported |
| `/pdf-metadata-editor` | edit PDF metadata online | properties exposed and export behavior |
| `/pdf-to-audio` | PDF to audio converter | text extraction and speech options/voice support |
| `/pdf-to-epub` | PDF to EPUB converter | text/layout fidelity and output support |
| `/pdf-to-html` | PDF to HTML converter | extraction/layout behavior |
| `/pdf-to-ipynb` | PDF to Jupyter Notebook converter | actual notebook structure and dependencies |
| `/pdf-to-jfif` | PDF to JFIF converter | page/image settings and output MIME/extension |
| `/pdf-to-markdown` | PDF to Markdown converter | supported text extraction and structure limits |
| `/pdf-to-mobi` | PDF to MOBI converter | Calibre/Python server requirements and failure modes |
| `/pdf-to-png` | PDF to PNG converter | page range, resolution and output packaging |
| `/pdf-to-ppt` | PDF to PowerPoint converter | output options and third-party conversion behavior |
| `/pdf-to-psd` | PDF to PSD converter | page/raster behavior and output format support |
| `/pdf-to-webp` | PDF to WebP converter | page range, resolution and output settings |
| `/pdf-to-xml` | PDF to XML converter | actual XML structure/output schema |
| `/percentage-calculator` | percentage calculator | supported percent calculations, not assumed variants |
| `/personal-loan-calculator` | personal loan EMI calculator | rate/fee assumptions, distinct from general EMI |
| `/pnr-to-pdf` | PNR to PDF generator | source data and whether tool generates from manual input; verify |
| `/ppf-calculator` | PPF calculator India | current government rate/period assumptions |
| `/ppt-to-pdf` | PowerPoint to PDF converter | accepted PPT/PPTX and rendering behavior |
| `/pto-calculator` | PTO calculator | accrual/leave assumptions |
| `/qr-code-generator` | QR code generator online | payload types and output/download format |
| `/rd-calculator` | recurring deposit calculator | rate/tenure/frequency assumptions |
| `/refinance-calculator` | refinance calculator | loan/interest assumptions and jurisdiction |
| `/remove-extra-spaces` | remove extra spaces from text | whitespace types removed and preservation options |
| `/reorder-pdf-pages` | reorder PDF pages online | reorder interface and file limits |
| `/repair-pdf` | repair PDF online | what repairs are actually attempted and failure states |
| `/retirement-calculator` | retirement calculator | contribution, inflation and return assumptions |
| `/reverse-text` | reverse text online | character/word/line mode options |
| `/rotate-pdf` | rotate PDF pages online | rotate angle/page scope |
| `/rtf-to-pdf` | RTF to PDF converter | accepted RTF variants and output rendering |
| `/salary-calculator` | salary calculator India | CTC/in-hand components and tax-year assumptions |
| `/scientific-calculator` | scientific calculator online | implemented functions and keyboard behavior |
| `/shreelipi-to-pdf` | Shreelipi to PDF converter | supported font/text assumptions and language output |
| `/simple-calculator` | online basic calculator | actual arithmetic operations |
| `/sip-calculator` | SIP calculator | return assumptions, monthly investment and tenure |
| `/speech-to-pdf` | speech to PDF converter | speech recognition support, browser permission/language, output |
| `/split-pdf` | split PDF online | split range/page selection and output packaging |
| `/sukanya-samriddhi-yojana-calculator` | SSY calculator India | current scheme rate and contribution assumptions |
| `/tax-calculator` | tax calculator India | title says FY 2024-25; conflicts with income-tax page FY 2026-27. Review freshness and distinct purpose |
| `/tds-calculator` | TDS calculator India | section/rate inputs and tax-year source |
| `/tiff-to-pdf` | TIFF to PDF converter | accepted variants and page handling |
| `/unit-converter` | unit converter online | supported units/categories must be extracted before copy |
| `/pdf-to-png` | PDF to PNG converter | see PDF conversion group; do not reuse JPG promise |

The JSON file contains an exhaustive 108-route inventory. This table calls out page-level angles without claiming every item has independent SERP research.

## 5. Competitor and Search-Result Research

### Directly fetched competitor pages

These are **competitor content observations**, not claims that the pages were ranked for a specific query at this location/date:

- [JSONFormatter.org](https://www.jsonformatter.org/): combines formatter/validator/beautifier terms, editor UI, examples, file input/download claims, related JSON tools and FAQs. WordsCompare visibly supports format/minify/validate of pasted text with selectable indent and copy; do not inherit its file-upload/tree-view features.
- [JSONLint](https://jsonlint.com/): defines JSON, explains syntax rules, editor workflow, common parse errors and validator/formatter relationship. This supports useful concepts for the JSON guide, but WordsCompare's tool must remain described as the specific implemented editor.
- [Diffchecker Text Compare](https://www.diffchecker.com/text-compare/): task-first compare UI followed by side-by-side/unified views, file types, workflows, use cases, troubleshooting and FAQs. It offers many features not present in WordsCompare (file drop, syntax-aware diff, merge, share, custom ignore, export); do not describe those as WordsCompare features.
- [Smallpdf PDF to Word](https://smallpdf.com/pdf-to-word): upload CTA, short numbered steps, editable DOCX outcome, scanned/OCR question, account/device/large-file FAQs, related PDF tools. Treat OCR, exact fidelity, free quotas and retention as competitor-specific.
- [Adobe PDF to Word](https://www.adobe.com/acrobat/online/pdf-to-word.html): concise how-to, DOCX terminology, output/edit workflow, platform information and FAQs about scanned input, images, output formats and accuracy. The account/download behavior is Adobe-specific.
- [iLovePDF PDF to Word](https://www.ilovepdf.com/pdf_to_word) and [iLovePDF home/tools](https://www.ilovepdf.com/): tool-first UI and broad PDF tool directory organized around merge/split/compress/convert/edit/protect/OCR. Do not import its accuracy/free/privacy claims.
- [EMI Calculator](https://emicalculator.net/): loan EMI inputs, EMI/interest/payment outputs, amortization schedule, formula explanation, worked example, how-to, floating-rate discussion and links to home-loan/loan calculators. WordsCompare currently has an EMI chart/year schedule; validate actual formula/currency assumptions before matching content.
- [Calculator.net Loan Calculator](https://www.calculator.net/loan-calculator.html): input/result layout, amortization tables, links between loan calculators and explanatory loan concepts. Its multiple loan models should not be claimed for WordsCompare's simple EMI page.
- [Calculator.net BMI Calculator](https://www.calculator.net/bmi-calculator.html) and [CDC Adult BMI Calculator](https://www.cdc.gov/bmi/adult-calculator/index.html): BMI pages frame a health measure, audience/age scope and limitations. Use authoritative health references; do not offer medical diagnosis.
- [WordCounter](https://wordcounter.net/): immediate input/counters, word/character counts, reading information and explanations. WordCounter has extra writing/grammar functions not evidenced in WordsCompare.
- [JWT.io Debugger](https://www.jwt.io/): decoded header/payload, signature-verification workflow and algorithm/secret inputs. WordsCompare does **not** verify the signature in its decoder; never mimic that claim.
- [Base64Decode.org](https://www.base64decode.org/): text and file decode workflows, charset/live mode, technical explanation and caution around decoded files. WordsCompare Base64 source shows text-only input/output.
- [URLEncoder.io](https://www.urlencoder.io/): encoder workflow plus explanation of percent encoding, reserved characters, UTF-8 and examples. WordsCompare uses `encodeURIComponent` / `decodeURIComponent`; explain that scope accurately.
- [Smallpdf PDF Tools](https://smallpdf.com/pdf-tools), [iLovePDF](https://www.ilovepdf.com/), [Convertio](https://www.convertio.co/), and [Online-Convert](https://www.online-convert.com/): broad discovery pages organize tools by task or media type and cross-link format conversions. They advertise capabilities/limits specific to their services.

### SERP status

- Research date: 2026-10-02.
- Google search-result fetches returned a JavaScript retry interstitial; Brave result fetches returned HTTP 429.
- Bing RSS returned inconsistent results for many tool phrases; no complete, stable, location/language-controlled SERP set or People Also Ask capture is available in this environment.
- DataForSEO MCP/volume tools were not available. No search volume, CPC, difficulty, traffic or trend value is reported.
- Therefore competitor structures above are direct page observations; exact ranking order, PAA questions, SERP feature ownership and query demand require manual SERP validation.

## 6. Category Research

| Current category URL | Search intent/topic | Primary keyword candidate | Actual registry anchors and content plan |
|---|---|---|---|
| `/developer-tools` | Developers looking for small browser utilities during coding | developer tools online | JSON Formatter/Viewer, Base64, URL, JWT, Hash, Color Picker, QR, code/text utilities. Intro should distinguish practical input/output tasks and avoid claiming all tools run locally. Link JSON, QA/API, DevOps hubs. |
| `/qa-tools` | QA/SDET/testers looking for test-data and response-check workflows | QA testing tools online | JSON format/view, URL/Base64/JWT, test text/case/replace/compare utilities. Lead with test data and compare/inspect workflow; do not imply an API runner or automation platform. Link API Testing, Developer, Text, JSON. |
| `/api-testing-tools` | API developers/testers seeking payload inspection/auth helpers | API testing tools | JSON formatter/viewer, JWT, encoders, compare, date/checks; no request runner or HTTP client is evident. Be explicit it supports manual payload/token inspection rather than making API requests. Link JSON and QA guides. |
| `/devops-tools` | Operations tasks around encoded/config/hash data | DevOps tools online | Registry includes hash, Base64, URL, JSON and JWT utilities. Current hub has operational utilities; avoid implying deployment pipeline integrations. Link Developer/API testing. |
| `/json-tools` | JSON formatting, viewing and conversion | JSON tools online | Formatter, Viewer, JSON↔PDF, case/text supporting links. Explain format vs view vs PDF conversion as different jobs. Link Developer/API. |
| `/text-tools` | Text cleanup, case transformation, comparison and counts | text tools online | Case Converter, whitespace, Reverse Text, Find/Replace, Text Compare, Word Counter, Text-to-Slug. Give task-based sections; Text Compare should not promise document uploads. Link QA and developer. |
| `/pdf-tools` | Find a PDF operation by task | PDF tools online | Registry has manipulation and conversions. Build edit/manage, convert, extract/optimize groups from actual child routes; 59 unregistered total tool pages include PDF candidates, so inventory decision precedes full hub coverage. Link converters and documents. |
| `/calculators` | Calculate a specific financial/everyday measure | online calculators | Registered finance, savings, health and everyday calculators; many additional calculator views are unregistered. Include tax-year/source disclaimers and distinct EMI vs tax vs savings intents. Link converter only for unit conversion. |
| `/converters` | Convert one named input format/value to another | online file and unit converters | Registry includes text/units and selected Excel/JPG/PDF conversions. Expand only after listing intended tool routes; currently no related category links are configured. Use direction-specific links (source→target), not generic overclaiming. |

**Category questions to research/answer if supported:** “Which format do I have and what output do I need?”, “Can I paste text or must I upload a file?”, “Which calculator inputs are required?”, “What does this category not do (for example, API Testing does not imply an API request runner)?”

## 7. Existing Guides Research

The list below is based on each current guide file’s title/body and its actual links. “Expand” means add concrete steps, examples, known limitations and validated sources; it does not mean add word count for its own sake.

| Route | Current intent/topic | Recommendation, overlap and real tool links |
|---|---|---|
| `/guides` | Guide directory | Expand as a complete directory linking every current guide, not only four hubs. Link Developer, QA/API and DevOps hubs. |
| `/guides/api-testing` | API-testing guide hub | Keep as hub; currently links child hub pages, not its article list. Link compare/validate/JWT/HTTP articles and verified API tools. |
| `/guides/base64-vs-encryption` | Explain encoding vs encryption | Keep; distinct informational query from Base64 encode/decode action page. Link Base64 Encoder. Add careful security explanation from authoritative crypto sources. |
| `/guides/compare-api-responses` | How-to compare response payloads | Keep/expand; procedural comparison intent; links JSON Formatter, Viewer and Text Compare. Clarify the tool is text-oriented and does not call APIs. |
| `/guides/compare-json-objects` | How-to compare JSON objects | Expand or merge into the JSON/API workflow cluster after SERP overlap review. Current method compares textual panes; prettify both first. Avoid claiming structural diff. |
| `/guides/decode-jwt-token` | How-to decode token parts | Expand with header/payload/base64url/claims and secret-handling caution. Link JWT Decoder and Base64. Differentiate decoding from verifying signatures. |
| `/guides/developers` | Developer guide hub | Keep/expand; it links five guides. Add clear article index and contextual links from Developer Tools. |
| `/guides/devops` | DevOps guide hub | **Review/expand**; current content says more guides will be added and has no child article links. It is too thin to support a standalone hub intent. |
| `/guides/format-json-online` | JSON format how-to | Keep as procedural support; link Formatter, Viewer, Text Compare. Avoid duplicating the tool page’s action UI; add an example plus common parse-error help. |
| `/guides/generate-test-data` | Basic QA input-generation guidance | Keep/expand; links Case Converter, Text-to-Slug and Base64 Encoder. Do not claim random/fake data generation—the tools create transformations/encoded strings, not a full data generator. |
| `/guides/http-status-codes-api-testing` | Explain common status codes in testing | Expand with authoritative HTTP references and meaningful 2xx/3xx/4xx/5xx coverage. Current page lists only selected codes. Link JWT/JSON Formatter. |
| `/guides/qa` | QA guide hub | Keep/expand; currently links five QA/API articles. Add complete contents and link QA category. |
| `/guides/test-jwt-authentication` | JWT-auth testing procedure | Review wording: linked JWT tool decodes, does not validate signatures/auth flows. Rewrite outline to describe inspecting token structure/claims and validating the real auth flow in the user's own environment. Link JWT Decoder and Base64. |
| `/guides/validate-json-api-responses` | Validate response syntax and required fields | Expand with manual syntax vs schema/assertion distinction. The linked Formatter checks JSON syntax; it does not enforce required-field schemas. Link Viewer/Formatter/Text Compare. |
| `/guides/validate-json` | JSON syntax validation how-to | Keep if it targets instructional intent distinct from the Formatter page. Current steps duplicate the tool flow; add error examples/troubleshooting and link tool. Potential overlap with validate API response guide. |

## 8. Homepage SEO Research

**Verified local purpose:** WordsCompare presents document/PDF, text, calculator and developer/QA tools. Homepage has one H1 (“Developer & QA tools made simple”), topic/category navigation, popular search links, tool category cards, specific tool links and informational sections.

**Intent:** Brand/site discovery and broad tool selection. It should not compete with `/json-formatter`, `/pdf-to-word`, or individual calculator pages by listing every exact tool query in its title/body.

**Keyword concepts:** online tools, PDF/text/calculator/developer/QA utilities as supporting concepts. The exact title/headline, query share, brand demand and audience geography are unverified. Do not assume “100+” from filenames; verify the count dynamically and the actual current usable routes.

**Content/link plan:** Make the category cards the primary hierarchy; selectively feature a few genuinely popular/current tools; ensure all intended child tools are linked from categories; link the guide hub; remove/qualify browser-only, no-signup/free/privacy claims where implementation does not support them. Keep each tool’s intent on its own page.

## 9. Text-Comparison Alias Research

All ten `.htaccess` aliases rewrite to the same `views/tools/text-comparison.php`. The code presents two text areas, a line-oriented result table and ignore-case/ignore-space controls; it does not show file upload or format-aware JSON/XML/CSS parsing. Alias wording therefore exceeds current feature distinctions for “files” and format-specific comparisons.

| Alias URL | Likely query intent from wording | Relationship to `/text-comparison` | Planning recommendation |
|---|---|---|---|
| `/compare-two-text-files-online` | Compare file contents | Same two-text UI; no file picker found | Review; canonicalize to the tool unless file upload is implemented. |
| `/compare-text-line-by-line` | Locate line changes | Closest synonym to current line-oriented comparison | Keep one canonical route; alias should not be separate indexed page. |
| `/compare-json-files-online` | JSON-aware structural/value diff | Current tool is generic text diff, not verified structural JSON diff | Review/mismatch; do not create targeted JSON-diff content until tool supports/clearly instructs JSON text comparison. |
| `/compare-xml-files-online` | XML structural diff | Same generic text UI | Review; consolidate unless XML-aware behavior is added. |
| `/compare-html-files-online` | HTML/code comparison | Same generic text UI; no DOM-aware diff evident | Review; consolidate. |
| `/compare-css-files-online` | CSS comparison | Same generic text UI; no selector-aware diff evident | Review; consolidate. |
| `/compare-code-files-online` | Source-code diff, often syntax context | Same generic text UI; no syntax highlighting evidenced | Review; consolidate or implement/differentiate first. |
| `/online-text-diff-tool` | Generic text diff action | Direct synonym | Consolidate to canonical tool route. |
| `/text-difference-checker` | Generic detect changes | Direct synonym | Consolidate to canonical tool route. |
| `/compare-text-documents` | Compare document files (often DOC/PDF) | Tool accepts text fields, not document formats | Review/mismatch; consolidate; do not promise document upload. |

**Count:** 10 alias URLs, **1 duplicate/cannibalization group**, and 10 per-alias route decisions. Whether to redirect, canonicalize or preserve the aliases is a technical decision for a later implementation phase.

## 10. Keyword Cannibalization and Page Boundaries

| Conflict group | URLs/pages | Recommendation |
|---|---|---|
| Text comparison duplicates | `/text-comparison` + all 10 aliases | One canonical action page unless code gains materially distinct functionality. All aliases currently share one rendering source. |
| Text compare vs JSON guides | `/text-comparison`, `/guides/compare-json-objects`, `/guides/compare-api-responses`, `/guides/validate-json-api-responses` | Tool targets action; guides target procedures. Explicitly state text-only compare vs JSON syntax/field-check workflow. Avoid “JSON diff” promise unsupported by code. |
| JSON formatter vs validation guide | `/json-formatter`, `/guides/format-json-online`, `/guides/validate-json`, `/guides/validate-json-api-responses` | Formatter owns online tool/action terms; guides answer how-to/troubleshooting. The two validation guides may be combined or distinguished (general syntax vs API-response workflow). |
| PDF to spreadsheet outputs | `/pdf-to-csv`, `/pdf-to-excel` | Distinct desired outputs in user intent, but current PDF-to-CSV endpoint requests XLSX. Verify/fix before separate SEO positioning. |
| Reverse PDF conversion pair | `/pdf-to-word`, `/word-to-pdf` | Keep separate: opposite directions and distinct inputs/outputs. Link each directionally; don't make one generic converter target both. |
| Specific vs general loan calculators | `/emi-calculator`, `/home-loan-emi-calculator`, `/car-loan-emi-calculator`, `/personal-loan-calculator`, `/loan-eligibility-calculator`, `/home-equity-loan-calculator` | Keep separate only where source calculations and assumptions differ. The generic EMI page covers generic amount/rate/tenure; verify specialized formulas before unique claims. |
| Tax tools | `/income-tax-calculator`, `/tax-calculator`, `/tds-calculator`, `/gst-calculator`, `/hra-calculator` | Separate income-tax vs TDS/GST/HRA by tax operation. `tax-calculator` title FY 2024-25 and income-tax page FY 2026-27 need tax-year/duplicate review. |
| PDF text extraction/OCR | `/pdf-to-text`, `/pdf-to-ocr`, `/pdf-to-word` | Separate digital text extraction, OCR for scans (only if actually implemented), and document conversion; current PDF-to-Text OCR claim needs verification. |
| Format-specific PDF image outputs | `/pdf-to-jpg`, `/pdf-to-png`, `/pdf-to-webp`, `/pdf-to-jfif`, `/pdf-to-tiff`, `/pdf-to-svg` | Distinct output formats may justify separate action pages. Confirm each output format/extension is implemented and do not duplicate generic copy. |

## 11. Content Gaps and FAQ Research

### Major gaps

1. **Discoverability:** 59 of 108 current tool files are not in the 49-tool category registry. They remain routable; intended indexability/category membership must be decided.
2. **Feature/metadata correctness:** JWT Decoder says “validate” but code only decodes token segments; PDF-to-CSV UI/output choice conflicts with the ConvertAPI XLSX request; tax pages have conflicting years; PDF-to-Text’s OCR wording needs verification; Word Counter says real-time in metadata while PHP calculates on form POST.
3. **Unsupported behavior claims:** Some page variables mention browser-only, secure, accurate, OCR, scanned input, format fidelity, or no-sign-up. Audit each claim against processing code/operations before use.
4. **Missing/uneven content:** 7 current tools have no matching content include; current code audit reports 41 FAQ-bearing matching tool fragments among 101 matched content pages after cleanup. This does not mean every FAQ is good or factually current.
5. **Guide overlap/thinness:** `/guides/devops` is a placeholder; guide directory omits a full article list; two JSON validation guides and several response-comparison guides overlap.
6. **Category mismatch:** the Calculator/Converters/PDF pages omit many existing routes because the registry is incomplete; content plan must be gated on which routes are actually intended for public discovery.

### FAQ question bank (research prompts, not final copy)

Question topics below derive from current UI controls, source limitations and competitor FAQ headings. Proposed questions must be answered only after validating real runtime behavior.

- **JSON Formatter:** How do I format/pretty-print JSON? How do I minify it? How do I validate syntax? What does an invalid JSON error mean? Which indentation options exist?
- **Text Compare:** How do I compare two texts? Can I ignore case/spaces? Does this page accept uploaded files? Does it understand JSON/XML structurally? (Answer should reflect current text-area UI.)
- **PDF to Word:** Which Word output is actually generated? Does page range apply? Are scanned PDFs supported/OCR available? What can change during conversion? Where is processing performed?
- **Word to PDF:** Which inputs are accepted (DOC/DOCX/RTF)? What output is returned? Is file conversion sent to ConvertAPI? Which formatting limitations apply?
- **PDF compression:** What do the three compression levels change? Can output quality change? Why might a compressed PDF not become smaller? How do I download the result?
- **Word Counter:** Which counts are produced? How are words/sentences determined? How are non-English/Unicode words counted? Is counting live or after submit?
- **Base64:** How do I encode/decode text? Is Base64 encryption? What does an invalid input error mean? Which character encoding is used?
- **JWT Decoder:** Which token sections can it decode? Does decoding verify a signature? What should users avoid pasting into a public page? How is `exp` displayed?
- **EMI/GST/BMI/tax tools:** What inputs does this specific page use? Which formula/rate/date assumptions apply? What does the result exclude? Cite official sources where rates or health context are discussed.
- **PDF/image converters:** Which exact input and output formats are supported? Can I choose pages/resolution/order? What happens to scanned/image-only content? Are there size/quality constraints?

Do not add FAQPage markup solely because question headings exist; no FAQ schema is present currently and search feature eligibility must be separately verified.

## 12. Internal-Link Opportunities

Use natural anchors and only link to verified current routes. These 16 workflows are plan-level opportunities, not changes made:

1. `/developer-tools` → `/json-formatter` (format JSON), `/json-viewer` (inspect JSON), `/jwt-decoder` (decode JWT), `/base64-encoder` (encode/decode text).
2. `/json-tools` → Formatter, Viewer, JSON-to-PDF and PDF-to-JSON with direction-specific anchor text.
3. `/qa-tools` → Text Compare, JSON Formatter, JWT Decoder and Case Converter as QA workflow steps.
4. `/api-testing-tools` → Formatter → Viewer → Text Compare / JWT Decoder; state manual payload inspection, not an API runner.
5. `/devops-tools` → Hash Generator, URL Encoder and Base64; expand the currently empty DevOps guide hub with only these supported tasks.
6. `/text-tools` → Case Converter, Remove Extra Spaces, Word Counter, Text Compare and Text-to-Slug.
7. `/guides/format-json-online` ↔ JSON Formatter and JSON Viewer; keep article informational and page transactional.
8. `/guides/validate-json` ↔ JSON Formatter; distinguish syntax validation from schema/required-field validation.
9. `/guides/compare-json-objects` and `/guides/compare-api-responses` ↔ Text Compare; explain JSON must be normalized/text-compared, not structural diff.
10. `/guides/decode-jwt-token` and `/guides/test-jwt-authentication` ↔ JWT Decoder, Base64 Encoder and JSON Formatter; add explicit decoder-vs-verifier boundary.
11. `/base64-encoder` ↔ Base64-vs-encryption guide; encoder is not encryption.
12. `/guides/generate-test-data` ↔ Case Converter, Text-to-Slug and Base64 Encoder; do not label as a random-data generator.
13. `/pdf-to-word` ↔ `/word-to-pdf` as inverse format workflows, with separate format wording.
14. `/merge-pdf` ↔ `/split-pdf`, `/reorder-pdf-pages`, `/delete-pdf-pages` for document assembly/reordering workflow.
15. `/compress-pdf` ↔ `/pdf-to-jpg`, `/pdf-to-word`, `/pdf-editor` for file-size/document workflow, without promising compression outcome.
16. `/pdf-tools` and `/converters` → list verified intended PDF/document converter routes after the 59-route registry decision; don't expose every route indiscriminately.

## 13. Content Recommendations (Brief Concepts Only)

This is not production copy. Section recommendations must be rechecked against each implementation before writing.

- **Action tool pages:** clear purpose, accepted input, output, actual settings, short steps, one example, error/limitation notes, relevant FAQs, related-tool links.
- **Calculators:** input definitions and units, formula/rate assumptions, result components, worked calculation, data-as-of date and official reference. Keep financial/health pages in YMYL review; no advisory conclusions.
- **Converters:** exact input/output formats, which options change, client/server/third-party path, failure handling, quality caveats. Never repeat competitor retention/accuracy/free claims.
- **Text tools:** input/output semantics, what ignore toggles do, language/counting edge cases, examples and troubleshooting.
- **Category pages:** task-organized sections that enumerate actual intended children; explain each cluster and internally link specific tools. Avoid generic “free online tools” filler.
- **Guides:** procedural, evidence-based content with steps, example input/output, common errors and links to existing tool pages; no duplicate article targeting the same action query.
- **Homepage:** brand/site overview and clear discovery to categories; do not stuff tool-level terms into one general page.

## 14. Priority Plan

### Priority 1 — strong action intent and clear code-backed need

- JSON Formatter, Text Comparison, PDF-to-Word, Word-to-PDF, Merge PDF, Compress PDF, Word Counter, Base64 Encoder, JWT Decoder, URL Encoder, Hash Generator, PDF-to-JPG, JPG-to-PDF, PDF-to-Text, PDF-to-OCR, PDF-to-Excel, PDF-to-CSV, EMI Calculator, GST Calculator, Age Calculator, BMI Calculator, Compound Interest Calculator, Income Tax Calculator.
- First unblock route/content registry completeness and correct feature claims. In particular, fix/verify the PDF-to-CSV/XLSX mismatch, JWT “validate” wording, PDF-to-Text OCR, Word Counter timing, exposed ConvertAPI key/security concerns from Phase 1 and current tax year/rate sources.

### Priority 2 — real tasks with narrower demand or specialized assumptions

- Other current PDF converters/editors, specific loan/savings calculators, text transform/generator utilities and the nine category hubs.
- Give unique pages only when source functionality and intent are distinct; cross-link converters and calculator families rather than duplicating descriptions.

### Priority 3 — supporting discoverability and informational pages

- Homepage; About, Contact, Privacy and Disclaimer; factual cleanup of all current tool titles/descriptions; guide hubs/articles after the high-intent tool content is accurate.

### Review — technical or functionality decision required

- All ten text-comparison aliases; 59 unregistered tool routes; PDF-to-CSV; PDF-to-Text OCR claim; JWT validation claim; tax calculator year overlap; PDF-to-Word formats; any page making privacy/retention/free/unlimited/fidelity claims.

## 15. Top Issues Before SEO Implementation

1. The production-facing ConvertAPI secrets noted in `SEO-AUDIT.md` are a security blocker; rotate them and determine the server-side conversion design before promoting these pages.
2. Decide the 59 currently unregistered tool routes’ intended state (publish/link/noindex/remove) before keyword mapping becomes final.
3. Resolve duplicate alias/canonical policy for text comparison.
4. Verify PDF-to-CSV output, PDF-to-Text OCR, JWT signature validation, Word Counter timing/counting and calculator formulas/rates in runtime; correct SEO positioning only after behavior is settled.
5. Confirm tax/health content against authoritative sources and dates; these tools have YMYL implications.

## 16. Sources and Research Limitations

### Local codebase (verified)

`seo-inventory.json` post-cleanup counts; `includes/category-data.php`; `includes/category-template.php`; `index.php`; `views/tools/*.php`; `views/content/*.php`; `views/guides/*.php`; `includes/header.php`; `.htaccess`; `sitemap.php` and sitemap files.

### Direct competitor/tool page samples fetched 2026-10-02

- [JSONFormatter.org](https://www.jsonformatter.org/)
- [JSONLint](https://jsonlint.com/)
- [Diffchecker Text Compare](https://www.diffchecker.com/text-compare/)
- [Smallpdf PDF to Word](https://smallpdf.com/pdf-to-word)
- [Adobe PDF to Word](https://www.adobe.com/acrobat/online/pdf-to-word.html)
- [iLovePDF PDF to Word](https://www.ilovepdf.com/pdf_to_word)
- [iLovePDF tools homepage](https://www.ilovepdf.com/)
- [Smallpdf tools page](https://smallpdf.com/pdf-tools)
- [EMICalculator.net](https://emicalculator.net/)
- [Calculator.net Loan Calculator](https://www.calculator.net/loan-calculator.html)
- [Calculator.net BMI Calculator](https://www.calculator.net/bmi-calculator.html)
- [CDC Adult BMI Calculator](https://www.cdc.gov/bmi/adult-calculator/index.html)
- [WordCounter](https://wordcounter.net/)
- [JWT.io Debugger](https://www.jwt.io/)
- [Base64Decode.org](https://www.base64decode.org/)
- [URLEncoder.io](https://www.urlencoder.io/)
- [Convertio](https://www.convertio.co/)
- [Online-Convert](https://www.online-convert.com/)

These competitor references were inspected for observed page structure, terminology, workflow expectations and FAQ topic patterns. Their product features, trust claims, rankings and statistics do not transfer to WordsCompare.

### Search-data limits

Google SERP request hit a JS retry interstitial; Brave returned 429; Bing RSS retrieval was inconsistent and was not treated as a reliable ranking dataset. DataForSEO and Search Console/Bing Webmaster credentials/tools were not available. Search volume, keyword difficulty, trend, rank positions, PAA presence, local market and geography are **not measured**. Terms not directly corroborated by readable competitor pages are marked candidate/hypothesis in the JSON. Manual live SERP validation is required before implementation.
