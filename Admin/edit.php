<!Doctype html>
<?php
session_start();
if ($_SESSION["role"]!="Admin") {
  header("Refresh: 0; URL=../unauthorized.php");
}
?>
<html>
<head>
<title>Edit staff</title>

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
<a href="admindash.php"><img id="logo" src="../images/Logo.png" width=100px height=100px></a>
<a href="../logout.php"><img id="helpbutton" src="../images/help.png" align="right"></a> 
</div>

</header> 

<div>
	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%; height:100%">
  <h3 class="w3-bar-item">Edit Staff</h3>
  <a href="helpreport.php" class="w3-bar-item w3-button">Control</a>
  <a href="hospitalstaff.php" class="w3-bar-item w3-button">Staff</a>
  <a href="sessions.php" class="w3-bar-item w3-button">Sessions</a>
</div>
<div id="mainwindow" style="width:85%;   float:right;">
	
	<br><br>
	<table align='center'>
		<tr><h1>Edit staff</h1>
				<form action="editstaff.php" method="post">
		</tr>
		
		<tr><td><label>Staff ID: </label></td>
			<td><input type="text" name="staffid" id="staffid" style="width: 100%" ></td>
		</tr>
		
		<tr><td><label>First Name: </label></td>
			<td><input type="text" name="name1" id="sname1" style="width: 100%"></td>
		</tr>
		<tr><td><label>Last Name: </label></td>
			<td><input type="text" name="name2" id="sname2" style="width: 100%"></td>
		</tr>
		

			<?php 
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "Telestroke";
				$formstaffid=$_POST['staffid'];

				$conn = mysqli_connect($servername, $username, $password, $dbname);
				$SQLstring="SELECT * From Hospital";
				$QueryResult=mysqli_query($conn,$SQLstring)
				Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");

				$SQL="SELECT * From Staff WHERE staff_id='$formstaffid'";
				$Query2Result=mysqli_query($conn,$SQL)
				Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");
				$sRow=mysqli_fetch_row($Query2Result);
				$Row=mysqli_fetch_row($QueryResult);

				$joinSQL="SELECT * From Hospital WHERE $sRow[5]=$Row[0]";
				$Query3Result=mysqli_query($conn,$joinSQL)
				Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");
				$joinRow=mysqli_fetch_row($Query3Result);



				echo "
		<tr><td><label>Role: </label></td>
			<td><select name='role' id='srole' style='width: 100%'>
			<option value='{$sRow[3]}' selected >{$sRow[3]}</option>
		 	<option value='Nurse'>Nurse</option>
		 	<option value='Neurologist'>Neurologist</option>
		 	<option value='IT'>IT</option>
		 	<option value='General Practitioner'>General Practitioner</option></select></td>
		</tr>
		
		<tr><td><label>Gender: </label></td>
			<td><select name='gender' id='sgender' style='width: 100%'>
			<option value='{$sRow[4]}' selected >{$sRow[4]}</option>
			<option value='Male'>Male</option>
		 	<option value='Female'>Female</option>
			</select></td>
		</tr>
		
		<tr>
			<td><label>Phone number: </label></td>
			<td><input type='text' name='phoneno' id='sphoneno' style='width: 100%'></td>
		</tr>
		<tr><td><label>Hospital: </label></td>
			<td><select name='hospital_id' id='hid' style='width: 100%'>
			<option value='{$joinRow[0]}'>{$joinRow[1]}</option>";
				do {
				echo "<option value='{$Row[0]}'>{$Row[1]}</option>";
				$Row=mysqli_fetch_row($QueryResult);
				} while($Row);
				echo "</select>";

				echo "	</td>
		</tr>
		
		<tr><td><label>Email: </label></td>
			<td><input type='text' name='email' id='semail' style='width: 100%''></td>
		</tr>";

				echo "<script type='text/javascript'>
				document.getElementById('staffid').defaultValue = '{$sRow[0]}';
				document.getElementById('sname1').defaultValue = '{$sRow[1]}';
				document.getElementById('sname2').defaultValue = '{$sRow[2]}';
				document.getElementById('sphoneno').defaultValue = '{$sRow[5]}';
				document.getElementById('hid').defaultValue = '{$sRow[6]}';
				document.getElementById('semail').defaultValue = '{$sRow[7]}';
			</script>";

			?>
			
		
		
		<tr><td align='right' colspan='2' >
			<input type="submit" name="Addstaff" value="Edit staff" id="button">
			<input type="button" onclick="window.location.href='hospitalstaff.php'" value="Cancel" id="button">
			</form></td>
		</tr>
	</table>
</div>




<footer ID="thefooter">
	<br>
	<br>
</footer>

</body>
</html>