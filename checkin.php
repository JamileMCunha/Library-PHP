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
<body background="bookin.jpg")>
<h2 style="text-align:center;"> Check A Book In</h2>
<?php

include('db.php');
$stmt = $dbh->prepare("SELECT * FROM transaction");
$stmt->execute();
include('errordb.php');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<table>";
echo "<tr><th>&emsp;Book ID</th><th>User ID</th><th>Due Date (Y-M-D)</th></tr>";
foreach($rows as $row){

echo "<tr>";
echo "<td>";
echo " &emsp; &emsp; ";
echo " &emsp; ";
echo $row['books_id'];
echo " &emsp; &emsp; &emsp; &emsp; ";
echo "</td>";
echo "<td>";
echo $row['user_id'];
echo "</td>";
echo "<td>";
echo " &emsp; &emsp; ";
echo $row['check_out'];
echo " &emsp; &emsp; ";
echo "</td>";
echo "<td>";
echo "<a href=checkin2.php?id=".$row['id']."><b>CHECK IN</a>";
echo "<td>";
echo "</tr>";
}
echo "</table>";
?>


</html>