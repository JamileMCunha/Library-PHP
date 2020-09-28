<?php
session_start();
$usernameErr = "";
$username = "";
$user_idErr = "";
$user_id = "";
$passwordErr = "";
$password = "";
$accountType = "";
$accountTypeErr = "";

if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
	$user_id = $_POST['user_id'];
	$accountType = $_POST['accountType'];

	if(preg_match("/^[a-zA-Z]{3,}$/", $_POST["username"]) === 0)
$usernameErr= '<p class="errText">Username must be bigger that 3 chars and must contain only letters.</p>';

	if(preg_match("/^[0-9]{7}$/", $_POST["user_id"]) === 0)
$user_idErr = '<p class=" bg-primary">User ID must have 7 digits exactly.</p>';

	if(preg_match("/^[0-9a-zA-Z]{6,10}$/", $_POST["password"]) === 0){
$passwordErr = '<p class="errText">Password must be bigger that 6 chars and smaller than 10, it can contain digits and letters.</p>';
	}
	
	if($_POST["accountType"] === "Student"){
$accountTypeErr = '<p class="errText">To access this register form you need to be a student</p>';
	}

	if (empty($usernameErr) && empty($user_idErr) && empty($passwordErr) ) {

	  try {
        $host = '127.0.0.1';
        $dbname = 'ca web';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$checkUserStmt = $DBH->prepare("select * from users where username = ?" );
		$checkUserStmt->bindParam(1, $username);
		$checkUserStmt->execute();

		if ($checkUserStmt->rowCount() == 0) { //no user with this $username exists

			$phash = password_hash($password, PASSWORD_BCRYPT);

			$sql = "INSERT INTO Users (username, password, user_id, accountType) VALUES (?, ?, ?, ?);";
			$sth = $DBH->prepare($sql);

			$sth->bindParam(1, $username);
			$sth->bindParam(2, $phash);
			$sth->bindParam(3, $user_id);
			$sth->bindParam(4, $accountType);
			
			$sth->execute();
			$_SESSION["username"] = $username;
			$_SESSION["user_id"] = $user_id;
			
			echo "<script>alert('Successfully Updated!'); window.location = './confirm.php';</script>"; 
			exit();
		}
		else
			echo 'Username already taken!';
		 } catch(PDOException $e) {echo $e->getMessage();}
	}
}
?>
<?php
if (isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$secretKey = "	6LcaODwUAAAAAHgMaj649DPZ5Q7-k1M_2XSqjgp4";
	$responseKey = $_POST['g-recaptcha-response'];
	$userIP = $_SERVER['REMOTE_ADDR'];
	
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
	$response = file_get_contents($url);
	$response = json_decode($response);
	if ($response->success)
		echo "ReCaptcha Verified"; 
	else 
		echo "ReCaptcha Not Verified";
	
	}

?>
<!DOCTYPE>
<html>

<head>
 <script>

    function pop1(){
        window.open('confirm.php','popwin','width=640, height=480');
    }
    </script>
  <link rel="stylesheet" href="style.css">
    <style>
	.error {display: block;color: #FF0000; }
body {
  background-color: PaleTurquoise  ;
}

a:link, a:visited {
    background-color: #20B2AA;
    color: #fff;
    border: 3px solid Teal;
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
<body background="register.png">
<br>
<br>
<h2> Registration Form</h2>
<form class='form-style' action="register.php" method="post">
Username <input type="text" name="username" value="<?php echo $username; ?>"/>
         <span class = "error"><?php echo $usernameErr;?></span>
Student ID <input type="text" name="user_id" value="<?php echo $user_id; ?>"/>
		 <span class = "error"><?php echo $user_idErr;?></span>
Password <input type="password" name="password" value="<?php echo $password; ?>"/>
       	 <span class = "error"><?php echo $passwordErr;?></span>
AccountType  <br> <select name="accountType">
<option value="Student">Student</option> <?php echo $accountType; ?>
       	 <span class = "error"><?php echo $accountTypeErr;?></span>
</select>
<br>
<div class="g-recaptcha" data-sitekey="6LcaODwUAAAAANOvIDTEFduYUwrw5uc2zViqpr7H"></div>
<b>
<input type="submit" class='button' name='submit' style='background-color:#20B2AA;border:3px solid Teal' value= 'REGISTER'/>
<a href="index.php" class="previous">&laquo; PREVIOUS</a>

</form>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>