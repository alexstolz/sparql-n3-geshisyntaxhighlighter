# Installation #

Just copy the _n3.php_ file into GeSHi's syntax directory, typically located at geshi/geshi/.


# Usage #

Use the magic tag _n3_ to enable syntax highlighting for both N3 and SPARQL:
```
# N3 Syntax Highlighting
<n3>
@prefix gr: <http://purl.org/goodrelations/v1#> .
@prefix foo: <#> .

foo:offer1 a gr:Offering;
  gr:name "product offer 1"@en;
  gr:includes foo:product1 .
</n3>
```
```
# SPARQL Syntax Highlighting
<n3>
PREFIX gr: <http://purl.org/goodrelations/v1#>
PREFIX foo: <#>

SELECT ?name
WHERE {
  ?offer a gr:Offering;
    gr:name ?name;
    gr:includes foo:product1 .
}
</n3>
```