<?php
  function getError($error)
  {
    if ($error == "mail_exists")
      return ("This mail already exists");
    else if ($error == "different_passwd")
      return ("The two passwords must be identical");
    else if ($error == "login_exists")
      return ("This login already exists");
    return null;
  }
?>
