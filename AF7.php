<?php
include "AF6_diccionary.php";

if (!isset($diccionary) || count($diccionary) < 10) {
    echo "<p>Error: El diccionario no está definido correctamente o tiene menos de 10 palabras.</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $randomWords = array_rand($diccionary, 10);
} else {
    $randomWords = array_map('trim', explode(',', $_POST['hiddenWords']));
}

function normalizeText($text)
{
    $text = mb_strtolower($text, 'UTF-8');
    $text = str_replace(
        ['á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'],
        ['a', 'e', 'i', 'o', 'u', 'n', 'a', 'e', 'i', 'o', 'u', 'n'],
        $text
    );
    return $text;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <p> Introduce la traducción que consideres correcta: </p> <br>

        <?php
        foreach ($randomWords as $index => $word) {
            echo "<label>$word</label>";
            echo "<input type='text' name='word$index'> <br>";
        }

        echo "<input type='hidden' name='hiddenWords' value='" . implode(",", $randomWords) . "'>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $valids = 0;
            $faults = 0;

            foreach ($randomWords as $index => $englishWord) {
                $input_word = normalizeText(trim($_POST["word$index"]));
                $correct_translation = normalizeText(trim($diccionary[$englishWord]));

                if ($input_word === $correct_translation) {
                    $valids++;
                } else {
                    $faults++;
                }
            }
            echo "<p> Palabras correctas: $valids</p>";
            echo "<p> Palabras incorrectas: $faults</p>";
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>