<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>
<div align="left"> 
<?php   
if (isset($_SESSION["username"])){
echo '<button type="button";><i> <b>'.$_SESSION["username"].'</i> </b></button>';
}
?>
</div>
<script>

    function pop1(){
        window.open('help.php','popwin','width=640, height=455');
    }
</script>
<style>
    div {
	background-color: #20B2AA;
    border: 3px solid Teal;
    color: #000;
    padding: 3px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	align: center;
}

body {
  background-color: PaleTurquoise  ;
} 
 
a:link, a:visited {
    background-color: #20B2AA;
    color: #000;
    border: 3px solid Teal;
	border-radius: 5px;
    padding: 5px 10px;
    text-align: center;
	display: inline-block;
	margin-bottom: 5px;

a:hover, a:active {
    background-color: MediumTurquoise ;
    color: white;
}

</style>
</head>
<body background="computer.jpg")>
<br><br><br><br><br><br><br><br>
<h1 style="text-align:center;"> &emsp;&emsp; <b> My Library </b></h1>
<br><br>
<a href="logout.php" style="float: center; position:fixed; bottom:0;"  target="_self"> <b>SIGN OUT</a>
<h3 style="text-align:center;">
&emsp;&emsp;
<a href="myprofileDisplay.php"> My Profile </a>&emsp;
<a href="mybooks.php"> My Books </a>&emsp;
<a href="#" onclick="pop1()">Help</a> <br><br>
&emsp;&emsp;<a href=""> Search for books: </a>
<a <?php
require ('searchresults.php');
?>  > </a>
</h3>

</body>
</html>