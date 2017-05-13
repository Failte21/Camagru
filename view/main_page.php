<?php
  if (isset($_SESSION['image'])){
    $image = $_SESSION['image'];
    unset($_SESSION['image']);
  }
  if (isset($_SESSION['uploadError'])){
    $uploadError = $_SESSION['uploadError'];
    unset($_SESSION['uploadError']);
  }
?>
<h1>Hello <?php echo $_SESSION['logged_user'] ?> !</h1>
<main class="centerContainer" id="mainPage">
  <section id="videoCanvas">
    <p class="error">
      <?php if (isset($uploadError)){
        echo $uploadError;
      } ?>
    </p>
    <div id="frameDiv">
      <div id ="videoContainer">
        <?php if (isset($image)){
          ?><img src="img/uploads/tmp<?php echo $image ?>"
          alt="" class="hidden"> <?php
        } ?>
        <canvas width=640 height=480 class="hidden"></canvas>
        <button type="button" name="button" class="hidden" id="clickPicture"
          onclick="clickPicture(this,
            <?php if(isset($image)){
              echo "1";
            }else{
              echo "0";
            }?>)">
          CLICK
        </button>
        <div id="saveButtons" class="hidden">
          <button type="button" name="save" onclick="save(this.name,
            <?php if(isset($image)){
              echo "1";
            }else{
              echo "0";
            }?>)">
            SAVE
          </button>
          <button type="button" name="unSave" onclick="save(this.name,
            <?php if(isset($image)){
              echo "1";
            }else{
              echo "0";
            }?>)">
            DON'T SAVE
          </button>
        </div>
        <?php if (!isset($image)){
          ?><video></video><?php
        } ?>
        <img src="" alt="frame" class="hidden" />
      </div>
      <form id="uploadForm" action="check/upload.php" method="post"
        enctype="multipart/form-data">
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10000000"> -->
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000000000000">
        <div class="uploadButton">
          <input type="file" name="fileToUpload" class="clickable"
            onchange="prepareUpload()">
          <label for="file">
            <img src="img/icons/uploadBlue.png" alt="uploadImg">
            Upload a picture
          </label>
        </div>
        <div class="uploadButton">
          <input type="submit" name="send" value="Send" class="unclickable">
          <label for="submit">
            Send the file
          </label>
        </div>
      </form>
      <?php include 'view/frameSelect.php'; ?>
    </div>
  </section>
  <section id="previewCanvas">
    <?php
      include("class/picture.class.php");
      include("class/page.class.php");
      if ($db = initDb()){
        $page = new Page($db, 0, 10);
        $page->displayImg($db, $_SESSION['logged_user']);
      }
    ?>
  </section>
</main>
<script type="text/javascript" src="js/select_frame.js"></script>
<?php if (!isset($image)){
  ?><script type="text/javascript" src="js/video.js"></script><?php
}else{
  ?><script type="text/javascript" src="js/displayUpload.js"></script><?php
} ?>
<script type="text/javascript" src="js/click_picture.js"></script>
<script type="text/javascript" src="js/save_picture.js"></script>
<script type="text/javascript" src="js/prepareUpload.js"></script>
