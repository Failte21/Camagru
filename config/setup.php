<?php  include('../check/init_db.php');
header("Location: ../index.php");
$db = initDb();
if ($db == null){
  include('database.php');
}
else {
  $db->exec('DROP database camagru;');
  include('database.php');
}
?>
