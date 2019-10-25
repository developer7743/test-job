<?php

use App\Parameter;

$reflection = new ReflectionClass(Parameter::class);
$constants  = $reflection->getConstants();
$longopts   = array_map(function ($value) {
    return "{$value}::";
}, $constants);

return array_keys(getopt('', $longopts));
