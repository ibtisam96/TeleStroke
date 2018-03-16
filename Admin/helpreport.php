<!Doctype html>
<?php
session_start();
if ($_SESSION["role"]!="Admin") {
  header("Refresh: 0; URL=../unauthorized.php");
}
?>
?>
<html>
<head>
<title>problem report</title>
 <link rel="stylesheet" type="text/css" href="../Telestroke.css">
 <style type="text/css"> tr.m:nth-child(even) {background: #c9c3c5}</style>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 <!--the 2 link below for icons-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
.collapsible {
    background-color: WhiteSmoke;
    color: black;
    cursor: pointer;
    padding: 9px;
    width: 50%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}

.active, .collapsible:hover {
    background-color: #555;
}

.collapsible:after {
    content: '\002B';
    color: white;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2212";
}

.content {
    padding: 0 18px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    background-color: #f1f1f1;
}</style><style>
table, th, td {                                                                                            
    
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
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
  <h3 class="w3-bar-item">Control</h3>
  <a href="helpreport.php" class="w3-bar-item w3-button">Control</a>
  <a href="hospitalstaff.php" class="w3-bar-item w3-button">Staff</a>
  <a href="sessions.php" class="w3-bar-item w3-button">Sessions</a>
</div>
<div id="mainwindow" style="width:85%;   float:right;">


  <div class="container">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT problem_id,staff_id,type,description,status,image FROM problem_report";
$checksql=mysqli_query($conn, $sql);

echo "<table class='alternate' align='center'>";
echo "<tr><th>Problem ID</th><th> Staff ID</th>
<th>Type</th>
<th>Description</th>
<th>status</th><th></th>
</tr>";
#<th>subject</th>
$Row=mysqli_fetch_array($checksql);
do{
	
  echo "<tr class='m'><td>{$Row[0] }</td>";
	echo "<td>{$Row[1] }</td>";
	echo "<td>{$Row[2] }</td>";
 	echo "<td>{$Row[3] }</td>";

	if($Row[4]=='Solved'){	
		echo '
		<td><button style="font-size:10px;color:green;background-color:WhiteSmoke">Solved <i class="fa fa-check-circle"></i></button></td>';
	}
	
	else{
echo "<form action='updatestatus.php' method='post'> 

<input type='hidden' name='problem_id' value='{$Row[0]}'>
<td><button type='submit' name='submit' style='font-size:10px;color:red;background-color:WhiteSmoke;border:none;'>Unsolved<i class='fa fa-circle'></i></td>";
	} 	
   echo"</form>";
 echo '<td>
  <button class="collapsible">More Details</button>
<div class="content">
  <img src="data:image/jpeg;base64,'.base64_encode($Row['image'] ).'" height="300" width="300" class="img-thumnail" />  
</div>
</td></tr>';
 $Row=mysqli_fetch_array($checksql);
} while($Row);
echo "</table>";
 	?>
<?php
mysqli_close($conn);

?>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
</div>
</body>
</html>