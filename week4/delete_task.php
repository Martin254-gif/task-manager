<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "test_db");
mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
mysqli_close($conn);
header("Location: dashboard.php");
?>