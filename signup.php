<?php 
session_start();

/*

DESCRIPTION: SIMILAR TO LOGIN PAGE, THIS PAGE DISPLAYS THE SIGNUP PAGE WITH THE ACCOMODATION TO CHECK IF PASSWORDS MATCH. IF USERNAME IS ALREADY TAKEN, ECHOS AN ERROR REGARDING DUPLICATE VALUE. REDIRECTS TO LOGIN PAGE AFTER SUCCESSFUL SIGNUP.
- HASHES THE PASSWORD AND INSERTS TO DATABASE. 
*/

include("connection.php");
include("functions.php");
//$signup_success = false;
//$email_success= false;

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = mysqli_real_escape_string($con, $_POST['user_name']);
		$email=mysqli_real_escape_string($con, $_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			die('That is not an E-mail Address bruh. Please do not troll.' . mysqli_error($con));
		}
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$confirm_password=mysqli_real_escape_string($con, $_POST['confirm_password']);
		
		//check if password and confirm_password are equal and if not, display error message
		if ($password==$confirm_password){
			// check that username does not contain special characters and is alphanumerical
			if (!ctype_alnum($user_name)){
				die('Username must not contain special characters' . mysqli_error($con));
			}
			if(!empty($user_name) && !empty($password) && ctype_alnum($user_name)){
				
				// hash the password
				$hashed_pass=password_hash($password, PASSWORD_DEFAULT);
				
				// generate a random userid
				$user_id = random_num(20);
				
				//insert into DB
				$query = "insert into users (user_id,user_name, email, password) values ('$user_id','$user_name','$email','$hashed_pass')";

				$signup_success=1;

				if (!mysqli_query($con, $query)){					
					die('Error: ' . mysqli_error($con));
				}
				
				//send a verification email and redirect to login page.  
				if(mailer_verify_email($email)){
					echo "Email sent!";
				}
				else{
					die('Could not send Email' . mysqli_error($con));
				}

				header("Location: login.php");
				die;
			}
			else{
				die('All the Details must be filled' . mysqli_error($con));
			}

		}
		else{
			die('Passwords do not match' . mysqli_error($con));
		}
	}
?>

<!--
	
HTML PART

-->

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="css/signup.css">
</head>
<body style="background-image: url(images/website/signup.jpg); background-size: cover;">
	<div id="box"  style="background: rgba(0,0,0,0.5);">
		
		<form method="post">

			<div class="WYDRN">Sign Up</div>
			
			<span class="inputboxes" id="username">USERNAME</span>
			<input id="text" type="text" name="user_name" placeholder="HighnessAlexDaOne" required><br><br>
			
			<span  class="inputboxes">E-MAIL ADDRESS</span>
			<input id="text" type="email" name="email" placeholder="AlexDaOne@gmail.com" required><br><br>

			<span  class="inputboxes">PASSWORD</span>
			<input id="text" type="password" name="password" placeholder="Karm@beatsDogm@" required><br><br>
			
			<span  class="inputboxes">CONFIRM PASSWORD</span>
			<input id="text" type="password" name="confirm_password" placeholder="Karm@beatsDogm@" required><br><br>

			<input id="button" style="margin-top:15px; margin-bottom:20px" type="submit" value="Sign Up"><br><br>

			<a href="login.php" style="color:white;">Click to Login</a><br><br>

			<div class="alert alert-success">Signup Successful</div>
		</form>
	</div>
</body>
</html>