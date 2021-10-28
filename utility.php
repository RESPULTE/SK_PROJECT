<html>
<style>
.info1 {
  font-size: 25;
  border-color: forestgreen;
  border: 3px solid forestgreen;
  background-color: lightgreen;
  color: forestgreen;
}

.info1:hover {
  border-color: forestgreen;
  background: white;
  color: forestgreen;
}

body {
  padding: 25px;
  transition: all 0.6s; 
  color: black;
  background-size: cover;
  font-size: 25px;
}

.dark-mode {
  background-color: black;
  color: white;
}
.btn3 {
  border: 3px solid;
  border-radius: 5px;
  margin: 3px;
  transition: all 0.3s;
  font-size: 10px;
  cursor: pointer;
}

</style>
<script>
var fontSize = 1;
function zoomIn() {
	fontSize += 0.1;
	document.body.style.fontSize = fontSize + "em";
}
function zoomOut() {
	fontSize -= 0.1;
	document.body.style.fontSize= fontSize + "em";
}
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
</head>
<body class="back">
<center>
<input  class="bt3n info1" style="font-size: 15;" type="button" value="++" onClick="zoomIn()"/>
<input  class="bt3n info1" style="font-size: 15;" type="button" value="--" onClick="zoomOut()"/>
<button  class="bt3n info1" style="font-size: 15;" onclick="myFunction()">Toggle dark mode</button>
</center>
</body>
</html>