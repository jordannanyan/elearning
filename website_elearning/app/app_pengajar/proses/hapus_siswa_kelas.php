<?php
$koneksi = mysqli_connect('localhost','root','','db_epahari');
$id_kelas = $_GET['id_kelas'];
$id_pelajar = $_GET['id_pelajar'];



try {
    $query = mysqli_query($koneksi, "DELETE FROM tb_kelas_pelajar WHERE id_pelajar='$id_pelajar' and id_kelas='$id_kelas'");
    $oldFilePath = "../../../" . $view['video'];

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