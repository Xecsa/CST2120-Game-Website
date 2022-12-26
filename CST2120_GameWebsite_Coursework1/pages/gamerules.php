<?php
    //Include the PHP functions to be used on the page 
    include('../common.php'); 
	
    //Output header and navigation 
    outputHeader("My Game Website - Game Rules",'../styles');
    outputNavigation("Game Rules");
   
?>

    
<?php
    // External Stylesheet
          echo '<style>';
          echo ' .Rule1 {
                      margin-bottom: 2px;
                      padding: 4px 12px;
                      background-color: #E4D00A;
                      border-left: 6px solid #0BDA51;
                    }';
          echo ' .Rule2 {
                      margin-bottom: 2px;
                      padding: 4px 12px;
                      background-color: 	#FDDA0D;
                      border-left: 6px solid #0BDA51;
                    }';
          echo  ' .Rule3 {
                      margin-bottom: 2px;
                      padding: 4px 12px;
                      background-color: #E4D00A;
                      border-left: 6px solid #0BDA51;
                    }';
                
          echo  ' .Rule4 {
                      margin-bottom: 2px;
                      padding: 5px 15px;
                      background-color: #FDDA0D;
                      border-left: 6px solid #0BDA51;
                    }';

          echo  ' .Technique1 {
                      margin-bottom: 2px;
                      padding: 4px 12px;
                      background-color: #FDDA0D;
                      border-left: 6px solid #0BDA51;
                    }';

          echo  '
                  .Technique2 {
                    margin-bottom: 2px;
                    padding: 4px 12px;
                    background-color: #E4D00A;
                    border-left: 6px solid #0BDA51;
                    }';

          echo  '  .Technique3 {
                    margin-bottom: 2px;
                    padding: 4px 12px;
                    background-color: #FDDA0D;
                    border-left: 6px solid #0BDA51;
                    }';
          echo  '</style>';
?>

<?php
    // Content of Rules Page
          echo '<h1><img src="../imgs/rules.png" alt="Rules" style="float:left;width:75px;"> Rules of the Game</h1>';
          echo '<img src="../imgs/rulesInterface.png" alt="Interface" style="width: 500px; height: 350px;float: right;">';
          echo '<br><br><br>';

          echo '<div class="Rule1" style="height: 50px; width: 800px; ">';
          echo '<p><strong>Rule 1:</strong> Farmer\'s Earthworm is a single-player game where 
                   the player controls an earthworm that manoeuvres to collect decaying plants in a
                   field of greenery.</p>';
          echo '</div>';
        
          echo '<div class="Rule2" style="height: 50px; width: 800px;">';
          echo '<p style="color:#4F7942" ><strong> Rule 2:</strong> The player must avoid running into objects like walls
                     or fresh plants. Running into live plants will cost you points, and running into a wall
                     will terminate the game.</p>';
          echo '</div>';
        
          echo '<div class="Rule3" style="height: 50px; width: 800px;">';
          echo '<p><strong>Rule 3:</strong> Selecting a slow, medium, or fast speed will enable the 
                     player to increase the difficulty level. </p>';
          echo '</div>';
        
          echo '<div class="Rule4" style="height: 50px; width: 800px;">';
          echo '<p style="color:#4F7942"><strong>Rule 4:</strong> As more decaying plants are collected the user\'s
                     score increases.</p>';
          echo '</div>';

          echo '<br><br><br><br><br><br><br>';

          echo '<h1>Techniques to play the game</h1>';

          echo '<div class="Technique1"  style="height: 50px; width: 1200px;">';
          echo '<p style="color:#8B4513"><strong>1. </strong> The earthworm moves continuosly
                       on the game board.</p>';
          echo '</div>';

          echo '<div class="Technique2"  style="height: 50px; width: 1200px;">';
          echo '<p style="color:#8B4513"><strong>3. </strong> The player uses the arrow keys to
                    direct the direction of the earthworm\'s movement.</p>';
          echo '</div>';

          echo '<div class="Technique3"  style="height: 50px; width: 1200px;">';
          echo '<p style="color:#8B4513"><strong>3. </strong> By manipulating the keys, the 
                       player can control how the earthworm moves (Right, Left, Up, Down).</p>';
          echo '</div>';

          echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

?>
        
<?php
    //Output the footer
    outputFooter();
    ?>