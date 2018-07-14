<?php

$bot = require_once __DIR__ . '/../bootstrap/bot.php';

$servername = "localhost";
$username = "hiddent6_admin";
$password = "OJqB2rvVR~W-";
$dbname = "hiddent6_burger_bot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_ids = array();

$sql = "SELECT user_id FROM `hiddent6_burger_bot`.`tbl_sessions` WHERE TIMESTAMPDIFF(MINUTE,`updated_at`,NOW()) > 30";
$result = $conn->query($sql);

$sql = "DELETE FROM `hiddent6_burger_bot`.`tbl_sessions` WHERE TIMESTAMPDIFF(MINUTE,`updated_at`,NOW()) > 30";

if ($conn->query($sql) === TRUE) {
    foreach ($result as $row) {
    	$sql = "UPDATE `hiddent6_burger_bot`.`bot_leads` SET _wait = NULL WHERE user_id = '". $row['user_id'] ."'";
    	$conn->query($sql);
    	
		$bot->subscription->create([
		    'content'       => 'Your interaction with the bot has expired.',
		    'to_lead'    => $row['user_id'],
		    'send_limit'    => 999
		])->send();
	}
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
