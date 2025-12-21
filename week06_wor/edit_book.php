<link rel="stylesheet" href="style.css">

<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM books WHERE book_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE books SET title = ?, author = ?, category = ?, quantity = ? WHERE book_id = ?");
    $stmt->bind_param("sssii", $title, $author, $category, $quantity, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}

$conn->close();
?>

<form action="edit_book.php" method="post">
    <input type="hidden" name="id" value="<?php echo $book['book_id']; ?>" />
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($book['title']); ?>" required />

    <label for="author">Author:</label>
    <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($book['author']); ?>" required />

    <label for="category">Category:</label>
    <input type="text" name="category" id="category" value="<?php echo htmlspecialchars($book['category']); ?>" required />

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="<?php echo $book['quantity']; ?>" required />

    <button>Update Book</button>
</form>