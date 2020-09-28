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
<body background="book.jpg")>
<body>


<div id="login">
<h2 style="text-align:center;">Adding a Book</h2>
<hr/>
<form action="" method="post">
<h3 style="text-align:center;" >
<label>Name:</label>
<input type="text" name="name_book" id="name" size="25%" height="70" required="required" placeholder="Please Enter the Book Name"/><br /><br />
<label>IBSN:</label>
<input type="text" name="ibsn" id="ibsn" size="25%" height="70" required="required" placeholder="Please Enter 10 Numbers"/><br/><br />
<label>Author:</label>
<input type="text" name="author" id="authror" size="25%" height="70" required="required" placeholder="Please Enter the Author Name"/><br/><br />
<input type="submit" value=" Submit " name="submit"> <br />

</h3>
</form>
</div>

<?php
if(isset($_POST["submit"])){
 include("db.php");
$sql = "INSERT INTO books (name_book, ibsn, author)
VALUES ('".$_POST["name_book"]."','".$_POST["ibsn"]."','".$_POST["author"]."')";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}

?>
</body>
</html>