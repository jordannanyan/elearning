<?php
$koneksi = new PDO("mysql:host=localhost;dbname=db_epahari", "root", "");

$id = $_POST['id']; // Assuming you have an input field for the ID of the data to be edited
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

$updateQuery = "UPDATE tb_admin SET nama = :nama, username = :username, password = :password WHERE id = :id";
$stmt = $koneksi->prepare($updateQuery);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nama', $nama);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

header("Location: ../index.php?h=pengajar&msg=2");
exit();