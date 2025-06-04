<?php
// Simple PDO database connection used by the API scripts

$dsn = 'mysql:host=localhost;dbname=vocabcart;charset=utf8mb4';
$db_user = 'root';
$db_pass = '';

try {
    $pdo = new PDO(
        $dsn,
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die('DB connection failed');
}
?>
