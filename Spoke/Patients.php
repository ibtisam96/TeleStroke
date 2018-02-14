<!DOCTYPE html>  
 <html>  
      <head>
<title>Patients </title>	  
  <link rel="stylesheet" type="text/css" href="../Telestroke.css">
<style type="text/css"> td {background: #c9c3c5}</style>
  </head>
<div>
<header>
<div id="logocontainer">
<img id="logo" src="../images/Logo.png" width=100px height=100px>
<img id="helpbutton" src="../images/help.png" align="right">

  </div>
   <ul class="navigate" id="navigation">
	        <li><a href="SpokeHome.html">Home</a></li>
			 <li><a href="Patients.php">Patients</a></li>
	        <li><a href="pmr.php">Patient Medical Record</a></li>
	        <li><a href="requestsession.php">Request Session </a></li>
			<li><a href="help.html">Help</a></li>			
	  </ul>
</header> 



<?php
$host="localhost";
$user="root";
$pass="";
$db="telestroke";
$con=mysqli_connect($host,$user,$pass,$db) or die("unable to connect");


 $query = "SELECT * FROM patient INNER JOIN relative ON patient.patient_id=relative.patient_id";
	  
	   $result = mysqli_query($con,$query);
?>


<div id="mainwindow">
  




<h1 align="left">Patients</h1>
<div align="right"><input type="search"   class="light-table-filter" data-table="order-table" placeholder="Search . . ." /> </div>
<br><br>

<table table class="order-table"  border=1 width='70%' align='center'>

<tr>
<thead>

<tr> <th colspan="11">Patient Information</th>  <th colspan="8"> Patient's Companion Information</th> </tr>
<th> ID</th>
<th> Name </th>
<th> Phone #1 </th>
<th> Phone #2 </th>
<th> E-mail </th>
<th> Gender </th>
<th> Birth Date </th>
<th> City </th>
<th> Address Line1 </th>
<th> Address Line2 </th>
<th> Hospital ID </th>
<th> ID</th>
<th> Name </th>
<th> Phone #1 </th>
<th> Phone #2 </th>
<th> E-mail </th>
<th> City </th>
<th> Address Line1 </th>
<th> Address Line2 </th>
</thead>
</tr>

<?php
	  if(mysqli_num_rows($result)>0){
	   
		  while ($row = mysqli_fetch_array($result)) 
		  {
			  
			   ?>
			   <tbody>
			   <tr>
				<td> <?php echo $row["patient_id"]; ?></td>
				<td> <?php echo $row["pname"]; ?></td>
				 <td> <?php echo$row["pphone_no1"]; ?>
				<td> <?php echo $row["pphone_no2"]; ?>
				<td> <?php echo $row["pemail"]; ?></td>
				<td> <?php echo $row["pgender"]; ?></td>
                <td> <?php echo $row["pbirthdate"]; ?></td>
			    <td> <?php echo $row["pcity"]; ?></td>
                <td> <?php echo $row["paddressline1"]; ?></td>
				<td> <?php echo $row["paddressline2"]; ?></td>
				<td> <?php echo $row["hospital_id"]; ?></td>
				<td> <?php echo $row["relative_id"]; ?></td>
				<td> <?php echo $row["rname"]; ?></td>
				 <td> <?php echo $row["rphone_no1"]; ?>
				<td> <?php echo $row["rphone_no2"]; ?>
				<td> <?php echo $row["remail"]; ?></td>
                <td> <?php echo $row["city"]; ?></td>
			    <td> <?php echo $row["raddressline1"]; ?></td>
				<td> <?php echo $row["raddressline2"]; ?></td>
				</tr>
				</tbody>
			   <?php
		  }
	  }
	   
	   ?>


</table>

<br>
</div>
<script>
(function(document) {
	

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);

</script>
<footer ID="thefooter">

  </footer>
</body>
</html>