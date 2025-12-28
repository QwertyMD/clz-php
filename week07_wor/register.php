<link rel="stylesheet" href="style.css">

<form action="register.php" method="POST">
    <label for="id">ID:</label>
    <input type="text" name="id" required>
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Register</button>
</form>

<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST['id'];
    $full_name = $_POST['name'];
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO students (student_id, full_name, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $student_id, $full_name, $password_hash);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>