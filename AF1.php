<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Suma sencilla</h2>
    <form action="AF1_action.php" method="GET">
        <label for="number1">Introduce el primer número: </label>
        <input type="number" name="number1"> <br> <br>
        <label for="number2">Introduce el segundo número: </label>
        <input type="number" name="number2"> <br> <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if(isset($_GET['suma'])){
        echo "<p> El resultado es " . htmlspecialchars($_GET['suma']) . "</p>";
    };

    if(isset($_GET['error'])){
        echo "<p style='color: red'> " . htmlspecialchars($_GET['error']) . "</p>";
    };
    ?>
</body>
</html>