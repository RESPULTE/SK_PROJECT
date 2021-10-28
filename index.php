<style type="text/css">
.warsn {
  border: 3px solid darkorange;
  border-color: darkorange;
  font-size: 30;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
}
</style>
<?php
//SAMBUNGKAN KE P.DATA
require 'sambung.php';
//PANGGILAN HEADER
include 'header.php';
?>

<html>
<body>

<header><?php include 'menu1.php' ?>

<p>
<center><p style="font-size: 30; color: dodgerblue; font-family: verdana; ">
<?php echo $motto2;?></p>
</center></p></header>

<table width='70%' border=0 align="center">
<td width='20%'>
<img src="<?php echo $logo?>" width="100%" height="100%">
</td>
<td width='50%'><marquee behavior="alternate" direction="left" class="warsn">SOALAN TERKINI</marquee>
<?php include 'soalan_terkini.php' ?>
</td></tr></table>
<?php include 'footer.php'; ?>

</body>
</html>