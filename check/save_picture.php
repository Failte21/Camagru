<?php
  if (!isset($_SESSION))
    session_start();
  if (isset($_POST['img']) && isset($_POST['frame']) && isset($_SESSION['logged_user'])){
    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',
      htmlentities($_POST['img'])));
    $img = imagecreatefrompng("../img/frames/".htmlentities($_POST['frame']).".png");
    list($width, $height) = getimagesize("../img/frames/".$_POST['frame'].".png");
    $base = imagecreatefromstring($data);
    imagealphablending($img, false);
    imagesavealpha($img, true);
    imagecopymerge_alpha($base, $img, 0, 0,
      0, 0, $width, $height, 100);
    imagepng($base, "../img/tmp.png");
    pictureToDb();
  }

  function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
  	$w = imagesx($src_im);
  	$h = imagesy($src_im);
  	$cut = imagecreatetruecolor($src_w, $src_h);

  	imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);

  	imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
  	imagecopymerge($dst_im, $cut, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct);
  }

  function pictureToDb(){
    include("init_db.php");
    $path = '../tmp.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $base = file_get_contents("../img/tmp.png");
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($base);
    if ($db = initdB()){
      $query = $db->prepare('INSERT INTO picture(login_user, img) VALUES(:login_user, :img)');
      $query->execute(array(':login_user' => $_SESSION['logged_user'], ':img' => $base64));
      unlink("../img/tmp.png");
    }
  }
?>
