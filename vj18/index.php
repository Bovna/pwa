
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>SQL NAREDBE</title>
  </head>
  <style>
	body { margin: 10px;}
    ul { list-style-type:none;}
	h1 { font-size:24px; }
    h2 { margin-top:30px; font-size:18px; }
  </style>
<body>
<div class="container">
	<h1>SELECT korisnika &rsaquo; DML </h1>
    <h2>Forma za pretraživanje</h2>
    <form action="index.php" method="post">
        <label style="width:125px;" for="ime">Ime korisnika:</label>
        <input type="text" id="ime" name="ime"><br>
        <label style="width:125px;" for="prezime">Prezime korisnika:</label>
        <input type="text" id="prezime" name="prezime"><br>
        <input type="submit" name="pretraga" value="Pretraga">
    </form>
	<?php 
    $MySQL = mysqli_connect("127.0.0.1", "root", "", "bazabv") or die('Error connecting to MySQL server.');

    print '<h2>Users</h2>
        <ul>
            <li><a href="index.php?menu=1">SELECT ALL</a></li>
            <li><a href="index.php?menu=2">SELECT ALL &rsaquo; ORDER DESC firstname</a></li>
            <li><a href="index.php?menu=3">SELECT ALL &rsaquo; ORDER ASC lastname</a></li>
            <li><a href="index.php?menu=4">SELECT &rsaquo; WHERE lastname Doe</a></li>
            <li><a href="index.php?menu=5">SELECT &rsaquo; LIMIT 10</a></li>
            <li><a href="index.php?menu=6">SELECT &rsaquo; COMBINE ORDER ASC lastname AND LIMIT 15</a></li>
        </ul>
        <hr style="border-bottom:1px solid grey">';

        if (isset($_POST['pretraga'])) {
            $ime = $_POST["ime"];
            $prezime = $_POST["prezime"];
            $query  = "SELECT * 
                FROM users 
                JOIN countries ON users.user_country_code = countries.country_code WHERE user_firstname LIKE '%$ime%' AND user_lastname LIKE '%$prezime%'";
        } else {
            if (!isset($_GET['menu']) || $_GET['menu'] == 1) {
                $query  = "SELECT users.*, countries.country_name 
                FROM users 
                JOIN countries ON users.user_country_code = countries.country_code";
     
            }
            else if ($_GET['menu'] == 2) {
                $query  = "SELECT * 
                FROM users 
                JOIN countries ON users.user_country_code = countries.country_code ORDER BY user_firstname DESC";
            }
            else if ($_GET['menu'] == 3) {
                $query  = "SELECT * 
                FROM users 
                JOIN countries ON users.user_country_code = countries.country_code ORDER BY user_lastname ASC";
            }
            else if ($_GET['menu'] == 4) {
                $query  = "SELECT * 
                FROM users 
                JOIN countries ON users.user_country_code = countries.country_code WHERE user_lastname='Doe'";
            }
            else if ($_GET['menu'] == 5) {
                $query  = "SELECT * 
                FROM users 
                JOIN countries ON users.user_country_code = countries.country_code LIMIT 10";
            }
            else if ($_GET['menu'] == 6) {
                $query  = "SELECT * 
                FROM users 
                JOIN countries ON users.user_country_code = countries.country_code ORDER BY user_lastname ASC LIMIT 15";
            }
        }

        $result = @mysqli_query($MySQL, $query);
        while($row = @mysqli_fetch_array($result)) {
            print "<p><i class='bi bi-person'></i> " 
            . $row['user_firstname'] . " <span style='color:green'>" 
            . $row['user_lastname'] . " 
            (" . $row['country_name'] . ") <a href='edit.php?id=" . $row['id'] . "'>Edit</a></span></p>";
        }
	
	 ?>
</div>
</body>
</html>
