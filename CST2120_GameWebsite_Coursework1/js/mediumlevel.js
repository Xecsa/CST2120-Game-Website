var canvas = document.getElementById("earthwormCanvas");
var context = canvas.getContext("2d");
var score = document.getElementById("score");
var startBtn = document.getElementById("startBtn");
var pauseBtn = document.getElementById("pauseBtn");
var resumeBtn = document.getElementById("resumeBtn");
var fungi = document.getElementById("fungi");
var cropplant = document.getElementById("cropplant");
var backgroundForest = document.getElementById("backgroundMusic"); //sound
var eat = document.getElementById("eatMusic"); //sound
var die = document.getElementById("dieMusic"); //sound
var earthwormHeadX, earthwormHeadY, fungiX, fungiY, cropplantX, cropplantY, tail, totalTail, directionVar, direction, previousDir;
var speed=1, xSpeed, ySpeed;
const scale = 30;
var rows = canvas.height / scale;
var columns = canvas.width / scale;
var min = scale / 10; //for the Fungi's min coordinate
var max = rows - min; //for max coordinate
var gameInterval,  //interval after which the screen will be updated
    cropplantInterval, // interval after which the position of the fungi  will be updated
    intervalDuration=150, //starting screen updation interval
    minDuration=75; //minimum screen updation interval
var playing, gameStarted;
var boundaryCollision;
var tail0;




startBtn.addEventListener("click", startGame);

// revert the variables to their initial values
function reset() {
    clearInterval(gameInterval);
    clearInterval(cropplantInterval);
    
    intervalDuration=150, 
    minDuration=75;
    tail = [];
    totalTail = 0;
    directionVar = "Right";
    direction = "Right";
    previousDir = "Right";
    xSpeed = scale * speed;
    ySpeed = 0;
    earthwormHeadX = 0;
    earthwormHeadY = 0;
    pauseBtn.style.backgroundColor="#fff";
    resumeBtn.style.backgroundColor="#fff";
    playing=false, gameStarted=false;
    boundaryCollision=false;
}

function startGame() {
    reset();
    gameStarted=true;
    playing=true;
    fungiPosition();
    cropplantPosition();
    main();
    backgroundMusic();
   
}

function backgroundMusic(){
    backgroundForest.play();
    backgroundForest.loop();
    backgroundForest.setVolume(0,3);
    userStartAudio();
}

function pauseGame() {
    window.clearInterval(gameInterval);
    window.clearInterval(cropplantInterval);
    pauseBtn.style.backgroundColor="#ccc";
    resumeBtn.style.backgroundColor="#fff";
    playing=false;
}

function resumeGame()
{
    main();
    pauseBtn.style.backgroundColor="#fff";
    resumeBtn.style.backgroundColor="#ccc";
    playing=true;
}

//EventListener to determine which arrow key is pressed
window.addEventListener("keydown", pressedKey);

function pressedKey() {
    if(event.keyCode===32 && gameStarted) {
        if(playing) {
            pauseGame();
        }
        else{
            resumeGame();
        }
    }
    else {
        previousDir = direction;
        directionVar = event.key.replace("Arrow", "");
        changeDirection();
    }
}

// Depending on which arrow key is pressed, the earthworm's direction changes.
function changeDirection() {
    switch (directionVar) {
        case "Up":

            if (previousDir !== "Down") {
                direction=directionVar;
                xSpeed = 0;
                ySpeed = scale * -speed;
            } 
            break;

        case "Down":
           
            if (previousDir !== "Up") {
                direction=directionVar;
                xSpeed = 0;
                ySpeed = scale * speed;
            } 
            break;

        case "Left":
          
            if (previousDir !== "Right") {
                direction=directionVar;
                xSpeed = scale * -speed;
                ySpeed = 0;
            } 
            break;

        case "Right":
           
            if (previousDir !== "Left") {
                direction=directionVar;
                xSpeed = scale * speed;
                ySpeed = 0;
            } 
            break;
    }
}

// random Fungi and CropPlant coordinates
function generateCoordinates() {
    let xCoordinate = (Math.floor(Math.random() * (max - min) + min)) * scale;
    let yCoordinate = (Math.floor(Math.random() * (max - min) + min)) * scale;
    return {xCoordinate, yCoordinate};
}

//checking earthworm's collision 
function checkCollision() {
    let tailCollision=false, cropplantCollision=false; 
    boundaryCollision=false;
    //Collsion with its own tail
    for (let i = 0; i < tail.length; i++) {
        if (earthwormHeadX == tail[i].tailX && earthwormHeadY == tail[i].tailY) {
            tailCollision=true;
            die.play();
        }
    }
    // Collision with boundaries
    if(earthwormHeadX >= canvas.width || earthwormHeadX < 0 || earthwormHeadY >= canvas.height || earthwormHeadY < 0)
    {
        boundaryCollision=true;
        die.play();
    }
    // Collision with Cropplant
    if(earthwormHeadX===cropplantX && earthwormHeadY===cropplantY) {
        cropplantCollision=true;
        die.play();
      
    }
    return (tailCollision || boundaryCollision || cropplantCollision);

   
}

// Earthworm 

function drawEarthwormHead(color) {
        context.beginPath();
        context.arc(earthwormHeadX+scale/2, earthwormHeadY+scale/2, scale/2, 0, 2 * Math.PI);
        context.fillStyle = color;
        context.fill();
        // Creating  eyes for earthworm
        context.beginPath();
        if(direction==="Up") {
            context.arc(earthwormHeadX+(scale/5), earthwormHeadY+(scale/5), scale/8, 0, 2 * Math.PI);
            context.arc(earthwormHeadX+scale-(scale/5), earthwormHeadY+(scale/5), scale/8, 0, 2 * Math.PI);
        }
        else if(direction==="Down") {
            context.arc(earthwormHeadX+(scale/5), earthwormHeadY+scale-(scale/5), scale/8, 0, 2 * Math.PI);
            context.arc(earthwormHeadX+scale-(scale/5), earthwormHeadY+scale-(scale/5), scale/8, 0, 2 * Math.PI);
        }
        else if(direction==="Left") {
            context.arc(earthwormHeadX+(scale/5), earthwormHeadY+(scale/5), scale/8, 0, 2 * Math.PI);
            context.arc(earthwormHeadX+(scale/5), earthwormHeadY+scale-(scale/5), scale/8, 0, 2 * Math.PI);
        }
        else {
            context.arc(earthwormHeadX+scale-(scale/5), earthwormHeadY+(scale/5), scale/8, 0, 2 * Math.PI);
            context.arc(earthwormHeadX+scale-(scale/5), earthwormHeadY+scale-(scale/5), scale/8, 0, 2 * Math.PI);
        }
        context.fillStyle = "black";
        context.fill();
}

function drawEarthwormTail() {
    let tailRadius = scale/4;
        for (i = 0; i < tail.length; i++) {
            tailRadius=tailRadius+((scale/2-scale/4)/tail.length);
            context.beginPath();
            context.fillStyle = "#6c2c3a";
            context.arc((tail[i].tailX+scale/2), (tail[i].tailY+scale/2), tailRadius, 0, 2 * Math.PI);
            context.fill();
        }
}

// moving the earthworm from one position to the next
function moveEarthwormForward() {
    tail0=tail[0];
    for (let i = 0; i < tail.length - 1; i++) {
        tail[i] = tail[i + 1];
    }
    tail[totalTail - 1] = { tailX: earthwormHeadX, tailY: earthwormHeadY };
    earthwormHeadX += xSpeed;
    earthwormHeadY += ySpeed;
}

//Only in case of boundary collision
function moveEarthwormBack()
{
    context.clearRect(0, 0, 500, 500);
    for (let i = tail.length-1; i >= 1; i--) {
        tail[i] = tail[i - 1];
    }
    if(tail.length>=1) {
        tail[0] = { tailX: tail0.tailX, tailY: tail0.tailY };
    }
    earthwormHeadX -= xSpeed;
    earthwormHeadY -= ySpeed;
    drawCropPlant();
    drawFungi();
    drawEarthwormTail();
}

//display earthworm
function drawEarthworm() {
    drawEarthwormHead("#7d4350");
    drawEarthwormTail();
    if (checkCollision()) {
        clearInterval(gameInterval);
        clearInterval(cropplantInterval);
        if(boundaryCollision) {
            moveEarthwormBack();
        }
        drawEarthwormHead("red");
        setTimeout(()=>{ 
            scoreModal.textContent = totalTail;
            $('#alertModal').modal('show');
            // If the modal is displayed, remove the keydown event listener so that the earthworm does not move. 
            $( "#alertModal" ).on('shown.bs.modal', function(){
                window.removeEventListener("keydown", pressedKey);
            });
            // When the modal is hidden, reset all variables and re-add the keydown event listener.
            $('#alertModal').on('hidden.bs.modal', function () {
                context.clearRect(0, 0, 500, 500);
                score.innerText = 0;
                window.addEventListener("keydown", pressedKey);
                reset();
              })
            modalBtn.addEventListener("click", ()=>{
                context.clearRect(0, 0, 500, 500);
                score.innerText = 0;
            });
        }, 1000);
    }

}


//Cropplant
function cropplantPosition() {
    let cropplant=generateCoordinates();
    cropplantX=cropplant.xCoordinate;
    cropplantY=cropplant.yCoordinate;
}

function drawCropPlant() {
    context.drawImage(cropplant, cropplantX, cropplantY, scale, scale);
}




//Fungi
//generating random Fungi position within canvas boundaries
function fungiPosition() {
    let fungi=generateCoordinates();
    fungiX=fungi.xCoordinate;
    fungiY=fungi.yCoordinate;
}

//draw image of Fungi
function drawFungi() {
    context.drawImage(fungi, fungiX, fungiY, scale, scale);
}

//MAIN GAME
function checkSamePosition() {
    if(fungiX==cropplantX && fungiY==cropplantY) {
        cropplantPosition();
    }
    for(let i=0; i< tail.length; i++){
        if(cropplantX===tail[i].tailX && cropplantY===tail[i].tailY)
        {
            cropplantPosition();
            break;
        }
    }
    for(let i=0; i< tail.length; i++){
        if(fungiX===tail[i].tailX && fungiY===tail[i].tailY)
        {
            fungiPosition();
            break;
        }
    }
    }


function main() {
    // A specified interval for state updates
    cropplantInterval = window.setInterval(cropplantPosition, 4500);
    gameInterval = window.setInterval(() => {
        context.clearRect(0, 0, 900, 500);
        checkSamePosition();
        drawCropPlant();
        drawFungi();
        moveEarthwormForward();
        drawEarthworm();

        //check if earthworm eats the fungi - increase size of its tail, update score and find new Fungi position
        if (earthwormHeadX === fungiX && earthwormHeadY === fungiY) {
            totalTail++;
            //After every 20 points, increase the game's speed.
            if(totalTail%2==0 && intervalDuration>minDuration) {
                clearInterval(gameInterval);
                window.clearInterval(cropplantInterval);
                intervalDuration=intervalDuration-25;
                main();
    
            }
            fungiPosition();
            eat.play();
        }
        score.innerText = totalTail;

    }, intervalDuration);
}

