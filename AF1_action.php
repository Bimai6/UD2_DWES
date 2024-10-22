<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $num1 = $_GET['number1'];
    $num2 = $_GET['number2'];

    if (is_numeric($num1) && is_numeric($num2)) {
        $suma = $num1 + $num2;
        $rutaOrigen= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'defaultPage.php';
        $rutaOrigenConParams= $rutaOrigen . (strpos($rutaOrigen, '?') === false ? '?' : '&') . "suma=$suma";
        header("Location: $rutaOrigenConParams");
        exit(); 
    } else {
        header('Location: AF1.php?error=Por favor, realice el formulario introduciendo parámetros válidos');
        exit();
    }
}else{
    header("Location: AF1.php?error=Por favor, realice el formulario");
    exit();
}

?>