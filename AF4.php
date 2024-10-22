<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Suma y resultado par o impar</h2>
    <form method="GET">
        <label for="number1">Introduce el primer número: </label>
        <input type="number" name="number1"> <br> <br>
        <label for="number2">Introduce el segundo número: </label>
        <input type="number" name="number2"> <br> <br>
        <input type="submit" value="Enviar">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['number1']) && isset($_GET['number2'])) {
            include "AF1_action.php";
        }

        if(isset($_GET['suma'])){
            echo "<p> El resultado es " . htmlspecialchars($_GET['suma']) . "</p>";
            $resultado = $_GET['suma'];
            if($resultado % 2 == 0){
                echo '<p> El número ' . htmlspecialchars($resultado) . ' es par';
            }else {
                echo '<p> El número ' . htmlspecialchars($resultado) . ' es impar';
            }
        }

        if(isset($_GET['error'])){
            echo "<p style='color: red'> " . htmlspecialchars($_GET['error']) . "</p>";
        };
        ?>
    </form>
</body>

</html>