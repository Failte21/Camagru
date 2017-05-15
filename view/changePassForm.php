<form action="check/forgotPass.php" method="post" id="resetPassForm">
  <h4 class="error">
  <?php
    if (isset($resetPassError)){
      echo $resetPassError;
    }
  ?>
  </h4>
  <div class="inputContainer">
    <input type="password" name="newPass" placeHolder="New password" required>
    <img src="" class="hidden" id="changePassPasswordIcon">
  </div>
  <div class="inputContainer">
    <input type="password" name="confirm" placeHolder="Confirm password" required>
    <img src="" class="hidden" id="changePassConfirmIcon">
  </div>
  <div class="inputContainer">
    <input type="submit" name="submit" value="Reset my password" class="unclickable" disabled>
  </div>
  <a href="index.php">Back to the form</a>
</form>
<script type="text/javascript" src="js/formChecking.js"></script>
<script type="text/javascript" src="js/checkChangePassForm.js"></script>
