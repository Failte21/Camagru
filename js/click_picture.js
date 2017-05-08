function displayPicture(){
  var canvas = document.querySelector("#videoContainer canvas");
  var video = document.querySelector("#videoContainer video");
  canvas.getContext("2d").drawImage(video, 0, 0);
  video.setAttribute("class", "hidden");
  canvas.setAttribute("class", "displayed");
}

function displayButtons(button){
  var saveButton = document.getElementById("saveButtons");
  button.setAttribute("class", "hidden");
  saveButton.setAttribute("class", "displayed");
}

function clickPicture(button){
  displayPicture();
  displayButtons(button);
}
