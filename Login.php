
<?php
session_start();
?>
<!Doctype html>
<html>
<head>
<title>Login</title>

 <link rel="stylesheet" type="text/css" href="Telestroke.css">
  </head>

<body style="height:100%; width:100%;">

<header>
<div id="logocontainer">
<img id="logo" src="images/Logo.png" width=100px height=100px>
<img id="helpbutton" src="images/help.png" align="right">
</div>
</header> 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";
$usern=(string)$_POST['username'];
$userpass=(string)$_POST['password'];


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	
$SQLstring="SELECT * From Logindetails where username='$usern'";
$QueryResult=mysqli_query($conn,$SQLstring)
Or die ("<div id='logincontainer' style='text-align:center'><p>Database can't be accessed now, <a link href='login.html'>Please try again<a> or contact support</p></div>");

$output=mysqli_fetch_row($QueryResult);

	 if($output['0']==$usern && $output['1']==$userpass){{
	 	echo "<div id='textcontainer' style='text-align:center'>Welcome ".$output['0']." !!!<br>You will be redirected soon to the home page or <a link href='Admin/admindash.html'>click here<a></p></div>";
	 		$_SESSION["role"] = $output['3'];}
if ($output['3']=="Admin") {
	header("Refresh: 2; URL=Admin/admindash.html"); 
}

	else {if ($output['3']=="Hub") {header("Refresh: 2; URL=Hub/requestsession.php");}

	else {header("Refresh: 2; URL=Spoke/home.html"); }}
	 	}

	else{
		 echo"<div id='textcontainer' style='text-align:center'> <p style='text-align:center;'> The User Name or Password you enetered are wrong<br><a link href='login.html'>Please try again<a></p></div>";
		header("Refresh: 3; URL=login.html");}


?>
</body>
</html>