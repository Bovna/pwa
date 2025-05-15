<?php
$MySQL = mysqli_connect("127.0.0.1", "root", "", "bazabv") or die('Error connecting to MySQL server.');

$id = $_GET['id'];

$user_query = "SELECT * FROM users WHERE id = $id";
$user_result = mysqli_query($MySQL, $user_query);
$user = mysqli_fetch_assoc($user_result);

$country_query = "SELECT * FROM countries ORDER BY country_name ASC";
$country_result = mysqli_query($MySQL, $country_query);

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['country_code'])) {
    $firstname =  $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country_code = $_POST['country_code'];

    $update_query = "
        UPDATE users SET 
            user_firstname = '$firstname',
            user_lastname = '$lastname',
            user_country_code = '$country_code'
        WHERE id = $id";

    if (mysqli_query($MySQL, $update_query)) {
        echo "<h2>User ažuriran uspješno. <a href='index.php'>Nazad</a><h2>";
        $user_result = mysqli_query($MySQL, $user_query);
        $user = mysqli_fetch_array($user_result);
    } else {
        echo "Greška pri ažuriranju korisnika.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
</head>
<body>
    <h1>Edit</h1>
    <form method="post">
        <label for="firstname">Ime:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo ($user['user_firstname']); ?>" required><br><br>

        <label for="lastname">Prezime:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo ($user['user_lastname']); ?>" required><br><br>

        <label for="country_code">Država:</label>
        <select id="country_code" name="country_code" required>
            <?php while ($row = mysqli_fetch_array($country_result)) {
                $selected = ($row['country_code'] == $user['users_country_code']) ? "selected" : "";
                echo "<option value='{$row['country_code']}' $selected>{$row['country_name']}</option>";
            } ?>
        </select><br><br>

        <button type="submit">Edit</button><br><br>
        <a href="index.php">Nazad</a>
    </form>
</body>
</html>
