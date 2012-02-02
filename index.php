<?php
/**
 * Test script for GeSHi N3 SPARQL extension
 */

include_once("geshi/geshi.php");
$source = file_get_contents("test.sparql");//"test.xml");
$language = "n3";//"xml";

$geshi = new GeSHi($source, $language);

echo $geshi->parse_code();

?>