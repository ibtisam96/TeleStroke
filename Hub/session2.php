<!DOCTYPE html>  

<html itemscope itemtype="http://schema.org/Product" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/html">
    <head>
        <link rel="stylesheet" type="text/css" href="../Telestroke.css">
        <style type="text/css"> td {background: #c9c3c5} </style>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
		
    </head>



<body onload="init()">

    <header>
        <div id="logocontainer">
            <img id="logo" src="../images/Logo.png">
            <img id="helpbutton" src="../images/help.png" align="right">
        </div>

        <ul class="navigate" id="navigation">
            <li><a href="home.html">Home</a></li>
            <li><a href="requestsession.php">Request Session </a></li>
            <li><a href="Patients.php">Patients</a></li>
            <li><a href="help.php">Help</a></li>                
        </ul>
    </header>



<table width="100%">
  <tr>
    <td><div id="video" align="center" style="width: 50%"></div></td>
    <td><div align="right" style="width: 50%">
        <?php 
        //the variables declaration
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Telestroke";
            $mrid="123"; //this is only to test if it's working but it should be changed to recieve the ID based on the current patient you could do that by changing the form in request session page and make it send you the patient id then add a query before the variable that uses the patient ID search for the Medical recored ID in the Medical_record table after that store it in this variable
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            //the query in the line after searches for the patient session records, currently it displays all the reords of the patient which is not neaded
            //please  edit the following query and make it only displays the most recent row
             $SQLstring="SELECT *From Communication where'$mrid'=MR_id AND c_date=(SELECT MAX(c_date) From Communication)";
            $QueryResult=mysqli_query($conn,$SQLstring)
            Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");
			// Balance Scales
			$SQLstring1="SELECT *From balance where'$mrid'=MR_id AND b_date=(SELECT MAX(b_date) From balance)";
            $QueryResult1=mysqli_query($conn,$SQLstring1)
			Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");
			
			// Musclestrength Scales
			$SQLstring2="SELECT *From musclestrength where'$mrid'=MR_id AND m_date=(SELECT MAX(m_date) From musclestrength)";
            $QueryResult2=mysqli_query($conn,$SQLstring2)
			Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");	


			// Self Care Scales	
			$SQLstring3="SELECT *From selfcare where'$mrid'=MR_id AND s_date=(SELECT MAX(s_date) From selfcare)";
            $QueryResult3=mysqli_query($conn,$SQLstring3)
			Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");	

            //the line after we check if the patient has previous session or not because if this is his first session the form will be empty and won't display any previous data
            if (mysqli_num_rows($QueryResult)&&mysqli_num_rows($QueryResult1)&&mysqli_num_rows($QueryResult2)&&mysqli_num_rows($QueryResult3)==0) {
                echo "<form action='updatescale.php' method='post'>
               <input type='hidden' name='mrid1' value=".$mrid.">
			  Comprehension <input type='range'  name='Comprehension' type='range' min='0' max='10'><br>
               Expression<input type='range' name='Expression' type='range' min='0' max='10'><br>	
                <input type='submit' name='submit1'>"; 
	
				 // Balance Scales
				 echo "<form action='updatescale.php' method='post'>
                <input type='hidden' name='mrid2' value=".$mrid."> 
				Standingscore<input type='range'  name='Standingscore'  min='0' max='10'><br>
			    Settingscore <input type='range' name='Settingscore'  min='0' max='10'><br>
				Turning<input type='range'  name='Turning'  min='0' max='10'><br>
			    Standing<input type='range'  name='Standing'  min='0' max='10'><br>
				Footonstool<input type='range'  name='Footonstool'  min='0' max='10'><br>
			    Pickup<input type='range'  name='Pickup'  min='0' max='10'><br>
                <input type='submit' name='submit2'>";
				
				// Musclestrength Scales
				
				echo "<form action='updatescale.php' method='post'>
                <input type='hidden' name='mrid3' value=".$mrid."> 
				Upperbody<input type='range'  name='Upperbody'  min='0' max='10'><br>
			    lowerbody <input type='range' name='lowerbody'  min='0' max='10'><br>
				bladdermng<input type='range' name='bladdermng'  min='0' max='10'><br>
			    bowelmng<input type='range'  name='bowelmng'  min='0' max='10'><br>
				
                <input type='submit' name='submit3'>";
				
				// Self Care Scales	
				echo "<form action='updatescale.php' method='post'>
                <input type='hidden' name='mrid4' value=".$mrid."> 
				eating<input type='range'  name='eating'  min='0' max='10'><br>
			    grooming <input type='range' name='grooming'  min='0' max='10'><br>
				bathing<input type='range' name='bathing' min='0' max='10'><br>
			    toileting<input type='range'  name='toileting'  min='0' max='10'><br>
				dressing<input type='range' name='dressing' min='0' max='10'><br>				
				<input type='submit' name='submit4'>";
				}
            //if the form not empty we will get the data in the row your query selected and display it to the doctors
            else{
                $output=mysqli_fetch_row($QueryResult);
                echo "Communication  <form action='updatescale.php' method='post'><br>
                <input type='hidden'name='mrid1' value=".$output[4].">
				Previous Assessment Date :".$output[3]."<br><br>
			
               Comprehension <input type='range' id='testrange' name='Comprehension' type='range' min='0' max='10'><span id='demo'></span><br>
               Expression<input type='range' id='testrange1' name='Expression' type='range' min='0' max='10'><span id='demo1'></span><br>
			   <input type='submit' name='submit1'<hr>";
			   
			   
						// Display blance Scales
				$output1=mysqli_fetch_row($QueryResult1);
				echo "<hr><br>Balance<br><form action='updatescale.php' method='post'>
                <input type='hidden'name='mrid2' value=".$output1[8]."><br>
				Previous Assessment Date :".$output1[7]."<br><br>
                Standingscore<input type='range' id='testrange2' name='testrange2'  min='0' max='10'><span id='demo2'></span><br>
			    Settingscore <input type='range' id='testrange3' name='testrange3'  min='0' max='10'><span id='demo3'></span><br>
				Turning<input type='range' id='testrange4' name='testrange4'  min='0' max='10'><span id='demo4'></span><br>
			    Standing<input type='range' id='testrange5' name='testrange5'  min='0' max='10'><span id='demo5'></span><br>
				Footonstool<input type='range' id='testrange6' name='testrange6'  min='0' max='10'><span id='demo6'></span><br>
			    Pickup<input type='range' id='testrange7' name='testrange7'  min='0' max='10'><span id='demo7'></span><br>
                <input type='submit' name='submit2'>";
			        
					// Muscle strength Scales					
				$output2=mysqli_fetch_row($QueryResult2);
				echo"<hr><br>Muscle Strength<br><form action='updatescale.php' method='post'><br>
                <input type='hidden'name='mrid3' value=".$output2[6].">
				Previous Assessment Date :".$output2[5]."<br><br>
                Upperbody<input type='range' id='testrange8' name='Upperbody'  min='0' max='10'><span id='demo8'></span><br>
			    Lowerbody <input type='range' id='testrange9' name='lowerbody'  min='0' max='10'><span id='demo9'></span><br>
				Bladdermng<input type='range' id='testrange10' name='bladdermng'  min='0' max='10'><span id='demo10'></span><br>
			    Bowelmng<input type='range' id='testrange11' name='bowelmng'  min='0' max='10'><span id='demo11'></span><br>		
                <input type='submit' name='submit3'><hr>";
					
			   // Self Care Scales
                $output3=mysqli_fetch_row($QueryResult3);			   
			   echo"<br>Self Care<br><form action='updatescale.php' method='post'><br>
                <input type='hidden'name='mrid4' value=".$output3[7].">
                 Previous Assessment Date :".$output3[6]."<br><br>
				Eating<input type='range'  name='eating' id='eating' min='0' max='10'><span id='demo12'></span><br>
			    Grooming <input type='range' name='grooming' id='grooming' min='0' max='10'><span id='demo13'></span><br>
				Bathing<input type='range' name='bathing' id='bathing'  min='0' max='10'><span id='demo14'></span><br>
			    Toileting<input type='range'  name='toileting' id='toileting' min='0' max='10'><span id='demo15'></span><br>
				Dressing<input type='range' name='dressing' id='dressing' min='0' max='10'><span id='demo16'></span><br>				
				<input type='submit' name='submit4'>";
			   
                //this java script enables us to display stored data while still being able to store new ones
                echo "<script type='text/javascript'>
				
                document.getElementById('testrange').defaultValue = '{$output[1]}';
			    document.getElementById('testrange1').defaultValue = '{$output[2]}';
				
			    document.getElementById('testrange2').defaultValue = '{$output1[1]}';
			    document.getElementById('testrange3').defaultValue = '{$output1[2]}';
			    document.getElementById('testrange4').defaultValue = '{$output1[3]}';
			    document.getElementById('testrange5').defaultValue = '{$output1[4]}';
				document.getElementById('testrange6').defaultValue = '{$output1[5]}';
				document.getElementById('testrange7').defaultValue = '{$output1[6]}';
				
				document.getElementById('testrange8').defaultValue = '{$output2[1]}';
			    document.getElementById('testrange9').defaultValue = '{$output2[2]}';
			    document.getElementById('testrange10').defaultValue = '{$output2[3]}';
				document.getElementById('testrange11').defaultValue = '{$output2[4]}';
				
                document.getElementById('eating').defaultValue = '{$output3[1]}';			
				document.getElementById('grooming').defaultValue = '{$output3[2]}';
			    document.getElementById('bathing').defaultValue = '{$output3[3]}';
			    document.getElementById('toileting').defaultValue = '{$output3[4]}';
				document.getElementById('dressing').defaultValue = '{$output3[5]}';
			   
              </script>

			  <script>
var slider = document.getElementById('testrange');
var output = document.getElementById('demo');
output.innerHTML = slider.value;
slider.oninput = function() {
  output.innerHTML = this.value;
}

var slider1 = document.getElementById('testrange1');
var output1 = document.getElementById('demo1');
output1.innerHTML = slider1.value;
slider1.oninput = function() {
  output1.innerHTML = this.value;
}

var slider2 = document.getElementById('testrange2');
var output2 = document.getElementById('demo2');
output2.innerHTML = slider2.value;
slider2.oninput = function() {
  output2.innerHTML = this.value;
}
var slider2 = document.getElementById('testrange3');
var output2 = document.getElementById('demo3');
output2.innerHTML = slider2.value;
slider2.oninput = function() {
  output2.innerHTML = this.value;
}
var slider3 = document.getElementById('testrange4');
var output3 = document.getElementById('demo4');
output3.innerHTML = slider3.value;
slider3.oninput = function() {
  output3.innerHTML = this.value;
}
var slider4 = document.getElementById('testrange5');
var output4 = document.getElementById('demo5');
output4.innerHTML = slider4.value;
slider4.oninput = function() {
  output4.innerHTML = this.value;
}
var slider5 = document.getElementById('testrange6');
var output5 = document.getElementById('demo6');
output5.innerHTML = slider5.value;
slider5.oninput = function() {
  output5.innerHTML = this.value;
}
var slider6 = document.getElementById('testrange7');
var output6 = document.getElementById('demo7');
output6.innerHTML = slider6.value;
slider6.oninput = function() {
  output6.innerHTML = this.value;
}
var slider8 = document.getElementById('testrange8');
var output8 = document.getElementById('demo8');
output8.innerHTML = slider8.value;
slider8.oninput = function() {
  output8.innerHTML = this.value;
}
var slider9 = document.getElementById('testrange9');
var output9 = document.getElementById('demo9');
output9.innerHTML = slider9.value;
slider9.oninput = function() {
  output9.innerHTML = this.value;
}
var slider10 = document.getElementById('testrange10');
var output10 = document.getElementById('demo10');
output10.innerHTML = slider10.value;
slider10.oninput = function() {
  output10.innerHTML = this.value;
}
var slider11 = document.getElementById('testrange11');
var output11 = document.getElementById('demo11');
output11.innerHTML = slider11.value;
slider11.oninput = function() {
  output11.innerHTML = this.value;
}
var slider12 = document.getElementById('eating');
var output12 = document.getElementById('demo12');
output12.innerHTML = slider12.value;
slider12.oninput = function() {
  output12.innerHTML = this.value;
}
var slider13 = document.getElementById('grooming');
var output13 = document.getElementById('demo13');
output13.innerHTML = slider13.value;
slider13.oninput = function() {
  output13.innerHTML = this.value;
}
var slider14 = document.getElementById('bathing');
var output14 = document.getElementById('demo14');
output14.innerHTML = slider14.value;
slider14.oninput = function() {
  output14.innerHTML = this.value;
}
var slider15 = document.getElementById('toileting');
var output15 = document.getElementById('demo15');
output15.innerHTML = slider15.value;
slider15.oninput = function() {
  output15.innerHTML = this.value;
}
var slider16 = document.getElementById('dressing');
var output16 = document.getElementById('demo16');
output16.innerHTML = slider16.value;
slider16.oninput = function() {
  output16.innerHTML = this.value;
}

</script> ";          // echo "".$output1[1].$output1[2];
        }?>
         
      </form>
      </div>
</td>
</tr>
</table>
 <script src="https://meet.jit.si/external_api.js"></script>
        <script>
           /* var domain = "meet.jit.si";
            var options = {
                //in the line after I chose a static room name to tes if it's working and we can make up our own room names (It is! ^.^)
                //However, we need to make automatically generated. I have to ideas for this: 
                        //1-Write a code that combines the patien ID and the hub ID so it will become our room name
                        //2-Assign each Hub a specific room name then based on the data recieved from the reques session we connect them to that hospiatl
                roomName: "Hospital",
                width: 700,
                height: 700,
                parentNode:document.getElementById("video"),
                interfaceConfigOverwrite: {filmStripOnly: true},
                configOverwrite: {},
                
            }
            var api = new JitsiMeetExternalAPI(domain, options);
        </script>
</script */

