<!Doctype html>
<?php
session_start();
if ($_SESSION["role"]!="Admin") {
  header("Refresh: 0; URL=../unauthorized.php");
}
?>
<html>
<head>
<title>Hospital Staff</title>

 <link rel="stylesheet" type="text/css" href="../Telestroke.css">
 <style type="text/css"> tr:nth-child(even) {background: #c9c3c5}</style>

  </head>

<body>

<header>
<div id="logocontainer">
<a href="admindash.php"><img id="logo" src="../images/Logo.png" width=100px height=100px></a>
<a href="../logout.php"><img id="helpbutton" src="../images/help.png" align="right"></a> </div>
</header> 


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$SQLstring="SELECT * From Staff";
$QueryResult=mysqli_query($conn,$SQLstring)
Or die ("<p>Unable to access your information <br> Please try again later or contact the admin</p>");

$staffid=$_POST['staffid'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlstring = "Select * FROM Staff WHERE staff_id='$staffid'";
$QueryResult=mysqli_query($conn,$SQLstring)
Or die ("<p>Unable to access the menu</p>");
$output=mysqli_fetch_row($QueryResult);

$sql = "DELETE FROM Staff WHERE staff_id='$staffid'";


if (mysqli_query($conn, $sql)) {
    echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'>" .$output['1']." details was deleted successfully!<br>You will be redirected soon or <a link href='hospitalstaff.php'>click here<a></p></div>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Refresh: 3; URL=hospitalstaff.php"); 

mysqli_close($conn);
?>
</body>
</html>