<?php

namespace Minuz\Skolie\Tests;
use Minuz\Skolie\Model\Entities\Users\Teacher;

require_once __DIR__ . "/../vendor/autoload.php";





$roy = new Teacher("Roy Sollon", "EN 2322");



$roy->deployTest('3');

$tests = $roy->getModelTestFrames();

print_r($tests);