<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Borna Vukovac">
    <meta name="description" content="Jednostavan kalkulator">
    <meta name="keywords" content="kalulator">
    <title>Kalkulator</title>

    <style>
        .operacije {
            width: 40px;
            height: 40px;
            border-radius: 5px;
            background-color: wheat;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
            font-size: larger;
        }
    </style>

</head>
<body>

    <?php

        if (isset($_POST["operator"])) {
            $op = $_POST["operator"];
            $prvi = $_POST["prvi"];
            $drugi = $_POST["drugi"];

            switch ($op) {
                case "+":
                    $rez = $prvi + $drugi;
                    break;
                case "-":
                    $rez = $prvi - $drugi;
                    break;
                case "*":
                    $rez = $prvi * $drugi;
                    break;
                case "/":
                    if ($drugi != 0) {
                        $rez = $prvi / $drugi;
                    } else {
                        $rez = "Dijeljenje s nulom nije dopušteno!";
                    }
                    break;
            }
        }
    ?>

    <h2>Kalkulator (switch naredba)</h2>
    <form action="" method="post">
        <p style="font-weight: bold;"><label for="prvi">Upiši prvi broj: </label><input type="number" id=prvi name=prvi required></p>
        <p style="font-weight: bold;"><label for="drugi">Upiši drugi broj: </label><input type="number" id=drugi name=drugi required></p>
        <h3>Rezultat:   
            <?php
                if (isset($rez)) {
                        echo "$prvi $op $drugi = $rez";
                    }
            ?>
        </h3>
        <div style="display: flex;">
            <input class="operacije" type="submit" name="operator" value="+">
            <input class="operacije" type="submit" name="operator" value="-">
            <input class="operacije" type="submit" name="operator" value="*">
            <input class="operacije" type="submit" name="operator" value="/">
        </div>
    </form>

</body>
</html>