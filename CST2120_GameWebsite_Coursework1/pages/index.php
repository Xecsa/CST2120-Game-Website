<?php
    //Include the PHP functions to be used on the page 
       include('../common.php'); 
	
    //Output header and navigation 
       outputHeader("My Game Website - Home",'../styles');
       outputNavigation("Home");
?>

<?php
          echo '<style>';

        /* Style sheet for Testimonials */
          echo'.container 
                 {
                    border: 4px solid #fcc200;
                    background-color: #4F7942;
                    border-radius: 5px;
                    padding: 10px;
                    margin: 10px 0;
                    width: 800px;     
                }';
          echo'.container::after 
                 {
                    content: "";
                    clear: both;
                    display: table;
                }';

          echo'.container img 
                {
                    float: left;
                    margin-right: 20px;
                    border-radius: 50%;
                }';

          echo'.container span 
                {
                    font-size: 25px;
                    margin-right: 15px;
                }';

          echo'@media (max-width: 400px) 
                {
              .container 
                {
                    text-align: center;
                    float: right;
                }
              .container img 
                {
                    margin: auto;
                    float: none;
                    display: block;
                }
                }';
          echo '</style>';
?>

<?php
        //Contents of the page
          echo '<h1>All About the Game! </h1>';
          echo '<img src="../imgs/Farmer\'s Earthworm .png " alt="Farmer\'s Earthworm" style="margin-left: 10px; float:left;width:300px;height:200px;">';
        //Introduction Container
          echo '<div style="float: right; margin-right: 80px; height: 185px;" class="container">';
          echo '<p><br>The user will utilize a helpful earthworm to collect the dead plants on a verdant paddy field that serves 
                 as the game\'s backdrop. Selecting a slow, medium, or fast speed will enable the player to increase the 
                 difficulty level.<br><br>
                 The gamer must refrain from gathering fresh plants because doing so lowers their score.
                 As more decaying plants are collected, the user\'s score increases.</p>';
          echo '</div>';
          echo '<br><br><br>';

        //Fun Facts Sildeshow
          echo'<div  style="margin-top: 200px; margin-left: 150px;  " class="slideshow-container">';
              // Image 1
             
          echo '<div class="mySlides fade">';
          echo '<div class="numbertext">1 / 3</div>';
          echo '<img src="../imgs/fact1.png" style="height: 500px; width:1000px;">';
          echo '</div>';

              // Image 2
          echo '<div class="mySlides fade">';
          echo '<div class="numbertext">2 / 3</div>';
          echo '<img src="../imgs/fact2.png" style="height: 500px; width:1000px;">';
          echo '</div>';
          
              //Image 3
          echo '<div class="mySlides fade">';
          echo '<div class="numbertext">3 / 3</div>';
          echo '<img src="../imgs/fact3.png" style="height: 500px; width:1000px;">';
          echo '</div>';
          echo '</div>';
          echo '<br>';

          echo '<div style="text-align:center">';
          echo '<span class="dot"></span>';
          echo '<span class="dot"></span>';
          echo '<span class="dot"></span>'; 
          echo '</div>';
          
          echo '<script>';
          echo 'let slideIndex = 0;';
          echo 'showSlides();';
          
          echo 'function showSlides() {';
          echo 'let i;';
          echo 'let slides = document.getElementsByClassName("mySlides");';
          echo 'let dots = document.getElementsByClassName("dot");';
          echo 'for (i = 0; i < slides.length; i++) {
                       slides[i].style.display = "none";  
                    }';
          echo 'slideIndex++;';
          echo 'if (slideIndex > slides.length) {slideIndex = 1}    
                       for (i = 0; i < dots.length; i++) {
                         dots[i].className = dots[i].className.replace(" active", "");
                    }
                         slides[slideIndex-1].style.display = "block";  
                         dots[slideIndex-1].className += " active";
                         setTimeout(showSlides, 2000); // Change image every 2 seconds
                     }';
          echo '</script>';
        
      
        //Testimonials
           echo '<h1> Testimonials </h1>';
               //User 1
            echo '<div class="container"  style="margin-left: 150px; background-color: #fcc200; border: 4px solid #4F7942">';
            echo '<img src="../imgs/avatar 1.png" alt="Avatar1" style="width:90px">';
            echo '<p><span>Mr.Bean</span>[Expert Player]</p>';
            echo '<p> I always play the farmer\'s Earthworm game. My excitement is pure!<br>
                         Looking forward to more upgrades and variants of the farmer\'s earthworm</p>';
            echo '</div>';
               //User 2
            echo '<div class="container" style="margin-left: 300px;">';
            echo '<img src="../imgs/avatar 2.png " alt="Avatar2" style="width:90px">';
            echo '<p><span>Lilibet Middleton</span>[Intermediate Player]</p>';
            echo '<p>The user interface of the game Farmer\'s Earthworm is fantastic.<br>
                         The graphics in the game are stunning. </p>';
            echo '</div>';
              //User 3
            echo '<div class="container" class="container"  style="margin-left: 150px; background-color: #fcc200; border: 4px solid #4F7942">';
            echo '<img src="../imgs/avatar 3.png " alt="Avatar3" style="width:90px">';
            echo '<p><span>Harry Duches</span>[Intermediate Player]</p>';
            echo '<p>The game Farmer\'s Earthworm is incredibly insightful.<br> Where young people can pick up some positive principles. </p>';
            echo '</div>';
              //User 4
            echo '<div class="container" style="margin-left: 300px;">';
            echo '<img src="../imgs/avatar 4.png " alt="Avatar4" style="width:90px">';
            echo '<p><span>Dua lipa</span>[Expert Player]</p>';
            echo '<p>I simply adore the game; it has the nicest visuals and design. </p>';
            echo '</div>';
            echo '<br><br><br><br><br><br><br><br><br>';

?>

<?php
    //Output the footer
    outputFooter();
?>