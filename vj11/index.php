<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Borna Vukovac">
    <meta name="description" content="Provjera da li je prost broj">
    <meta name="keywords" content="prost, broj">
    <title>Prost broj</title>
</head>

<body>
    
    <?php
        function ispis() {
            echo '<h3>Ispis svih prostih brojeva manjih od 100: </h3>';
            for ($i=2; $i<100; $i++){
                $brojac = 0;
                for ($j=2; $j<=$i/2; $j++){
                    if ($i % $j == 0){
                        $brojac++;
                        break;
                    }
                }
                if ($brojac == 0) {
                    echo $i . ' ';
                }
            }
        }
        function prost($broj, $prost="je prost") {
            for ($i = 2; $i <= $broj/2; $i++) {
                if ($broj % $i == 0) {
                    return "nije prost";
                }
            }
            return $prost;
        }

        ispis();
    ?>

    <form action="" method="POST">
        <label for="broj"><h3>Unesite broj: </h3></label>
        <input style="margin-bottom: 20px;" type="number" id="broj" name="broj" min=2 required autofocus>
        <br>
        <input type="submit" value="Provjera">
    </form>

    <?php
        if (isset($_POST["broj"])){
            $broj = $_POST["broj"];
            echo '<h2>Broj '.$broj. ' ' . prost($broj).'</h2>';
        }
    ?>

</body>
</html>