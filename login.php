 <?php
if($_POST)
{
	echo 'Your details are invalid';
	$username = $_POST  ['username'];
	$password = $_POST ['password'];
	$user_id = $_POST ['user_id'];
	$valid='true';
		try {
        $host = '127.0.0.1';
        $dbname = 'ca web';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$q = $DBH->prepare("select * from users where  username = :username and user_id = :user_id and password = :password LIMIT 1");
		$q->bindValue(':username', $username);
		$q->bindValue(':password', $password);
		$q->bindValue(':user_id', $user_id);
		$q->execute();

		$row = $q->fetch(PDO::FETCH_ASSOC);

			$message='';

				if(!empty ($row)){
				$username = $row['username'];
				$password = $row['password'];
				$user_id = $row['user_id'];

				session_start();

				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["user_id"] = $user_id;


				if ($username != 'Admin' AND $password != 'Admin' ){
					header('Location:  studentHomepage.php');

				} else {

				}


		} else {

		}
	} catch(PDOException $e) {echo $e->getMessage();}
	}

?>

<!DOCTYPE>
<html>
<head>
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
<body background="library.jpg")>
<br><br><br><br><br><br>
<h2> Student Login</h2>
<form class='form-style' action="login.php" method="post">
Username <br> <input type="text" name="username" id="username" />
Password <br> <input type="password" name="password" id="password" />
ID <br> <input type="text" name="user_id" id="user_id" />
<br>
<input type="submit" class='button' name='submit' style=' background-color:#20B2AA;border:3px solid Teal' value= 'LOGIN'/>
<a href="index2.php" class="previous">&laquo; PREVIOUS</a>
</form>
</body>
</html>