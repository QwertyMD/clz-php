<?php
$string = "Full Stack Development with PHP";
echo "Length: " . strlen($string);
echo "<br>";
echo "Word Count: " . str_word_count($string);
echo "<br>";
echo "Reverse: " . strrev($string);
echo "<br>";
echo "Position of 'PHP': " . strpos($string, "PHP");
echo "<br>";
echo "Replace 'PHP' with 'JavaScript': " . str_replace("PHP", "JavaScript", $string);
