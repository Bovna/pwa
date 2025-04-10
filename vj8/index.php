<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Borna Vukovac">
    <meta name="description" content="Radio button odabir auta">
    <meta name="keywords" content="auto">
    <title>Odabir auta</title>

    <style>
        body{
            font-family: Verdana, Tahoma, sans-serif;
            margin-left: 20px;
        }
        ul {
            list-style-type: none;
        }
        .gumb {
            width: 100px;
            height: 40px;
            background-color: purple;
            color: white;
            font-weight: bold;
            font-size: medium;
            border-radius: 5px;
            border-color: blue;
            margin-bottom: 5px;
        }
    </style>

</head>
<body>

    <form action="" method="POST">
        <?php
            $cars = array("Audi", "BMW", "Renault", "Citroen");
            echo "<p>Označi vozilo:</p><ul>";
                foreach ($cars as $car) {
                echo "<li><input type='radio' name='auto' value='$car' required>$car</li>";
                }
            echo "</ul>";
        ?>
        <input class="gumb" type="submit" value="Odaberi">

        <?php
            if (isset($_POST["auto"])) {
                $odabrani = $_POST["auto"];
                echo "<br><h3>Odabrali ste vozilo: $odabrani</h3>";
            }
        ?>

    </form>

</body>
</html>