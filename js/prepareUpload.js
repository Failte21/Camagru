function displayButton(){
  var toDisplay = document.querySelector(".uploadButton input[type='submit']");
  toDisplay.setAttribute("class", "clickable");
}

function prepareUpload(){
  displayButton();
}
