<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2></h2>
    <form method="GET">
        <label for="number1">Introduce el primer número: </label>
        <input type="number" name="number1"> <br> <br>
        <label for="number2">Introduce el segundo número: </label>
        <input type="number" name="number2"> <br> <br>
        <input type="submit" value="Enviar">

        <?php
        include "AF1_action.php";
        
        
        ?>
    </form>
</body>
</html>