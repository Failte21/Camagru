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

function confirmOkay(password, confirm){
  var icon = document.getElementById("signUpConfirmIcon");

  return (check(icon, confirm.length, confirm == password));
}

function passOkay(password, confirm, minSize){
  var icon = document.getElementById("signUpPasswordIcon");

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

function loginOkay(login, minSize){
  var icon = document.getElementById("signUpLoginIcon");

  return (check(icon, login.length, login.length > minSize));
}

function emailOkay(email, minSize){
  var icon = document.getElementById("signUpEmailIcon");

  return (check(icon, email.length, email.length > minSize));
}

function checkSignUpForm(){
  var login = document.getElementsByName("login")[1];
  var email = document.getElementsByName("email")[0];
  var password = document.getElementsByName("password")[1];
  var confirm = document.getElementsByName("confirm")[0];
  var submit = document.getElementsByName("submit")[1];
  var total = 0;

  total = loginOkay(login.value, 4) + emailOkay(email.value, 4)
    + passOkay(password.value, confirm, 7) + confirmOkay(password.value, confirm.value);
  if (total == 4){
    submit.setAttribute("class", "submitable");
  }else{
    submit.setAttribute("class", "unsubmitable");
  }
}
