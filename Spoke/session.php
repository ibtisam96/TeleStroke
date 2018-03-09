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



  
  
               <iframe src="scale.php" align="right" height="800" width="500" ></iframe>
			   <div id="video" align="center" style="width: 50%">
 
         <script src="https://meet.jit.si/external_api.js"></script>
        <script>
           /*var domain = "meet.jit.si";
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

