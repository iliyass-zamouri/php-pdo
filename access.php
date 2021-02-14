<html>
  <body>
  <h2>Se connecter</h2>
  <form action="" method="POST">
  <table><tr>
  <td><label for="login">Login:</label></td>
  <td><input type="text" name="login"></td>
  </tr><tr>
  <td><label for="mp">Mot de passe:</label></td>
  <td><input type="text" name="mp"></td>
  </tr><tr>
  <td><input type="submit" name="submit"></td>
  </tr>
  </table>  
    </form>

    <?php
   if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $mp = $_POST['mp'];
    
    $db = array(
        "host" => "localhost",
        "user" => "root",
        "dbmp" => "root",
        "dbnom" => "bts"
    ); 
    
    $con = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbnom'], $db['user'], $db['dbmp']);
    $sql = "SELECT * FROM user";

    if(empty($login) === true || empty($mp) === true){
        echo 'login et mot de passe sont nécessaire';
    } else {
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $users = $stmt->fetchAll();

        foreach($users as $user){
    if($user['login'] == $login && $user['mp'] == $mp)
    {
        header("Location: liste.php"); 
        exit;
    }
}
}
   }
    ?>

  </body>
</html>