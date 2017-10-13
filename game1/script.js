var ballNr1 = document.getElementsByClassName('nr1');
var ballNr2 = document.getElementsByClassName('nr2');
var ballsContainer = document.getElementById('ballTotal');
var ballContainer1 = document.getElementById('ballContainer1');
var ballContainer2 = document.getElementById('ballContainer2');
var signContainer  = document.getElementById('signContainer');
var signContainer2  = document.getElementById('signContainer2');
var signButton = document.getElementById('signButton'); // plus
var signMinusButton = document.getElementById('signMinusButton'); // minus
var signRefreshButton = document.getElementById('signRefreshButton'); // minus
var resetAll = document.getElementById('resetAll');
var egalBtn = document.getElementsByClassName('totalMingi');
var ballTotalInt = document.getElementById('ballTotalInt');
var ballCount1, ballCount2, ballCountTotal = 0;

for (var i = 0; i < ballNr1.length; i++) {
    ballNr1[i].onclick = function() {
        ballCount1 = this.value;
         for (var i = 0; i < ballCount1; i++) {
             addNode(ballContainer1);
        }
        ballNr1[i - 1].style.backgroundColor= '#d37b93';
        ballNr1[i - 1].style.color= 'white';
    }
}


for(var i = 0; i < ballNr2.length; i++) {
    ballNr2[i].onclick = function() {
        ballCount2 = this.value
         for(var i = 0; i < ballCount2; i++) {
             addNode(ballContainer2); 
        }
        ballNr2[i - 1].style.backgroundColor= '#d37b93';
        ballNr2[i - 1].style.color= 'white';
    }
}


egalBtn[0].onclick = function() {
    
    if (signContainer.style.display  == 'block') {
    adunaMingile();
    } else if (signContainer2.style.display == 'block') {
    scadeMingile();
    }   
};

signButton.onclick = function() {
    signContainer.style.display = 'block';
}
signMinusButton.onclick = function() {
    signContainer2.style.display = 'block';
}
signRefreshButton.onclick = function() {
    location.reload();
}
//adaug un nod element
function addNode(container) {
    var para = document.createElement('span');
    para.className = 'newHelpA';
    var node = document.createTextNode(' ');   
    para.appendChild(node);

    container.appendChild(para);
}

function adunaMingile() {
    ballCountTotal = parseInt(ballCount1) + parseInt(ballCount2);
    console.log(ballCountTotal);
    
    ballsContainer.innerHTML = '';
    ballTotalInt.innerHTML = ballCountTotal;
    
    for(var i = 0; i < ballCountTotal; i++) {
        addNode(ballsContainer);
    }
}

function scadeMingile() {
    ballCountTotal = parseInt(ballCount1) - parseInt(ballCount2);
    
    ballsContainer.innerHTML = '';
    ballTotalInt.innerHTML = ballCountTotal;
    
    for(var i = 0; i < ballCountTotal; i++) {
        addNode(ballsContainer);
    }
}
console.log(egalBtn);
