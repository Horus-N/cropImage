<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["croppedImage"])) {
    $targetDir = "./";
    $targetFile = $targetDir . $_FILES["croppedImage"]["name"];
    
    if (move_uploaded_file($_FILES["croppedImage"]["tmp_name"], $targetFile)) {
        // Handle success, for example, you can provide a download link
        echo 'Cropped image saved successfully. <a href="' . $targetFile . '" download>Download</a>';
    } else {
        echo "Error saving cropped image.";
    }
}
?>
