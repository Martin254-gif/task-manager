<?php
$conn = mysqli_connect("localhost", "root", "");
if ($conn) {
    echo "✅ Connected to MySQL successfully.";
    mysqli_close($conn);
} else {
    echo "Connection failed.";
}
?>