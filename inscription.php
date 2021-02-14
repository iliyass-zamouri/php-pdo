<html><body>
<h2>Inscription</h2>
<form action="" method="post">
<table>
<tr>
<td><label for="login">Login:</label></td>
<td> <input type="text" name="login"></td>
</tr>
<tr>
<td><label for="mp">Mot de passe:</label></td>
<td><input type="text" name="mp"></td>
</tr>
<tr><td><input type="submit" name="submit"></td></tr>
</table> 
    <?php
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $mp = $_POST['mp'];
    if (empty($login) === true || empty($mp) === true) {
        echo 'login et mot de passe est nécessaire';
    } else {
        $db = array(
            "host" => "localhost",
            "user" => "root",
            "dbmp" => "root",
            "dbnom" => "bts"
        );
            $con = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbnom'], $db['user'], $db['dbmp']);
            $sql = "INSERT INTO user (login, mp) VALUES ('" . $login . "', '" . $mp . "')";
            $con->exec($sql);
            header("Location: liste.php");
    exit;
    }
}
?>
</form>

</body></html>
