<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<h2>Liste des utilisateurs</h2>
<form action="supprimer.php" method="get">
<table>
    <tr>
    <th>login</th>
    <th>password</th>
    </tr>
<?php
$db = array(
    "host" => "localhost",
    "user" => "root",
    "dbmp" => "root",
    "dbnom" => "bts"
);
$con = new PdO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbnom'], $db['user'], $db['dbmp']);

$sql = "SELECT login, mp FROM user";
$result = $con->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $result->fetch()) : ?>
        
    <tr>
    <td><?php echo htmlspecialchars($row['login']) ?></td>
    <td><?php echo htmlspecialchars($row['mp']) ?></td>
    <td><a href='supprimer.php?user=<?php echo htmlspecialchars($row['login']) ?>'>supprimer</a></td>
    </tr>
   
<?php endwhile; ?> 
</table></form><br>
<a href="inscription.php"><input type="button" value="insciption"></a>
</body>
</html>