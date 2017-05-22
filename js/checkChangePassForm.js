function changePassPassOkay(password, confirm, minSize){
  var icon = document.getElementById("changePassPasswordIcon");

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
  var icon = document.getElementById("changePassConfirmIcon");

  return (check(icon, confirm.length, confirm == password && password.length > 0));
}

function checkChangePassForm(){
  var password = document.querySelector("#resetPassForm input[name='newPass']");
  var confirm = document.querySelector("#resetPassForm input[name='confirm']");
  var submit = document.querySelector("#resetPassForm input[type='submit']")

  if (changePassPassOkay(password.value, confirm, 7) &&
    changePassConfirmOkay(password.value, confirm.value)){
    submit.removeAttribute("disabled");
    submit.setAttribute("class", "submitable");
  }else{
    submit.setAttribute("class", "unsubmitable");
    submit.setAttribute("disabled", "disabled");
  }
}

window.setInterval(checkChangePassForm, 100);
