<?php

require_once '../vendor/autoload.php';

$test = new WPApi\Plugin();
$o =$test->slug('wordpress-seo');

print_r($o);