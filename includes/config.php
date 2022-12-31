<?php

// Store the connection details in variables
$host = "localhost";
$dbname = "track_calories";
$username = "root";
$password = "";

// Use the sprintf() function to construct the DSN string
$dsn = sprintf('mysql:host=%s;dbname=%s', $host, $dbname);

// Connect to the database
try {
    $conn = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>