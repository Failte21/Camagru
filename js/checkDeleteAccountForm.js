function deletePassPassOkay(password, minSize){
  var icon = document.getElementById("deletePassIcon");

  return (check(icon, password.length,
    password.length > minSize && /(\d|\W){1,}?/.test(password)));
}

function checkDeletePassForm(){
  var password = document.querySelector("form input[name='password']");
  var submit = document.getElementsByName("submit")[0];

  if (deletePassPassOkay(password.value, 7)){
    submit.removeAttribute("disabled");
    submit.setAttribute("class", "submitable");
  }else{
    submit.setAttribute("class", "unsubmitable");
    submit.setAttribute("disabled", "disabled");
  }
}

window.setInterval(checkDeletePassForm, 100);
