<?php
$servername = "sql311.infinityfree.com"; // Replace with your hosting server's address
$username = "if0_37756437";       // Replace with your InfinityFree username
$password = "0OmnmqOHx5bFbaL";      // Replace with your hosting account password
$dbname = "if0_37756437_universite";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
