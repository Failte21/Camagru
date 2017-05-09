<?php
  session_start();
  $dossier = '/camagru/upload/';
  $fichier = basename($_FILES['fileToUpload']['name']);
  $taille_maxi = 100000000000000000;
  $taille = filesize($_FILES['fileToUpload']['tmp_name']);
  // print_r($_FILES);
  // echo $_FILES["fileToUpload"]["error"];
  $extensions = array('.png', '.gif', '.jpg', '.jpeg');
  $extension = strrchr($_FILES['fileToUpload']['name'], '.');
  if(!in_array($extension, $extensions)){
     $error = 'Vous devez uploader un fichier de type png,
     gif, jpg, jpeg, txt ou doc...';
    //  header("Location: ../index.php?imageError=".$error);
  }else if($_FILES["fileToUpload"]["error"]){
     $error = 'Le fichier est trop gros...';
     header("Location: ../index.php?imageError=".$error);
   }else{
     $str = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
     file_put_contents("../img/uploads/tmp".$extension, $str);
     $_SESSION["image"] = $extension;
     header("Location: ../index.php");
   }
?>
