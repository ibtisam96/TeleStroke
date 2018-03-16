<!Doctype html>
<?php
session_start();
if ($_SESSION["role"]!="Admin") {
  header("Refresh: 0; URL=../unauthorized.html");
}
?>
<html>
<head>
<title>Sessions</title>

 <link rel="stylesheet" type="text/css" href="../Telestroke.css">
 <style type="text/css"> tr.m:nth-child(even) {background: #c9c3c5}</style>

  </head>

<body>

<header>
<div id="logocontainer">
<a href="admindash.php"><img id="logo" src="../images/Logo.png" width=100px height=100px></a>
<a href="../logout.php"><img id="helpbutton" src="../images/help.png" align="right"></a> 
</div>

</header> 

<div>
	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%; height:100%">
  <h3 class="w3-bar-item">Sessions</h3>
  <a href="helpreport.php" class="w3-bar-item w3-button">Control</a>
  <a href="hospitalstaff.php" class="w3-bar-item w3-button">Staff</a>
  <a href="sessions.php" class="w3-bar-item w3-button">Sessions</a>
</div>
<div id="mainwindow" style="width:85%;   float:right;">
  
<br><br>
<table width='70%' align='center'>
<tr><td><h1 align="left"><center>Sessions</center></h1></td></tr>

</form></td></tr>
</table>
<br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$SQLstring="SELECT * From Session";
$QueryResult=mysqli_query($conn,$SQLstring)
Or die ("<p>Unable to access your information <br> Please try again later or contact the admin</p>");
$Row=mysqli_fetch_row($QueryResult);




echo "<table class='alternate' width='70%' align='center'>";
echo "<tr>
<th>Session ID</th>
<th>Session Date</th>
<th>Staff Involved</th>
<th>Statues</th>
</tr>";


do {
	$hospital_id = "SELECT * FROM participation WHERE session_id = $Row[0]";

$QueryResult2=mysqli_query($conn,$hospital_id)
Or die (" <br> Please try again later or contact the admin</p>");
$row2=mysqli_fetch_row($QueryResult2); 

	echo "<tr class='m'><td>{$Row[0]}</td>";
	echo "<td>{$Row[1]}</td>";
	echo "<td>{$row2[0]}</td>";
 	echo "<td>{$Row[2]}</td>";
 	 	
 	echo "<td> <form action='Sessions.php' method='post'>
	<input type='hidden' name='session_id' value='{$Row[0]}'>
	<input type='hidden' name='' value='{$Row[1]}'>
	<input type='hidden' name='Staff' value='{$row2[0]}'>
	<input type='hidden' name='hospital' value='{$Row[2]}'>

 	</form> </td>";
 	
$Row=mysqli_fetch_row($QueryResult);
} while($Row);
echo "</table>"
?>
<br>
<br>
<br><br>
</div>
<footer ID="thefooter">

  </footer>
</body>
</html>
