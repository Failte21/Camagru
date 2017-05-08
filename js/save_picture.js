function getFrameName(){
  var radios = document.getElementsByClassName("frame_radio");
  for (i = 0; i < radios.length; i++){
    if (radios[i].checked){
      return (radios[i].value)
    }
  }
}

function insertPicture(canvas){
  var frameName = getFrameName();
  var ob = new XMLHttpRequest();
  var data = canvas.toDataURL('img/png');
  ob.open("POST", "check/save_picture.php");
  ob.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  ob.send("img=" + encodeURIComponent(data) + "&frame=" + frameName);
}

function uncheckRadio(){
  var radios = document.getElementsByClassName("frame_radio");
  for (i = 0; i < radios.length; i++){
    if (radios[i].checked){
      radios[i].checked = false;
    }
  }
}

function reset(canvas){
  var image = document.querySelector("#videoContainer img");
  var button = document.getElementById("clickPicture");
  var saveButton = document.getElementById("saveButtons");
  var video = document.querySelector("#videoContainer video");

  saveButton.setAttribute("class", "hidden");
  canvas.setAttribute("class", "hidden");
  image.setAttribute("class", "hidden");
  button.setAttribute("class", "hidden");
  video.setAttribute("class", "displayed");
  uncheckRadio();
}

function save(action){
  var canvas = document.querySelector("#videoContainer canvas");
  if (action == "save"){
    insertPicture(canvas);
    location.reload();
  }
  reset(canvas);
}
