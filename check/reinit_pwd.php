<?php include("/camagru2/check/init_db.php");
  if ($db = initDb()){
    $stmt = $db->prepare('SELECT cle FROM user WHERE login like :login ');
    $stmt->execute(array(':login' => $_SESSION['logged_user']));
    $result = $stmt->fetchAll();
    $cle = $result[0][cle];
 ?>
<section class="formSection">
  <h2>Change your password</h2>
  <form action="check/change_password.php" method="post">
    <h4 class="error">
    <?php
      if (isset($_GET['passwordChangeError'])){
        displayError($_GET['passwordChangeError']);
      }
    ?>
    </h4>
    <div class="inputContainer">
      <input type="password" name="oldpwd" placeHolder="Old password" required>
    </div>
    <div class="inputContainer">
      <input type="password" name="newpwd" placeHolder="New password" required>
    </div>
    <div class="inputContainer">
      <input type="password" name="confirmation"
      placeHolder="Confirm new password" required>
    </div>
    <div class="inputContainer">
      <input type="submit" name="submit" value="Change password">
    </div>
  </form>
</section>
<?php } ?>
