<?php
  function initDb(){
    $DB_DSN = 'mysql:dbname=camagru;host=localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = 'root';
    try {
      $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      $DB_DSN = 'mysql:host=localhost;';
      try {
        $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo 'Connection failed to localhost: ' . $e->getMessage();
        return null;
      }
      return null;
    }
    return $db;
  }
?>
