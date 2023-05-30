<?php
// File to be downloaded
$filePath = 'uploads/filename.ext'; // Replace with the actual file path

// Check if the file exists
if (file_exists($filePath)) {
    // Set appropriate headers for the download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));
    readfile($filePath); // Output the file content for download
    exit;
} else {
    echo 'File not found.';
}
?>
