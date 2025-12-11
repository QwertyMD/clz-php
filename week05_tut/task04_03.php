<?php
try {
    $a = 10;
    $b = 0;
    if ($b == 0) {
        throw new Exception("Division by zero error");
    }
    $result = $a / $b;
} catch (Exception $e) {
    echo "Custom error message: " . $e->getMessage();
}
