<?php include("check/display_error.php") ?>

<h1>Welcome to camagru</h1>
<main class="centerContainer" id="mainForm">
  <section class="formSection">
    <h2>Log in</h2>
    <form action="/camagru2/check/login.php" method="post">
      <h4 class="error">
      <?php
        if (isset($_GET['login_error'])){
          displayError($_GET['login_error']);
        }
      ?>
      </h4>
      <input type="text" name="login" placeHolder="Email or Login" required>
      <input type="password" name="password" placeHolder="Password" required>
      <input type="submit" name="submit" value="Log in">
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
    <form  action="/camagru2/check/subscribe.php" method="post">
        <input type="text" name="login" placeHolder="Login" required>
        <input type="email" name="email" placeHolder="Email" required>
        <input type="password" name="password" placeHolder="Password" required>
        <input type="password" name="confirm" placeHolder="Confirm password" required>
        <input type="submit" name="submit" value="Sign up">
    </form>
  </section>
</main>
<a href="#" class="indication">Just want to explore the gallery ?<br>
  Click here !</a>
