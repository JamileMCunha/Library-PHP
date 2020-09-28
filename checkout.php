<?php session_start(); ?>
<?php
	$user_id = $_SESSION['user_id'];
	$books_id = $_SESSION['books_id'];
	$check_out = "";
	$check_in = "" ;

		
	include("db.php");
			
			$sql = "SELECT * FROM transaction WHERE books_id= ?;";
			$sth = $dbh->prepare($sql);
			$sth->bindParam(1, $books_id);
			$sth->execute();
			$row = $sth->fetch(PDO::FETCH_ASSOC);
		 
		if ($sth->rowCount() == 0){
				
			$sql = "INSERT INTO transaction( books_id, user_id, check_out, check_in) VALUES (?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP+7000000);";
			$sth = $dbh->prepare($sql);
			$sth->bindParam(1, $books_id);
			$sth->bindParam(2, $user_id);
			
			$sth->execute();
			
			$_SESSION["books_id"] = $books_id;
			$_SESSION["user_id"] = $user_id;
			
			echo "<h2 style='text-align:center;'>Check Out Succeed!!!<br>";
			$d=strtotime("+7 Days");
			echo "Your book should be return until: ".date("d-m-Y", $d)."</h2><br>";
		
		} else {
			
			echo "<b><h2 style='text-align:center;'>This Book Is Not Available On The Library. </h2></b>";
		}

				
?>
<!DOCTYPE>
<html>
<body>
<style>
body {
  background-color: PaleTurquoise;
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

<a href="logout.php" style="float: left; position:fixed; bottom:0;"  target="_self"> <b>SIGN OUT</a>
</style>

</body>
</html>

