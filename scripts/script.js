$("form").attr('autocomplete', 'off'); // Switching form autocomplete attribute to off

var loginButton = document.getElementById('login');
var loginContainer = document.getElementsByClassName('form--login')[0];

loginButton.addEventListener('click', function(){
     loginContainer.style.display = "block";
    loginButton.style.display = "none";
});


// Form validation
// Check if field is empty
function checkEmpty() {
   // var elMsg = document.getElementsByClassName('error');
    if (this.value <= 0) {
        this.nextElementSibling.textContent = "Please fill up this field.";
        console.log(this.nextElementSibling);
     }  else {
         this.nextElementSibling.textContent= "";
    }
    
}
var elFirstName = document.getElementById('firstName');
elFirstName.onblur = checkEmpty;
var elLastName = document.getElementById('lastName');
elLastName.onblur = checkEmpty;
var elEmail = document.getElementById('email');
elEmail.onblur = checkEmail;
var elUserName = document.getElementById('userName');
elUserName.onkeyup = checkUser;
var elPassword = document.getElementById('password');
elPassword.onblur = checkEmpty;






// Ajax request check username
function checkUser() {
    if (elUserName.value == 0) {
        elUserName.nextElementSibling.textContent= "Please chose your User Name. Choose wisely, as it can't be changed later.";
        return;
    } if (elUserName.value === "Wisely" || elUserName.value === "wisely") {
        elUserName.nextElementSibling.textContent= "Ha-ha. Verry funny.";
        return;  
    } if (elUserName.value === "Changed Later" || elUserName.value === "changed later") {
        elUserName.nextElementSibling.textContent= "It can't be chenged later, please type another name.";
        return;  
    } if (elUserName.value === "Another Name" || elUserName.value === "another name") {
        elUserName.nextElementSibling.textContent= "I'm getting sick of you.";
        return;  
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementsByClassName("error")[3].innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/includes/check-user.php?uid=" + elUserName.value, true);
        xmlhttp.send();
    }
}

// Ajax request check email
function checkEmail() {
    if (elEmail.value == 0) {
        elEmail.nextElementSibling.textContent= "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementsByClassName("error")[2].innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/includes/check-email.php?email=" + elEmail.value, true);
        xmlhttp.send();
    }
}
//form-data --> sent img ajax
