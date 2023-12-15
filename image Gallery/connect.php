<?php
$lh = 'localhost:3306';
$un = 'root';
$psw = '';
$dbName = 'blog';

// Create connection
$conn = mysqli_connect($lh, $un, $psw,$dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>