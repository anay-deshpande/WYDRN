<?php

/**
 *   SIMILAR TO LOGIN PAGE, THIS PAGE DISPLAYS THE SIGNUP PAGE WITH THE ACCOMODATION TO CHECK IF PASSWORDS MATCH. IF USERNAME IS ALREADY TAKEN, ECHOS AN ERROR REGARDING DUPLICATE VALUE. REDIRECTS TO LOGIN PAGE AFTER SUCCESSFUL SIGNUP.HASHES THE PASSWORD AND INSERTS TO DATABASE.
 *
 * @version    PHP 8.0.12 
 * @since      March 2022
 * @author     AtharvaShah
 */

session_start();
require "connection.php";
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	/*------------------------------------------------------------------------------------------------------------------ 
	GRAB THE POSTED DATA FROM THE SIGNUP FORM AND STORE IT INSIDE VARIABLES AND PROCESS IT.
	------------------------------------------------------------------------------------------------------------------*/
    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // hash the password
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    // generate a random userid
    $user_id = random_num(20);

    //insert into DB
    $query = "INSERT INTO `users`(user_id, user_name, email, password) VALUES
	 		 ('$user_id','$user_name','$email','$hashed_pass')";

    /*---------------------------------------------------------------------------------------------------------------------- IF THE USERNAME IS ALREADY TAKEN, DISPLAY BOOTSTRAP ERROR. SEND AN EMAIL AND REDIRECT TO LOGIN PAGE. ALSO DISPLAY AND ERROR IF THE EMAIL IS NOT SENT.
    -----------------------------------------------------------------------------------------------------------------------*/
    if (!mysqli_query($con, $query)) {
        $invalid_signup = "<center><div class='alert alert-danger w-25 text-center' style='position: absolute;
							top: 50px; left: 570px;' role='alert'>
  						    	That username is already taken!
							</div></center>";
        echo $invalid_signup;
    } 
	
	/*-----------------------------------------------------------------------------------------------------------------
		 AFTER SUCCESSFUL SIGNUP, REDIRECT TO LOGIN PAGE;
   	-------------------------------------------------------------------------------------------------------------*/
	else {
       
        header("Location: login.php");
        die;
    } // END OF ELSE
} // END OF MAIN IF CONDITIONAL
mysqli_close($con);
?>

<!-------------------------------------------------------------------------------------------------------------------------
														HTML PART
------------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<!-------------------
	BOOTSTRAP CDN
	-------------------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/signup.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background-image: url(images/website/signup.jpg); background-size: cover;">
	<div id="box" style="background: rgba(0, 0, 0, 0.5);  width: 400px;
        margin-top: 120px; margin-left:560px">


		<form method="post" action="signup.php" onsubmit ="return Validation();">

			<div class="WYDRN">Sign Up</div>

			<!----------------
			USERNAME
			------------------>
			<span class="inputboxes" id="username" autofocus="true">USERNAME</span>
			<input class="text" id="name" type="text" name="user_name" placeholder="HighnessAlexDaOne" autofocus="true" required><br><br>

			<!----------------
			E-MAIL
			------------------>
			<span  class="inputboxes">E-MAIL ADDRESS</span>
			<input class="text" id="email" type="email" name="email" placeholder="AlexDaOne@gmail.com" required><br><br>

			<!----------------
			PASSWORD
			------------------>
			<span  class="inputboxes">PASSWORD</span>
			<input class="text" id="pass" type="password" name="password" placeholder="Karm@beatsDogm@" required><br><br>

			<!----------------
			CONFIRM PASSWORD
			------------------>
			<span  class="inputboxes">CONFIRM PASSWORD</span>
			<input class="text" id="confirmpass" type="password" name="confirm_password" placeholder="Karm@beatsDogm@" required><br><br>

			<!----------------
			SIGN UP BUTTON
			------------------>
			<input id="button" style="margin-left:130px;" type="submit" value="Sign Up"><br><br>

			<!----------------
			LOGIN BUTTON
			------------------>
			<a href="login.php" style="color:white; margin-left:160px;">Login</a>

		</form>
	</div>

<!-------------------------------------------------------------------------------------
	STICKY FOOTER requireD AT THE BOTTOM OF THE PAGE
------------------------------------------------------------------------------------->


<!-------------------------------------------------------------------------------------
	JAVASCRIPT VALIDATION
------------------------------------------------------------------------------------->
<script>
	function Validation(){
		var name = document.getElementById("name").value;
		var password = document.getElementById("pass").value;
		var confirmpassword = document.getElementById("confirmpass").value;
		var email = document.getElementById("email").value;
		var re = /\S+@\S+\.\S+/;
		const isAlphaNumeric = str => /^[a-z0-9]+$/gi.test(str);
		
		// CHECK IF USERNAME IS LONG ENOUGH
		if(name.length < 3 || name.length > 20){
			alert("Username must be between 3 and 20 characters");
			return false;
		}
		
		// CHECK IF USERNAME IS ALPHANUMERIC
		else if(!isAlphaNumeric(name)){
			alert("Username must not contain special characters");
			return false;
		}
		
		// CHECK FOR VALID EMAIL
		else if(!re.test(email)){
			alert("Please enter a valid email address");
			return false;
		}
		
		// CHECK FOR PASSWORD SECURITY LENGTH
		else if(password.length < 8 || password.length > 30){
			alert("Password must be between 8 and 30 characters");
			return false;
		}
		
		// CHECK FOR PASSWORD EQUALITY
		else if(password != confirmpassword){
			alert("Passwords do not match");
			return false;
		}
	
	// RETURN VALID AFTER ALL CHECKS PASS
	return true;
	}
</script>
</body>
</html>