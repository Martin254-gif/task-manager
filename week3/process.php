<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $conn = mysqli_connect("localhost", "root", "", "test_db");
    
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO users (email) VALUES ('$email')";
    
    if (mysqli_query($conn, $sql)) {
        echo "✅ Email '$email' has been successfully saved to the database.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>