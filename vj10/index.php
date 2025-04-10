<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Borna Vukovac">
    <meta name="description" content="Brojac rijeci">
    <meta name="keywords" content="rijeci">
    <title>Broj riječi</title>
</head>

<style>
    body{
        font-family: Verdana, Tahoma, sans-serif;
        margin-left: 20px;
    }
    .ulaz{
        width: 500px;
        height: 20px;
        margin-bottom: 20px;
    }
</style>

<body>
    
    <form action="" method = "POST">
        <label for="ulazni"><h2>Ulazni niz:</h2></label>
        <input class="ulaz" type="text" id="ulazni" name="ulazni" required autofocus>
        <br>
        <input type="submit" value="Ispiši broj riječi">
    </form>

    <?php
        if (isset($_POST["ulazni"])) {
            $niz = $_POST["ulazni"];
            echo '<p>Ulazni niz: '.$niz.'</p>';
            echo '<p style="font-weight: bolder;">Sadrži ' . str_word_count($niz) . ' riječi.</p>';
        }
    ?>

</body>
</html>