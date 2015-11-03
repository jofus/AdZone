function signUp () {

}

function logIn () {

}

var fields=["email", "password", "confirmpassword", "username"];

function validateForm() {
    var errors=0;

    for (i=0; i < fields.length; i++)
    {
        if (document.getElementById(fields[i]).value=="")
        {
            errors=1;
            document.getElementById(fields[i]).focus();
            document.getElementById("_" + fields[i]).innerHTML = "* Required";
            break;

        }
        else {
            document.getElementById("_" + fields[i]).innerHTML="";

        }
    }



  if (password.value != confirmpassword.value) {
      errors=1;
          alert("Password and confirm password fields do not match!");

   }



 }
