function displayFrame(frame){
  var img = document.querySelector('#videoContainer img');
  img.setAttribute("src", "img/frames/" + frame + ".png");
  img.setAttribute("class", "displayed");
}

function showButton(){
  var button = document.querySelector('#videoContainer button');
  button.setAttribute("class", "displayed");
}

function selectFrame(frame){
  displayFrame(frame.value);
  showButton();
}
