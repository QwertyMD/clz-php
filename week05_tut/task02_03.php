<?php
$userInput = "<script>alert('hack');</script> Welcome";

$safeOutput = htmlspecialchars($userInput);

echo "Original input: " . $userInput . "<br>";
echo "Safe output: " . $safeOutput . "<br><br>";

$trimInput = " Hello World ";
$trimmedOutput = trim($trimInput);

echo "Before trim: '" . $trimInput . "'<br>";
echo "After trim: '" . $trimmedOutput . "'<br>";
?>