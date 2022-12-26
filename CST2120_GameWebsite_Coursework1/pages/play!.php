<?php
    //Include the PHP functions to be used on the page 
    include('../common.php'); 
	
    //Output header and navigation 
    outputHeader("My Game Website - Game",'../styles');
    outputNavigation("Game");
?>

<?php
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
echo '';
?>

<?php
echo '<style>';
echo '';
echo 'body {';
echo 'margin: 0;';
echo 'padding: 0;';
echo '}';
echo '';
echo 'h3 {';
echo 'text-transform: uppercase;';
echo 'font-size: 2.5rem;';
echo 'color: 	#6c541e;';
echo 'font-weight: 100;';
echo 'font-style: oblique;';
echo 'font-weight: bold;';
echo '}';
echo '';
echo 'h4 {';
echo 'color: #665d1e;';
echo 'text-transform: uppercase;';
echo 'font-size: 1.5rem;';
echo 'position: absolute;';
echo 'top: -60px;';
echo 'left: -230px;';
echo '}';
echo '';
echo 'canvas {';
echo 'background-image: url(../imgs/background1.jpg);';
echo 'background-repeat: no-repeat;';
echo 'background-size: cover;';
echo 'box-shadow: 5px 5px 5px 10px greenyellow;';
echo '}';
echo '';
echo '.gamePage {';
echo 'margin-top: 1rem;';
echo '}';
echo '';
echo '.rel {';
echo 'position: relative;';
echo '}';
echo '';
echo '.modal-dialog {';
echo 'max-width: 300px;';
echo '}';
echo '';
echo '.modal-body  {';
echo 'text-align: center;';
echo '}';
echo '';
echo '.btn {';
echo 'display: block;';
echo 'width: 15%;';
echo 'font-size: 1rem;';
echo 'background-color: brown;';
echo 'color: #fff;';
echo 'border: 4px solid #592720;';
echo '}';
echo '';
echo '.btn:hover {';
echo 'color: brown;';
echo 'background-color: #fff;';
echo '}';
echo '';
echo '.modal-btn {';
echo 'width: 20%;';
echo '}';
echo '';
echo '.buttons {';
echo 'margin-bottom: 10px;';
echo 'position: absolute;';
echo 'top: -70px;';
echo 'left: 140px;';
echo '}';
echo '';
echo '.result img{';
echo 'height: 20px;';
echo 'width: 20px;';
echo 'margin-right: 10px;';
echo '}';
echo '#pauseBtn, #resumeBtn {';
echo 'cursor: pointer;';
echo 'padding: 10px;';
echo 'border: 1px solid #ccc;';
echo 'border-radius: 2px;';
echo 'margin: 5px;';
echo '}';
echo '';
echo '#pauseBtn:hover, #resumeBtn:hover {';
echo 'background-color: #ccc;';
echo '}';
echo '#scoreModal {';
echo 'color: brown;';
echo 'font-weight: bolder;';
echo '}';
echo '';
echo '#rottenplant, #freshplant {';
echo 'display: none;';
echo '}';
echo '';
echo '#earthworm {';
echo 'height: 100px;';
echo 'width: 100px;';
echo 'margin-bottom: 20px;';
echo '}';
echo '';
echo '';
echo '';
echo '';
echo '</style>';
echo '';
?>

<?php
echo "<h1 style='width: 800px;'> Welcome to Farmer's Earthworm !</h1>";
echo '<div class="gamePage d-flex flex-column justify-content-center align-items-center">';
echo "<h3> Farmer's Earthworm</h3>";
echo '<h2> EASY LEVEL </h2>';
echo '<p style="margin-right: 80px;"> The player must make the earthworm eat the rotten plant <img style="height: 20px; width: 20px;" src="../imgs/rottenplant.png"> in order to gain points and must avoid eating the fresh plant <img style="height: 20px; width: 20px;"  src="../imgs/freshplant.png"> as the game will end! </p>';
echo '<p style="margin-right: 80px;"> <img style="height: 20px; width: 20px;" src="../imgs/rules.png"> Alert!  As the player reaches 10 points the speed of our friendly earthworm is gonna increase. </p>';
echo '<a  class="btn mt-2 mb-4" href="../pages/mediumlevel.php"> Medium Level </a>';
echo "<div id='startBtn' class='btn mt-2 mb-4'>let's start game!</div>";
echo '<div class="rel">';
echo '<div class="d-flex buttons">';
echo '<div id="pauseBtn">';
echo '<img  src="../imgs/pause.png"></img>';
echo '</div>';
echo '<div id="resumeBtn">';
echo '<img src="../imgs/play.png"></img>';
echo '</div>';
echo '</div>';
echo '<h4 class="mt-3"><span class="result"><img src="../imgs/rottenplant.png" alt="rottenplant"></span><span id="score">0</span></h4>';
echo '</div>';
echo '<canvas id="earthwormCanvas" width="900" height="500"></canvas>';
echo '<img height="80" width="50" id="freshplant" src="../imgs/freshplant.png" alt="freshplant">';
echo '<img style="height: 80; width: 80;"  id="rottenplant" src="../imgs/rottenplant.png" alt="rottenplant">';
echo '<audio autoplay loop id="backgroundMusic"  src="../sounds/game.mp3" alt="BackgroundMusic"></audio>';
echo '<audio id="eatMusic" src="../sounds/eat.mp3" alt="EatMusic"></audio>';
echo '<audio id="dieMusic" src="../sounds/die.mp3" alt="DieMusic"></audio>';
echo '<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
echo '<div class="modal-dialog modal-dialog-centered" role="document">';
echo '<div class="modal-content">';
echo '<div class="modal-body">';
echo '<img id="earthworm" src="../imgs/gamelogo.png" alt="earthworm">';
echo '<p>Game Over! Your Score is: <span id="scoreModal"></span></p>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btn modal-btn" data-dismiss="modal">Ok</button>';
echo '<!-- <input type="text" name="username" id="username" placeholder="username"> -->';
echo '<!-- <button style="width: 80px;" type="submit" class="btn" id="saveScoreBtn" onclick="saveHighScore(event)"> Save </button> -->';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>';
echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>';
echo '<script type="text/javascript" src="../js/earthworm.js"></script>';
echo '';
echo '';
echo '';
echo '';
echo '';
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
echo '';
echo '';
?>




<?php
    //Output the footer
    outputFooter();
