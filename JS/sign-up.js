function form() {
  var check1 = /^[a-z]{3,}[0-9]{5,}[A-Z]{2,}$/;
  var check2 = /^[a-zA-Z_ ]{6,}$/;
  var check3 = /^[050|052|053|054|055|057|058]{3}[-][0-9]{7}$/g;

  var name = document.getElementById("Form").elements[0].value;
  var phone = document.getElementById("Form").elements[2].value;
  var pass = document.getElementById("Form").elements[3].value;
  var Repeat = document.getElementById("Form").elements[4].value;
  console.log(name);
  console.log(phone);
  console.log(pass);
  console.log(Repeat);

  if (check2.test(name) != false) {
    if (check1.test(pass) != false) {
      if (check3.test(phone) != false) {
        if (pass == Repeat) {
          alert("thank you for inserting your details " + " " + name);
        } else {
          alert("your password must be match");
          return false;
        }
      } else {
        alert(
          "your phone number must have at first '050/052/053/054/055/057/058' then ' - ' then only 7 numbers "
        );
        return false;
      }
    } else {
      alert(
        "please enter password that include al least 3 letters then 5 numbers then at least 2 capital letters"
      );
      return false;
    }
  } else {
    alert("fullname have to be al least 6 capital or small letters");
    return false;
  }
}
