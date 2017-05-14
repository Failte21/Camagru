<?php
  Class Page{

    public $imagePerPage;
    public $pageNb;

    function __construct($db, $pageNb, $imagePerPage){
      $this->pageNb = 0 + $pageNb;
      $this->imagePerPage =  0 + $imagePerPage;
      $this->firstPicture = $this->pageNb * $this->imagePerPage;
    }

    function getLikePicture($picture, $id){
      if ($picture->isliked($id, $_SESSION['logged_user']) < 0){
        return ("img/icons/heartPlain.png");
      }else{
        return ("img/icons/heart.png");
      }
    }

    function displayOwnGallery($elem){
      ?>
        <img src="<?php echo $elem['img'] ?>" alt="photo" />
        <button class="deletePicture" type="button" name="button"
          onclick="deletePicture(this, <?php echo $elem['id'] ?>)">
          DELETE
        </button>
      <?php
    }

    function displayGallery($elem){
      $l = new Picture();
      ?>
      <img class="toGrayscale" src="<?php echo $elem['img'] ?>" alt="photo" />
      <div class="imgInfo">
        <h3><?php echo $elem['login_user'] ?></h3>
        <?php if (isset($_SESSION['logged_user'])){ ?>
          <div class="socialDiv">
            <button type="button" name="<?php echo $elem['id'] ?>"
              value="<?php echo $l->isliked($elem['id'], $_SESSION['logged_user'])?>"
              onclick="like(this)">
              <p><?php echo $elem['nb']?></p>
              <img src="<?php echo $this->getLikePicture($l, $elem['id']) ?>" alt="" />
            </button>
            <p></p>
            <a href="/camagru/index.php?page=comment&id=<?php echo $elem['id'] ?>">
              <img src="img/icons/comment.png" alt="" />
            </a>
            <?php } ?>
          </div>
        </div>
        <?php
    }

    function displayImg($db, $owner){
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
      if ($owner){
        $query = $db->prepare('select * from picture where login_user = ?
          order by id desc limit ?, ?');
        $query->execute(array($owner, $this->firstPicture, $this->imagePerPage));
      }else{
        $query = $db->prepare('select * from picture order by id desc limit ?, ?');
        $query->execute(array($this->firstPicture, $this->imagePerPage));
      }
      $array = $query->fetchAll();
      foreach($array as $elem){ ?>
        <div class="galleryImgCanvas">
          <?php
            if (isset($_GET["page"])){
              if($_GET['page'] == "gallery"){
                $this->displayGallery($elem);
              }else{
                $this->displayOwnGallery($elem);
              }
            }else{
              ?>
              <img src="<?php echo $elem['img'] ?>" alt="photo" />
              <?php
            }
          ?>
        </div>
        <?php
      }
    }
  }
?>
