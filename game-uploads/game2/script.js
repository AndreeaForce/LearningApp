var numarA = $("#numarA");
var numarB = $('#numarB');
var total1 = $('#raspuns1');
var total2 = $('#raspuns2');
var total3 = $('#raspuns3');
var mesaj = $('#msg');
var next = $('#refresh');

var scorCont = $('#scor');
var scor = 0;
scorCont.html('Scor: 0');

var vietiCont = $('#vieti');
var vieti = 5;
vietiCont.html('Vieti: ' + vieti)

var randomA = randomPlus(1);
numarA.html(randomA);

var randomB = randomPlus(1);
numarB.html(randomB);



function shuffle(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
      j = Math.floor(Math.random() * i);
      x = a[i - 1];
      a[i - 1] = a[j];
      a[j] = x;    
    }
    return a;
}

function randomTotal() {
    var correctValue = randomA + randomB;
    var resultArr = [correctValue, (randomA + randomB) + randomSmall(), (randomA + randomB) - randomSmall()];
    var shuffledArr = shuffle(resultArr);
    
    console.log(shuffledArr);
    
    var selectorRaspuns;
    for (var i = 1; i <= shuffledArr.length; i++) {
        selectorRaspuns = $('#raspuns'+i);
        console.log(selectorRaspuns);
        console.log("Arr: " + shuffledArr[i-1]);
              
            selectorRaspuns.click(function() { 
                console.log(this);
                console.log("Value: " + correctValue);
                console.log("Arr: " + shuffledArr[i-1]);
                if (correctValue == shuffledArr[i-1]) {
                    console.log(shuffledArr[i-1]);
                    clickTotal(true);
                } else {
                    console.log("Not this");
                    clickTotal(false); 
                }
            });
        
        
        selectorRaspuns.html(shuffledArr[i-1]);
    }  
}
randomTotal();

// apasa pe raspunsul corect

function clickTotal(flag) { 
    if(flag) { 
        console.log("Coreeeeect");
        mesaj.html("Corect");
        next.show();
        return;
    } else {
        mesaj.html("Gresit");
        vieti-= 1;
        console.log("Gresiiit");
        vietiCont.html("Vieti: " + vieti);
        next.hide();
        if (vieti == 0) {
            var gameOver = $('#gameOver');
            gameOver.css('display','block');      
        }
    return;
    }
}
    
/* apasa pe raspunsul gresit
total2.onclick = function() {
    mesaj.innerHTML = "mai incearca";
    next.style.display = "none";
}
*/

//apasa pe next 
next.click(function() {
    //                 
    if (randomA >= 4 && randomB >= 4) { 
       randomA = randomPlus(5);
       numarA.html(randomA);
       randomB =  randomPlus(5);
       numarB.html(randomB);
       randomTotal();
        
    } else {
      randomA = randomPlus(1);
        numarA.html(randomA);
      randomB = randomPlus(1);
        numarB.html(randomB);
      randomTotal()
    };
    
    next.hide();
    mesaj.html("");
    // update scor
    scor += 5;
    scorCont.html("Scor: " + scor);
});

function randomSmall() {
    for (i = 0; i < 2; i++) {
        random = Math.floor((Math.random() * i) +1);
    };
    return random;
}

function randomPlus(n) {
    for (i = 0; i <= 6; i++) {
        random = (Math.floor((Math.random() * i) +n));
    };
    return random;
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

// Scor ajax
$(document).on('click', "#tryAgain", function(){
    var sendScor = scor;
    var childID = getUrlParameter("child_id");
    var gameID = getUrlParameter("id");
    console.log(scor);

    $.ajax({
        url: "/includes/scor.php",
        method: "POST",
        data:{
            sendScor:sendScor,
            childID:childID,
            gameID:gameID
        },
        dataType: "json",
        success:function(result) {
            console.log(result);
            location.reload();
        }
    });
});