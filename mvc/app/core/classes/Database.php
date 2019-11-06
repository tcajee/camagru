<?php
class Database {
    
  public static $DB_DSN = 'mysql:hostname=127.0.0.1;dbname=camagru';
  public static $DB_USER = 'root';
  public static $DB_PASSWORD = '';
  
  // public static $dbname = "test";

  private static function connect() {
    
    // $pdo = new PDO("mysql:hostname=".self::$hostname.";dbname=".self::$dbname, self::$username, self::$password);
    
    $pdo = new PDO(self::$DB_DSN, self::$DB_USER, self::$DB_PASSWORD);
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
