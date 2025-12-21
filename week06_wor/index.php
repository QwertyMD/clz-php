<link rel="stylesheet" href="style.css">

<?php
require_once 'db.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';
$query = "SELECT * FROM books";
if (!empty($category)) {
  $query .= " WHERE category LIKE '%" . $conn->real_escape_string($category) . "%'";
}
?>

<form action="add_book.php" method="post">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" required />

  <label for="author">Author:</label>
  <input type="text" name="author" id="author" required />

  <label for="category">Category:</label>
  <input type="text" name="category" id="category" required />

  <label for="quantity">Quantity:</label>
  <input type="number" name="quantity" id="quantity" required />

  <button>Add Book</button>
</form>

<form action="" method="get">
  <label for="search_category">Search by Category:</label>
  <input type="text" name="category" id="search_category" value="<?php echo htmlspecialchars($category); ?>" />
  <button type="submit">Search</button>
</form>

<?php
$result = $conn->query($query);
if ($result->num_rows > 0) {
?>
  <table border='1'>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Author</th>
      <th>Category</th>
      <th>Quantity</th>
      <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['book_id']; ?></td>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['author']); ?></td>
        <td><?php echo htmlspecialchars($row['category']); ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td>
          <a href='edit_book.php?id=<?php echo $row['book_id']; ?>'>Edit</a>
          <form action='delete_book.php' method='post' style='display:inline;'>
            <input type='hidden' name='id' value='<?php echo $row['book_id']; ?>'>
            <button type='submit'>Delete</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>
<?php
} else {
  echo "<p>No books found.</p>";
}
?>

<?php
$conn->close();
?>