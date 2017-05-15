<nav role='navigation'>
  <a href="/camagru" id="titleLink">Camagru</a>
  <?php
    if (isset($_SESSION['logged_user'])){
      ?>
      <ul>
        <li><a href="/camagru2/index.php?page=gallery&pageNb=0">Explorer</a></li>
        <li><a href="/camagru2/index.php?page=my_gallery&pageNb=0">My gallery</a></li>
        <li><a><?php echo $_SESSION['logged_user'] ?></a>
          <ul>
            <li><a href="index.php?page=settings">Settings</a></li>
            <li><a href="/camagru2/check/log_out.php">Log out</a></li>
          </ul>
        </li>
      </ul>
      <?php
    }
  ?>
</nav>
