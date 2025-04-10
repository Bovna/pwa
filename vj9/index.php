<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Borna Vukovac">
    <meta name="description" content="Radno vrijeme ducana">
    <meta name="keywords" content="ducan">
    <title>Ducan</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>

</head>
<body>
    <?php
        $vrijeme = new DateTimeImmutable();
        //$vrijeme = date_create('2025-04-14 12:38:25');
        echo "<h2>Trenutni datum i vrijeme: ". date_format($vrijeme, 'd-m-Y H:i:s') ."</h2>";
        echo "<h3>Dućan ne radi za vrijeme državnih praznika ili blagdana te nedeljom, subotom radi: 09-14, 
        prek tjedna radi: 08-20";
        function ducan($vrijeme, $stanje="otvoren") {
            $neradni = array('01-01', '06-01', '20-04', '01-05', '19-06', '22-06', '25-06', 
            '15-08', '08-10', '01-11', '25-12', '26-12');
            $sat = $vrijeme->format('H');
            if (in_array($vrijeme->format('d-m'), $neradni)) {
                $dan = "Državni praznik ili blagdan";
                $stanje = "zatvoren";
            }
            else if ($vrijeme->format('l') == "Sunday") {
                $dan = "Nedjelja";
                $stanje = "zatvoren";
            }
            else if ($vrijeme->format('l') == "Saturday" && ($sat < 9 || $sat >= 14)) {
                $dan = "Subota";
                $stanje = "zatvoren";
            }
            else if ($sat < 8 || $sat >= 20) {
                echo $sat;
                $stanje = "zatvoren";
                switch($vrijeme->format('l')) {
                    case "Monday":
                        $dan = "Ponedjeljak";
                        break;
                    case "Tuesday":
                        $dan = "Utorak";
                        break;
                    case "Wednesday":
                        $dan = "Srijeda";
                        break;
                    case "Thursday":
                        $dan = "Četvrtak";
                        break;
                    case "Friday":
                        $dan = "Petak";
                        break;
                }
            }
            if ($stanje == "otvoren") {
                echo '<h1 style="color: green;">Stanje dućana: ' . $stanje . '</h1>';
            }
            else {
                echo '<h1 style="color: red;">Stanje dućana: ' . $stanje . '</h1>';
                echo '<h2>Dan: ' .$dan. '</h2>';
                echo '<h2>Sati: ' .$sat.'</h2>';
            }
            return $stanje;
        }
        ducan($vrijeme);
    ?>

</body>
</html>