<?php
    //Include the PHP functions to be used on the page 
       include('../common.php'); 
	
    //Output header and navigation 
       outputHeader("My Game Website - Leaderboard",'../styles');
       outputNavigation("Leaderboard");
?>

<?php
          echo '<style>';
        /* Style sheet for leaderboard table*/
          echo 'table {
                    
                    border-collapse: collapse;
                    background-color: #dddddd;
                    width: 100%;
                  }';
                  
          echo 'td, th {
                    border: 1px solid #50c878;
                    text-align: left;
                    padding: 8px;
                  }';
                  
          echo 'tr:nth-child(even) {
                    background-color: #dddddd;
                  }';
          echo '</style>';
?>

<?php
          echo '<h1> <img src="../imgs/trophy.png" alt="trophy" style="margin-left: 50px; float:left;width:60px;"> LEADERBOARD </h1>';
          echo '<h2>Top Players</h2>';
          
          echo '<h1 style=" font-size: 38px; height: 60px; margin-left: 10px; width: 260px;"> <img style="width: 45px; height: 45px;" src="../imgs/diamond.png" > Easy Level  </h1>';
          echo '<!-- Creating an unordered list to display the score in highest to lowest order-->';
          echo '<ul class="text-center" id="highscore"></ul>';
          echo '';
          echo '<script>';
          echo 'const highscore = document.getElementById("highscore");';
          echo '';
          echo 'function createListItem(content){';
          echo 'const li = document.createElement("li");';
          echo 'li.textContent = content;';
          echo '';
          echo 'return li;';
          echo '}';
          echo '';
          echo '// Obtain the highscores from local storage. If it is empty, set it to empty array.';
          echo 'let scores = JSON.parse(localStorage.getItem("highscore"));';
          echo '';
          echo 'scores = scores.sort().reverse();';
          echo '';
          echo 'for (let index = 0; index < scores.length; index++) {';
          echo 'const li =createListItem(';
          echo 'String(index +1) + ") " + scores[index]';
          echo ');';
          echo '';
          echo 'highscore.appendChild(li);';
          echo '}';
          echo '</script>';
          echo '<script type="text/javascript" src="../js/earthworm.js"></script>';
          echo '';
          echo '';
        
          echo '<h1 style=" font-size: 38px; height: 60px; margin-left: 10px; width: 260px;">Medium Level</h1>';

          echo '<table style="margin-left: 60px;width:80%">';
          echo '<tr>';
          echo '<th></th>';
          echo '<th>Rank</th>';
          echo '<th>Player Name</th>';
          echo '<th>Country</th>';
          echo '<th>Team</th>';
          echo '<th>Points</th>';
          echo '</tr>';
          echo '<tr>';
          echo '<td><img src="../imgs/goldbar.png" style="width: 30px;"> </td>';
          echo '<td>1</td>';
          echo '<td>Justin Trudeau</td>';
          echo '<td>Canada</td>';
          echo '<td>Gold </td>';
          echo '<td>98</td>';
          echo '</tr>';
          echo '<tr>';
          echo '<td><img src="../imgs/goldbar.png" style="width: 30px;"> </td>';
          echo '<td>2</td>';
          echo '<td>Saud Abdul Rahmani</td>';
          echo '<td>United Arab Emirates</td>';
          echo '<td>Gold </td>';
          echo '<td>85</td>';
          echo '</tr>';
          echo '<tr>';
          echo '<td><img src="../imgs/goldbar.png" style="width: 30px;"> </td>';
          echo '<td>3</td>';
          echo '<td>Saeed Saleh Hattab</td>';
          echo '<td>Saudi Arabia</td>';
          echo '<td>Gold </td>';
          echo '<td>78</td>';
          echo '</tr>';
          echo '<tr>';
          echo '<td><img src="../imgs/goldbar.png" style="width: 30px;"> </td>';
          echo '<td>4</td>';
          echo '<td>Charlotte Georage</td>';
          echo '<td>United Kingdom</td>';
          echo '<td>Gold </td>';
          echo '<td>68</td>';
          echo '</tr>';
          echo '</table>';
          echo '<br><br><br><br><br><br><br><br>';
?>

<?php
    //Output the footer
    outputFooter();
    ?>