<h1>Hello <?php echo $_SESSION['logged_user'] ?> !</h1>
<main class="centerContainer" id="mainPage">
  <section id="videoCanvas">
    <div id="frameDiv">
      <div id="videoContainer">
        <canvas width=640 height=480 class="hidden"></canvas>
        <button type="button" name="button" class="hidden" id="clickPicture"
          onclick="clickPicture(this)">
          CLICK
        </button>
        <div id="saveButtons" class="hidden">
          <button type="button" name="save" onclick="save(this.name)">
            SAVE
          </button>
          <button type="button" name="unSave" onclick="save(this.name)">
            DON'T SAVE
          </button>
        </div>
        <video></video>
        <img src="/camagru2/img/frames/banana.png" alt="frame" class="hidden"/>
      </div>
      <button type="button" name="button">UPLOAD</button>
      <div id="frameSelect">
        <label class="radio-img">
          <input type="radio" name="img"  class="frame_radio" value="viking"
            onclick="selectFrame(this)">
          <div class="imgContainer">
            <img src="/camagru2/img/icons/viking.png">
          </div>
        </label>
        <label class="radio-img">
          <input type="radio" name="img"  class="frame_radio" value="zozor"
            onclick="selectFrame(this)">
          <div class="imgContainer">
            <img src="/camagru2/img/icons/zozor.png">
          </div>
        </label>
        <label class="radio-img">
          <input type="radio" name="img" class="frame_radio" class="frame_radio"
            value="mustache2" onclick="selectFrame(this)">
          <div class="imgContainer">
            <img src="/camagru2/img/icons/mustache.png">
          </div>
        </label>
        <label class="radio-img">
          <input type="radio" name="img"  class="frame_radio" value="mustache"
            onclick="selectFrame(this)">
          <div class="imgContainer">
            <img src="/camagru2/img/icons/mustache2.png">
          </div>
        </label>
        <label class="radio-img">
          <input type="radio" name="img"  class="frame_radio" value="banana"
            onclick="selectFrame(this)">
          <div class="imgContainer">
            <img src="/camagru2/img/icons/banana.png">
          </div>
        </label>
      </div>
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
<script type="text/javascript" src="js/video.js"></script>
<script type="text/javascript" src="js/click_picture.js"></script>
<script type="text/javascript" src="js/save_picture.js"></script>
