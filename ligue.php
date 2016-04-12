<!DOCTYPE html>
<head>
<style type="text/css">
	body{
		background-image: url("ligue1image.jpg");
		background-repeat: no-repeat;
		background-size: cover;
	}
	#heading{
		color: black;
	}
	#homepage{
		position: absolute;
		top: 0;
		right: 0;
		color: navy;
	}
</style>
</head>
<title>Ligue 1</title>
<body>
<h2 id="heading">Teams</h4>
<?php
include 'connection.php';
$epl = oci_parse($conn, 'SELECT name FROM club where country LIKE \'F%\' ORDER BY name ASC');
oci_execute($epl);
while (($row = oci_fetch_array($epl, OCI_BOTH)) != false) {
  $x = urlencode($row[0]);
	// echo gettype($x);
	echo "<a href=player.php?club=$x>$row[0]</a><br>";
}
oci_free_statement($epl);
oci_close($conn);
?>
<div class="home">
	<a href="index.php"><h2 id="homepage">FOOTYSTATS</h2></a>
</div>
</body>
</html>