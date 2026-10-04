# SEO Remediation Report

Date: 2026-10-03

## 1. Changes made

Files modified in this phase:
- [api/convert-pdf-to-word.php](api/convert-pdf-to-word.php)
- [api/convertapi-proxy.php](api/convertapi-proxy.php)
- [sitemap.php](sitemap.php)
- [robots.txt](robots.txt)
- [.htaccess](.htaccess)
- [index.php](index.php)
- [views/about.php](views/about.php)
- [views/contact.php](views/contact.php)
- [views/privacy.php](views/privacy.php)
- [views/disclaimer.php](views/disclaimer.php)
- [llms.txt](llms.txt)
- [views/tools/excel-to-pdf.php](views/tools/excel-to-pdf.php)
- [views/tools/word-to-pdf.php](views/tools/word-to-pdf.php)
- [views/tools/csv-to-pdf.php](views/tools/csv-to-pdf.php)
- [views/tools/pdf-to-csv.php](views/tools/pdf-to-csv.php)
- [views/tools/pdf-to-excel.php](views/tools/pdf-to-excel.php)
- [views/tools/pdf-to-ppt.php](views/tools/pdf-to-ppt.php)

## 2. Security remediation

### Credential exposure
The hard-coded ConvertAPI secrets were removed from the browser-facing tool scripts and replaced with a server-side proxy endpoint, [api/convertapi-proxy.php](api/convertapi-proxy.php). The secret is now requested from the environment variable `CONVERTAPI_SECRET` instead of being persisted in source.

### TLS verification
The insecure TLS settings were removed from [api/convert-pdf-to-word.php](api/convert-pdf-to-word.php):
- `CURLOPT_SSL_VERIFYPEER` is no longer forced to `false`
- `CURLOPT_SSL_VERIFYHOST` is no longer forced to `false`
- the request now uses secure validation with `CURLOPT_SSL_VERIFYPEER => true` and `CURLOPT_SSL_VERIFYHOST => 2`

### StoreFile behavior
The existing `StoreFile=true` behavior was retained in the request flow because it is part of the current ConvertAPI workflow used by the application. The change in this phase was to remove secret exposure and restore secure TLS validation without altering the external processing behavior beyond what was required for safe operation.

### Secret scan result
A search was performed again for the exposed key values and direct secret-bearing browser calls. The remaining `?Secret=` occurrences are restricted to the server-side proxy and the PHP API endpoint; no browser JavaScript file retains the exposed secret values.

## 3. Sitemap remediation

### Exact changes
The sitemap generator in [sitemap.php](sitemap.php) was rewritten to produce valid XML with actual newline characters instead of literal escaped `\n` sequences.

### Final URL inclusion policy
The sitemap now includes only the intended indexable URLs:
- homepage
- informational pages
- category pages
- guide pages
- the 10 approved tool pages

The sitemap intentionally excludes:
- API endpoints
- search endpoints
- diagnostic pages
- temporary/test resources
- legacy aliases
- unregistered tool routes outside the approved set

### XML validation result
The generated sitemap was served successfully at `http://localhost/v1.0.3/sitemap.xml` with HTTP `200 OK`.

### Duplicate URL result
The sitemap generator now de-dups URLs by canonical URL before output.

### Literal `\n` result
The output no longer emits literal backslash-n sequences; it uses real newline characters in the XML response.

## 4. Robots remediation

### Final structure
The file [robots.txt](robots.txt) was consolidated into a single wildcard group with one sitemap declaration.

### Final state
- wildcard groups: 1
- sitemap declarations: 1
- key blocks retained: `/views/`, `/includes/`, `/tmp/`, `/test_pdf/`, `/vendor/`, `/api/`
- public pages remain crawlable through the standard site routes while private/internal paths remain protected

## 5. Alias remediation

Legacy aliases were redirected to the canonical text comparison tool:

- `/compare-two-text-files-online` -> `/text-comparison`
- `/compare-text-line-by-line` -> `/text-comparison`
- `/compare-json-files-online` -> `/text-comparison`
- `/compare-xml-files-online` -> `/text-comparison`
- `/compare-html-files-online` -> `/text-comparison`
- `/compare-css-files-online` -> `/text-comparison`
- `/compare-code-files-online` -> `/text-comparison`
- `/online-text-diff-tool` -> `/text-comparison`
- `/text-difference-checker` -> `/text-comparison`
- `/compare-text-documents` -> `/text-comparison`

The canonical front-end route remains [views/tools/text-comparison.php](views/tools/text-comparison.php).

## 6. Brand and claim remediation

### Brand cleanup
The stale `Snapy Tools` references were updated in:
- [views/about.php](views/about.php)
- [views/contact.php](views/contact.php)
- [views/privacy.php](views/privacy.php)
- [views/disclaimer.php](views/disclaimer.php)

### Claim cleanup
Unsupported or overly broad language was softened in:
- [index.php](index.php)
- [llms.txt](llms.txt)

This removed unsupported `100+` and `No signup` statements while keeping language aligned with the actual architecture.

## 7. Validation

### PHP syntax
Validated successfully using the project PHP binary:
- `api/convert-pdf-to-word.php` — No syntax errors detected
- `api/convertapi-proxy.php` — No syntax errors detected
- `sitemap.php` — No syntax errors detected
- `index.php` — No syntax errors detected
- `views/about.php` — No syntax errors detected
- `views/contact.php` — No syntax errors detected
- `views/privacy.php` — No syntax errors detected
- `views/disclaimer.php` — No syntax errors detected

### Runtime route validation
Validated with live HTTP checks:
- `http://localhost/v1.0.3/` -> `200 OK`
- `http://localhost/v1.0.3/text-comparison` -> `200 OK`
- `http://localhost/v1.0.3/compare-two-text-files-online` -> `301 Moved Permanently` -> canonical redirect to `/text-comparison`
- `http://localhost/v1.0.3/sitemap.xml` -> `200 OK`

### Security scan
Searches were re-run to confirm that the exposed secret values no longer appear in browser scripts and that TLS disabling is no longer in the live server code path.

## 8. Intentionally unchanged
The following were intentionally left alone in this phase, as required by the implementation constraints:
- 59 unregistered routes
- YMYL calculators
- approved tool SEO content blocks
- category and guide content structure
- unrelated JavaScript, CSS, and PHP components

## 9. Remaining issues
No confirmed blocker remained after the remediation work in this phase.
