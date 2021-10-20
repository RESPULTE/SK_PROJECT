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
<center><font size="5" face="verdana" color="orange">
<?php echo $motto2;?></font>
</center></p></header>

<table width='70%' border=0 align="center">
<td width='20%'>
<img src="<?php echo $logo?>" width="100%" height="100%">
</td>
<td width='50%'><marquee behavior="alternate" direction="left">SOALAN TERKINI</marquee>
<?php include 'soalan_terkini.php' ?>
</td></tr></table>
<?php include 'footer.php'; ?>

</body>
</html>