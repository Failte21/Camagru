function removeDb(id){
  var obj = new XMLHttpRequest();
  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && (obj.status == 200 || obj.status == 0)) {
      location.reload();
	  }
  }
  obj.open("GET", "check/delete.php?id=" + id);
  obj.send(null);
}

function deletePicture(button, id){
  if (confirm("Delete the picture ?")){
    var toRemove = button.parentNode;
    removeDb(id);
  }
}
