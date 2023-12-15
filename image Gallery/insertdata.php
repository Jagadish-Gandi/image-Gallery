<?php
include 'connect.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image = $_FILES['image']['name']; // Assuming you've uploaded an image file

    // Prepare the SQL statement
    $sql = 'INSERT INTO practise(name, image) VALUES (?, ?)';
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, 'ss', $name, $image);

    if (mysqli_stmt_execute($stmt)) {
        // Data inserted successfully
        echo '<div class="echo">Data inserted successfully</div>';
        echo '<div id="redirectMessage">You will be redirected to the gallery in <span id="number"></span> seconds.if click on cancel button means it stops the redirecting 
        <a href="#" id="cancelRedirect">Cancel</a></div>';
        echo '<script>
            var redirectTimer = setTimeout(function() {
                window.location.href = "index.php";
            }, 5000); // 5000 milliseconds = 5 seconds
    
            document.getElementById("cancelRedirect").addEventListener("click", function(event) {
                clearTimeout(redirectTimer); // Cancel the redirect
                document.getElementById("redirectMessage").style.display = "none"; // Hide the message
                event.preventDefault(); // Prevent default link behavior
            });
        </script>';
    } else {
        // Error in insertion
        echo 'Error: ' . mysqli_error($conn);
    }
    

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image insert</title>
</head>
<body>

<script>
var number = document.getElementById('number');
  function fn() {
    var i = 0;
    function updateNumber() {
      number.innerHTML = i;
      i++;
      if (i <= 5) {
        setTimeout(updateNumber, 500); // Update every 1 second
      }
    }
    updateNumber(); // Start the updating process
  }
  setTimeout(fn, 500); // Start after 1 second
</script>

    
</body>
</html>
