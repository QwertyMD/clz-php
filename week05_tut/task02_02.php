<?php
$fruits = "apple,banana,orange,grape";
$fruits_array = explode(",", $fruits);
foreach ($fruits_array as $fruit) {
    echo $fruit . "<br>";
}
$fruits_joined = implode(" | ", $fruits_array);
echo "<br>" . $fruits_joined;
