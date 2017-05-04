<?php
session_start();
include("init_db.php");
$rawData = $_POST['post'];
$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $rawData));
$img = imagecreatefrompng("../img/".$_POST['frame'].".png");
$size = getimagesize("../img/".$_SESSION['ob']."");
list($width, $height) = getimagesize("../img/".$_POST['frame'].".png");
$base = imagecreatefromstring($data);
imagealphablending($img, false);
imagesavealpha($img, true);
imagecopymerge_alpha($base, $img, 320 - $width / 2, 240 - $height / 2,
  0, 0, $width, $height, 100);
imagepng($base, "../img/tmp.png");
$path = '../tmp.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$base = file_get_contents("../img/tmp.png");
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($base);
// unlink("../img/tmp.png");

if ($db = initdB())
  $query = $db->prepare('INSERT INTO picture(login_user, img) VALUES(:login_user, :img)');
  $query->execute(array(':login_user' => $_SESSION['logged_user'], ':img' => $base64));

function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
	$w = imagesx($src_im);
	$h = imagesy($src_im);

	// creating a cut resource
	$cut = imagecreatetruecolor($src_w, $src_h);

	// copying that section of the background to the cut
	imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);

	// placing the watermark now
	imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
	imagecopymerge($dst_im, $cut, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct);
}
?>
