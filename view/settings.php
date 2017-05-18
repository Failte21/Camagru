<?php
  include("check/display_error.php");
  if (isset($_SESSION['changePassError'])){
    $changePassError = $_SESSION['changePassError'];
    unset($_SESSION['changePassError']);
  }
  if (isset($_SESSION['logged_user'])){
    ?>
    <h1><?php echo $_SESSION['logged_user'] ?></h1>
    <main class="centerContainer" id="mainForm">
      <section class="formSection">
        <h2>Delete your account</h2>
        <h4 class="error">
        <?php
          if (isset($_GET['DeleteAccountError'])){
            displayError($_GET['DeleteAccountError']);
          }
        ?>
        </h4>
        <form  action="check/delete_account.php" method="post">
          <div class="inputContainer">
            <input type="password" name="password" placeHolder="Password" required>
            <img src="" alt="" id="deletePassIcon"/>
          </div>
          <div class="inputContainer">
            <input type="submit" name="submit" value="Delete account">
          </div>
        </form>
      </section>
      <section class="formSection">
        <h2>Change your password</h2>
        <h4 class="error">
        <?php
          if (isset($changePassError)){
            echo ($changePassError);
          }
        ?>
        </h4>
        <form  action="check/change_password.php" method="post">
          <div class="inputContainer">
            <input type="password" name="oldpwd" placeHolder="Old password" required>
            <img src="" alt="" id="oldPassIcon"/>
          </div>
          <div class="inputContainer">
            <input type="password" name="newpwd" placeHolder="New password" required>
            <img src="" alt="" id="newPassIcon"/>
          </div>
          <div class="inputContainer">
            <input type="password" name="confirmation"
            placeHolder="Confirm the new password" required>
            <img src="" alt="" id="confirmIcon"/>
          </div>
          <div class="inputContainer">
            <input type="submit" name="submit" value="Update your password">
          </div>
        </form>
      </section>
    </main>
    <?php
  }
?>
<script type="text/javascript" src="js/formChecking.js"></script>
<script type="text/javascript" src="js/checkDeleteAccountForm.js"></script>
<script type="text/javascript" src="js/checkChangePass.js"></script>
