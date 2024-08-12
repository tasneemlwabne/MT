function form() {
  var check1 = /^[a-z]{3,}[0-9]{5,}[A-Z]{2,}$/;

  var pass = document.getElementById("Form").elements[0].value;
  if (check1.test(pass) != false) {
  } else {
    alert(
      "please enter password that include al least 3 small letters then 5 numbers then at least 2 capital letters"
    );
    return false;
  }
}
