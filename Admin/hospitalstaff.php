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
 <style type="text/css"> tr.m:nth-child(even) {background: #b2c6ca}</style>
 <meta http-equiv="refresh" content="3" >

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
  <h3 class="w3-bar-item">Staff</h3>
  <a href="helpreport.php" class="w3-bar-item w3-button">Control</a>
  <a href="hospitalstaff.php" class="w3-bar-item w3-button">Staff</a>
  <a href="sessions.php" class="w3-bar-item w3-button">Sessions</a>
</div>
<div id="mainwindow" style="width:85%;   float:right;">
  
<br><br>
<table width='70%' align='center'>
<tr><td><h1 align="left">Hospital Staff</h1></td></tr>

<tr><td><form action='newstaff.php' method='post' align='right'>
<input type='submit' value='Add New Staff' id='button'>

</form></td></tr>
</table>
<br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$SQLstring="SELECT * From Staff";
$QueryResult=mysqli_query($conn,$SQLstring)
Or die ("<p>Unable to access your information <br> Please try again later or contact the admin</p>");

echo "<table class='alternate' width='70%' align='center'>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Role</th>
<th>Gender</th>
<th>Phone no.</th>
<th>Hospital</th>
<th>E-mail</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

$Row=mysqli_fetch_row($QueryResult);

do {
	echo "<tr class='m'><td>{$Row[0]}</td>";
	echo "<td>{$Row[1]}</td>";
	echo "<td>{$Row[2]}</td>";
 	echo "<td>{$Row[3]}</td>";
 	echo "<td>{$Row[4]}</td>";
 	echo "<td>{$Row[5]}</td>";
 	echo "<td>{$Row[6]}</td>";
 	echo "<td>{$Row[7]}</td>"; 	
 	
 	echo "<td> <form action='edit.php' method='post'>
	<input type='hidden' name='staffid' value='{$Row[0]}'>
	<input type='hidden' name='gender' value='{$Row[3]}'>
	<input type='hidden' name='hospital' value='{$Row[5]}'>

	<input type='submit' value='Edit' id='button'>
 	</form> </td>";
 	
	echo "<td> <form action='delete.php' method='post' id='deleteForm'>
	<input type='hidden' name='staffid' value='{$Row[0]}'>
	<input type='submit' value='&#x1F5D1;' id='button'>
 	</form> </td></tr>";	


$Row=mysqli_fetch_row($QueryResult);
} while($Row);
echo "</table>"
?>


<script type="text/javascript">
	
var el = document.getElementById('deleteForm');

el.addEventListener('submit', function(){
    return confirm('Are you sure you want to delete?');
}, false);

</script>

<br>
<br>
<br><br>
</div>

  </footer>
</body>

<!-- interesting symbols https://www.w3schools.com/icons/fontawesome_icons_webapp.asp-->

</html>