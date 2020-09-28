<?php session_start() ?>
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
<?php
include('db.php');
	$id = ''; 
if( isset( $_GET['id'])) {
    $pid  = $_GET['id']; 

$stmt = $dbh->prepare("SELECT * FROM transaction WHERE id= :pid");
$stmt->bindValue(':pid', $pid);
$stmt->execute();
include('errordb.php');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$books_id = $row['books_id'];
$user_id = $row['user_id'];
$check_in = $row['check_in'];
$check_out = $row['check_out'];
} 

if ($_POST) {
$pid = $_POST['pid'];
$stmt = $dbh->prepare("DELETE FROM transaction WHERE id= :pid");
$stmt->bindValue(':pid', $pid);
$stmt->execute();
include('errordb.php');
echo "<br> <br> <br>";
echo "&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;";
echo "<b> &emsp;&emsp;&emsp;&emsp; This Book Was Checked In! ";
echo "<b><br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;The Book Is Now Available For Checked Out.";
echo "<br>";
echo "<b><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Thank You.";
exit();
}
?>


<h2 style="text-align:center;">Check In Book</h2><br></br>
<form action="checkin2.php" method="post">
<h4 style="text-align:center;"> 
Book ID: <input type="text" name="books_id" value="<?php echo $books_id; ?>"><br><br>
User ID: <input type="text" name="user_id" value="<?php echo
$user_id; ?>" readonly/> <br><br>
Checked Out Date: <input type="text" name="check_out" value="<?php echo $check_out; ?>" readonly/><br><br>
<input type="hidden" name="pid" value="<?php echo $pid; ?>" />
<input  type="submit" name="submit"  class='button'/>
</h4>
</form>
</body>
</html>

