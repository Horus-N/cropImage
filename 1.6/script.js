// Include cropper.js and create a cropper instance
var d=document.getElementById('uploadedImage');
console.log(d);
var cropper = new Cropper(d, {
    viewMode: 0,
    aspectRatio: 0,
    crop: function (event) {
        // Handle cropping events if needed
    }
});

// Add event listener for the "Crop" button
document.getElementById('cropButton').addEventListener('click', function () {
    // Crop the image
    cropper.getCroppedCanvas().toBlob(function (blob) {
        var formData = new FormData();
        formData.append('croppedImage', blob, 'crop_' + Date.now() + '.png');
        
        // Send the cropped image data to the server
        fetch('save-cropped-image.php', {
            method: 'POST',
            body: formData
        }).then(function (response) {
            // Change button text to "Download"
            document.getElementById('cropButton').innerHTML = 'Download';
        });
    }, 'image/png');
});
