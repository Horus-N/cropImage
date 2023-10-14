

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./node_modules/cropperjs/dist/cropper.min.css">
    <style>
        #cropButton{
            padding: 5px 10px;
            border: 1px solid #ccc;
            display: inline-block;
            background-color: aqua;
            margin-top: 10px;
        }

        #cropButton:hover{
            cursor: pointer;
        }
    </style>

	<title>Document</title>
</head>
<body>
	<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["image"])) {
    $targetDir = "./";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "Image uploaded successfully.";
        echo '<img src="' . $targetFile . '" id="uploadedImage">';
        echo '<div id="cropButton">Crop</div>';
    } else {
        echo "Error uploading image.";
    }
}
?>
</body>
<script src="./node_modules/cropperjs/dist/cropper.min.js"></script>
<script src="./script.js"></script>
</html>