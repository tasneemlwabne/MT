function form() {
  var check1 = /^[a-zA-Z_ ]{6,}$/;
  var check2 = /^[a-zA-Z_ ]{4,}$/;
  var check3 = /^[050|052|053|054|055|057|058]{3}[-][0-9]{7}$/g;
  // var check4 = /^[0-9]{5}$/;
  var check5 = /^[0-9]{4}[" "][0-9]{4}[" "][0-9]{4}[" "][0-9]{4}$/;
  var check6 = /^[0-9]{2}["/"][0-9]{2}$/;
  var check7 = /^[0-9]{3}$/;
  // var pass = document.getElementById("Form").elements[0].value;
  var name = document.getElementById("Form").elements[0].value;
  var email = document.getElementById("Form").elements[1].value;
  var city = document.getElementById("Form").elements[3].value;
  var phone = document.getElementById("Form").elements[4].value;
  // var zipcode = document.getElementById("zip").value;
  var cr = document.getElementById("Form").elements[5].value;
  var ex = document.getElementById("Form").elements[6].value;
  var cvvv = document.getElementById("Form").elements[7].value;

  if (check1.test(name) != false) {
    if (email != null) {
      if (check2.test(city) != false) {
        if (check3.test(phone) != false) {
          // if (check4.test(zipcode) != false) {
          if (check5.test(cr) != false) {
            if (check6.test(ex) != false) {
              if (check7.test(cvvv) != false) {
                alert("Thank You For Inserting Your Details " + " , " + name);
              } else {
                alert("Your CVV Must Have Only 3 Numbers");
                return false;
              }
            } else {
              alert(
                "Your Expiry Must Have At First 2 Numbers Then '/' And In The End 2 Numbers"
              );
              return false;
            }
          } else {
            alert("You Must Put A Space Between Each 4 Numbers ");
            return false;
          }
          // } else {
          //   alert("Your Zip Code Must Have Only 5 Numbers");
          //   return false;
          // }
        } else {
          alert(
            "your phone number must have at first '050/052/053/054/055/057/058' then ' - ' then only 7 numbers "
          );
          return false;
        }
      } else {
        alert("Your City Must Have 4 Letters at least");
        return false;
      }
    } else {
      alert("your have to write your email address");
      return false;
    }
  } else {
    alert("Fullname Have To Be At Least 6 Capital Or Small Letters");
    return false;
  }
}
