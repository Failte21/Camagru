<?php
  function displayError($name){
    if (isset($name)){
      if($name == "mail_exists"){
        echo "This mail already exists";
      }else if ($name == "login_exists") {
        echo "This login already exists";
      }else if ($name == "different_passwd"){
        echo "The 2 passwords are differents";
      }else if ($name == "error"){
        echo "Invalid password or email";
      }
    }
  }
?>
