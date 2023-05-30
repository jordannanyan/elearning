<?php
    include('../../config/configurasi.php');
    $id =  $_GET['id'];

    
    try {
        $query = mysqli_query($koneksi,"DELETE FROM tb_kelas_pelajar WHERE id='$id'");
        header('Location: ../index.php?h=kelas&msg=3');
    
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