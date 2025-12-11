<?php
$file = fopen("note.txt", "r");
$content = fread($file, filesize("note.txt"));
echo $content;
fclose($file);
