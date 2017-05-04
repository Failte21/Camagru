  <header>
    <a href="#" class="headerLink" id="titleLink">Camagru</a>
    <?php
      if (isset($_SESSION['logged_user'])){ ?>
        <div class="headerLink">
          <a href="#">Explorer</a>
        </div>
        <div class="headerLink">
          <a href="#">My Gallery</a>
        </div>
        <div class="headerLink" id="dropDown">
          <a href="#">My account</a>
        </div>
        <a href="#" id="titleLink"></a><?php
      }
    ?>
  </header>
