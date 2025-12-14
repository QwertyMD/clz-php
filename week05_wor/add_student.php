<?php
require 'header.php';

// Custom functions
function formatName($name)
{
    return ucwords(strtolower(trim($name)));
}

function validateEmail($email)
{
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string)
{
    return array_map('trim', explode(',', trim($string)));
}

function saveStudent($name, $email, $skillsArray)
{
    $data = json_encode([
        'name' => $name,
        'email' => $email,
        'skills' => $skillsArray
    ]) . PHP_EOL;
    file_put_contents('students.txt', $data, FILE_APPEND);
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $skills = $_POST['skills'] ?? '';

        if (empty($name) || empty($email) || empty($skills)) {
            throw new Exception('All fields are required.');
        }

        $formattedName = formatName($name);
        if (!validateEmail($email)) {
            throw new Exception('Invalid email address.');
        }
        $skillsArray = cleanSkills($skills);

        saveStudent($formattedName, $email, $skillsArray);
        $message = 'Student information saved successfully.';
    } catch (Exception $e) {
        $message = 'Error: ' . $e->getMessage();
    }
}
?>

<main>
    <h2>Add Student Info</h2>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="skills">Skills (comma-separated):</label>
        <input type="text" id="skills" name="skills" required><br><br>

        <button type="submit">Add Student</button>
    </form>
</main>

<?php
require 'footer.php';
?>