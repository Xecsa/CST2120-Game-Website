<html>
        <head>
            <title> Common PHP Page </title>
        </head>
    <body>
        <?php

            //Ouputs the header for the page and opening body tag
                function outputHeader($title){
                         echo '<!DOCTYPE html>';
                         echo '<html>';
                         echo '<head>';
                         echo '<title>' . $title . '</title>';
                         echo '<!-- Link to external style sheet -->';
                         echo '<link rel="stylesheet" type="text/css" href="../css/styles.css">';
                         echo '<link rel="stylesheet" type="text/css" href="../css/styles1.css">';
                         echo '<link rel="stylesheet" type="text/css" href="../css/styles2.css">';
                         echo '</head>';
                         echo '<body>';
                     }

            /* Ouputs the the navigation bar
                The selected class is applied to the page that matches the page name variable */
                function outputNavigation($pageName){
    
                        echo '<div class="navigation">';
                        echo "<a href='index.php' ><img src='../imgs/gamelogo.png' alt='Rules' style='float:left;width:25px;''> Farmer's Earthworm</a>";
                        echo '<a href="play!.php">Play!</a>';
                        echo '<a href="leaderboard.php">Leaderboard</a>';
                        echo '<a href="gamerules.php">Game Rules</a>';
                        echo '<a href="signUp.php" class="split">SignUp</a>';
                        echo '<a href="login.php" class="split">Login</a>';
                        echo '</div>';
    
                
                    }
                //Outputs closing body tag and closing HTML tag
                    function outputFooter(){
                             echo '<div class=>';
                             echo '<hr style="height:2px; width: 1220px; border-width:0;color:#93c572;background-color:#93c572">';
                             echo "<p> © 2022 Farmer's Earthworm, Inc. All rights reserved. <a  href='termsandprivacy.html'>Terms and privacy</a> </p>";
                             echo '<img src="../imgs/facebook.png" alt="Facebook" style=" margin-right: 60px;  float: right; width:30px;">';
                             echo '<img src="../imgs/instagram.png" alt="Instagram" style=" float: right; width:30px;">';
                             echo '<img src="../imgs/twitter.png" alt="Twitter" style=" float: right; width:30px;">';
                             echo '<img src="../imgs/snapchat.png" alt="Snapchat" style=" float: right; width:30px;">';
                             echo '<p>earthwormfarmers@gmail.com</p>';
                             echo "<p> <img src= '../imgs/donutlogo.png' style=' float: left; width:30px ;'>Donut Games | Farmer's Earthworm | Dubai Internet City | Dubai Knowledge Park | Middlesex University Dubai |
                             United Arab Emirates |</p>";
                             echo '</div>';
                             echo '</body>';
                             echo '</html>';
                     } 
        ?>
            
    </body>
</html>