
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";

$idform=$_POST['staffid'];
$nameform=$_POST['name'];
$roleform=$_POST['role'];
$genderform=$_POST['gender'];
$phoneno=$_POST['phoneno'];
$hospitalid=$_POST['hospital_id'];
$email=$_POST['email'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "UPDATE Staff SET  staff_id='$idform', sname='$nameform', role='$roleform', sgender='$genderform',sphone_no='$phoneno', hospital_id='$hospitalid',email='$email' WHERE staff_id= '$idform'";


if(mysqli_query($conn, $sql)) { echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'>".$nameform." details were added successfully</p></div>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("Refresh: 3; URL=hospitalstaff.php"); 

mysqli_close($conn);
?>