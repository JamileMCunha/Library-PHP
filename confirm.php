<?php
session_start(); ?>
<!DOCTYPE>
<html>

<head>
  <link rel="stylesheet" href="style.css">
    <style>
	body {
  background-color: PaleTurquoise  ;
}
	.error {display: block;color: #FF0000; }
.center {
    margin: auto;
    width: 35%; 
	background-color: MediumTurquoise;
	border: 5px solid #008080;  
    padding: 10px;
	
}
a:link, a:visited {
    background-color: #20B2AA;
    color: #fff;
    border: none;
	border-radius: 2px;
    padding: 5px 09px 8px 5px;
    text-align: center;
	display: inline-block;
	margin-bottom: 5px;
}

a:hover, a:active {
    background-color: MediumTurquoise ;
    color: white;
}
</style>
</head>
<body>
<div class="center"><h2>Confirmation Page</h2>
 <form class='form-style' action="login.php" method="post">  
<?php
	if (isset($_SESSION["username"]))  {
		echo "<br/><b>Your username is: </b>".$_SESSION["username"];
		echo "<br/><b>Your student ID is: </b>".$_SESSION["user_id"];
} else {
	die;
}
?>
<br><br><br><br>
<a href="login.php" class="previous">&laquo; <b> LOGIN</a>
</div>
</form>
</body>
</html>