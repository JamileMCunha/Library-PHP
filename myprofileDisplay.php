<?php session_start()?>

<h4 style="text-align:left;">
<a href="Addmyprofile.php"  class="button"> NEW ON THE SYSTEM? <br>ADD YOUR PROFILE HERE</a> <br>
<html>
<style>
.button {
	background-color: #20B2AA;
    border: 3px solid Teal;
    color: #000;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	align: center;
}
body {
  background-color: PaleTurquoise;
} 
 
a:link, a:visited {
    background-color: #20B2AA;
    color: #000;
    border: 3px solid Teal;
	border-radius: 5px;
    padding: 2px 10px;
    text-align: center;
	display: inline-block;
	margin-bottom: 5px;

a:hover, a:active {
    background-color: MediumTurquoise ;
    color: white;
}
</style>
<body background="profile.jpg">
<br><br>
<h1 style="text-align:center;"> <b>My Profile </b></h1> <br>
<div align='center'>
<?php
$username = (int) $_SESSION["username"];
$user_id = (int) $_SESSION["user_id"];
include('db.php');
$stmt = $dbh->prepare("SELECT * FROM profile WHERE user_id= '".$user_id."'");
$stmt->execute();
include('errordb.php');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
foreach($rows as $row){
echo"<b><h3>Username: </b><i>";
echo $row['username'];
echo "<br> <br>";
echo"<b></i>My User ID: </b><i>";
echo $row['user_id'];
echo "<br> <br>";
echo"<b></i>Address: </b><i>";
echo $row['address'];
echo "<br> <br>";
echo"<b></i>Phone: </b><i>";
echo $row['phone'];
echo "<br> <br>";
echo"<b></i>Email: </b><i>";
echo $row['email'];
echo "<br> <br>";
echo"<b></i>Gender: </b><i>";
echo $row['gender'];
}
echo "</table>";

$_SESSION['username']= $row['username'];
$_SESSION['user_id']= $row['user_id'];
?>
</div>


<h4 style="text-align:right;">
<a href="studentHomepage.php" class="previous">&laquo; HOMEPAGE</a>
</h4>
</html>