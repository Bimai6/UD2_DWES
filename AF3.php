<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formulario Básico</h2>
    <form method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre"> <br> <br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos"> <br> <br>
        <label for="dni">Dni: </label>
        <input type="text" name="dni"> <br> <br>
        <label for="domicilio">Domicilio: </label>
        <input type="text" name="domicilio"> <br> <br>
        <label for="edad">Edad: </label>
        <input type="number" name="edad"> <br> <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['dni']) && !empty($_POST['domicilio']) && !empty($_POST['edad'])){
                $nombre= $_POST['nombre'];
                $apellidos= $_POST['apellidos'];
                $dni= $_POST['dni'];
                $domicilio= $_POST['domicilio'];
                $edad= $_POST['edad'];

                echo "<p> El nombre registrado es: $nombre </p> <br> <br>";
                echo "<p> Los apellidos registrados es: $apellidos </p> <br> <br>";
                echo "<p> El dni registrado es: $dni </p> <br> <br>";
                echo "<p> El domicilio registrado es: $domicilio </p> <br> <br>";
                echo "<p> La edad registrado es: $edad </p> <br> <br>";
            }else{
                echo "<p> Rellene todos los campos en el formato correcto </p>";
            }
        }
    ?>
</body>
</html>