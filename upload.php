<?php
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["file"]["name"]);
$response = array("success" => false, "error" => "");

// Check if the uploads directory exists, if not create it
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// Check if file is uploaded without errors
if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        $response["success"] = true;
    } else {
        $response["error"] = "File could not be uploaded.";
    }
} else {
    $response["error"] = "Error uploading file.";
}

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
