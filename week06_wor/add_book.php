<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO books (title, author, category, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $title, $author, $category, $quantity);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}

$conn->close();
