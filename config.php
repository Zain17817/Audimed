<?php
$host = 'db.fr-pari1.bengt.wasmernet.com';
$dbname = 'niki_db';
$port = '10272';
$username = 'e4aff1c07c1d8000ba67608f5cf1';
$password = '0691e4af-f1c0-7e00-8000-181e95479614';

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



