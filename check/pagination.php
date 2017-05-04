<?php
if ($db = initDb()){
  $query = $db->query('SELECT COUNT(*) AS total FROM picture');
  $total = $query->fetchAll();
  $imageParPage = 6;
  $nombreDePage = ceil($total[0]['total'] / $imageParPage);
  if (isset($_GET['page'])){
    $pageActuelle = intval($_GET['page']);
    if ($pageActuelle > $nombreDePage){
      $pageActuelle = $nombreDePage;
    }
  }
  else{
    $pageActuelle = 1;
  }
  $premiereEntree = ($pageActuelle-1) * $imageParPage;
}
 ?>
