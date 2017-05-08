function insertDb(nb_like, id){
  var ob = new XMLHttpRequest();
  ob.open("GET", "/camagru/check/like.php?id="+id, true);
  ob.send();
}

function changeImg(img){
  var src = img.getAttribute("src");
  if (src == "img/icons/heart.png"){
    img.setAttribute("src", "img/icons/heartPlain.png")
  }else{
    img.setAttribute("src", "img/icons/heart.png")
  }
}

function changeNb(nb, button){
  var intNb = parseInt(nb.innerText);
  var toAdd = parseInt(button.value);
  intNb += toAdd;
  toAdd = -toAdd;
  nb.innerText = intNb;
  button.value = toAdd;
}

function like(button){
  var img = button.childNodes[3];
  var nb = button.childNodes[1];
  changeNb(nb, button);
  changeImg(img);
  insertDb(parseInt(nb.innerText), button.name);
}
