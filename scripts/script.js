var loginButton = document.getElementById('login');
var loginContainer = document.getElementsByClassName('form--login')[0];

loginButton.addEventListener('click', functionDisplay);

function functionDisplay() {
    loginContainer.style.display = "block";
    loginButton.style.display = "none";
}
