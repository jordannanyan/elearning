<?php

$dsn = "mysql:host=localhost;dbname=db_epahari";
$username = "root";
$password = "";

$id_pelajar = $_GET['id_pelajar'];
$id_kelas = $_GET['id_kelas'];

try {
    $koneksi = new PDO($dsn, $username, $password);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $insertQuery = "INSERT INTO tb_kelas_pelajar (id_pelajar, id_kelas) VALUES (:id_pelajar, :id_kelas)";
    $stmt = $koneksi->prepare($insertQuery);
    $stmt->bindParam(':id_pelajar', $id_pelajar, PDO::PARAM_INT);
    $stmt->bindParam(':id_kelas', $id_kelas, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../index.php?msg=1");
    exit();
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
        header('Location: ../index.php?error=3');
        echo "Unable to insert the row due to a foreign key constraint. This record is currently in use by other records and cannot be inserted.";
    } else {
        echo "An error occurred: " . $e->getMessage();
    }
}
