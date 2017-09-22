//settings tab
var settingsBtn = document.getElementsByClassName('settings__li');
var accountCont = document.getElementById('account');
var profilesMin = document.getElementById('profiles-min');
var profilesCont = document.getElementById('profiles');
var aboutCont = document.getElementById('about');

var active = document.getElementsByClassName('.settings__li--active')[0];
document.getElementById('settings__li2').className += ' settings__li--active';
accountCont.style.display="none";
profilesMin.style.display="block";
profilesCont.style.display="block";
aboutCont.style.display="none";
document.getElementById('settings__li2').classList.add('settings__li--active');
document.getElementById('settings__li1').classList.remove('settings__li--active');
document.getElementById('settings__li3').classList.remove('settings__li--active');

settingsBtn[0].addEventListener('click', function() {
    accountCont.style.display="block";
    profilesMin.style.display="none";
    profilesCont.style.display="none";
    aboutCont.style.display="none";
    document.getElementById('settings__li1').classList.add('settings__li--active');
    document.getElementById('settings__li2').classList.remove('settings__li--active');
    document.getElementById('settings__li3').classList.remove('settings__li--active');
});
settingsBtn[1].addEventListener('click', function() {
    accountCont.style.display="none";
    profilesMin.style.display="block";
    profilesCont.style.display="block";
    aboutCont.style.display="none";
    document.getElementById('settings__li2').classList.add('settings__li--active');
    document.getElementById('settings__li1').classList.remove('settings__li--active');
    document.getElementById('settings__li3').classList.remove('settings__li--active');
});
settingsBtn[2].addEventListener('click', function() {
    accountCont.style.display="none";
    profilesMin.style.display="none";
    profilesCont.style.display="none";
    aboutCont.style.display="block";
    document.getElementById('settings__li1').classList.remove('settings__li--active');
    document.getElementById('settings__li2').classList.remove('settings__li--active');
    document.getElementById('settings__li3').classList.add('settings__li--active');
});