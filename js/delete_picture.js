function removeDb(id){
  var obj = new XMLHttpRequest();
  obj.open("GET", "check/delete.php?id=" + id);
  obj.send(null);
}

function deletePicture(button, id){
  if (confirm("Delete the picture ?")){
    var toRemove = button.parentNode;
    removeDb(id);
    toRemove.remove();
  }
}
