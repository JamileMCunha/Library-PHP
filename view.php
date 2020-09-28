<?php session_start(); ?>
<html>
<head>
<div class="button"> 
<?php   
if (isset($_SESSION["username"])){

echo '<button type="button";> <i> <b>Logged As: '.$_SESSION["username"].'</i> </b></button>';
}
?>
</div>
<div align='center'>
<h2> Book Selected </h2> <br>
<script>

    function pop1(){
        window.open('checkout.php','popwin','width=280, height=240');
    }
</script>

<body>
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

<?php
if(isset($_GET['name_book'])) {
$name_book = $_GET['name_book'];	
$pname = $_GET['name_book'];	

include('db.php');

$stmt = $dbh->prepare("SELECT * FROM books WHERE name_book= :pname");
$stmt->bindValue(':pname', $pname);
$stmt->execute();
include('errordb.php');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "<table>";
echo "<tr><th>Id</th><th>Title</th><th>Author</th><th>IBSN</th></tr>";
echo "<tr>";
echo "<td>";
echo "<b>";
echo "<br>";
echo $row['books_id'];
echo "<br> <br>";
echo "</td>";
echo "<td>";
echo "&nbsp; &nbsp;";
echo "<b>";
echo $row['name_book'];
echo "</td>";
echo "<td>";
echo "&nbsp; &nbsp;";
echo "<b>";
echo $row['author'];
echo "</td>";
echo "<td>";
echo "&nbsp; &nbsp;";
echo "<b>";
echo $row['ibsn'];
echo"<b>";
echo "</td>";
echo "</td>";
echo "</tr>";

}
echo "</table>";

$_SESSION['books_id']= $row['books_id'];

?>
<br>
<br>
<h4 style="text-align:center;">

<a href="#" onclick="pop1()"><b>CHECK OUT</b></a>    &nbsp 
<a href="studentHomepage.php" class="previous" >&laquo; <b>HOMEPAGE</b></a>
<a href="logout.php" style="float: center; position:fixed; bottom:0;"  target="_self"> <b>SIGN OUT</a>
</h4>
</body>
</html>