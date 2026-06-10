<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "test_db");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];
    $sql = "UPDATE tasks SET task_name='$task_name', due_date='$due_date', status='$status' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: dashboard.php");
    exit;
}

// Fetch current task data
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id=$id");
$row = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <style>
        body { font-family: Arial; margin: 50px; }
        input, select, button { padding: 8px; margin: 5px; width: 250px; }
        button { background-color: orange; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Edit Task</h2>
    <form method="post">
        Task Name: <input type="text" name="task_name" value="<?php echo $row['task_name']; ?>" required><br>
        Due Date: <input type="date" name="due_date" value="<?php echo $row['due_date']; ?>"><br>
        Status: 
        <select name="status">
            <option value="pending" <?php if($row['status']=='pending') echo 'selected'; ?>>Pending</option>
            <option value="completed" <?php if($row['status']=='completed') echo 'selected'; ?>>Completed</option>
        </select><br>
        <button type="submit">Update Task</button>
    </form>
    <br>
    <a href="dashboard.php">← Back to Dashboard</a>
</body>
</html>