<!DOCTYPE html>
<html>
<head>
	<?php session_start();?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Universtiy Website</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
<!-- navigation bar-->
<div id="Top_Strip" class="topnav">
<nav>
	<div class="btn">
		Login
		</div>
	<ul>

		<li>Home</li>
		<li>About</li>
		<li>Contact</li>
		<li href="javascript:void(0);" class="icon" onclick="myFunction()">
    		<i class="fa fa-bars"></i>
 		</li>
		
	</ul>
</nav>
</div>
</head>
<body>
<div class="frontText">
 	<h1>Let's Explore Your</h1>
 	<h1> Awesome City</h1>
</div>

</body>


<script>
function myFunction() {
  var x = document.getElementById("Top_Strip");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</html>