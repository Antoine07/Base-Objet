<?php

$a = ["foo" => "bar", 1 => 82];
$c = &$a[1];

xdebug_debug_zval('c');