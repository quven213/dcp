function pass_validate(){
  var password = document.getElementById('password');
  var c_password = document.getElementById('c-password');
  var space = document.getElementById('space');
  if(password.value == '' || c_password == '' || password.value != c_password.value){
    if(password.value == ''){
      password.style.border = "1px solid #FF0000";
    }else{
      password.style.border = "1px solid #CCC";
    }
    if(c_password.value == ''){
      c_password.style.border = "1px solid #FF0000";
    }else{
      c_password.style.border = "1px solid #CCC";
    }
    if(password.value != c_password.value){
      space.innerHTML = "Password and confirmed password do not match";
    }else{
      space.innerHTML = "";
    }
    return false;
  }else{
    return true;
  }
}
