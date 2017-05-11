<?php include("check/display_error.php") ?>

<h1>Welcome to camagru</h1>
<main class="centerContainer" id="mainForm">
  <section class="formSection">
    <h2>Log in</h2>
    <form action="/camagru2/check/login.php" method="post" id="signInForm">
      <h4 class="error">
      <?php
        if (isset($_GET['login_error'])){
          displayError($_GET['login_error']);
        }
      ?>
      </h4>
      <div class="inputContainer">
        <input type="text" name="login" placeHolder="Email or Login" required
          onkeyup="checkSignInForm()">
        <img src="" class="hidden" id="signInLoginIcon">
      </div>
      <div class="inputContainer">
        <input type="password" name="password" placeHolder="Password" required
          onkeyup="checkSignInForm()">
        <img src="" class="hidden" id="signInPasswordIcon">
      </div>
      <div class="inputContainer">
        <input type="submit" name="submit" value="Log in" class="unclickable">
      </div>
    </form>
  </section>
  <section class="formSection">
    <h2>Sign up</h2>
    <h4 class="error">
    <?php
      if (isset($_GET['signup_error'])){
        displayError($_GET['signup_error']);
      }
    ?>
    </h4>
    <form action="/camagru2/check/subscribe.php" method="post" id="signUpForm">
        <div class="inputContainer">
          <input type="text" name="login" placeHolder="Login" required onkeyup="checkSignUpForm()">
          <img src="" class="hidden" id="signUpLoginIcon">
        </div>
        <div class="inputContainer">
          <input type="email" name="email" placeHolder="Email" required  onkeyup="checkSignUpForm()">
          <img src="" class="hidden" id="signUpEmailIcon">
        </div>
        <div class="inputContainer">
          <input type="password" name="password"
          placeHolder="Password (8 caracters min)" required onkeyup="checkSignUpForm()">
          <img src="" class="hidden" id="signUpPasswordIcon">
        </div>
        <div class="inputContainer">
          <input type="password" name="confirm" placeHolder="Confirm password" required
          onkeyup="checkSignUpForm()" disabled class="unsubmitable">
          <img src="" class="hidden" id="signUpConfirmIcon">
        </div>
        <div class="inputContainer">
          <input type="submit" name="submit" value="Sign up" class="unsubmitable">
        </div>
    </form>
    <script type="text/javascript" src="js/checkSignInForm.js"></script>
    <script type="text/javascript" src="js/checkSignUpForm.js"></script>
  </section>
</main>
