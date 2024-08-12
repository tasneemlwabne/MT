function form() {
  var check1 = /^[a-zA-Z_ ]{6,}$/;
  var check3 = /^[050|052|053|054|055|057|058]{3}[-][0-9]{7}$/g;

  var fullname = document.getElementById("Form").elements[0].value;
  var phone = document.getElementById("Form").elements[2].value;

  if (check1.test(fullname) != false) {
    if (check3.test(phone) != false) {
      alert("thank you for inserting your details " + " " + fullname);
    } else {
      alert("your phone number must have at first '050/052/053/054/055/057/058' then ' - ' then only 7 numbers ");
      return false;
    }
  } else {
    alert("Full name have to be al least 6 capital or small letters");
    return false;
  }
}
