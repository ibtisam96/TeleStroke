<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telestroke";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}
	
	

$staffid=$_POST['staffid'];
$telnum=$_POST['telnum'];
$username=$_POST['userName'];


	if(!isset($error_message)) {
		$SQLstring1="SELECT * From logindetails where staff_id='$staffid' OR username='$username'";
		$QueryResult1=mysqli_query($conn,$SQLstring1)
         Or die ();

        $row=mysqli_fetch_row($QueryResult1);

	 if($row){
		$error_message= "You already have in account!";
	    }else{
		$SQLstring2="SELECT * From staff where staff_id='$staffid'";
        $QueryResult2=mysqli_query($conn,$SQLstring2)
        Or die ();

       $output=mysqli_fetch_row($QueryResult2);

	 if($output['0']==$staffid && $output['5']==$telnum && $output['3']!=='IT'){
		
		$staffrole=$output['3'];
		$SQLstring3 = "INSERT INTO logindetails (username, password, staff_id, role) VALUES
		('" . $_POST["userName"] . "',   '" . ($_POST["password"]) . "',   '" . ($_POST["staffid"]) . "',   '" . $staffrole . "')";
		$QueryResult3=mysqli_query($conn,$SQLstring3)Or die ();
		if($QueryResult3) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			unset($_POST);
		       } 
		    }else {
			$error_message = "You must be among the authorized staff to register for the system ,or check your ID or Phone number!";	
	
}}}}
?>
<html>
<head>
<title>  Sign Up Form</title>
<style>
body{
	width:610px;
	font-family:calibri;
}
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}

.demo-table td {
	padding: 10px 0px;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}

</style>

<link rel="stylesheet" type="text/css" href="Telestroke.css">
</head>
<body style="height:100%; width:100%;">
<header>
<div id="logocontainer">
<img id="logo" src="images/Logo.png" width=100px height=100px>
<img id="helpbutton" src="images/help.png" align="right">
</div>
</header> 
<form name="frmRegistration" method="post" action="doctor_register.php">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>Staff ID</td>
<td><input type="text" class="demoInputBox" name="staffid" value="<?php if(isset($_POST['staffid'])) echo $_POST['staffid']; ?>"></td>
</tr>
<tr>
<td>Phone Number</td>
<td><input type="tel" class="demoInputBox" name="telnum"  value="<?php if(isset($_POST['telnum'])) echo $_POST['telnum']; ?>"></td>
</tr>
<tr>
<tr>
<td>User Name</td>
<td><input type="text" class="demoInputBox" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="demoInputBox" name="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" > </td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
</tr>

<tr>
<td >
 <input type="submit" name="register-user" value="Sing Up" class="btnRegister"></td><td >
 <input type="reset" name="reset" value="Cancel" class="btnRegister"></td>
</tr>
</table>
</form>
</body></html>