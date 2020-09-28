<?php session_start()?>
<html>
<style>
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
<body background="bookout.jpg")>
<h2 style="text-align:center;"> Checked Out Books</h2>
<?php

include('db.php');
$stmt = $dbh->prepare("SELECT * FROM transaction");
$stmt->execute();
include('errordb.php');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<table>";
echo "<tr><th>&emsp;Book ID</th><th>User ID</th><th>Check Out Date (Y-M-D)</th></tr>";
foreach($rows as $row){

echo "<tr>";
echo "<td>";
echo " &emsp; ";echo " &emsp; ";
echo " &emsp; ";echo " &emsp; ";
echo " &emsp; ";
echo $row['books_id'];
echo " &emsp; ";echo " &emsp; ";
echo " &emsp; ";echo " &emsp; ";
echo "</td>";
echo "<td>";
echo " &emsp; ";echo " &emsp; ";
echo $row['user_id'];
echo " &emsp; ";echo " &emsp; ";
echo "</td>";
echo "<td>";
echo " &emsp; ";
echo " &emsp; ";
echo $row['check_out'];
echo " &emsp; ";echo " &emsp; ";
echo "</td>";
echo "</tr>";
}
echo "</table>";
?>
</html>