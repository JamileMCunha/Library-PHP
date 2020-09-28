<html>
<head>
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
<body background="search.jpg">
<body>
<div align='center'>
<form target="_self" method="post" action="searchresults.php" >
    <tr>
      <input name="name_book" type="text" id="name_book" placeholder= "Search For Titles">

    </tr>
</form>

<?php
$name_book = "";	
include("db.php");

if (isset($_POST["name_book"])) {
$name_book = $_POST['name_book'];

}else{ 
 
}

if (!$name_book)
{
    die;
}

$query = "SELECT * FROM books WHERE name_book LIKE :search OR author LIKE :search";;
$stmt = $dbh->prepare($query);
$stmt->bindValue(':search', '%' . $name_book . '%', PDO::PARAM_INT);
$stmt->execute();
include('errordb.php');
	$result = $stmt->fetchAll();
if (!empty ($result)) {
echo "<b>Book found: \n";
echo   "<br>";
foreach( $result as $row ) {
echo   "<br>";
echo   "<b>";
echo $row["name_book"]; 
echo ' from ';
echo $row["author"];
echo " <a href='view.php?name_book=".$row['name_book']."'>VIEW</a>"; 
echo   "<br>"; }
} else {
	
echo "<b>Book not found!";
	
}
?>

<h4 style="float:left; position:fixed; bottom:320;">
<a href="studentHomepage.php" class="previous" >&laquo; HOMEPAGE</a></h4>

<a href="logout.php" style="float:right; position:relative; bottom:-80;"  target="_self"> <b>SIGN OUT</a>

</body>
</html>