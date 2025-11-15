<?php
session_start();
require 'config.php';

header('Content-Type: application/json');

$userId = 1; // sementara hardcode

try {
    $stmt = $pdo->prepare("SELECT * FROM riwayat_konsultasi WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$userId]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'data' => $data]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
