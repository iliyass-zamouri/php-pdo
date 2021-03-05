<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            color: aliceblue;
            background-color: black;
        }
    </style>
    <title>Connexion</title>
</head>
<body>
<form method="POST">
    <label for="login">Email
        <input name="login" type="text" >
    </label>
    <label for="password">Email
        <input name="password" type="text" >
    </label>
    <input type="submit" name="submit">
    <?php
    if (isset($_POST['submit'])){
        $login = $_POST['login'];
        $mp =  $_POST['password'];
        if(empty($_POST['login']) || empty($_POST['password'])){
            $message1 = "Veuillez remplir les champs manquats azaml";
            echo "<script type='text/javascript'>alert('$message1');</script>";
        } else {
            $con = new PDO('mysql:host=localhost;dbname=formation','root','root');

            $result= $con-> prepare ("Select * from user where login=? and password=?");
            $result ->execute(array($login,$mp));
            if($result){
                echo "<script type='text/javascript'>alert('Valide');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Non valide');</script>";
            }
        }
    }
    ?>
</form>
</body>
</html>