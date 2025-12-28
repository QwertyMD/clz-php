<link rel="stylesheet" href="style.css">

<form action="login.php" method="POST">
    <label for="id">ID:</label>
    <input type="text" name="id" required>
    <label for="password">Password:</label>
    <input type="text" name="password" required>
    <button type="submit">Login</button>
</form>

<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST['id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password_hash FROM students WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $stmt->bind_result($password_hash);
    if ($stmt->fetch() && password_verify($password, $password_hash)) {
        session_start();
        $_SESSION['logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . "Invalid Credentials";
    }

    $stmt->close();
    $conn->close();
}
?>