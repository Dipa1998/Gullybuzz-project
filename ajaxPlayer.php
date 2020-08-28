
<?php
  include"Db/connection.php";
  $data= $_POST['dataPost'];
  $sql = "SELECT * FROM `playertable` WHERE teamId='$data' limit 11";
	$res = $db->query($sql);
	?>
		<option>Set Player</option>
	<?php
	while($row = $res->fetch_array()) {
		?>
			<!-- <option>Select one</option> -->
			<option value="<?php echo $row['id'];?>,<?php echo $row['playerName'];?>" id="aaa"><?php echo $row['playerName'];?></option>	
		  
		<?php

	}
?>

