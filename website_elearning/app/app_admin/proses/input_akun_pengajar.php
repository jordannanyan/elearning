<?php
$koneksi = new PDO("mysql:host=localhost;dbname=db_epahari", "root", "");

$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$username = $_POST['username'];
$password = $_POST['password'];

// Check if a file was uploaded successfully
// Check if a file was uploaded successfully
if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['profile-pic'];

    // Accessing file information
    $fileName = $file['name']; // Original name of the file
    $fileSize = $file['size']; // Size of the file in bytes
    $fileType = $file['type']; // MIME type of the file

    // Define allowed file formats
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $allowedMimeTypes = ['image/jpeg', 'image/png'];

    // Get the file extension and MIME type of the uploaded file
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Validate the file format
    if (in_array($fileExtension, $allowedExtensions) && in_array($fileType, $allowedMimeTypes)) {
        // File format is valid, proceed with file upload and database update

        // Specify the destination directory to store the uploaded file
        $uploadDir = 'assets/profile-pic/';

        // Generate a unique filename to avoid overwriting existing files
        $fileName = uniqid() . '_' . $file['name'];
        $destination = $uploadDir . $fileName;

        // Move the uploaded file to the specified destination
        if (move_uploaded_file($file['tmp_name'], "../../../$destination")) {
            // Update the data in the database
            $insertQuery = "INSERT INTO tb_pengajar (nama, jurusan, username, password, foto) VALUES (:nama, :jurusan, :username, :password, :foto)";
            $stmt = $koneksi->prepare($insertQuery);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':jurusan', $jurusan);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':foto', $destination);
            $stmt->execute();
    
            header("Location: ../index.php?h=pengajar&msg=1");
            exit();
            // Perform additional operations if needed
        } else {
            echo 'Failed to move the uploaded file.';
        }

    } else {
        echo 'Invalid file format. Only JPG, JPEG, and PNG files are allowed.';
    }
} else {
    echo 'Error occurred during file upload.';
}
