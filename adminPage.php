<html>
<head>

<script>

    function pop1(){
        window.open('addBook.php','popwin','width=640, height=480');
    }
	
	 function pop2(){
        window.open('display.php','popwin','width=640, height=480');
    }
	 function pop3(){
        window.open('checkin.php','popwin','width=640, height=480');
    }
    </script>
	
</head>
<body background="admin.jpg")>
<br><br><br><br><br><br><br>
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
	 float: none!important;
	margin-bottom: 5px;

a:hover, a:active {
    background-color: MediumTurquoise ;
    color: white;
}
</style>
<body>

<h1 style="text-align:center;"> Admin Library </h1>
<br>
<h3 style="text-align:center;">
<a href="#" onclick="pop1()">Add a Book to Library</a> <br><br>
<a href="#" onclick="pop2()">Checked Out Books</a> <br><br>
<a href="#" onclick="pop3()">Check In A Book</a> <br><br> </h3>
<a href="logout.php" style="float: center; position:fixed; bottom:0;"  target="_self"> <b>SIGN OUT</a>
</body>
</html>