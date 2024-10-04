<?php
session_start();

if (isset($_POST['submitBtn'])) {
    // Get the values of x, y, and z from the form
    $x = $_POST['valueX'];
    $y = $_POST['valueY'];
    $z = $_POST['valueZ'];


    if ($x != 0) {
        $delta = ($y * $y) - (4 * $x * $z);
        echo $delta;
        if ($delta >= 0) {
            // Real roots (either two distinct or one repeated)
            $root1 = (-$y + sqrt($delta)) / (2 * $x);
            $root2 = (-$y - sqrt($delta)) / (2 * $x);
        }
    } else {
        echo "Invalid input: 'x' must not be zero.";
    }
}
?>