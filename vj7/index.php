<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Borna Vukovac">
    <meta name="description" content="Računanje prosjeka ocjena kolokvija">
    <meta name="keywords" content="ocjena, prosjek, kolokvij">
    <link rel="stylesheet" href="style.css">
    <title>Prosjek ocjena</title>

</head>
<body>
    
    <div class="container">
        <h1>Izračun ocjene iz kolokvija</h1>
        <form action="" method="post">
            <div class="unos">
                <label for="kol1">Ocjena I. kolokvija: </label>
                <input type="number" id=kol1 name=kol1 required min=1 max=5>
            </div>
            <div class="unos">
                <label for="kol2">Ocjena II. kolokvija: </label>
                <input type="number" id=kol2 name=kol2 required min=1 max=5>
            </div>
            <div class="unos">
                <input id="gumb" type="submit" value="Izračunaj">
            </div>
        </form>
    </div>

    <?php
        if (isset($_POST['kol1']) && isset($_POST['kol2'])) {
            $ocjene = array($_POST['kol1'],$_POST['kol2']); 
            $prosjek = ($ocjene[0] + $ocjene[1])/2;

            if ($ocjene[0] == 1 && $ocjene[1] == 1) {
                echo'<div class="container">
                    <p class="pad">Oba kolokvija su negativna i zbog toga je zaključna ocjena 1.</p>
                </div>';
            }
            elseif ($ocjene[0] == 1) {
                echo'<div class="container">
                    <p class="pad">Prvi kolokvij je negativan i zbog toga je zaključna ocjena 1.</p>
                </div>';
            }
            elseif ($ocjene[1] == 1) {
                echo'<div class="container">
                    <p class="pad">Drugi kolokvij je negativan i zbog toga je zaključna ocjena 1.</p>
                </div>';
            }
            else {
                echo'<div class="container">
                        <div class="prolaz">
                            <p>Ocjena I. kolokvija: '.$ocjene[0].'</p>
                            <p>Ocjena II. kolokvija: '.$ocjene[1].'</p>
                            <hr>
                            <p>Srednja ocjena iz predmeta: '.$prosjek.'</p>
                            <p>Konačna ocjena iz predmeta: '.round($prosjek).'</p>
                        </div>
                </div>';
            }
        }
    ?>

</body>
</html>