<?php
$host = 'localhost';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected to MySQL server successfully.";

$sql = "CREATE DATABASE IF NOT EXISTS library_db";
if (!$conn->query($sql)) {
    die("Database creation failed: " . $conn->error);
}

$conn->select_db('library_db');

$sql = "CREATE TABLE IF NOT EXISTS books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150),
    author VARCHAR(100),
    category VARCHAR(50),
    quantity INT
)";

if (!$conn->query($sql)) {
    die("Table creation failed: " . $conn->error);
}

$result = $conn->query("SELECT COUNT(*) as count FROM books");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $conn->query("INSERT INTO books (title, author, category, quantity) VALUES
        ('The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 5),
        ('1984', 'George Orwell', 'Dystopian', 8),
        ('To Kill a Mockingbird', 'Harper Lee', 'Classic', 7),
        ('A Brief History of Time', 'Stephen Hawking', 'Science', 4),
        ('The Art of War', 'Sun Tzu', 'Philosophy', 6)
    ");
    // echo "Inserted 5 books.";
} else {
    // echo "Table already has data.";
}

// echo "Setup complete.";
