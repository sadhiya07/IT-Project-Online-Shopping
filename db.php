<?php
$dsn = 'mysql:host=localhost;dbname=project';
$username = 'root';
$password = '12345';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
}
