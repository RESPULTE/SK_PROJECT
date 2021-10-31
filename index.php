<style type="text/css">
.warsn {
  border: 5px solid darkorange;
  border-color: darkorange;
  font-size: 30;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
}
.popheader{
  border-style: solid;
  border-color: brown;
  background-color: lightyellow;
  color: darkorange;
  z-index: 10;
  position: absolute;
  align-self: center;
  top: 80px;
  left: 350px;
  width: 50%;
}
</style>
<?php
//SAMBUNGKAN KE P.DATA
require 'sambung.php';
//PANGGILAN HEADER
include 'header.php';
include 'menu1.php';

?>

<html>
<body>



<center>
<marquee behavior="alternate" class="warsn" width='500' >
  SOALAN TERKINI
</marquee>
</center>
<?php include 'soalan_terkini.php' ?>
<?php include 'footer.php'; ?>

</body>
</html>