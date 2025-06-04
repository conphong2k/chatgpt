<?php
// API endpoint to add a vocabulary card

session_start();
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

require_login_json();

$set_id = isset($_POST['set_id']) ? (int)$_POST['set_id'] : 0;
$term = trim($_POST['term'] ?? '');
$definition = trim($_POST['definition'] ?? '');

if ($set_id <= 0 || $term === '' || $definition === '') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    exit;
}

try {
    $stmt = $pdo->prepare(
        'INSERT INTO cards (set_id, term, definition, user_id) VALUES (?, ?, ?, ?)'
    );
    $stmt->execute([$set_id, $term, $definition, $_SESSION['user_id']]);

    echo json_encode(['status' => 'success', 'id' => $pdo->lastInsertId()]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}
?>
