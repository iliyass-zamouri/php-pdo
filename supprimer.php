<?php 
            $user=$_GET['user'];
            $db = array(
                "host" => "localhost",
                "user" => "root",
                "dbmp" => "root",
                "dbnom" => "bts"
            );
                $con = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbnom'], $db['user'], $db['dbmp']);
                $sql = "DELETE FROM user WHERE login='" . $user . "'";
                $con->exec($sql);
                header("Location: liste.php");
        exit;
?>