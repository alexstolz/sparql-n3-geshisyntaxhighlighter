<?php
include_once("geshi/geshi.php");
$source = file_get_contents("test.sparql");
$language = "sparql";

$geshi = new GeSHi($source, $language);

echo $geshi->parse_code();

?>