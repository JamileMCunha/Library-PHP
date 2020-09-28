<?php session_start()?>
<html>
<style>
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
<body background="profile.jpg")>
<body>


<div id="login">
<h2 style="text-align:center;"> My Profile</h2>
<hr/>
<form action="" method="post">
<h3 style="text-align:center;" >
<label>Name:</label>
<input type="text" name="username" id="username" size="25%" height="70" required="required" placeholder="Please Enter Your Name"/><br /><br />
<label>ID:</label>
<input input type="text" name="user_id" id="user_id" size="25%" height="70" required="required" placeholder="Please Enter Your ID"/><br/><br />
<label>Address:</label>
<input type="text" name="address" id="address" size="25%" height="70" required="required" placeholder="Please Enter Your Address"/><br/><br />
<label>Phone:</label>
<input type="text" name="phone" id="phone" size="25%" height="70" required="required" placeholder="Please Enter Your Phone"/><br/><br />
<label>Email:</label>
<input type="email" name="email" id="email" size="25%" height="70" required="required" placeholder="Please Enter Your Email"/><br/><br />
<label>Gender:</label>
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="submit" value=" Submit " name="submit"> <br />

</h3>
</form>
</div>

<?php
if(isset($_POST["submit"])){
 include("db.php");
$sql = "INSERT INTO profile (username, user_id, address, phone, email, gender) VALUES 
('".$_POST["username"]."','".$_POST["user_id"]."','".$_POST["address"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["gender"]."') ";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('Your Profile Was Inserted Successfully') ;</script>";
echo "<script>location.href='myprofileDisplay.php'</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Your Profile Was Not Successfully Inserted.');</script>";
}

$dbh = null;
}

?>
</body>


<h4 style="text-align:right;">
<a href="myprofileDisplay.php" class="previous">&laquo; HOMEPAGE</a>
</h4>
</html>