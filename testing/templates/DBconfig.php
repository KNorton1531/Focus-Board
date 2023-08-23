<?php

// Live Details
// $host = 'sql212.infinityfree.com';
// $db   = 'if0_34709976_focus_board';
// $user = 'if0_34709976';
// $pass = 'zs9Q8FIOu57';
// $charset = 'utf8mb4';

// Local Details
$host = 'localhost';
$db   = 'focus_board';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>

