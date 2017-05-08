<main id="comment_canvas">
<?php
  include("class/comment.class.php");
  if ($db = initDb()){
    $query = $db->prepare('SELECT img FROM picture WHERE id = ?');
    $query->execute(array(htmlentities($_GET['id'])));
    $array = $query->fetchAll();
?>
  <div class="comment_img">
    <img src="<?php echo $array[0]['img'] ?>" alt="photo" />
  </div>
  <div class="container">
    <form action="check/comment.php?id=<?php echo htmlentities($_GET['id']);?>" method="post">
      <label>
        <textarea name="msg" placeholder="Comment" rows="7"></textarea>
      </label>
      <input type="submit" value="Submit">
    </form>
<?php
  }
  $com = new Comment();
  $result = $com->display($_GET['id']);
  foreach ($result as $elem){
  ?>
    <div class="dialogbox">
      <span class="tip tip-up"></span>
      <b><?php echo $elem['login_comment']." :"; ?></b>
      <div class="message">
        <span><?php echo $elem['comment']; ?></span>
      </div>
    </div>
<?php
  }
?>
  </div>
</main>
