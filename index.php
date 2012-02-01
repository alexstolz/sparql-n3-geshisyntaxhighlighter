<?php
include_once("geshi/geshi.php");
$source = file_get_contents("test.xml");
$language = "xml";//"sparql";

$geshi = new GeSHi($source, $language);

echo $geshi->parse_code();

?>