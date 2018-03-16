<!Doctype html>
<?php
session_start();
if ($_SESSION["role"]!="Admin") {
  header("Refresh: 0; URL=../unauthorized.php");
}
?>

<html>
<head>
<title>Admin dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../Telestroke.css">
<script src="../jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


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
  <h3 class="w3-bar-item">Dashboard</h3>
  <a href="helpreport.php" class="w3-bar-item w3-button">Control</a>
  <a href="hospitalstaff.php" class="w3-bar-item w3-button">Staff</a>
  <a href="sessions.php" class="w3-bar-item w3-button">Sessions</a>
</div>
<div id="mainwindow" style="width:85%;   float:right;">

<div style="width:90%;   float:left;  margin-left: 5%;">
<div id="textcontainer" style="width:100%;  text-align:left">
<h4>Quick Access:</h4>

	<br>
	<button></button>
</div>
<div id="textcontainer" style="width:48%;   float:right;">
<canvas id="bar-chart" width="800" height="450"></canvas>
</div>
<div id="textcontainer" style="width:48%;   float:left;">
<canvas id="pie-chart" width="800" height="450"></canvas>
</div>
</div>
</div>
</body>
<script>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Jan", "Feb", "March", "April", "June"],
      datasets: [
        {
          label: "Number of Patients",
          backgroundColor: ["#3e95cd", "#3cba9f","#1b7b95", "#98d8e9","#b3db7e","#c45850"],
          data: [12,15,23,35,31]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Number of Patients'
      }
    }
});
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Canceled","Completed", "Ongoing", "Pending"],
      datasets: [{
        label: "# of Sessions",
        backgroundColor: ["#c45850","#1b7b95", "#98d8e9","#b3db7e"],
        data: [

        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$SQLstring="SELECT COUNT(session_id), status
FROM Session
GROUP BY status ORDER BY status";
$QueryResult=mysqli_query($conn,$SQLstring)
Or die ("<p>Unable to access your information <br> Please try again later or contact the admin</p>");
$Row=mysqli_fetch_row($QueryResult);

do {
  echo "{$Row[0]},";
  $Row=mysqli_fetch_row($QueryResult);
} while($Row);

?>
     ]  
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Sessions by Status'
      }
    }
});

</script>
</html>