<?php
$conn = mysqli_connect("localhost", "root", "", "test_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY due_date ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager Dashboard</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #3498db; color: white; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .btn-add { background-color: green; color: white; padding: 10px; display: inline-block; margin-bottom: 20px; }
        .btn-edit { background-color: orange; color: white; }
        .btn-delete { background-color: red; color: white; }
        .completed { text-decoration: line-through; color: gray; }
    </style>
</head>
<body>
    <h2>My Task Manager</h2>
    <a href="add_task.html" class="btn-add">+ Add New Task</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Task Name</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td class="<?php echo ($row['status'] == 'completed') ? 'completed' : ''; ?>">
                <?php echo $row['task_name']; ?>
            </td>
            <td><?php echo $row['due_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <a href="edit_task.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
<?php mysqli_close($conn); ?>