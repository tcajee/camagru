<?php
class Database {

  public static $hostname = "127.0.0.1";
  public static $username = "root";
  public static $password = "";
  // public static $dbname = "test";
  public static $dbname = "camagru";

  private static function connect() {
    $pdo =new PDO("mysql:hostname=".self::$hostname.";dbname=".self::$dbname, self::$username, self::$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;

  }
  public static function query($query, $params = array()) {
    $stmt = self::connect()->prepare($query);
    $stmt->execute($params);
    $data = $stmt->fetchAll();
    return $data;
  }
}
?>
