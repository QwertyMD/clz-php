<?php
$file = fopen("note.txt", "w");
fwrite($file, "Hello, World!\n");
fwrite($file, "This is a test file.\n");
fclose($file);
