<?php

define("DB_HOST", "localhost");
define("DB_POST", "3306");
define("DB_NAME", "gokform");
define("DB_USERNAME", "user");
define("DB_PASSWORD", "password");

global $conn;
$conn = false;
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT .
        ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
