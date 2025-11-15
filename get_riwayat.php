<?php
require 'config.php';

header('Content-Type: application/json');

// Untuk testing, hardcode user_id = 1
// Dalam implementasi nyata, gunakan session user_id
$userId = 1;

if ($userId) {
    $stmt = $pdo->prepare("SELECT * FROM riwayat_konsultasi 
                          WHERE user_id = ? 
                          ORDER BY consultation_date DESC");
    $stmt->execute([$userId]);
    $riwayat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($riwayat);
} else {
    echo json_encode([]);
}
?>