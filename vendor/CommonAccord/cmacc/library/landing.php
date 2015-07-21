<?php

$lib_path = LIB_PATH;

$page="ZZZ/landing.md";

$document = `perl $lib_path/parser.pl $path/$page`;

echo $document;

?>
