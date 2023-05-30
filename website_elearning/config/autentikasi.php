<?php
session_start(); // Start session before any output

$username = $_POST['username'];
$password = $_POST['password'];

$koneksi = mysqli_connect('localhost','root','','db_epahari');

if (isset($_GET['l'])) {
    $l = $_GET['l'];

    if ($l == 1) {

        // Protect against SQL injection by using prepared statement
        $stmt = $koneksi->prepare("SELECT * FROM tb_pelajar WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = mysqli_fetch_array($result);
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['level'] = 'Pelajar';
            $_SESSION['jurusan'] = $user['jurusan'];
            $_SESSION['foto'] = $user['foto'];
            $_SESSION['id'] = $user['id'];
            header('Location:../app/app_pelajar');
            exit(); // Exit after redirection

        } else if (empty($username) || empty($password)) {
            header('Location:../index.php?error=1');
            exit(); // Exit after redirection
        } else {
            header('Location:../index.php?error=2');
            exit(); // Exit after redirection
        }
    } elseif ($l == 2) {

        // Protect against SQL injection by using prepared statement
        $stmt = $koneksi->prepare("SELECT * FROM tb_pengajar WHERE Username = ? AND Password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = mysqli_fetch_array($result);
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['level'] = 'Pengajar';
            $_SESSION['jurusan'] = $user['jurusan'];
            $_SESSION['foto'] = $user['foto'];
            $_SESSION['id'] = $user['id'];
            header('Location:../app/app_pengajar');
            exit(); // Exit after redirection

        } else if (empty($username) || empty($password)) {
            header('Location:../index.php?error=1');
            exit(); // Exit after redirection
        } else {
            header('Location:../index.php?error=2');
            exit(); // Exit after redirection
        }
    } else {

        // Protect against SQL injection by using prepared statement
        $stmt = $koneksi->prepare("SELECT * FROM tb_admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = mysqli_fetch_array($result);
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['level'] = 'Admin';

            header('Location:../app/app_admin');
            exit(); // Exit after redirection

        } else if (empty($username) || empty($password)) {
            header('Location:../index.php?error=1');
            exit(); // Exit after redirection
        } else {
            header('Location:../index.php?error=2');
            exit(); // Exit after redirection
        }
    }
}

?>