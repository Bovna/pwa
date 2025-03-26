<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Borna Vukovac">
    <meta name="description" content="Formula">
    <meta name="keywords" content="Formula">
    <title>Formula</title>
</head>
<body>
    <?php
        $A = $_POST['a'];
        $B = $_POST['b'];
        $C = (3*$A - $B) / 2;
        echo '        
        <div>
            <h3>Unesene vrijednosti: </h3>
            <p>a = '.$A.'</p>
            <p>b = '.$B.'</p>
            <h2>Izracun formule: c = (3a – b) / 2 = '.$C.'</h2>
        </div>';
    ?>
</body>
</html>