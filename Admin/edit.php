<!Doctype html>
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
		<img id="logo" src="../images/Logo.png" width=100px height=100px>
		<img id="helpbutton" src="../images/help.png" align="right">
	</div>
	 <ul class="navigate" id="navigation">
	        <li><a href="admindash.html">Dashboard</a></li>
	        <li><a href="">Sessions</a></li>
	        <li><a href="hospitalstaff.php">Hospital Staff</a></li>
			<li><a href="control.html">System Control</a></li>
	  </ul>
</header> 


<div id="mainwindow">	
	<br><br>
	<table align='center'>
		<tr><h1>Edit staff</h1>
				<form action="editstaff.php" method="post">
		</tr>
		
		<tr><td><label>Staff ID: </label></td>
			<td><input type="text" name="staffid" id="staffid" style="width: 100%" ></td>
		</tr>
		
		<tr><td><label>Name: </label></td>
			<td><input type="text" name="name" id="sname" style="width: 100%"></td>
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
			<option value='{$sRow[2]}' selected >{$sRow[2]}</option>
		 	<option value='Nurse'>Nurse</option>
		 	<option value='Neurologist'>Neurologist</option>
		 	<option value='IT'>IT</option>
		 	<option value='General Practitioner'>General Practitioner</option></select></td>
		</tr>
		
		<tr><td><label>Gender: </label></td>
			<td><select name='gender' id='sgender' style='width: 100%'>
			<option value='{$sRow[3]}' selected >{$sRow[3]}</option>
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
				document.getElementById('sname').defaultValue = '{$sRow[1]}';
				document.getElementById('sphoneno').defaultValue = '{$sRow[4]}';
				document.getElementById('hid').defaultValue = '{$sRow[5]}';
				document.getElementById('semail').defaultValue = '{$sRow[6]}';
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