function valid() {
  if (document.signup.password.value != document.signup.confirmpassword.value) {
    alert("Password and Confirm Password Field do not match  !!");
    document.signup.confirmpassword.focus();
    return false;
  }
  return true;
}

function checkAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "check_availability.php",
    data: "emailid=" + $("#emailid").val(),
    type: "POST",
    success: function (data) {
      $("#user-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error: function () {},
  });
}

function verifyPassword() {
  var pw = document.getElementById("pswd3").value;
  // if (pw == null) {
  //   document.getElementById("message").innerHTML =
  //     "**Fill the password please!";
  // } else 
  if (pw.length <= 8) {
    document.getElementById("message").innerHTML =
      "**Password length must be atleast 8 characters";
  } else {
    document.getElementById("message").innerHTML = "**Password Is Correct";
  }
}
/*      
function verifyPassword() {  
    var pw = document.getElementById("pswd").value;  
    //check empty password field  
    if(pw == "") {  
       document.getElementById("message").innerHTML = "**Fill the password please!";  
       return false;  
    }  
     
   //minimum password length validation  
    if(pw.length < 8) {  
       document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
       return false;  
    }  
    
  //maximum length of password validation  
   /* if(pw.length > 15) {  
       document.getElementById("message").innerHTML = alert("**Password length must not exceed 15 characters");  
       return false;  
    } else {  
       alert("Password is correct");  
    }  
  }*/

function matchPassword() {
  var pw1 = document.getElementById("pswd1").value;
  var pw2 = document.getElementById("pswd2").value;


  if (pw1 != pw2) {
    //document.getElementById("message1").innerHTML = "Passwords did not match";
    //i = 1;
    alert("Passwords did not match");
  } else {
    document.getElementById("message1").innerHTML="Password Match successfully";
  }
}

function togglePassword() {
  check.onclick = togglePassword;
  if (check.checked) pass.type = "text";
  else pass.type = "password";
}
