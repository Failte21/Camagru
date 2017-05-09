function centerImage(image, canvas, width, height){
  var xPos = (640 - width) / 2;
  var yPos = (480 - height) / 2;

  console.log(width);
  canvas.getContext("2d").drawImage(image, xPos, yPos, width, height);
  canvas.setAttribute("class", "displayed");
}

function resizeImg(image, canvas, width, height){
  var xRatio = width / 640;
  var yRatio = height / 480;
  var divide = xRatio > yRatio ? xRatio : yRatio;

  width /= divide;
  height /= divide;
  centerImage(image, canvas, width, height);
}

function imgToCanvas(image, width, height){
  var canvas = document.querySelector("#videoContainer canvas");
  if (width > 640 || height > 480){
    resizeImg(image, canvas, width, height);
  }else{
    centerImage(image, canvas, width, height);
  }
}

function getImgSize(image) {
    var newImg = new Image();
    var imgSrc = image.getAttribute("src");

    newImg.onload = function() {
      var width = newImg.width;
      var height = newImg.height;
      imgToCanvas(image, width, height);
    }
    newImg.src = imgSrc;
}

window.onload = function(){
  var image = document.querySelector("#videoContainer img");
  getImgSize(image);
}
