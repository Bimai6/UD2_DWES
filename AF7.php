<?php
session_start(); // Iniciar la sesión al principio del archivo

// Verificar si el diccionario está incluido
include "AF6_diccionary.php"; // Asegúrate de que este archivo contenga el diccionario correctamente

// Verificar si el diccionario está definido y tiene suficientes palabras
if (!isset($diccionary) || count($diccionary) < 10) {
    echo "<p>Error: El diccionario no está definido correctamente o tiene menos de 10 palabras.</p>";
    exit;
}

// Si se envió el formulario, almacenar las palabras en la sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['randomWords'])) {
        $_SESSION['randomWords'] = array_rand($diccionary, 10);
    }
} else {
    // Si no se envió el formulario, eliminar la sesión para generar nuevas palabras
    unset($_SESSION['randomWords']);
}

// Guardar las palabras aleatorias en una variable
$randomWords = $_SESSION['randomWords'] ?? array_rand($diccionary, 10); // Generar nuevas palabras si no hay en la sesión

// Función para normalizar el texto (eliminar acentos y convertir a minúsculas)
function normalizeText($text) {
    // Convertir a minúsculas
    $text = mb_strtolower($text, 'UTF-8');
    
    // Eliminar acentos
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
        <?php
        // Mostrar las palabras en inglés (las claves) y los campos de entrada para las traducciones
        echo "<p> Introduce la traducción que consideres correcta: </p> <br>";
        foreach ($randomWords as $index => $word) {
            echo "<label>$word</label>";
            echo "<input type='text' name='word$index'> <br>";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Inicializar variables para las respuestas correctas e incorrectas
            $valids = 0;
            $faults = 0;

            // Comprobar si las palabras introducidas coinciden con las traducciones del diccionario
            foreach ($randomWords as $index => $englishWord) {
                // Recoger la palabra ingresada por el usuario y normalizarla
                $input_word = normalizeText(trim($_POST["word$index"])); 
                // Obtener la traducción correcta del diccionario y normalizarla
                $correct_translation = normalizeText(trim($diccionary[$englishWord])); 

                // Debug: Mostrar las comparaciones
                echo "Comparando '$input_word' con '$correct_translation'<br>"; // Para ver qué se está comparando

                // Comparar directamente las traducciones ingresadas con las correctas
                if ($input_word === $correct_translation) {
                    $valids++;
                } else {
                    $faults++;
                }
            }

            // Mostrar el resultado
            echo "<p> Palabras correctas: " . $valids . "</p>";
            echo "<p> Palabras incorrectas: " . $faults . "</p>";
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>