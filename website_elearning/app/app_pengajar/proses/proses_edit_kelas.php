<?php
$koneksi = new PDO("mysql:host=localhost;dbname=db_epahari", "root", "");

$id = $_POST['id'];
$judul = $_POST['judul'];
$jurusan = $_POST['jurusan'];
$durasi = $_POST['durasi'];
$tanggal = $_POST['tanggal'];
$deskripsi = $_POST['deskripsi'];
$video = $_POST['video_old'];
$pdf = $_POST['pdf_old'];

// Check if a file was uploaded successfully
if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['video'];

    // Accessing file information
    $fileName = $file['name']; // Original name of the file
    $fileSize = $file['size']; // Size of the file in bytes
    $fileType = $file['type']; // MIME type of the file

    // Define allowed file formats
    $allowedExtensions = ['mp4', 'mov', 'avi'];
    $allowedMimeTypes = ['video/mp4', 'video/quicktime', 'video/x-msvideo'];

    // Get the file extension and MIME type of the uploaded file
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Validate the file format
    if (in_array($fileExtension, $allowedExtensions) && in_array($fileType, $allowedMimeTypes)) {
        // File format is valid, proceed with file upload and database update

        // Specify the destination directory to store the uploaded file
        $uploadDir = 'assets/video/';

        // Generate a unique filename to avoid overwriting existing files
        $fileName = uniqid() . '_' . $file['name'];
        $destination = $uploadDir . $fileName;

        $oldFilePath = "../../../" . $video;
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }

        // Move the uploaded file to the specified destination
        if (move_uploaded_file($file['tmp_name'], "../../../$destination")) {

        } else {
            echo 'Failed to move the uploaded file.';
        }

    } else {
        echo 'Invalid file format. Only video files are allowed.';
    }
} else {
    echo 'Error occurred during file upload.';
}

// Check if PDF file was uploaded successfully
if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
    $pdfFile = $_FILES['pdf'];

    // Accessing file information
    $pdfFileName = $pdfFile['name']; // Original name of the PDF file
    $pdfFileSize = $pdfFile['size']; // Size of the PDF file in bytes
    $pdfFileType = $pdfFile['type']; // MIME type of the PDF file

    // Define allowed PDF file formats
    $allowedPdfExtensions = ['pdf'];
    $allowedPdfMimeTypes = ['application/pdf'];

    // Get the PDF file extension and MIME type of the uploaded PDF file
    $pdfFileExtension = pathinfo($pdfFileName, PATHINFO_EXTENSION);

    // Validate the PDF file format
    if (in_array($pdfFileExtension, $allowedPdfExtensions) && in_array($pdfFileType, $allowedPdfMimeTypes)) {
        // PDF file format is valid, proceed with file upload and database update

        // Specify the destination directory to store the uploaded PDF file
        $pdfUploadDir = 'assets/materi/';

        // Generate a unique filename for the PDF file to avoid overwriting existing files
        $pdfFileName = uniqid() . '_' . $pdfFile['name'];
        $pdfDestination = $pdfUploadDir . $pdfFileName;

        $oldFilePathPdf = "../../../" . $pdf;
        if (file_exists($oldFilePathPdf)) {
            unlink($oldFilePathPdf);
        }

        // Move the uploaded PDF file to the specified destination
        if (move_uploaded_file($pdfFile['tmp_name'], "../../../$pdfDestination")) {


        } else {
            echo 'Failed to move the uploaded PDF file.';
        }
    } else {
        echo 'Invalid PDF file format. Only PDF files are allowed.';
    }
} else {
    echo 'Error occurred during PDF file upload.';
}

$updateQuery = "UPDATE tb_kelas SET judul = :judul, jurusan = :jurusan, durasi = :durasi, tanggal = :tanggal, deskripsi = :deskripsi, video = :video, materi = :materi WHERE id = :id";
$stmt = $koneksi->prepare($updateQuery);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':judul', $judul);
$stmt->bindParam(':jurusan', $jurusan);
$stmt->bindParam(':durasi', $durasi);
$stmt->bindParam(':tanggal', $tanggal);
$stmt->bindParam(':deskripsi', $deskripsi);
$stmt->bindParam(':video', $destination);
$stmt->bindParam(':materi', $pdfDestination);
$stmt->execute();

header("Location: ../index.php?msg=2");
exit();
 