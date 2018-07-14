<?php

$bot = require_once __DIR__ . '/../bootstrap/bot.php';

$bot->subscription->create([
    'content'       => '',
    'to_channel'    => 1,
    'unique_id'     => '',
    'send_limit'    => 1
])->send();

// Done. Print message to the browser
dd('Notification sent!');