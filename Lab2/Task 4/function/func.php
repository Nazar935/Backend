<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['equal'])) {
    $x = $_POST['x'] ?? '';
    $y = $_POST['y'] ?? '';
}

function power($x, $y) : string {
    return pow($x, $y);
}

function factorial($x) : string {
    if ($x === 0 || $x === 1) {
        return 1;
    } else {
        return $x * factorial($x - 1);
    }
}

function myTG($x) : string {
    return tan($x);
}

function funcSin($x) : string {
    return sin($x);
}

function funcCos($x) : string {
    return cos($x);
}

function tg($x) : string {
    return tan($x);
}