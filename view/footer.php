<footer>
  <?php
    if (!isset($_SESSION['logged_user']) && !isset($_GET['page'])){
      ?>
      <a href="index.php?page=gallery&pageNb=0">Just want to explore the gallery ?<br>
        Click here !</a>
      <?php
    }else if(isset($_GET['page'])){
      if ($_GET["page"] == "gallery" || $_GET["page"] == "my_gallery"){
        if (isset($_GET['pageNb'])){
          for($i = 0; $i < $gallery->nbPages; $i++){
            if ($i == $_GET["pageNb"]){
              ?><p class="pageNb">[<?php echo $i + 1 ?>]</p><?php
            }else{
              ?>
                <a class="pageNb" href="index.php?page=gallery&pageNb=<?php echo $i?>">
                  <?php echo $i + 1?>
                </a>
              <?php
            }
          }
        }
      }else if ($_GET['page'] == "comment"){
        ?>
          <a href="index.php?page=gallery&pageNb=0">Back to the gallery</a>
        <?php
      }
    }
  ?></footer>
