//settings tab
var arrowUp = document.getElementById('account-arrow--up');
var arrowDown = document.getElementById('account-arrow--down');
var settingsCont = document.getElementsByClassName('account--content');

var arrowUp2 = document.getElementById('kids-arrow--up');
var arrowDown2 = document.getElementById('kids-arrow--down');
var settingsCont2 = document.getElementsByClassName('profiles--content');

var arrowUp3 = document.getElementById('about-arrow--up');
var arrowDown3 = document.getElementById('about-arrow--down');
var settingsCont3 = document.getElementsByClassName('about--content');

//Account click event
arrowUp.addEventListener('click', function() {
    console.log(this);
    settingsCont[0].style.display="none";
    arrowDown.style.display="block";
    arrowUp.style.display="none";

});

arrowDown.addEventListener('click', function() {
    console.log(this);
    settingsCont[0].style.display="block";
    arrowDown.style.display="none";
    arrowUp.style.display="block";

});

//Kids click event
arrowUp2.addEventListener('click', function() {
    console.log(this);
    settingsCont2[0].style.display="none";
    arrowDown2.style.display="block";
    arrowUp2.style.display="none";

});

arrowDown2.addEventListener('click', function() {
    console.log(this);
    settingsCont2[0].style.display="block";
    arrowDown2.style.display="none";
    arrowUp2.style.display="block";

});

//About click event
arrowUp3.addEventListener('click', function() {
    console.log(this);
    settingsCont3[0].style.display="none";
    arrowDown3.style.display="block";
    arrowUp3.style.display="none";

});

arrowDown3.addEventListener('click', function() {
    console.log(this);
    settingsCont3[0].style.display="block";
    arrowDown3.style.display="none";
    arrowUp3.style.display="block";

});