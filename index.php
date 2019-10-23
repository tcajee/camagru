<?php


$pdo = new Dbh;
$pdo->connect();


# PRDO QUERY
$stmt = $pdo->query('SELECT * FROM tab');
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
  echo $row->title . '<br>';
}
