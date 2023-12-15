<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="gallery_logo.png" type="image/png">
    <title>image Gallery</title>
</head>
<body>
<?php include 'header.php'; ?>
<!-- Photo Grid -->
<div class="row">
    <?php
    include 'connect.php';

    if (isset($_POST['delete-btn']) && isset($_POST['image_id'])) {
        $image_id = $_POST['image_id'];
        // Delete the image from the database and file system
        $delete_query = "DELETE FROM practise WHERE id = $image_id";
        if (mysqli_query($conn, $delete_query)) {
            $image_path = ''; // Set the path to the image file
            // Additional code to delete the image file from the file system (uncomment and implement as needed)
            // unlink($image_path);
            echo '<script>alert("Image deleted successfully!");</script>';
        } else {
            echo '<script>alert("Failed to delete image.");</script>';
        }
    }

    $dp = mysqli_query($conn, "SELECT * FROM practise");
    if ($dp && mysqli_num_rows($dp) > 0) {
        while ($row = mysqli_fetch_assoc($dp)) {
            echo '<div class="column">';
            echo '<div class="image-container">';
            // Display image and open it in the modal when clicked
            echo '<img src="img/' . $row['image'] . '" style="width:100%" onclick="openModal(\'img/' . $row['image'] . '\')">';
            echo '<form method="POST" action="">
                    <input type="hidden" name="image_id" value="' . $row['id'] . '">
                    <div class="options">
                        <button class="delete-btn" name="delete-btn" type="submit">Delete</button>
                        <a class="view-btn" href="img/' . $row['image'] . '" target="_blank">view</a>
                    </div>
                  </form>';
            echo '</div>'; // Close image-container
            echo '</div>'; // Close column
        }
        mysqli_free_result($dp);
    } else {
        echo '<p>No products available</p>';
    }

    mysqli_close($conn);
    ?>
</div>

<!-- The Modal -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImg">
</div>

<script>
    // Function to open the modal with the clicked image
    function openModal(imgSrc) {
        document.getElementById('modalImg').src = imgSrc;
        document.getElementById('imageModal').style.display = 'block';
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('imageModal').style.display = 'none';
    }
</script>

</body>
</html>
