<!-- Registration Page -->
   <?php  
	   include "../Db/connection.php";
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="reg_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
</head>
<body>
	<!--Registration Box-->
	<div class="reg_div">
		<h2>Sign Up Here</h2>
		<span id="emailError" class="text-danger"></span>
		<form method="post" action="#" onsubmit="return validate()">
			<input type="text" name="reg_name" id="name" placeholder="Your Name..">
			<span id="username" class="text-danger"></span>

			<input type="text" name="reg_phone" id="phone" placeholder="Your Phone..">
			<span id="userphone" class="text-danger"></span>

			<input type="text" name="reg_email" id="email" placeholder="Your Email..">
			<span id="useremail" class="text-danger"></span>

			<input type="password" name="reg_pass" id="password" placeholder="Password123@">
			<span id="userpassword" class="text-danger"></span>

			<input type="password" name="cnfm_pass" id="cnfm_password" placeholder="Conform Password..">
			<span id="cnformpassword" class="text-danger"></span>

			<input type="submit" name="reg_submit" class="reg_submit" value="Sign Up" onclick="validate();">
			<h5>Already have an account?<a href="userLogin.php" class="signIn">Login</a></h5>
		</form>
<!-- Database Insert Code  -->
<?php 
if (isset($_POST['reg_submit'])) {
	$reg_name	= $_POST['reg_name'];
	$reg_phone	= $_POST['reg_phone'];
	$reg_email	= $_POST['reg_email'];
	$reg_pass	= $_POST['reg_pass'];

	$select = mysqli_query($db, "SELECT `userEmail` FROM `usertable` WHERE `userEmail` ='$reg_email'");
		if(mysqli_num_rows($select)>0) {
				echo "<script>document.getElementById('emailError').innerHTML=
					   \"**Email is already registered\";</script>";
	} else {
			$sql = "INSERT INTO `usertable`
						(`userId`,`userName`,`userPhone`,`userEmail`,`userPassword`)
					VALUES (NULL,'$reg_name','$reg_phone','$reg_email','$reg_pass')";

			    $db->query($sql);
			    //header('location:../User_login/userLogin.php');
			}

	}
?>

    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="validation.js"></script>
</html>