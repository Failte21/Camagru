function displayPicture(action){
  var canvas = document.querySelector("#videoContainer canvas");
  if (!action){
    var toDraw = document.querySelector("#videoContainer video");
  }else{
    var toDraw = document.querySelector("#videoContainer img");
  }
  ctx = canvas.getContext("2d");
  ctx.scale(-1, 1)
  ctx.drawImage(toDraw, 0, 0, -640, 480);
  toDraw.setAttribute("class", "hidden");
  canvas.setAttribute("class", "displayed");
}

function displayButtons(button){
  var saveButton = document.getElementById("saveButtons");
  button.setAttribute("class", "hidden");
  saveButton.setAttribute("class", "displayed");
}

function clickPicture(button, action){
  console.log(action);
  displayPicture(action);
  displayButtons(button);
}
