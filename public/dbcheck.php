<?php
require_once '../app/init.php';

$expected = getenv('HEALTH_TOKEN') ?: '';
if ($expected === '') {
    http_response_code(403);
    echo json_encode(['ok' => false, 'error' => 'HEALTH_TOKEN not set']);
    exit;
}
if (!isset($_GET['token']) || $_GET['token'] !== $expected) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'error' => 'forbidden']);
    exit;
}

header('Content-Type: application/json');
try {
    $db = new Database();
    $db->query('SELECT COUNT(*) AS c FROM users_tb');
    $row = $db->single();
    echo json_encode([
        'ok' => true,
        'db_host' => DB_HOST,
        'db_port' => DB_PORT,
        'db_name' => DB_NAME,
        'users_count' => $row['c'] ?? null
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => $e->getMessage()]);
}
