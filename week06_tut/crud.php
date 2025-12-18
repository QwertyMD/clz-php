<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'school_db';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Handle Add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['name'], $_POST['email'], $_POST['course']);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle Edit (fetch data)
$editStudent = null;
if (isset($_GET['edit'])) {
    $stmt = $conn->prepare("SELECT * FROM students WHERE id=?");
    $stmt->bind_param("i", $_GET['edit']);
    $stmt->execute();
    $result = $stmt->get_result();
    $editStudent = $result->fetch_assoc();
    $stmt->close();
}

// Handle Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
    $stmt->bind_param("sssi", $_POST['name'], $_POST['email'], $_POST['course'], $_POST['id']);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch all students for display
$students = [];
$result = $conn->query("SELECT * FROM students");
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}
