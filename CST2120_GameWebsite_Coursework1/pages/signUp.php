<?php
    //Include the PHP functions to be used on the page 
    include('../common.php'); 
	
    //Output header and navigation 
    outputHeader("My Game Website - SignUp",'../styles1');
    outputNavigation("SignUp");
   
?>

<?php
echo '<h1 style="font-size: 45px;"> Welcome to Farmer's Earthworm !</h1>';
echo '';
echo '<!-- SignUp Form -->';
echo '<form id="signup" class="form" onsubmit="return false">';
echo '<div  class="container">';
echo '<h1 style="text-align: center;  width: 750px;">User SignUp!</h1>';
echo '<p>Please fill in this form to create an account.</p>';
echo '<hr>';
echo '';
echo '<div class="form-field">';
echo '<label for="firstname"><b>Firstname</b></label>';
echo '<input type="text" placeholder="Enter Firstname" name="firstname" id="firstname" required>';
echo '<small></small>';
echo '</div>';
echo '';
echo '<div class="form-field">';
echo '<label style="vertical-align: top;" for="lastname"><b>Lastname</b></label>';
echo '<input type="text" placeholder="Enter Lastname" name="lastname" id="lastname" required>';
echo '<small></small>';
echo '</div>';
echo '';
echo '<div class="form-field">';
echo '<label for="email"><b>Email</b></label>';
echo '<input type="email" placeholder="Enter email" name="email" id="email" required>';
echo '<small></small>';
echo '</div>';
echo '';
echo '<br>';
echo '';
echo '';
echo '<div class="form-field">';
echo '<label for="psw"><b>Password</b></label>';
echo '<input type="password" placeholder="Enter Password" name="psw" id="password" required>';
echo '<small></small>';
echo '</div>';
echo '';
echo '<div class="form-field">';
echo '<label for="psw-confirm"><b>Confirm Password</b></label>';
echo '<input type="password" placeholder="Confirm Password" name="psw-confirm" id="psw-confirm" required>';
echo '<small></small>';
echo '</div>';
echo '';
echo '<label for="gender" class="required">Gender </label>';
echo '<select type="select" name="gender" id="gender">';
echo '<option value="">Gender</option>';
echo '<option value="Male">Male</option>';
echo '<option value="Female">Female</option>';
echo '</select>';
echo '<br><br><br>';
echo '';
echo '<label style="left: 100px; color:  #023020; font-weight: bolder;" for="birthday">Birthday:</label>';
echo '<input type="date" id="birthday" name="birthday">';
echo '<br><br>';
echo '';
echo '<hr>';
echo '<p>By creating an account you agree to our <a href="termsandprivacy.html">Terms & Privacy</a>.</p>';
echo '';
echo '<button type="submit"  onclick="storeUser()" class="registerbtn">Register</button>';
echo '</div>';
echo '';
echo '<div class="container signin">';
echo '<p>Already have an account? <a href="login.html">Log in</a>.</p>';
echo '</div>';
echo '</form>';
echo '';
echo '<!--Link to the register.js file-->';
echo '<script src="../js/register.js"></script>';
echo '';
echo '<!-- Result of registration displayed here -->';
echo '<p id="Result"></p>';
echo '';
echo '';
echo '<script>';
echo 'function storeUser(){';
echo '// Construct object that we are going to store';
echo 'var usrObject = {};';
echo 'usrObject.text = document.getElementById("firstname").value;';
echo 'usrObject.text = document.getElementById("lastname").value;';
echo 'usrObject.email = document.getElementById("email").value;';
echo 'usrObject.password = document.getElementById("password").value;';
echo 'usrObject.gender = document.getElementById("gender").value;';
echo 'usrObject.date = document.getElementById("birthday").value;';
echo '';
echo '// Store user';
echo 'localStorage[usrObject.email] = JSON.stringify(usrObject);';
echo '';
echo '// Inform user of result';
echo 'document.getElementById("Result").innerHTML = "<b> Registration successful.</b>";';
echo '}';
echo '</script>';
echo '';
echo '';
echo '';
echo '<br><br><br><br><br><br><br>';
echo '';
?>


<?php
    //Output the footer
    outputFooter();
    ?>