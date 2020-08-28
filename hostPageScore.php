<?php
   session_start();
   include"Db/connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Host</title>
	<link rel="stylesheet" type="text/css" href="hostPageScoreStyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="mainDiv">
		<h2 style="text-align: center; color: #fff">Game Is On</h2>
		<div class="scoreDiv">
			<div class="setBatBall">
				<div style="margin-left: 10px; float: left;">
					 <form action="display()" method="post">
						<select style="height: 30px;width: 400px; background-color: silver; " onchange="setBatTeam(this.value)">
							<option>SET BATTING TEAM</option>
								<?php
									$sql = "SELECT * FROM `teamname`";
									$res = $db->query($sql);
									while($row = $res->fetch_array()) {
										?>
										   <option value="<?php echo $row['teamId'];?>,<?php echo $row['fullname'];?>"><?php echo $row['fullname'];?></option>
										<?php
									//echo "<option value='" . $row['teamId'] . "'>" . $row['fullname'] . "</option>";
									}
								?>
						</select>	     
				     </form>
			     </div >
				 <div style="margin-right: 10px; float: right;">
					  <form action="display()" method="post">
						<select style="height: 30px;width: 400px;  background-color: silver;" 
						        onchange="setBallTeam(this.value)">
						   <option>SET BAll TEAM</option>
							  <?php
								$sql = "SELECT * FROM `teamname`";
								$res = $db->query($sql);
								while($row = $res->fetch_array()) {
									?>
									   <option value="<?php echo $row['teamId'];?>,<?php echo $row['fullname'];?>"><?php echo $row['fullname'];?></option>
									<?php
								//echo "<option value='" . $row['teamId'] . "'>" . $row['fullname'] . "</option>";
								}
							?>
						</select>	     
				      </form>
				  </div>
					<!-- <select style="height: 30px;width: 40%; margin-left: 14%; display: none;" id="ballTeam" onchange="setBallTeam()" >
						<option>SET BOWLLING TEAM</option>
						 <?php
							$sql = "SELECT * FROM `teamname`";
							$res = $db->query($sql);
							while($row = $res->fetch_array()) {
							?>
							   <option><?php echo $row['fullname'];?></option>
							<?php	
							}
						?>
					</select> -->	 
			</div>
			<div >
				<div style=" background-color: #768082;">
		
					<input style="float: left; padding: 2px; margin: 5px 5px 0px 10px; width: 200px; background-color: silver; " type="text" name="" placeholder="Set Over"; id="overInput"; value="1">
					<input type="submit" style="float: left; margin: 5px 2px 0px 10px; padding: 5px; font-size: 15px; color: #fff; background-color: #4a8591"; value="Set Over"; id="setOver"; class="setOver"; onclick="overSet()" />

					<label style="font-size: 25px; color: #fff; margin: 0 0 0 120px;  " id="firstTeamHeader">Team 1</label>
					<label style="font-size: 25px; color: #111;">vs</label>
					<label style="font-size: 25px; color: #fff" id="secondTeamHeader">Team 2</label>

					<label style="float: right; margin-right: 100px; font-size: 25px; color: #fff" id="overView">0/0</label>

			    </div>
			    <div style="background-color: #768082;">
			    	<label style="font-size: 20px; color: #fff; margin-left: 20px;">Total Score:</label>
					<label style="font-size: 20px; color: #fff; margin-left: 10px;" id=oneRun>0</label>
					<label style="font-size: 20px; color: #fff; margin-left: 20px;">Extra:</label>
					<label style="font-size: 20px; color: #fff; margin-left: 10px;">05</label>
					<label style="font-size: 20px; color: #fff; margin-left: 10%;">Over:</label>
					<label style="font-size: 20px; color: #fff; margin-left: 10px;">6.2</label>
					<label style="font-size: 20px; color: #fff; margin-left: 10%;">Wicket:</label>
					<label style="font-size: 20px; color: #fff; margin-left: 10px;" id="totalOut">01</label>
					<label style="font-size: 20px; color: #fff; margin-left: 20%;"
					>Target:</label>
					<label style="font-size: 20px; color: #fff; margin-left: 10px;">1st Ing</label>
			    </div>
			    <div style="width: 100%; height: 40px; padding: 5px;background-color: #768082;">
					 <select style="width: 400px; height: 30px;  background-color: silver; " id="battingTeamPlayer" 
					 onchange="battingPlayers(this.value)">
			        	<option>Select Bat Man</option>
			        </select>
			       
			        <select style="width: 400px; height: 30px; float: right;  background-color: silver;" id="bowllingTeamPlayer" onchange="bowllingPlayers(this.value)">
			        	<option>Select Baller</option>
			        </select>
			    </div>
			    <div>
			    	<table style="width: 99%; margin: 5px;">
			    		<tr>
			    			<td style="font-size: 20px; color: #fff; margin-left: 20px; text-align: center;">Batting Score</td>
			    			<td style="font-size: 20px; color: #fff; margin-left: 20px; text-align: center;">Bowlling Score</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<p style="font-size: 25px; color: #fff; margin-left: 20px;" id="sticBattingPlayer"></p>
				    	 		<p style="font-size: 25px; color: #fff; margin-left: 20px" id="nonSticBattingPlayer"></p>
			    			</td>
			    			<td>
			    				<p style=" font-size: 25px; color: #fff; margin-left: 20px" id="bowllerOnCharge"></p>
			    			</td>
			    		</tr>
			    	</table	>	    	
		        </div>

			</div>
			
		</div>
		<div class="scoreInputDiv">
			<div class="outDIV" style="margin-left: 17%; display: unset;">
				<input type="submit" name="" id="btnwide" class="btnAllOut" onclick="bowledOut()" value="Bowled">
				<input type="submit" name="" id="btnone" class="btnAllOut" value="Caught">
				<input type="submit" name="" id="btntwo" class="btnAllOut" value="LBW">
				<input type="submit" name="" id="btnthree" class="btnAllOut" value="R.Out">
				<input type="submit" name="" id="btnfour" class="btnAllOut" value="Stumped">
				<input type="submit" name="" id="btnfive" class="btnAllOut" value="Hit-W">
				<input type="submit" name="" id="btnsix" class="btnAllOut" value="Others">
			</div>
			<div class="btnDIV" >
				<input type="submit" name="" id="btnwide" class="btnwide" value="W">
				<input type="submit" name="" id="btnone" class="btnone" value="1" onclick="onerun()">
				<input type="submit" name="" id="btntwo" class="btnone" value="2" onclick="tworun()">
				<input type="submit" name="" id="btnthree" class="btnone" value="3" onclick="threerun()">
				<input type="submit" name="" id="btnfour" class="btnone" value="4" onclick="fourrun()">
				<input type="submit" name="" id="btnfive" class="btnone" value="5" onclick="fiverun()">
				<input type="submit" name="" id="btnsix" class="btnone" value="6" onclick="sixrun()">
				<input type="submit" name="" id="btnno" class="btnwide" value="NO">
				<input type="submit" name="" id="btnout" class="btnout" value="OUT">	
			</div>
			
		</div>
	</div>
</body>
<script type="text/javascript">
	var firstTeam;
	function setBatTeam(value){
		var res  = value.split(",");
		var data = res[0];
		firstTeam=data;
 		 document.getElementById("firstTeamHeader").innerHTML = res[1];
		console.log(value);
		$.ajax({
			url :'ajaxPlayer.php',
			type:'POST',
			data:{dataPost: data},
			success: function(result){
				$('#battingTeamPlayer').html(result);
			    //$('#newSelect1').html(result);
		    }
		});
	}
	function setBallTeam(value){
		var re  = value.split(",");
		var dta = re[0];
		if(firstTeam!=dta){
 		 document.getElementById("secondTeamHeader").innerHTML = re[1];
 		 console.log(value);
		$.ajax({
			url :'ajaxPlayer.php',
			type:'POST',
			data:{dataPost: dta},
			success: function(result){
				//$('#newSelect').html(result);
			    $('#bowllingTeamPlayer').html(result);
		    }
		});
		}else{
			alert("The Team is batting now..Plese select another")
		}
		
	}	

	function battingPlayers(id){
		var plr  = id.split(",");
		console.log(plr[0]);
		console.log(plr[1]);
		if(document.getElementById("sticBattingPlayer").innerHTML===""){
			document.getElementById("sticBattingPlayer").innerHTML=plr[1]+"    30/2.5";
		}else if(document.getElementById("nonSticBattingPlayer").innerHTML===""){
			document.getElementById("nonSticBattingPlayer").innerHTML=plr[1]+"    23/1.3";
		}
		else{
				alert("Already Exist..!");
		}
		
	}
	function bowllingPlayers(id){
		var plr  = id.split(",");
		document.getElementById("bowllerOnCharge").innerHTML=plr[1]+"    12/1.2";

	}
	var totalOut=0;
	function bowledOut(){
		if(document.getElementById("sticBattingPlayer").innerHTML!=""){
			document.getElementById("sticBattingPlayer").innerHTML="";
			if(totalOut<=9){
				document.getElementById("totalOut").innerHTML=totalOut+1;
				totalOut=totalOut+1;
				<?php
				 


				?>

				/*$.ajax({
					url :'dbInsertOut.php',
					type:'POST',
					data:{dataPost: dta},
					success: function(result){
						//$('#newSelect').html(result);
					    //$('#bowllingTeamPlayer').html(result);
					    alert("data post");
				    }
				});*/

			}else{
			   alert("Match Over...");
		    }
		}else{
			alert("Please set bat's man");
		}
		

     
	}
	/*function myFunction() {
		if(document.getElementById("dam1").innerHTML!=""){
			document.getElementById("dam1").innerHTML="";
		}
     }
     function myFunctio() {

     	//document.getElementById('dam1').id = 'two';
		
     }
     function myRun(){
		  var el1 = document.getElementById("dam1"),
		      el2 = document.getElementById("dam2");
					  el1.id = 'dam2';
					  el2.id ="dam1";
    }*/
    function overSet(){
    	var over = document.getElementById("overInput").value;
    	document.getElementById("overView").innerHTML=over+"/"+over;
    }
    var t_run=0;
    function onerun(){	
    	t_run+=1;
    	document.getElementById("oneRun").innerHTML=t_run;

    }
</script>
</html>