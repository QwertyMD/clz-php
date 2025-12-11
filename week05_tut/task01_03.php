<?php
$globalVar = "I am global";

function testLocalScope()
{
    echo $globalVar;
}

function testGlobalScope()
{
    global $globalVar;
    echo $globalVar;
}

testLocalScope();
echo "<br>";
testGlobalScope();
