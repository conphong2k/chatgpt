<?php
// API endpoint to retrieve cards for a vocabulary set

session_start();
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

require_login_json();

$set_id = $_GET['set_id'] ?? $_POST['set_id'] ?? null;

if (!$set_id) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing set_id']);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT id, term, definition FROM cards WHERE set_id = ? ORDER BY id');
    $stmt->execute([$set_id]);
    $cards = $stmt->fetchAll();
    echo json_encode(['status' => 'success', 'data' => $cards]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}
?>
