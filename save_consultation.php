<?php
session_start();
require 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patientName = $_POST['patientName'] ?? '';
    $patientGender = $_POST['patientGender'] ?? '';
    $patientAge = $_POST['patientAge'] ?? '';
    $gejala = $_POST['gejala'] ?? '';
    $penyakit = $_POST['penyakit'] ?? '';
    $nilai = $_POST['nilai'] ?? 0;
    
    // Untuk testing, hardcode user_id = 1
    // Dalam implementasi nyata, gunakan session user_id
    $userId = 1;
    
    if ($userId) {
        try {
            $solutionText = getSolutionText($penyakit);
            
            $stmt = $pdo->prepare("INSERT INTO riwayat_konsultasi 
                                  (user_id, patient_name, patient_gender, patient_age, 
                                   selected_symptoms, diagnosis_result, solution_text) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->execute([
                $userId, 
                $patientName, 
                $patientGender, 
                $patientAge,
                $gejala,
                $penyakit,
                $solutionText
            ]);
            
            echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
            
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'User not logged in']);
    }
}

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
