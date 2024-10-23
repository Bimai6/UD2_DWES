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
        $diccionary = array(
            'Love' => 'Amor',
            'Friend' => 'Amigo',
            'Sun' => 'Sol',
            'Moon' => 'Luna',
            'Star' => 'Estrella',
            'Tree' => 'Árbol',
            'Water' => 'Agua',
            'Fire' => 'Fuego',
            'Earth' => 'Tierra',
            'Sky' => 'Cielo',
            'Dream' => 'Sueño',
            'Life' => 'Vida',
            'Death' => 'Muerte',
            'Peace' => 'Paz',
            'War' => 'Guerra',
            'Light' => 'Luz',
            'Shadow' => 'Sombra',
            'Hope' => 'Esperanza',
            'Fear' => 'Miedo',
            'Bird' => 'Pájaro',
            'Mountain' => 'Montaña',
            'Ocean' => 'Océano',
            'Rain' => 'Lluvia',
            'Wind' => 'Viento',
            'Smile' => 'Sonrisa',
            'Heart' => 'Corazón',
            'Flower' => 'Flor',
            'Snow' => 'Nieve',
            'Stone' => 'Piedra',
            'Freedom' => 'Libertad'
        );

        $englishWords = array_keys($diccionary);
        $wordsAvailable = implode(',', $englishWords);

        echo "<p> Las palabras disponibles son: </p>";
        echo "<p> { $wordsAvailable } </p>";
        
        if (!isset($_POST['word'])) {
            echo "<p> Por favor, introduzca una palabra </p>";
        } else {
            $word= $_POST['word'];
            $anyMatch= false;
            foreach ($englishWords as $value) {
                if($word === $value){
                    $anyMatch = true;
                    break;
                }
            }

            if($anyMatch){
                $spanishWord = array_search($word, $diccionary);
                echo "<p> La palabra en español es : $spanishWord </p>";
            }else{
                echo "<p> Por favor, introduzca una de las palabras disponibles </p>";
            }
        }
        ?>
        <label for="word">Introduce una palabra: </label>
        <input type="text" name="word"> <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>