<?php
session_start();
require 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil data dari POST
    $patientName   = $_POST['patientName'] ?? '';
    $patientGender = $_POST['patientGender'] ?? '';
    $patientAge    = $_POST['patientAge'] ?? '';
    $gejala        = $_POST['gejala'] ?? '';
    $penyakit      = $_POST['penyakit'] ?? '';
    $nilai         = $_POST['nilai'] ?? 0;
    
    // Ambil user_id dari session LOGIN
    $userId = $_SESSION['user_id'] ?? null;

    // Jika user belum login
    if (!$userId) {
        echo json_encode([
            'success' => false,
            'error' => 'User not logged in'
        ]);
        exit;
    }

    try {
        // Ambil solusi berdasarkan penyakit
        $solutionText = getSolutionText($penyakit);

        // Query INSERT
        $stmt = $pdo->prepare("
            INSERT INTO riwayat_konsultasi 
            (user_id, patient_name, patient_gender, patient_age, selected_symptoms, diagnosis_result, solution_text) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        // Eksekusi query
        $stmt->execute([
            $userId,
            $patientName,
            $patientGender,
            $patientAge,
            $gejala,
            $penyakit,
            $solutionText
        ]);

        echo json_encode([
            'success' => true,
            'id' => $pdo->lastInsertId()
        ]);

    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }
}

// Fungsi untuk solusi penyakit
function getSolutionText($penyakit) {
    $solutions = [
        "Otitis Eksterna (Radang Telinga Luar)" => "Hindari air masuk ke telinga, jangan mengorek telinga, dan gunakan obat tetes telinga yang diresepkan dokter.",
        "Otitis Media (Infeksi Telinga Tengah)" => "Konsumsi antibiotik sesuai resep dokter, kompres hangat, dan hindari mengorek telinga.",
        "Tinnitus atau Vertigo" => "Konsultasi dengan dokter THT untuk pemeriksaan lebih lanjut, hindari kebisingan, dan kelola stres.",
        "Infeksi Saluran Napas atas yang berdampak ke telinga" => "Istirahat yang cukup, minum air putih, dan konsumsi obat pereda gejala sesuai anjuran dokter.",
        "Kolesteatoma" => "Silahkan anda melakukan pembedahan untuk mengangkat kista",
        "Tidak terdeteksi penyakit tertentu" => "Pertahankan kebersihan telinga dan hindari kebiasaan mengorek telinga."
    ];

    return $solutions[$penyakit] ?? "Konsultasikan dengan dokter THT untuk penanganan lebih lanjut.";
}
?>
