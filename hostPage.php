<?php
   include"Db/connection.php";
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Host</title>
	<!-- <link href="css/surface_styles.css"/ rel="stylesheet"> -->
	<style type="text/css">
		.addBtn{
			width: 30%;
			height: 35px;
			background-color: #703b94;
			color: #fff;
			margin: 4px;
			font-size: 15px;
			border: 3px solid #9c1a84;
			border-radius: 30px;
			margin-bottom: 6px;
			outline: none;

		}
		.addBtn:hover{
			background-color: #167568;
			border: 3px solid #8f1361;
			font-size: 18px;
			transition: 0.3s;
		}
		.addLink1{
			background-color: #1A5844;
			margin-right: 30px;

		}
		.addLink2{
			background-color: #1A5844;
			margin-left: 30px;

		}
		.lbl{

			color: #fff;
			font-size: 25px;
			
		}		
		.teamNameTag{
			text-decoration: none; 
			color: #9e7310;
		}
		.teamNameTag:hover{
			color: #09114f;
			transition: .5s;
		}

	</style>
</head>
<body style="margin: 0; padding: 0;background-color: #5e5c5b">
	<div style="margin-left: 25%; ">
		<div class="card" style=" background-color: #1A5844;margin-top: 0px; padding: 5px ;width: 70%; text-align: center;">
			<label class="lbl" >Let's play cricket</label><br>
			<a href="addNewTaem.php" class="addLink1"><input type="submit" name="add" class="addBtn" value="Add a new Team"></a>
			<a href="hostPageScore.php" class="addLink2"><input type="submit" name="add" class="addBtn" value="Play Match"></a>  
	   </div> 
	   <div class="card" style=" background-color: #1A5844 ; min-height: 86vh; padding: 5px ;width: 70%; text-align: center;">
	   		<div style="background-color: ; width: 50%; height: 90vh; float: left;">
	   			<label class="lbl" style="color: #fff">All team list</label><br>
	   			<div style="overflow-x: hidden; height: 78vh;">
				  <?php

						$sql = "SELECT * FROM `teamname`";
						$res = $db->query($sql);
						while($row = $res->fetch_array()) {
							echo"<h2><a class=\"teamNameTag\" href=\"hostPage.php?id=$row[teamId]\"> $row[fullname]</a></h2>";
							// $_SESSION["playerId"]=$row['fullname'];
							echo "<br>";
						}
				 
			        ?>
			    </div>
	   		
	   	    </div>
	   	    <div style="background-color: ; width: 50%; height: 90vh;  float: right;">
	   	    	<label class="lbl" style="color: #fff">Player List</label><br>
	   	    	<div style=" overflow-x: hidden; height: 78vh;">
	                <?php
	                if(isset($_GET['id'])){
					  $var = $_GET['id'];
					  //echo $var;
					  $sql2 = "SELECT * FROM `teamname` WHERE teamId=".$var ;
					  $res2 = $db->query($sql2);
					  while($row2 = $res2->fetch_array()) {
							echo"<h2 style=\" padding:0px; color: #fff;\"> $row2[fullname] Players</h2>";
						}
					  $sql = "SELECT * FROM `playertable` WHERE teamId=".$var ;
						$res = $db->query($sql);
						while($row = $res->fetch_array()) {
							echo"<h3 style=\" padding:0px; color: #c23c08;\"> $row[playerName]</h3>";
						}
					}
					?>
			</div>
	   		
	      	</div>
	   </div>
   </div>
</body>
</html>



