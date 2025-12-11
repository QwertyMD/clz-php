<?php
$name = "John Doe";
$email = "john@example.com";
$message = "Hello there!";

$name = htmlspecialchars(trim($name));
$email = htmlspecialchars(trim($email));
$message = htmlspecialchars(trim($message));

$timestamp = date('Y-m-d H:i:s');
$data = $name . ',' . $email . ',' . $message . ',' . $timestamp . "\n";

file_put_contents('contacts.csv', $data, FILE_APPEND);

$contacts = [];
if (($handle = fopen('contacts.csv', 'r')) !== false) {
    while (($row = fgetcsv($handle, 1000, ',')) !== false) {
        $contacts[] = $row;
    }
    fclose($handle);
}

echo '<table border="1">';
echo '<tr><th>Name</th><th>Email</th><th>Message</th><th>Timestamp</th></tr>';
foreach ($contacts as $contact) {
    echo '<tr>';
    foreach ($contact as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
