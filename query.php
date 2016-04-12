<!DOCTYPE html>
<head><script src="sorttable.js"></script></head>
<style type="text/css">
	body {
  margin: 0px;
}
a:link{
		text-decoration: none;
	}
#mainNavigation {
  background-color: #FDF3E7;
  position: fixed;
  float: left;
  padding-right: 15.5%;
  padding-bottom: 20%;
}

#otherContent {
  background-color: #C63D0F;
  color: white;
  float: right;
  /*margin: 0px;*/
  padding-top: 10%;
  padding-bottom: 50%;
  padding-left: 21%;
  padding-right: 5%;
  /*width: 50%;*/
}
label, input {
    display: block;
}

label {
    margin-bottom: 20px;
}
div.home{
		position: absolute;
		top: 0;
		right: 0;
	}
#homepage{
		color: #FDF3E7;
	}
</style>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<title>Search</title>
<div id="mainNavigation">
<h2>Search</h2>
  <form action="" method="post">
  	<label>
  		Name
  		<input id="name" name="name" type="text"></input>
  	</label>
  	<label>
  		Position
  		<select  id="position" name="position">
  			<option value="blank"></option>
  			<option value="RW">RW</option>
  			<option value="ST">ST</option>
  			<option value="LW">LW</option>
  			<option value="CM">CM</option>
  			<option value="CDM">CDM</option>
  			<option value="RM">RM</option>
  			<option value="LB">LB</option>
  			<option value="LM">LM</option>
  			<option value="CF">CF</option>
  			<option value="CAM">CAM</option>
  			<option value="CB">CB</option>
  			<option value="RB">RB</option>
  			<option value="LWBx	">LWB</option>
  		</select>
  	</label>
  	<label>
  		Goals
  		<input type="number" name="goals"></input>
  	</label>
  	<label>
  		Seasons
  		<select name="seasons">
  			<option value="0"></option>
  			<option value="1">1</option>
  			<option value="2">2</option>
  			<option value="3">3</option>
  		</select>
  	</label>
  	<label>
  		Number of results
  		<input type="number" name="rows"></input>
  	</label>
  	<label>
  		Age
  		<label>
  			Min
  			<input type="number" name="minimum"></input>
  		</label>
  		<label>
  			Max
  			<input type="number" name="maximum"></input>
  		</label>	
  	</label>
  	<input type="submit">
  </form>
</div>

<div id="otherContent">
<table class="sortable" border=1 cellpadding=5><tr><td>Name</td><td>Age</td><td>Club</td><td>Rating</td><td>Pace</td><td>Shooting</td><td>Passing</td><td>Dribbling</td><td>Defending</td><td>Physical</td></tr>
  <?php 
  include 'connection.php';
  if($_POST){
  	$name = $_POST['name'];
  	$position = $_POST['position'];
  	$goals = $_POST['goals'];
  	$season = $_POST['seasons'];
  	$tuples = $_POST['rows'];
  	$minage = $_POST['minimum'];
  	$maxage = $_POST['maximum'];
  	// echo "$position";
  	// echo "$name";
  	// echo "$minage";
  	// $query1 = oci_parse($conn,'SELECT * FROM dual WHERE 1=1');
  	// $query1 = oci_parse($conn,'SELECT name,rating,pace,shooting,passing,dribbling,defending,physical FROM outfield_player WHERE 1=1');
  	$sql = 'SELECT outfield_player.name,player.age,player.club,outfield_player.rating,outfield_player.pace,outfield_player.shooting,outfield_player.passing,outfield_player.dribbling,outfield_player.defending,outfield_player.physical FROM outfield_player,player WHERE outfield_player.name=player.name AND 1=1';
  	// if(!empty($tuples))
  	// {
  	// 	$sql .=" rownum<=$tuples";
  	// }

  	if (!empty($name))
  	{
  		$sql .=" AND outfield_player.name LIKE '%$name%'";
  		// oci_bind_by_name($query1,':nm', $name);
  	}
  	if($position!='blank')
  	{
  		$sql .=" AND position='$position'";
  	}
  	if(!empty($minage))
  	{
  		$sql .=" AND player.age>=$minage";
  	}
  	if(!empty($maxage))
  	{
  		$sql .=" AND player.age<=$maxage";
  	}
  	if(!empty($goals))
  	{
  		$sql .=" AND player.goals>=$goals";
  	}

  	$sql .=" ORDER BY rating DESC";
  	$query1 = oci_parse($conn, $sql);

  	// echo $sql;
  	// if(!empty())
  	// oci_bind_by_name($query1,':nm', $name);
  	// oci_bind_by_name($query1, ':pos', $position);
  	// oci_bind_by_name($query1, ':row', $tuples);
  	oci_execute($query1);
  	while (($row = oci_fetch_array($query1, OCI_BOTH)) != false) {
  	?>
	<tr>
	<td><?php echo $row[0] ?></td>
	<td><?php echo $row[1] ?></td>
	<td><?php echo $row[2] ?></td>
	<td><?php echo $row[3] ?></td>
	<td><?php echo $row[4] ?></td>
	<td><?php echo $row[5] ?></td>
	<td><?php echo $row[6] ?></td>
	<td><?php echo $row[7] ?></td>
	<td><?php echo $row[8] ?></td>
	<td><?php echo $row[9] ?></td>
  </tr>
<?php
}
oci_free_statement($query1);
oci_close($conn);
  }
   ?>
</div>
<div class = "home">
	<a href="index.php"><h2 id="homepage">FOOTYSTATS</h2></a>
</div>
</html>