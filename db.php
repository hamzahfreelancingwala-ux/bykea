<?php
$host = 'localhost';
$dbname = 'rsoa_rsoa112_52';
$username = 'rsoa_rsoa112_52';
$password = '654321#';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
