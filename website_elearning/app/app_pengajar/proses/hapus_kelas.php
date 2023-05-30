<?php
$koneksi = mysqli_connect('localhost','root','','db_epahari');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id='$id'");
$view = mysqli_fetch_array($query);



try {
    $query = mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id='$id'");
    $oldFilePath = "../../../" . $view['video'];
    if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
    }
    $oldFilePathpdf = "../../../" . $view['materi'];
    if (file_exists($oldFilePathpdf)) {
        unlink($oldFilePathpdf);
    }
    header('Location: ../index.php?msg=3');

} catch (mysqli_sql_exception $e) {
    // Check if the error message contains the string 'foreign key constraint'
    if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
        // Handle the error here, for example by displaying a user-friendly error message
        header('Location: ../index.php?error=2');
        echo "Unable to delete the row due to a foreign key constraint. This record is currently in use by other records and cannot be deleted.";
    } else {
        // Handle any other errors here
        echo "An error occurred: " . $e->getMessage();
    }
}

?>