<p>Welcome</p>
<a href="logout.php">Logout</a>

<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>