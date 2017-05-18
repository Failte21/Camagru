function changePassOldPassOkay(password, minSize){
  var icon = document.getElementById("oldPassIcon");

  return check(icon, password.length,
    password.length > minSize && /(\d|\W){1,}?/.test(password));
}

function changePassNewPassOkay(password, confirm, minSize){
  var icon = document.getElementById("newPassIcon");

  if (check(icon, password.length,
    password.length > minSize && /(\d|\W){1,}?/.test(password))){
      confirm.removeAttribute("class");
      confirm.removeAttribute("disabled");
      return (true);
  }else{
    confirm.setAttribute("disabled", "disabled");
    confirm.setAttribute("class", "unsubmitable");
    return (false);
  }
}

function changePassConfirmOkay(password, confirm){
  var icon = document.getElementById("confirmIcon");

  return (check(icon, confirm.length, confirm == password && password.length > 0));
}

function checkChangePass(){
  var oldPass = document.querySelector("form input[name='oldpwd']");
  var newPass = document.querySelector("form input[name='newpwd']");
  var confirm = document.querySelector("form input[name='confirmation']");
  var submit = document.getElementsByName("submit")[1];
  var total = 0;

  total = changePassOldPassOkay(oldPass.value, 7) +
    changePassNewPassOkay(newPass.value, confirm, 7)
    + changePassConfirmOkay(newPass.value, confirm.value);
  if (total == 3){
    submit.removeAttribute("disabled");
    submit.setAttribute("class", "submitable");
  }else{
    submit.setAttribute("class", "unsubmitable");
    submit.setAttribute("disabled", "disabled");
  }
}

// window.onload = checkChangePass;
window.setInterval(checkChangePass, 100);
