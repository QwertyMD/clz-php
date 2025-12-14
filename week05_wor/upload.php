<?php
require 'header.php';

// Custom function
function uploadPortfolioFile($file)
{
    $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    if (!in_array($file['type'], $allowedTypes)) {
        throw new Exception('Invalid file type. Only PDF, JPG, PNG allowed.');
    }
    if ($file['size'] > $maxSize) {
        throw new Exception('File size exceeds 2MB.');
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = 'portfolio_' . time() . '_' . rand(1000, 9999) . '.' . $extension;
    $targetPath = 'uploads/' . $newName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new Exception('Failed to upload file.');
    }

    return $newName;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (!isset($_FILES['portfolio'])) {
            throw new Exception('No file uploaded.');
        }
        $uploadedFile = uploadPortfolioFile($_FILES['portfolio']);
        $message = 'File uploaded successfully: ' . htmlspecialchars($uploadedFile);
    } catch (Exception $e) {
        $message = 'Error: ' . $e->getMessage();
    }
}
?>

<main>
    <h2>Upload Portfolio File</h2>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <label for="portfolio">Select file (PDF, JPG, PNG, max 2MB):</label>
        <input type="file" id="portfolio" name="portfolio" accept=".pdf,.jpg,.png" required><br><br>
        <button type="submit">Upload</button>
    </form>
</main>

<?php
require 'footer.php';
?>