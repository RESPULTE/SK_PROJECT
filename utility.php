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
function myFunction() {
    element = document.body;
    element.classList.toggle("dark-mode");

}
</script>
</head>
<body style='background-image: url("bsg.jpg");'>
<center>
<button  class="bt3n info1" style="font-size: 15;" onclick="myFunction()">Toggle dark mode</button>
</center>
</body>
</html>