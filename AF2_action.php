<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $array = $_POST['num'];

    if (is_numeric($array[0]) && is_numeric($array[1]) && is_numeric($array[2]) && is_numeric($array[3])) {
        $suma = $array[0] + $array[2];
        $resta= $array[1] - $array[3];
        $arrayInverso = array_reverse($array);

        $arrayInversoString = implode(',', $arrayInverso);

        header("Location: AF2.php?suma=$suma&resta=$resta&arrayInversoString=$arrayInversoString");
        exit(); 
    } else {
        header('Location: AF2.php?error=Por favor, realice el formulario introduciendo parámetros válidos');
        exit();
    }
}else{
    header("Location: AF2.php?error=Por favor, realice el formulario");
    exit();
}
?>