<?php
require 'header.php';
?>

<main>
    <h2>View Students</h2>
    <?php
    if (file_exists('students.txt')) {
        $lines = file('students.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines) {
            echo '<ul>';
            foreach ($lines as $line) {
                $student = json_decode($line, true);
                if ($student) {
                    echo '<li>';
                    echo '<strong>Name:</strong> ' . htmlspecialchars($student['name']) . '<br>';
                    echo '<strong>Email:</strong> ' . htmlspecialchars($student['email']) . '<br>';
                    echo '<strong>Skills:</strong> ' . implode(', ', array_map('htmlspecialchars', $student['skills']));
                    echo '</li><br>';
                }
            }
            echo '</ul>';
        } else {
            echo '<p>No students found.</p>';
        }
    } else {
        echo '<p>No students file exists yet.</p>';
    }
    ?>
</main>

<?php
require 'footer.php';
?>