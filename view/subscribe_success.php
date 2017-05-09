<main class="centerContainer" id="successContainer">
  <p></p>
  <p>
  <?php if (isset($_GET['subscribe'])){
    $result = htmlentities($_GET['subscribe']);
    if ($result == "success" && isset($_SESSION['subscribed_user'])){
      $name = $_SESSION['subscribed_user'];
      unset($_SESSION['subscribed_user']);
      ?>
        <b>Hello <?php echo $name ?> !</b>
        You successfully subscribed to Camagru <br>
        You will receive a confirmation mail to activate your account
      <?php
    }else if ($result == "already_activated"){
      echo "This account is already activated";
    }else if ($result == "activated"){
      echo ("Your account is now activated");
    }else if($result == "passwordChangeSuccess"){
      echo "Your password has been updated";
    }else{
      echo "An error occured";
    }
  }
  ?>
  </p>
  <a href="index.php">Back to the main page</a>
  <p></p>
</main>
