<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.collapsible {
    background-color: #777;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 50%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}

.active, .collapsible:hover {
    background-color: #555;
}

.content {
	 width: 50%;
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
    width: 50%;
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
}
</style>
</head>
<body>

<h2>Patient Scales</h2>


<button class="collapsible">Communication Scales</button>
<div class="content">
<form method="post" action="patient_scales.php">
  <p><div class="slidecontainer">Comprehension:</br></br>
  <input type="range" name="Comprehension" min="1" max="5" value="" class="slider" id="myRange">
  Value: <span id="demo"></span>
</div></p>
<p><div class="slidecontainer">Expression:</br></br>
  <input type="range" name="Expression" min="1" max="5" value="" class="slider" id="myRange1">
  Value: <span id="demo1"></span>
</div></p>
<p>Date:
   <input type="date" name="c_date" value="<?php echo date("Y-m-d"); ?>">
    </p> 
    <input type="submit" name="submit" value="Submit" />
</form></div>


<button class="collapsible">Balance Scales</button>
<div class="content">
  <form method="post" action="patient_scales.php">
  <p><div class="slidecontainer">Standingscore:</br></br>
  <input type="range" name="Standingscore" min="1" max="5" value="" class="slider" id="myRange2">
  Value: <span id="demo2"></span>
</div></p>
<p><div class="slidecontainer">Settingscore:</br></br>
  <input type="range" name="Settingscore" min="1" max="5" value="" class="slider" id="myRange3">
  Value: <span id="demo3"></span>
</div></p>
<p><div class="slidecontainer">Turning:</br></br>
  <input type="range" name="Turning" min="1" max="5" value="" class="slider" id="myRange4">
  Value: <span id="demo4"></span>
</div></p>
<p><div class="slidecontainer">Standing:</br></br>
  <input type="range" name="Standing" min="1" max="5" value="" class="slider" id="myRange5">
  Value: <span id="demo5"></span>
</div></p>
<p><div class="slidecontainer">Footonstool:</br></br>
  <input type="range" name="Footonstool" min="1" max="5" value="" class="slider" id="myRange6">
  Value: <span id="demo6"></span>
</div></p>
<p><div class="slidecontainer">Pickup:</br></br>
  <input type="range" name="Pickup" min="1" max="5" value="" class="slider" id="myRange7">
  Value: <span id="demo7"></span>
</div></p>
<p>Date:
   <input type="date" name="b_date" value="<?php echo date("Y-m-d"); ?>"></p>
   
    <input type="submit" name="submit2" value="Submit" />
</form></div>

<button class="collapsible">Musclestrength Scales</button>
<div class="content">
  <form method="post" action="patient_scales.php">
  <p><div class="slidecontainer">Upperbody:</br></br>
  <input type="range" name="Upperbody" min="1" max="5" value="" class="slider" id="myRange8">
  Value: <span id="demo8"></span>
</div></p>
<p><div class="slidecontainer">lowerbody:</br></br>
  <input type="range" name="lowerbody" min="1" max="5" value="" class="slider" id="myRange9">
  Value: <span id="demo9"></span>
</div></p>
<p><div class="slidecontainer">Bladdermng:</br></br>
  <input type="range" name="Bladdermng" min="1" max="5" value="" class="slider" id="myRange10">
  Value: <span id="demo10"></span>
</div></p>
<p><div class="slidecontainer">Bowelmng:</br></br>
  <input type="range" name="Bowelmng" min="1" max="5" value="" class="slider" id="myRange11">
  Value: <span id="demo11"></span>
</div></p>
<p>Date:
   <input type="date" name="m_date" value="<?php echo date("Y-m-d"); ?>"></p>
   
    <input type="submit" name="submit3" value="Submit" />
</form></div>

<button class="collapsible">Self Care Scales</button>
<div class="content">
  <form method="post" action="patient_scales.php">
  <p><div class="slidecontainer">Eating:</br></br>
  <input type="range" name="Eating" min="1" max="5" value="" class="slider" id="myRange12">
  Value: <span id="demo12"></span>
</div></p>
<p><div class="slidecontainer">Grooming:</br></br>
  <input type="range" name="Grooming" min="1" max="5" value="" class="slider" id="myRange13">
  Value: <span id="demo13"></span>
</div></p>
<p><div class="slidecontainer">Bathing:</br></br>
  <input type="range" name="Bathing" min="1" max="5" value="" class="slider" id="myRange14">
  Value: <span id="demo14"></span>
</div></p>
<p><div class="slidecontainer">Toileting:</br></br>
  <input type="range" name="Toileting" min="1" max="5" value="" class="slider" id="myRange15">
  Value: <span id="demo15"></span>
</div></p>
<p><div class="slidecontainer">Dressing:</br></br>
  <input type="range" name="Dressing" min="1" max="5" value="" class="slider" id="myRange16">
  Value: <span id="demo16"></span>
</div></p>
<p>Date:
   <input type="date" name="s_date" value="<?php echo date("Y-m-d"); ?>"></p>
   
    <input type="submit" name="submit4" value="Submit" />
</form></div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}
</script>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;
slider.oninput = function() {
  output.innerHTML = this.value;
}
var slider1 = document.getElementById("myRange1");
var output1 = document.getElementById("demo1");
output1.innerHTML = slider1.value;
slider1.oninput = function() {
  output1.innerHTML = this.value;
}
var slider2 = document.getElementById("myRange2");
var output2 = document.getElementById("demo2");
output2.innerHTML = slider2.value;
slider2.oninput = function() {
  output2.innerHTML = this.value;
}
var slider3 = document.getElementById("myRange3");
var output3 = document.getElementById("demo3");
output3.innerHTML = slider3.value;
slider3.oninput = function() {
  output3.innerHTML = this.value;
}
var slider4 = document.getElementById("myRange4");
var output4 = document.getElementById("demo4");
output4.innerHTML = slider4.value;
slider4.oninput = function() {
  output4.innerHTML = this.value;
}
var slider5 = document.getElementById("myRange5");
var output5 = document.getElementById("demo5");
output5.innerHTML = slider5.value;
slider5.oninput = function() {
  output5.innerHTML = this.value;
}
var slider6 = document.getElementById("myRange6");
var output6 = document.getElementById("demo6");
output6.innerHTML = slider6.value;
slider6.oninput = function() {
  output6.innerHTML = this.value;
}
var slider7 = document.getElementById("myRange7");
var output7 = document.getElementById("demo7");
output7.innerHTML = slider7.value;
slider7.oninput = function() {
  output7.innerHTML = this.value;
}
var slider8 = document.getElementById("myRange8");
var output8 = document.getElementById("demo8");
output8.innerHTML = slider8.value;
slider8.oninput = function() {
  output8.innerHTML = this.value;
}
var slider9 = document.getElementById("myRange9");
var output9 = document.getElementById("demo9");
output9.innerHTML = slider9.value;
slider9.oninput = function() {
  output9.innerHTML = this.value;
}
var slider10 = document.getElementById("myRange10");
var output10 = document.getElementById("demo10");
output10.innerHTML = slider10.value;
slider10.oninput = function() {
  output10.innerHTML = this.value;
}
var slider11 = document.getElementById("myRange11");
var output11 = document.getElementById("demo11");
output11.innerHTML = slider11.value;
slider11.oninput = function() {
  output11.innerHTML = this.value;
}
var slider12 = document.getElementById("myRange12");
var output12 = document.getElementById("demo12");
output12.innerHTML = slider12.value;
slider12.oninput = function() {
  output12.innerHTML = this.value;
}
var slider13 = document.getElementById("myRange13");
var output13 = document.getElementById("demo13");
output13.innerHTML = slider13.value;
slider13.oninput = function() {
  output13.innerHTML = this.value;
}
var slider14 = document.getElementById("myRange14");
var output14 = document.getElementById("demo14");
output14.innerHTML = slider14.value;
slider14.oninput = function() {
  output14.innerHTML = this.value;
}
var slider15 = document.getElementById("myRange15");
var output15 = document.getElementById("demo15");
output15.innerHTML = slider15.value;
slider15.oninput = function() {
  output15.innerHTML = this.value;
}
var slider16 = document.getElementById("myRange16");
var output16 = document.getElementById("demo16");
output16.innerHTML = slider16.value;
slider16.oninput = function() {
  output16.innerHTML = this.value;
}

</script>

</body>
</html>
