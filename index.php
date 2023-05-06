<?php
// index.php

// Include the settings.php file
require_once 'settings.php';

// Create a connection to the MySQL database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Your other PHP code goes here

// Close the database connection
$conn->close();
