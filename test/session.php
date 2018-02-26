<!DOCTYPE html>  

<html itemscope itemtype="http://schema.org/Product" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/html">
    <head>
        <link rel="stylesheet" type="text/css" href="../Telestroke.css">
        <style type="text/css"> td {background: #c9c3c5}</style>
        <meta charset="utf-8">
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
            $SQLstring="SELECT * From Communication where '$mrid'=MR_id";
            $QueryResult=mysqli_query($conn,$SQLstring)
            Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");

            //the line after we check if the patient has previous session or not because if this is his first session the form will be empty and won't display any previous data
            if (mysqli_num_rows($QueryResult)==0) {
                echo "<form action='updatescale.php' method='post'>
                <input type='hidden' name='mrid' value=".$mrid.">
                <input name='testrange' type='range' min='0' max='10'>
                <input type='submit' name='submit'>"; }

            //if the form not empty we will get the data in the row your query selected and display it to the doctors
            else{
                $output=mysqli_fetch_row($QueryResult);
                echo "<form action='updatescale.php' method='post'>
                <input type='hidden'name='mrid' value=".$output[4].">
                <input type='range' id='testrange' name='testrange' type='range' min='0' max='10'>
                <input type='submit' name='submit'>";


                //this java script enables us to display stored data while still being able to store new ones
                echo "<script type='text/javascript'>
              document.getElementById('testrange').defaultValue = '{$output[2]}';
              </script>";
            echo "hi".$output[2];
        }?>
           
      </form>
      </div>
</td>
</tr>
</table>

         <script src="https://meet.jit.si/external_api.js"></script>
        <script>
            var domain = "meet.jit.si";
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
</script>
</html>
