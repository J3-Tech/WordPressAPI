<?php

require_once __DIR__.'/../vendor/autoload.php';

$test = new WPApi\Theme();
$response = $test->slug('cognize');

print_r($response);