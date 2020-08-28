<!-- Add a new team  -->
<?php
   include"Db/connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>AddNewTeam</title>
	<style type="text/css">
		.textBox{
			width: 50%; 
			height: 25px ; 
			color: #111; 
			border-radius: 10px; 
			border: 2px solid #bf178d; 
			text-align: center; 
			padding: 2px; 
			font-weight: bold;
			margin-bottom: 3px;
			outline: none;

		}
		.lbl{
			color: #fff;
			font-size: 25px;
		}
		.btn{
			width: 30%;
			height: 35px;
			background-color: #703b94;
			color: #fff;
			margin: 4px;
			border: 3px solid #9c1a84;
			border-radius: 30px;
			margin-bottom: 6px;
			outline: none;

		}
		.btn:hover{
			background-color: #167568;
			border: 3px solid #8f1361;
			font-size: 18px;
		}

	</style>

</head>
<body>
	<center >
		<form method="post" action="#">
			<div  style="background-color: #78947f; width: 50%; margin-top: 100px; padding: 20px; border-radius: 20px;">
				  
					    <label class="lbl">Team Full Name</label><br>
						<input type="text" class="textBox"  id="teamFullName" name="teamFullName" placeholder="INDIA" required autocomplete="off"> <br><br>
				   	    <label class="lbl">Team Short Name</label><br>
						<input type="text" class="textBox" id="teamShortName" name="teamShortName" placeholder="IND" 
						required autocomplete="off"><br><br>
						<input type="submit" class="btn" value="Add" name="newSubmit">
				
		  </div>
	 </form>
</center>

<?php 
session_start();
if (isset($_POST['newSubmit'])) {
	$teamFullName	= $_POST['teamFullName'];
	$teamShortName	= $_POST['teamShortName'];

	$sql = "INSERT INTO `teamname` (`fullname`,`shortname`)
			VALUES ('$teamFullName','$teamShortName')";

			  if($db->query($sql) === TRUE)
			  {
			  	$lastId=$db->insert_id;
			  	$_SESSION["id"] =$lastId;
			  	echo "$lastId";  
			}
			else{
				echo "not inserted";
			}
			header('location:addPlayers.php');
		}
?>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>