<?php
   include"Db/connection.php";
?>
<!-- Add player -->
<!DOCTYPE html>
<html>
<head>
	<title>Add Player</title>
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
 <center>
	<div class="teamName">
		<form method="post" action="">
			<div class="players" style="background-color: #78947f; width: 50%; margin-top: 1px; padding-top: 1px; border-radius: 20px;">
				<label class="lbl">Playing 11</label><br>
				<input type="text" class="textBox" name="one" id="firstPlayer" placeholder="1. No Player (Captain)" required autocomplete="off"><br>
				<input type="text" class="textBox" name="two" id="firstPlayer" placeholder="2. No Player (Vc.Captain)" required autocomplete="off"><br>
				<input type="text" class="textBox" name="three" id="firstPlayer" placeholder="3. No Player" required autocomplete="off"><br>
				<input type="text" class="textBox" name="four" id="firstPlayer" placeholder="4. No Player" required autocomplete="off"><br>
				<input type="text" class="textBox" name="five" id="firstPlayer" placeholder="5. No Player" required autocomplete="off"><br>
				<input type="text" class="textBox" name="six" id="firstPlayer" placeholder="6. No Player" required autocomplete="off"><br>
				<input type="text" class="textBox" name="seven" id="firstPlayer" placeholder="7. No Player" required autocomplete="off"><br>
				<input type="text" class="textBox" name="eight" id="firstPlayer" placeholder="8. No Player" required autocomplete="off"><br>
				<input type="text" class="textBox" name="nine" id="firstPlayer" placeholder="9. No Player" required autocomplete="off"><br>
				<input type="text" class="textBox" name="ten" id="firstPlayer" placeholder="10. No Player" required autocomplete="off"><br>
				<input type="text" class="textBox" name="eleven" id="firstPlayer" placeholder="11. No Player" required autocomplete="off"><br>
				<label class="lbl">Bench Player</label><br>
				<input type="text" class="textBox" name="twelve" id="firstPlayer" placeholder="1. No Player" autocomplete="off"><br>
				<input type="text" class="textBox" name="thirteen" id="firstPlayer" placeholder="2. No Player" autocomplete="off"><br>	
				<input type="text" class="textBox" name="fourteen" id="firstPlayer" placeholder="3. No Player" autocomplete="off"><br>	
				<input type="text" class="textBox" name="fifteen" id="firstPlayer" placeholder="4. No Player" autocomplete="off"><br>	
				<input type="text" class="textBox" name="sixteen" id="firstPlayer" placeholder="5. No Player" autocomplete="off"><br>	
			
			     <input type="submit" class="btn" value="ADD" name="playerSubmit">
		    </div>
		</form>
    </div>
  </center>
</body>
<?php 
session_start();
	if(isset($_SESSION["id"])!="")
		{
			$teamId =$_SESSION["id"] ;
		}

if (isset($_POST['playerSubmit'])) {
	$one		=$_POST['one'];
	$two		=$_POST['two'];
	$three		=$_POST['three'];
	$four		=$_POST['four'];
	$five		=$_POST['five'];
	$six		=$_POST['six'];
	$seven		=$_POST['seven'];
	$eight		=$_POST['eight'];
	$nine		=$_POST['nine'];
	$ten		=$_POST['ten'];
	$eleven		=$_POST['eleven'];
	$twelve		=$_POST['twelve'];
	$thirteen	=$_POST['thirteen'];
	$fourteen	=$_POST['fourteen'];
	$fifteen	=$_POST['fifteen'];
	$sixteen	=$_POST['sixteen'];


	$sql1 = "INSERT INTO `playertable` (`teamId`,`playerName`)
			VALUES ('$teamId','$one'),('$teamId','$two'),('$teamId','$three'),
			('$teamId','$four'),('$teamId','$five'),('$teamId','$six'),('$teamId','$seven'),
			('$teamId','$eight'),('$teamId','$nine'),('$teamId','$ten'),
			('$teamId','$eleven'),('$teamId','$twelve'),('$teamId','$thirteen'),
			('$teamId','$fourteen'),('$teamId','$fifteen'),('$teamId','$sixteen')";

			  if($db->query($sql1) === TRUE)
			  {  	
			    echo "Data inserted..";	
			}
			else{
				echo "Have an Error!";
			}
			header('location:hostPage.php');
		}
?>
</html>