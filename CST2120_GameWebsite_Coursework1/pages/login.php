<?php
    //Include the PHP functions to be used on the page 
    include('../common.php'); 
	
    //Output header and navigation 
    outputHeader("My Game Website - Login",'../styles2');
    outputNavigation("Login");
   
?>

<?php
echo '<h1 style="font-size: 45px;"> Welcome to Farmer's Earthworm !</h1>';
echo '';
echo '<!--Login Form-->';
echo '<form  id="loginPara" onsubmit="return false">';
echo '<div  class="container" >';
echo '';
echo '<h1 style="text-align: center; margin-left: 15px;  width: 750px;">User Login!</h1>';
echo '<hr>';
echo '';
echo '<label for="email"><b>Email</b></label>';
echo '<input type="email" placeholder="Enter Email" name="email" id="email" required>';
echo '';
echo '<label for="psw"><b>Password</b></label>';
echo '<input type="password" placeholder="Enter Password" name="psw" id="password" required>';
echo '<p id="loginFailure" style="color:red;"></p>';
echo '';
echo '<hr>';
echo '<button type="submit" onclick="login()" class="registerbtn">Login</button>';
echo '';
echo '</div>';
echo '<div class="container signin">';
echo '<p>New to Farmer's Earthworm? <a href="signUp.html">Sign up now!</a></p>';
echo '</div>';
echo '</form>';
echo '';
echo '';
echo '<!--Defining the login Functions-->';
echo '';
echo '<script>';
echo '';
echo '// Check to see if the user has already logged in.';
echo 'window.onload = checkLogin;';
echo '';
echo 'function checkLogin(){';
echo 'if(sessionStorage.loggedInUsrEmail !== undefined){';
echo '// Extract the user's details who is logged in';
echo 'let usrObj = JSON.parse(localStorage[sessionStorage.loggedInUsrEmail]);';
echo '';
echo '// Hello, logged-in user.';
echo 'document.getElementById("loginPara").innerHTML = usrObj.email + " logged in.";';
echo '}';
echo '}';
echo '';
echo 'let cookies = document.cookie;';
echo '';
echo 'function login(){';
echo '// Get email address';
echo 'let email = document.getElementById("email").value;';
echo '';
echo '// User doesn't have a login';
echo 'if(localStorage[email] === undefined){';
echo '// Inform the user that they do not have an account';
echo 'document.getElementById("loginFailure").innerHTML = "Email not recognized. Do you have an account?";';
echo 'return; // User is logged in';
echo '}';
echo 'else{';
echo '//User has an account';
echo 'let usrObj = JSON.parse(localStorage[email]);// Convert to object';
echo 'let password = document.getElementById("password").value;';
echo 'if(password === usrObj.password){ // Sucessful login';
echo 'document.getElementById("loginPara").innerHTML = usrObj.email + " Logged in.";';
echo 'document.getElementById("loginFailure").innerHTML = ""; // Clear any login failures';
echo 'sessionStorage.loggedInUsrEmail = usrObj.email;';
echo '}';
echo 'else{';
echo 'document.getElementById("loginFailure").innerHTML = "Password Incorrect. Please try again.";';
echo '}';
echo '';
echo '}';
echo '}';
echo '</script>';
echo '';
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br>';
echo '';
?>


<?php
    //Output the footer
    outputFooter();
    ?>