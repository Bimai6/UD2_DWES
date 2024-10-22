<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Suma y resta cambiando el orden</h2>
    <form action="AF2_action.php" method="POST">
        <label for="num">Introduce el primer número: </label>
        <input type="number" name="num[]"> <br> <br>
        <label for="num">Introduce el segundo número: </label>
        <input type="number" name="num[]"> <br> <br>
        <label for="num">Introduce el tercer número: </label>
        <input type="number" name="num[]"> <br> <br>
        <label for="num">Introduce el cuarto número: </label>
        <input type="number" name="num[]"> <br> <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if(isset($_GET['suma']) && isset($_GET['resta'])){
        echo "<p> Los números en orden inverso son: "
        . htmlspecialchars($_GET['arrayInversoString'])
        . "<br> <br> La suma del primer y el tercer número es: " . htmlspecialchars($_GET['suma']) 
        . "<br> <br> La resta del segundo y el cuarto número es: " . htmlspecialchars($_GET['resta']) . "</p>";
    };

    if(isset($_GET['error'])){
        echo "<p style='color: red'> " . htmlspecialchars($_GET['error']) . "</p>";
    };
    ?>
</body>
</html>