<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Borna Vukovac">
    <meta name="description" content="Pokušaj pogoditi broj">
    <meta name="keywords" content="pogodi, broj">
    <title>Pogodi broj</title>

    <style>
        .rezultat {
            width: 200px;
            height: 40px;
            border-radius: 10px;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

</head>
<body>
    <h2>Igra (pogodi broj)</h2>
    <form action="" method="post">
        <p style="font-weight: bold;"><label for="broj">Upiši jedan broj od 1 do 10: </label>
        <input type="number" id=broj name=broj required autofocus min=1 max=10
        value = "<?php if (isset($_POST['broj'])) { echo $_POST['broj']; } ?>"></p>
    </form>

    <?php
        if (isset($_POST['broj'])) {
            $broj = $_POST['broj'];
            $random = rand(1, 10);

            if ($broj == $random) {
                echo '
                <div class="rezultat" style="background-color: green;">
                    <h4>Pogodak, probaj ponovo!</h4>
                </div>';
            } else {
                echo '
                <div class="rezultat" style="background-color: red;">
                    <h4>Krivo, probaj ponovo!</h4>
                </div>';
            }

            echo '<p>Zamišljeni broj je: '.$random.'</p>';
        }
    ?>

</body>
</html>