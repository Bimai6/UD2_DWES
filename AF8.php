<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function setCuadrado($n) {
        return $n * $n;
    }

    function setCubo($n) {
        return $n * $n * $n;
    }

    $dato = array_map(function() { return rand(0, 100); }, range(1, 12));

    $cuadrado = array_map("setCuadrado", $dato);
    $cubo = array_map("setCubo", $dato);
    ?>

    <h2>Tabla con números, sus cuadrados, y cubos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Datos</th>
                <th>Cuadrados</th>
                <th>Cubos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dato as $index => $value) {
                echo "<tr>";
                echo "<td>$value</td>";
                echo "<td>$cuadrado[$index]</td>";
                echo "<td>$cubo[$index]</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>