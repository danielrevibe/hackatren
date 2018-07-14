<?php

ini_set('max_execution_time', 0); 
ini_set('memory_limit', '-1');

date_default_timezone_set("Asia/Manila");


$bot = require_once __DIR__ . '/../bootstrap/bot.php';

$start = microtime(true);

// LISTENERS


$end = microtime(true) - $start;

echo "<br/>Script Execution Lapse: " . $end . " secs. <br/>";

// Print some message to the browser when done
dd('Nodes seeded!');