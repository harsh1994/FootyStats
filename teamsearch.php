<!DOCTYPE html>
<html>
<head>
<script src="sorttable.js"></script>
	<title>Team Search</title>
<style type="text/css">
	div.home{
		position: absolute;
		top: 0;
		right: 0;
	}
#homepage{
		color: #FDF3E7;
	}
	a:link{
		text-decoration: none;
	}
	#mainNavigation {
  background-color: #FDF3E7;
  position: fixed;
  float: left;
  padding-right: 15.8%;
  padding-bottom: 20%;
}

#otherContent {
  background-color: #C63D0F;
  color: white;
  float: right;
  padding-top: 10%;
  padding-bottom: 50%;
  padding-left: 21%;
  padding-right: 7%;
  width: 44%;
  /*overflow-y:scroll; */
}
label, input {
    display: block;
}

label {
    margin-bottom: 20px;
}
</style>	
</head>
<body>
<div id="mainNavigation">
<h2>Search</h2>
<form action="" method="post">
	<label>
		Club
		<input id="club" name="club" type="text"></input>
	</label>
		Previous
		<input name="previous" type="number"></input>
	<label class="radio-inline">
      <input type="radio" name="optradio">Season
      <input type="radio" name="optradio">Months
      <input type="radio" name="optradio">Gameweeks
    </label>
		Shots on Goal
		<input id="shg" name="shotsongoal" type="number"></input>
	</label>
	<!-- <label> -->
		Shots on target
		<input id="sht" name="shotsontarget" type="number"></input>
	<!-- </label> -->
	<!-- <label> -->
		Fouls
		<input id="fouls" name="fouls" type="number"></input>
	<!-- </label> -->
	<!-- <label> -->
		Corners
		<input id="corners" name="corners" type="number"></input>
	<!-- </label> -->
	<!-- <label> -->
		Yellow Cards
		<input id="yellowcard" name="yellowcard" type="number"></input>
	<!-- </label> -->
	<!-- <label> -->
		Red Cards
		<input id="redcard" name="redcard" type="number"></input>
	<!-- </label> -->
	<input type="submit">
</form>
</div>

<div id="otherContent">
</div>
<div class = "home">
	<a href="index.php"><h2 id="homepage">FOOTYSTATS</h2></a>
</div>
</body>
</html>