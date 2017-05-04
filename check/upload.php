<?php
// echo $_FILES['fileToUpload']['name'];
// print_r($_FILES);
$dossier = '/camagru/upload/';
print_r($_FILES);
$fichier = basename($_FILES['fileToUpload']['name']);
$taille_maxi = 100000000000;
$taille = filesize($_FILES['fileToUpload']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['fileToUpload']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     $str = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
     file_put_contents("../uploads/tmp.png", $str);
     //readfile("../uploads/tmp.png");
}
else
{
     echo $erreur;
}
?>
