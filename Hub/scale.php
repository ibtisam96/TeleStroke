<!DOCTYPE html>  

<html itemscope itemtype="http://schema.org/Product" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/html">
    <head>
        <link rel="stylesheet" type="text/css" href="../Telestroke.css">
        <style type="text/css"> 
.collapsible {
    background-color: #577a81;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}

.active, .collapsible:hover {
    background-color: #555;
}

.content {
	 width: 100%;
    padding: 0 0;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
}
.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 20px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 20px;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
	.active {
    background-color: #E6E6FA;
}
}
</style> 
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
		
 <header>
       <ul class="navigate" id="navigation">
             <li><a href="scale.php">Progress</a></li>
			 <li><a href="">Medical Record</a></li>
            <li><a href="">Previous Sessions </a></li>
            <li><a href="">Radiology</a></li>
                           
        </ul>
    </header>
		
    </head>

    

        <?php 
        //the variables declaration
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Telestroke";
            $mrid="133"; //this is only to test if it's working but it should be changed to recieve the ID based on the current patient you could do that by changing the form in request session page and make it send you the patient id then add a query before the variable that uses the patient ID search for the Medical recored ID in the Medical_record table after that store it in this variable
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            //the query in the line after searches for the patient session records, currently it displays all the reords of the patient which is not neaded
            //please  edit the following query and make it only displays the most recent row
             $SQLstring="SELECT *From Communication where'$mrid'=MR_id AND c_date=(SELECT MAX(c_date) From Communication where'$mrid'=MR_id)";
            $QueryResult=mysqli_query($conn,$SQLstring)
            Or die ("<p>Unable to access the database<br>Please try again later or contact the admin</p>");
			// Balance Scales
			$SQLstring1="SELECT *From balance where'$mrid'=MR_id AND b_date=(SELECT MAX(b_date)From balance where'$mrid'=MR_id)";
            $QueryResult1=mysqli_query($conn,$SQLstring1)
			Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");
			
			// Musclestrength Scales
			$SQLstring2="SELECT *From musclestrength where'$mrid'=MR_id AND m_date=(SELECT MAX(m_date) From musclestrength where'$mrid'=MR_id)";
            $QueryResult2=mysqli_query($conn,$SQLstring2)
			Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");	


			// Self Care Scales	
			$SQLstring3="SELECT *From selfcare where'$mrid'=MR_id AND s_date=(SELECT MAX(s_date) From selfcare where'$mrid'=MR_id)";
            $QueryResult3=mysqli_query($conn,$SQLstring3)
			Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");	

            //the line after we check if the patient has previous session or not because if this is his first session the form will be empty and won't display any previous data
			
            if (mysqli_num_rows($QueryResult)==0||mysqli_num_rows($QueryResult1)==0||mysqli_num_rows($QueryResult2)==0||mysqli_num_rows($QueryResult3)==0) {
				
                echo "<button class='collapsible'>Communication</button>
                <div class='content'> 
				<form action='updatescale.php' method='post'>
               <input type='hidden' name='mrid1' value=".$mrid.">
               <th><p><div class='slidecontainer'>Comprehension:</th></br></br> <tr><input type='range' id='testrange' name='Comprehension' type='range' min='0' max='10'><span id='demo'></span></div></p></tr>
              <th><p><div class='slidecontainer'>Expression:</th></br></br><tr><input type='range' id='testrange1' name='Expression' type='range' min='0' max='10'><span id='demo1'></span></div></p></tr>
			  <tr> <input type='submit' name='submit1'/></tr></form></div>";     
	
				 // Balance Scales
				 echo "<button class='collapsible'>Balance</button>
				 <div class='content'>
                 <form action='updatescale.php' method='post'>				 
                <input type='hidden' name='mrid2' value=".$mrid."> 
                <p><div class='slidecontainer'>Standingscore:</br></br><input type='range' id='testrange2' name='testrange2'  min='0' max='10'><span id='demo2'></span></div></p>
			    <p><div class='slidecontainer'>Settingscore:</br></br> <input type='range' id='testrange3' name='testrange3'  min='0' max='10'><span id='demo3'></span></div></p>
				<p><div class='slidecontainer'>Turning:</br></br><input type='range' id='testrange4' name='testrange4'  min='0' max='10'><span id='demo4'></span></div></p>
			    <p><div class='slidecontainer'>Standing:</br></br><input type='range' id='testrange5' name='testrange5'  min='0' max='10'><span id='demo5'></span></div></p>
				<p><div class='slidecontainer'>Footonstool:</br></br><input type='range' id='testrange6' name='testrange6'  min='0' max='10'><span id='demo6'></span></div></p>
			    <p><div class='slidecontainer'>Pickup:</br></br><input type='range' id='testrange7' name='testrange7'  min='0' max='10'><span id='demo7'></span></div></p>
                <input type='submit' name='submit2'/></form></div>";
				
				// Musclestrength Scales
				
				echo "<button class='collapsible'>Muscle Strength</button>
                 <div class='content'>
				<form action='updatescale.php' method='post'>
                <input type='hidden' name='mrid3' value=".$mrid."> 
                <p><div class='slidecontainer'>Upperbody:</br></br><input type='range' id='testrange8' name='Upperbody'  min='0' max='10'><span id='demo8'></span></div></p>
			    <p><div class='slidecontainer'>lowerbody:</br></br> <input type='range' id='testrange9' name='lowerbody'  min='0' max='10'><span id='demo9'></span></div></p>
				<p><div class='slidecontainer'>Bladdermng:</br></br><input type='range' id='testrange10' name='bladdermng'  min='0' max='10'><span id='demo10'></span></div></p>
			    <p><div class='slidecontainer'>Bowelmng:</br></br><input type='range' id='testrange11' name='bowelmng'  min='0' max='10'><span id='demo11'></span></div></p>		
                <input type='submit' name='submit3'/> </form></div>";
				
				// Self Care Scales	
				echo "<button class='collapsible'>Self Care</button>
                 <div class='content'>
				 <form action='updatescale.php' method='post'>
                <input type='hidden' name='mrid4' value=".$mrid."> 
				 <p><div class='slidecontainer'>Eating:</br></br>
			     <input type='range'  name='eating' id='eating' min='0' max='10'><span id='demo12'></span></div></p>
			   <p><div class='slidecontainer'>Grooming:</br></br> <input type='range' name='grooming' id='grooming' min='0' max='10'><span id='demo13'></span></div></p>
				<p><div class='slidecontainer'>Bathing:</br></br><input type='range' name='bathing' id='bathing'  min='0' max='10'><span id='demo14'></span></div></p>
			    <p><div class='slidecontainer'>Toileting:</br></br><input type='range'  name='toileting' id='toileting' min='0' max='10'><span id='demo15'></span></div></p>
				<p><div class='slidecontainer'>Dressing:</br></br><input type='range' name='dressing' id='dressing' min='0' max='10'><span id='demo16'></span></div></p>				
				<input type='submit' name='submit4'/> </form></div>";
				
				echo"<script>
var coll = document.getElementsByClassName('collapsible');
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener('click', function() {
        this.classList.toggle('active');
        var content = this.nextElementSibling;
        if (content.style.display === 'block') {
            content.style.display = 'none';
        } else {
            content.style.display = 'block';
        }
    });
}
</script><script>
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

</script> ";
				}

            //if the form not empty we will get the data in the row your query selected and display it to the doctors
            else{
				
                $output=mysqli_fetch_row($QueryResult);
                echo "<button class='collapsible'>Communication</button>
               <div class='content'> 
			   <form action='updatescale.php' method='post'><br>
               <input type='hidden'name='mrid1' value=".$output[4].">
			   <div align='right'> Previous Assessment Date :".$output[3]."</div><br>
			   <p><div class='slidecontainer'>Comprehension:</br></br> <input type='range' id='testrange' name='Comprehension' type='range' min='0' max='10'><span id='demo'></span></div></p>
               <p><div class='slidecontainer'>Expression:</br></br><input type='range' id='testrange1' name='Expression' type='range' min='0' max='10'><span id='demo1'></span></div></p>
			   <input type='submit' name='submit1'/> </form></div>";
                 
			   
			   
						// Display blance Scales
				$output1=mysqli_fetch_row($QueryResult1);
				echo "<button class='collapsible'>Balance</button>
				 <div class='content'>
                 <form action='updatescale.php' method='post'>				 
                <input type='hidden'name='mrid2' value=".$output1[8]."><br>
				<div align='right'>Previous Assessment Date :".$output1[7]."</div><br>
                <p><div class='slidecontainer'>Standingscore:</br></br><input type='range' id='testrange2' name='testrange2'  min='0' max='10'><span id='demo2'></span></div></p>
			    <p><div class='slidecontainer'>Settingscore:</br></br> <input type='range' id='testrange3' name='testrange3'  min='0' max='10'><span id='demo3'></span></div></p>
				<p><div class='slidecontainer'>Turning:</br></br><input type='range' id='testrange4' name='testrange4'  min='0' max='10'><span id='demo4'></span></div></p>
			    <p><div class='slidecontainer'>Standing:</br></br><input type='range' id='testrange5' name='testrange5'  min='0' max='10'><span id='demo5'></span></div></p>
				<p><div class='slidecontainer'>Footonstool:</br></br><input type='range' id='testrange6' name='testrange6'  min='0' max='10'><span id='demo6'></span></div></p>
			    <p><div class='slidecontainer'>Pickup:</br></br><input type='range' id='testrange7' name='testrange7'  min='0' max='10'><span id='demo7'></span></div></p>
                <input type='submit' name='submit2'/></form></div>"; 
			        
					// Muscle strength Scales					
				$output2=mysqli_fetch_row($QueryResult2);
				echo"<button class='collapsible'>Muscle Strength </button>
                 <div class='content'>
				 <form action='updatescale.php' method='post'>
                <input type='hidden'name='mrid3' value=".$output2[6].">
				<div align='right'>Previous Assessment Date :".$output2[5]."<br><br></div>
                <p><div class='slidecontainer'>Upperbody:</br></br><input type='range' id='testrange8' name='Upperbody'  min='0' max='10'><span id='demo8'></span></div></p>
			    <p><div class='slidecontainer'>lowerbody:</br></br> <input type='range' id='testrange9' name='lowerbody'  min='0' max='10'><span id='demo9'></span></div></p>
				<p><div class='slidecontainer'>Bladdermng:</br></br><input type='range' id='testrange10' name='bladdermng'  min='0' max='10'><span id='demo10'></span></div></p>
			    <p><div class='slidecontainer'>Bowelmng:</br></br><input type='range' id='testrange11' name='bowelmng'  min='0' max='10'><span id='demo11'></span></div></p>		
                <input type='submit' name='submit3'/> </form> </div>   ";
					
			   // Self Care Scales
                $output3=mysqli_fetch_row($QueryResult3);			   
			   echo"<button class='collapsible'>Self Care</button>
                 <div class='content'>
				 <form action='updatescale.php' method='post'>
                <input type='hidden'name='mrid4' value=".$output3[7].">
                <div align='right'>Previous Assessment Date :".$output3[6]."</div><br><br>
				<p><div class='slidecontainer'>Eating:</br></br>
			    <input type='range'  name='eating' id='eating' min='0' max='10'><span id='demo12'></span></div></p>
			   <p><div class='slidecontainer'>Grooming:</br></br> <input type='range' name='grooming' id='grooming' min='0' max='10'><span id='demo13'></span></div></p>
				<p><div class='slidecontainer'>Bathing:</br></br><input type='range' name='bathing' id='bathing'  min='0' max='10'><span id='demo14'></span></div></p>
			    <p><div class='slidecontainer'>Toileting:</br></br><input type='range'  name='toileting' id='toileting' min='0' max='10'><span id='demo15'></span></div></p>
				<p><div class='slidecontainer'>Dressing:</br></br><input type='range' name='dressing' id='dressing' min='0' max='10'><span id='demo16'></span></div></p>				
				<input type='submit' name='submit4'/> </form> </div>  ";
			  
                //this java script enables us to display stored data while still being able to store new ones
                echo "    <script>
var coll = document.getElementsByClassName('collapsible');
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener('click', function() {
        this.classList.toggle('active');
        var content = this.nextElementSibling;
        if (content.style.display === 'block') {
            content.style.display = 'none';
        } else {
            content.style.display = 'block';
        }
    });
}
</script><script type='text/javascript'>
				
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
        