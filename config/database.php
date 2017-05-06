<?php
$DB_DSN = 'mysql:host=localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';

try {
  $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $content = file_get_contents("database.sql");
  $array = explode(";", $content);
  $nb = count($array) - 1;
  unset($array[$nb]);
  if ($db){
    foreach($array as $elem)
    {
      $qu = trim($elem) . ";";
      $db->prepare($qu)->execute();
    }}
}catch (PDOException $e) {
  echo 'Connection failed : ' . $e->getMessage();
}

 ?>
