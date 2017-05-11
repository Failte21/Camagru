function displayTick(icon, color){
  icon.setAttribute("class", "displayed");
  icon.setAttribute("src", "img/icons/tick_" + color + ".png");
}

function signInpassOkay(password, minSize){
  var icon = document.getElementById("signInPasswordIcon");

  return (check(icon, password.length,
    password.length > minSize && /(\d|\W){1,}?/.test(password)));
}

function loginOkay(login, minSize){
  var icon = document.getElementById("signInLoginIcon");

  return (check(icon, login.length, login.length > minSize));
}

function checkSignInForm(){
  var login = document.getElementsByName("login")[0];
  var password = document.getElementsByName("password")[0];
  var submit = document.getElementsByName("submit")[0];
  var total = 0;

  total = loginOkay(login.value, 4) + signInpassOkay(password.value, 7);
  if (total == 2){
    submit.setAttribute("class", "submitable");
  }else{
    submit.setAttribute("class", "unsubmitable");
  }
}
