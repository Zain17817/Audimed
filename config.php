<?php
$host = 'db.fr-pari1.bengt.wasmernet.com';
$dbname = 'database_audimed';
$port = '10272';
$username = 'db4fe2b374088000a57752466248';
$password = '0691db4f-e2b3-7549-8000-d6dae71c07dd';

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

