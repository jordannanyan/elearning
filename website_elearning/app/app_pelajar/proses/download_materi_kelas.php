<?php
include('../../config/configurasi.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id='$id'");
$view = mysqli_fetch_array($query);
// File to be downloaded
$pdfFile = "../../../" . $view['materi']; // Concatenate the file path correctly

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $pdfFile . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($pdfFile);
