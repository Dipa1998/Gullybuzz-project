<?php  
 		session_start();
	   include "../Db/connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="reg_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
</head>
<body>
	<!--Login Box-->
	<div class="reg_div">
		<h2>Login..</h2>
		<span id="emailError" class="text-danger"></span>
		<form method="post" action="">
			
			<input type="text" name="login_email" id="login_email" placeholder="Your Email.." required>
			
			<input type="password" name="login_pass" id="login_pass" placeholder="Password123@" required>

			<input type="submit" name="login_submit"  class="reg_submit" value="Login">
			<h5>Create an account?<a href="regPage.php" class="signIn">Sign up</a></h5>
			<h5><a href="#" class="signIn">Forget password?</a></h5>
		</form>
	 </div>
</body>

</html>
<?php 
 if (isset($_POST['login_submit'])) {
	$login_email	= $_POST['login_email'];
	$login_pass	    = $_POST['login_pass'];
	// echo $db;

	$select = mysqli_query($db, "SELECT * FROM `usertable` WHERE `userEmail` ='$login_email' and `userPassword`='$login_pass'" )or die(mysql_error());
	$rows = mysqli_num_rows($select);
	// print_r($select);
	// print_r($rows);
	// echo $select['userEmail'];
		if($rows>0) {

			 /*echo "<script>document.getElementById('emailError').innerHTML=
					   \"Login Sucessfully\";</script>";*/
					  $_SESSION['userEmail']=$login_email;
			   header('location:../homePage.php');	
	} else {		   
			    echo "<script>document.getElementById('emailError').innerHTML=
					   \"Wrong Email\";</script>";
			}

	}
?>