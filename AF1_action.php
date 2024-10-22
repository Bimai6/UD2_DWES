<?php
$rutaOrigen = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ' ';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $num1 = $_GET['number1'];
    $num2 = $_GET['number2'];

    if (is_numeric($num1) && is_numeric($num2)) {
        $suma = $num1 + $num2;
        header("Location: " . strtok($rutaOrigen, '?') . "?suma=" . urlencode($suma));
        exit();
    } else {
        header("Location: " . strtok($rutaOrigen, '?') . "?error=" . urlencode("Por favor, introduzca los parámetros válidos"));
        exit();
    }
} else {
    header("Location: " . strtok($rutaOrigen, '?') . "?error=" . urlencode("Por favor, realice el formulario"));
    exit();
}

?>