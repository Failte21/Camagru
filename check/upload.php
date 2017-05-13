<?php
  header("Location: ../index.php");
  function checkContentType($extensions, $file){
    if (in_array($file['type'], $extensions)){
      $verif = getimagesize($file['tmp_name']);
      foreach ($extensions as $key => $value) {
        if ($verif['mime'] == $value){
          return ($key);
        }
      }
    }
    return null;
  }

  session_start();
  $dossier = '/camagru/upload/';
  $fichier = basename($_FILES['fileToUpload']['name']);
  $taille_maxi = 100000000000000000;
  $taille = filesize($_FILES['fileToUpload']['tmp_name']);
  $extensions = array('.png' => 'image/png', '.gif' => 'image/gif',
    '.jpeg' =>'image/jpeg');

  if($_FILES["fileToUpload"]["error"]){
    $_SESSION['uploadError'] = 'The file is too big';
  }else if (!($extension = checkContentType($extensions, $_FILES['fileToUpload']))){
    $_SESSION['uploadError'] = 'The file must be a gif, jpeg or png';
  }else{
     $str = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
     file_put_contents("../img/uploads/tmp".$extension, $str);
     $_SESSION["image"] = $extension;
   }
?>
