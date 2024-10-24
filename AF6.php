<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Diccionario inglés-español</h1>
    <form method="POST">
        <?php
        include "AF6_diccionary.php";

        $englishWords = array_keys($diccionary);
        $wordsAvailable = implode(', ', $englishWords);

        echo "<p> Las palabras disponibles son: </p>";
        echo "<p style='color: blue'> { $wordsAvailable } </p>";
        ?>
        <label for="word">Introduce una palabra: </label>
        <input type="text" name="word"> <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['word'])) {
            echo "<p style='color: red'> Por favor, introduzca una palabra. </p>";
        } else {
            $word = strtolower($_POST['word']);
            $capitalLetter = strtoupper($word[0]);
            $word = $capitalLetter . substr($word, 1);

            $anyMatch = false;
            foreach ($englishWords as $value) {
                if ($word === $value) {
                    $anyMatch = true;
                    break;
                }
            }

            if ($anyMatch) {
                $spanishWord = $diccionary[$word];
                echo "<p> La palabra en español es : $spanishWord </p>";
            } else {
                echo "<p style='color: red'> Por favor, introduzca una de las palabras disponibles. </p>";
            }
        }
    }


    ?>
</body>

</html>