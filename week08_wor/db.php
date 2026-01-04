<?php
$host = 'localhost';
$user = 'root';
$pass = '';

// Connect to MySQL server
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected to MySQL server successfully.<br>";

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS school_db";
if (!$conn->query($sql)) {
    die("Database creation failed: " . $conn->error);
}

// Select the database
$conn->select_db('school_db');

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    course VARCHAR(100)
)";
if (!$conn->query($sql)) {
    die("Table creation failed: " . $conn->error);
}

// Insert 5 students if table is empty
$result = $conn->query("SELECT COUNT(*) as count FROM students");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $conn->query("INSERT INTO students (name, email, course) VALUES
        ('Alice Johnson', 'alice@example.com', 'Mathematics'),
        ('Bob Smith', 'bob@example.com', 'Physics'),
        ('Carol Lee', 'carol@example.com', 'Chemistry'),
        ('David Kim', 'david@example.com', 'Biology'),
        ('Eva Brown', 'eva@example.com', 'Computer Science')
    ");
    echo "Inserted 5 students.<br>";
} else {
    // echo "Table already has data.<br>";
}

// echo "Setup complete.";
