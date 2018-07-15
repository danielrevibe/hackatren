<?php

// To start of we need the gigaai messenger bot to run this.
$bot = require_once __DIR__ . '/../bootstrap/bot.php';

// Started microtime counting.
$start = microtime(true);

  echo "<h1>Seeders</h1><hr>";
  echo "<ol>";
	// Default nodes to be seeded.
	$bot->tren->defaults($bot);

	// Payload nodes to be seeded.
	$bot->tren->payloads($bot);

	// Intended action nodes to be seeded.
	$bot->tren->intended_actions($bot);
  echo "</ol>";

// Print some message to the browser when done
dd('SCRIPT EXECUTION LAPSE: ' . (microtime(true) - $start) . " SECS.");
