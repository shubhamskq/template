<?php
$string = "Hello, World!";
$index = 0; // Change this index to the position of the character you want to display

if ($index >= 0 && $index < strlen($string)) {
    $character = $string[$index];
    echo $character;
} else {
    echo "Index out of range";
}
?>
