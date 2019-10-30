<?php


// $pdo = new Dbh;
// $pdo->connect();

include_once 'database.php';

$hostname =  'localhost';
$username = 'root';
$password = '123456';
$dbname = 'Camagru';

$dsn = "mysql:host=" . $hostname . ";dbname=" . $dbname;

try {
  // Create a PDO instance
  $pdo = new PDO($dsn, $username, $password);
  // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection to database failed: " . $e->getMessage();
}

  # PRDO QUERY
$sql = 'SELECT * FROM users';
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo $row["user.id"] . '<br>';
}