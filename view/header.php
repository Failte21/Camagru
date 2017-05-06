<nav role='navigation'>
  <a href="/camagru2" id="titleLink">Camagru</a>
  <?php
    if (isset($_SESSION['logged_user'])){
      ?>
      <ul>
        <li><a href="/camagru2/index.php?page=gallery">Explorer</a></li>
        <li><a href="/camagru2/view/my_gallery.php">My gallery</a></li>
        <li><a>My account</a>
          <ul>
            <li><a href="/camagru2/view/account.php">Settings</a></li>
            <li><a href="/camagru2/check/log_out.php">Log out</a></li>
          </ul>
        </li>
      </ul>
      <?php
    }
  ?>
</nav>
