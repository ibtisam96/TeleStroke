
<?php
session_start();
?>
<!Doctype html>
<html>
<head>
<title>Login</title>

 <link rel="stylesheet" type="text/css" href="Telestroke.css">
  </head>

<body>


<header>
<div id="logocontainer">
<img id="logo" src="Logo.png" width=100px height=100px>
<img id="helpbutton" src="help.png" align="right">
</div>
</header> 

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";
$staffid=(string)$_POST['staffid'];
$userpass=(string)$_POST['password'];


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	
$SQLstring="SELECT * From Administration where staff_id='$staffid'";
$QueryResult=mysqli_query($conn,$SQLstring)
Or die ("<p>Unable to access the menu</p>");

$output=mysqli_fetch_row($QueryResult);

	 if($output['2']==$staffid && $output['1']==$userpass){
	 	echo "<div id='logincontainer' style='text-align:center'>Welcome ".$output['0']." !!!<br>You will be redirected soon to the home page or <a link href='Admin/admindash.html'>click here<a></p></div>";
$_SESSION["staffid"] = $staffid;
header("Refresh: 2; URL=Admin/admindash.html"); 

	 }else{
		 echo"<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'> The User Name or Password you enetered are wrong<br><a link href='login.html'>Please try again<a></p></div>";
		header("Refresh: 5; URL=login.html");}

?>
</body>
</html>