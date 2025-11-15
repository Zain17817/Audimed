<?php
$host = 'db.fr-pari1.bengt.wasmernet.com';
$dbname = 'audimed_db';
$port = '10272';
$username = '80ceb8e0795b80006aba512efdac';
$password = '069180ce-b8e0-7b07-8000-ba7e211be310';

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );

} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
