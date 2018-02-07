<!Doctype html>
<html>
<head>
<title>Add Patient</title>

 <link rel="stylesheet" type="text/css" href="../Telestroke.css">
 <style type="text/css">
 	
 	td 
{
    text-align:right; 
    vertical-align:middle;

}
 </style>
  </head>

<body>

<header>
<div id="logocontainer">
<img id="logo" src="../images/Logo.png" width=100px height=100px>
<img id="helpbutton" src="../images/help.png" align="right">
</div>
 <ul class="navigate" id="navigation">
        <li><a href="admindash.html">Dashboard</a></li>
        <li><a href="session.php">Sessions</a></li>
        <li><a href="hospitalstaff.php">Hospital Staff</a></li>
		<li><a href="control.html">System Control</a></li>
  </ul>
</header> 


<div id="mainwindow">
	
<br><br>
<table align='center'>
<tr>
<h1>Add patient </h1>
<form action="newpatient.php" method="post">
</tr>
<tr><td>	
<label>Patient ID: </label>
</td>
<td>
<input type="text" name="paitentid" style="width: 100%" >
</td>
</tr>
<tr>
	<td><label>Name: </label></td>
	<td><input type="text" name="name" style="width: 100%"></td>
</tr>
<tr>
	<td><label>Phone number: </label></td>
	<td><input type="text" name="phoneno"  style="width: 100%"></td>
</tr>

<tr>
	<td><label>Admission date: </label></td>
	<td><input type="date" name="Admission"  style="width: 100%"></td>
</tr>

<tr>
	<td><label>Gender: </label></td>
	<td><select name="gender" style="width: 100%">
	<option value="Male">Male</option>
 	<option value="Female">Female</option>
	</select></td>
</tr>
<tr>
	<td><label>patient birth date : </label></td>
	<td><input type="date" name="paitentBD"  style="width: 100%"></td>
</tr>

<tr>
	<td><label>Hospital ID : </label></td>
	<td><select name="hospital_id" style="width: 100%">
<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Telestroke";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$SQLstring="SELECT * From Hospital";
	$QueryResult=mysqli_query($conn,$SQLstring)
	Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");


	do {
		echo "<option value='{$Row[0]}'>{$Row[0]}</option>";
	$Row=mysqli_fetch_row($QueryResult);
	} while($Row);
?>
		</select>
		</td>
</tr>

<tr>
<td align='right' colspan='2' >
<br>
<input type="submit" name="addpatient" value="add patient" id="button">
<input type="button" onclick="window.location.href='______'" value="Cancel" id="button"></form>
</td>
</tr>
</table>
</div>


</div>



<footer ID="thefooter">
<br>
<br>
</footer>

</body>
</html>
