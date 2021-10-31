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
  transition: all 0.3s; 
  color: black;
  background-size: cover;
  font-size: 25px;
  -webkit-filter: grayscale(0);
  background-image: url("bg.jpg");
  background-size: cover;
  backdrop-filter: blur(5px) brightness(100%); 
}

.dark-mode {
  -webkit-filter: contrast(80%);
  backdrop-filter: brightness(10%) blur(5px);
  transition: 0.3s;
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
<body>
<center>
<button  class="bt3n info1" style="font-size: 15;" onclick="myFunction()">Toggle dark mode</button>
</center>
</body>
</html>