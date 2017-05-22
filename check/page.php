<?php
if ($db = initDb()){
  $query = $db->query('SELECT COUNT(*) AS total FROM picture');
  $total = $query->fetchAll();
  $imagePerPage = 6;
  $nbPage = ceil($total[0]['total'] / $imagePerPage);
  if (isset($_GET['page'])){
    $page = htmlentities($_GET['page']);
    $current = intval($page);

    if ($current > $nbPage){
      $current = 1;
    }
  }
  else{
    $current = 1;
  }
  $first = ($current-1) * $imagePerPage;
}
 ?>
