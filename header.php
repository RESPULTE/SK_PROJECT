<style type="text/css">
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
<?php include 'sambung.php'; ?>
<html>
<head>
<title><?php echo $nama_sistem;?></title>
</head>

<body>
<center>

<img src="school.jpg" width="80%" height="400" style="border: 8px solid darkred; border-radius: 5px; z-index: -10; position: relative;">
<div class="popheader">
  <FONT SIZE="+3" COLOR="orange" font face="Arial"><?php echo $nama_sistem; ?></FONT>
<br>
<FONT SIZE="+1" COLOR="blue" font face="Arial"><?php echo $motto1;?></FONT></TD>
</div>
</body></center>
  
</div>
<?php include 'utility.php'; ?>
</html>