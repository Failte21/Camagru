<?php
  if (isset($_SESSION['resetPassError'])){
    $resetPassError = $_SESSION['resetPassError'];
    unset($_SESSION['resetPassError']);
  }
?>
<main class="centerContainer" id="resetForm">
  <section class="formSection">
    <h2>Reset your password</h2>
    <?php
      if (isset($_SESSION['login'])){
        include("changePassForm.php");
      }else {
        include ("emailForPassChangeForm.php");
      }
    ?>
    <?php  ?>
  </section>
</main>
