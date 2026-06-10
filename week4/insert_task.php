<?php
$task_name = $_POST['task_name'];
$due_date = $_POST['due_date'];
$status = $_POST['status'];

$conn = mysqli_connect("localhost", "root", "", "test_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tasks (task_name, due_date, status) VALUES ('$task_name', '$due_date', '$status')";

if (mysqli_query($conn, $sql)) {
    echo "Task added successfully!";
    header("refresh:2; url=dashboard.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>