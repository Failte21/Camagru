<!DOCTYPE html>
<html>
<head>
  </head>
  <body>
    <form id ="form1" enctype="multipart/form-data" method ="post" action="/camagru/check/upload.php">
      <div class= "row">
        <label for="fileToUpload">Select a File to Upload</label><br />
        <input type="file" name="fileToUpload" id="fileToUpload" onchange="fileSelected();"/>
      </div>
      <div id= "fileName"></div>
      <div id="fileSize"></div>
      <div id="fileType"></div>
      <div class= "row">
        <input type="button" onclick="uploadFile()" value="Upload" />
      </div>
      <div id= "progressNumber"></div>
    </form>
  </body>
  <script type="text/javascript" src="/camagru/js/upload.js"></script>
</html>
