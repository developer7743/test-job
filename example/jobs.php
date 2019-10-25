<?php

$jobs       = require_once 'init.php';
$parameters = require_once 'params.php';

$candidate = new App\Candidate($parameters);
$marcher   = new App\Job\Matcher($candidate);

$matching = $marcher->filter($jobs);

if (!empty($matching)) {
    foreach ($matching as $job) {
        echo "{$job->getName()} matching your parameters!".PHP_EOL;
    }
} else {
    echo 'No matching jobs...'.PHP_EOL;
}
