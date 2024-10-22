<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $numbers = isset($_POST['numbers']) ? $_POST['numbers'] : '';
    $counter = substr_count($numbers, ",") + 1;
    $remainingNumber = 9 - (isset($_POST['numbers']) ? $counter : 0);
    $labelNumber = ($remainingNumber !== 1) ? 'números' : 'número';
    ?>
    <form method="POST">
        <?php
        if ($remainingNumber !== 0 && $counter < 9) {
            echo '<label for="number">' . "Introduce un número (te quedan $remainingNumber $labelNumber):" . ' </label>';
            echo '<input type="number" name="number"> <br> <br>';
            echo '<input type="submit" value="Enviar">';
        } else {
            $arrayNumbers = explode(',', $numbers);
            echo "<h3>Números ingresados:</h3>";
            echo "<pre>" . print_r($arrayNumbers, true) . "</pre>";
            echo "<h4>Proceso completado. Gracias por ingresar los números.</h4>";
            exit();
        }
        ?>
        <input type="hidden" name="numbers" value="<?php echo htmlspecialchars($numbers . ($numbers ? ',' : '') . ($_POST['number'] ?? '')); ?>">
    </form>
</body>

</html>