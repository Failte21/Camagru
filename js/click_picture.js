function displayPicture(action){
  var width = 640;
  var canvas = document.querySelector("#videoContainer canvas");
  var ctx = canvas.getContext("2d");
  if (!action){
    var toDraw = document.querySelector("#videoContainer video");
    width = -width;
    ctx.scale(-1, 1)
    ctx.drawImage(toDraw, 0, 0, width, 480);
  }else{
    var toDraw = document.querySelector("#videoContainer img");
    ctx.drawImage(toDraw, 0, 0);
  }
  toDraw.setAttribute("class", "hidden");
  canvas.setAttribute("class", "displayed");
}

function displayButtons(button){
  var saveButton = document.getElementById("saveButtons");
  button.setAttribute("class", "hidden");
  saveButton.setAttribute("class", "displayed");
}

function clickPicture(button, action){
  displayPicture(action);
  displayButtons(button);
}
