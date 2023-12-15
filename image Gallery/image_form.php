<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="add_images_logo.png">
    <title>image Gallery form</title>
    <style>
        form{
  text-align: center;
  margin:60px 10px 40px 10px;

      }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="">
            <input type="submit" name="btn" id="" value="Send to Gallery" required>
        </form>
    </div>
</body>
<script>
    let a=document.getElementById('a');
    function change(){
        a.innerHTML='<i class="fas fa-image"></i>';
        a.href='index.php';
        a.title = 'Go to gallery';
    }
    change();
</script>
</html>

<?php
include 'connect.php';
include 'insertdata.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp']; // Accepted image types
    $image = $_FILES['image'];
    $image_temp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'img/' . $_FILES['image']['name'];
    $imageFileType = strtolower(pathinfo($image_folder, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    if (in_array($image['type'], $allowedTypes) && getimagesize($image['tmp_name'])) {
        if (move_uploaded_file($image_temp_name, $image_folder)) {
            echo '<div class="echo">Image is uploaded</div>';
        } else {
            echo 'Image is not uploaded';
        }
    } else {
        echo 'Invalid file type. Only JPEG, PNG, and GIF, webp images are allowed.';
    }
}
?>
