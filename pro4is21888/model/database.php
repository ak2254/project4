<?php
$us = 'ak2254';
$pass = "biwHLu2e1234!";
$hostname = 'sql1.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$us";
try {
    $db = new PDO($dsn, $us, $pass);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

