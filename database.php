<?php

// class Dbh {

// private $hostname;
// private $username;
// private $password;
// private $dbname;
// private $charset;

// public function connect() {

//     $this->hostname = "localhost";
//     $this->username = "root";
//     $this->password = "1234567";
//     $this->dbname = "test";
//     $this->charset = "utf8mb4";

//     try {

//         $dsn = "mysql:host=".$this->hostname.";dbname=".$this->dbname=";charset=".$this->charset;
//         $pdo = new PDO($dsn, $this->username, $this->password);
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         return $pdo;

//     } catch (PDOException $e) {
//         echo "Connection to database failed: ".$e->getMessage();
//     }
// }



$hostname =  'localhost';
$username = 'root';
$password = '1234567';
$dbname = 'test';
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
$stmt = $pdo->query('SELECT * FROM tab');
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
  echo $row->title . '<br>';
}
