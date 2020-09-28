<?php session_start()?>
<html>
<div class="button"> 
<?php   
if (isset($_SESSION["username"])){

echo '<button type="button";> <i> <b>Logged In As: '.$_SESSION["username"].'</i> </b></button>';
}
?>
</div>
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
<body background="mybooks.jpeg">
<br><br><br><br><br><br><br><br>
<h2 style="text-align:center;"> My books</h2> <br>
<div align='center'>
 <?php
$id = (int) $_SESSION["user_id"];
include('db.php');
$stmt = $dbh->prepare("SELECT * FROM transaction WHERE user_id= '".$id."'");
$stmt->execute();
include('errordb.php');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<table>";
echo "<tr><th>&emsp;Book ID</th><th>My User ID</th><th>Due Date</th></tr>";
foreach($rows as $row){
echo "<tr>";
echo "<td>"; 
echo " &emsp; &emsp; &emsp; ";
echo $row['books_id'];
echo " &emsp; &emsp; &emsp; ";
echo "</td>";
echo "<td>";
echo " &emsp; ";
echo $row['user_id'];
echo " &emsp; ";
echo "</td>";
echo "<td>";
echo " &emsp; &emsp; ";
echo $row['check_in'];
echo " &emsp; &emsp; ";
echo "</td>";
echo "</tr>";
}
echo "</table>";
?>
</div>


<h4 style="text-align:right;">
<a href="studentHomepage.php" class="previous">&laquo; HOMEPAGE</a>
</h4>
</html>