function resetPassEmailOkay(email, minSize){
  var icon = document.getElementById("ResetPassEmailIcon");

  return (check(icon, email.length, email.length > minSize
    && /.+?@.+?\..{2,}/.test(email)));
}

function checkResetPassForm(){
  var email = document.querySelector("input[type='email']");
  var submit = document.querySelector("input[type='submit']");

  if (resetPassEmailOkay(email.value, 4)){
    submit.removeAttribute("disabled");
    submit.setAttribute("class", "submitable");
  }else{
    submit.setAttribute("class", "unsubmitable");
    submit.setAttribute("disabled", "disabled");
  }
}

window.setInterval(checkResetPassForm, 100);
