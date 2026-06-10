<?php
$connection = mysqli_connect("localhost", "root", "");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "✅ Successfully connected to MySQL server!";
mysqli_close($connection);
?>