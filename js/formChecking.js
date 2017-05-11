function displayTick(icon, color){
  icon.setAttribute("class", "displayed");
  icon.setAttribute("src", "img/icons/tick_" + color + ".png");
}

function check(icon, len, condition){
  if (condition){
    displayTick(icon, "green");
  }else if (!len){
    icon.setAttribute("class", "hidden");
  }else{
    displayTick(icon, "red");
  }
  return (condition);
}
