<?php
if ($db = initDb()){
  $query = $db->query('SELECT COUNT(*) AS total FROM picture');
  $total = $query->fetchAll();
  $imagePerPage = 6;
  $nbPage = ceil($total[0]['total'] / $imagePerPage);
  if (isset($_GET['page'])){
    $current = intval($_GET['page']);
    if ($current > $nbPage){
      $current = $nbPage;
    }
  }
  else{
    $current = 1;
  }
  $first = ($current-1) * $imagePerPage;
}
 ?>
