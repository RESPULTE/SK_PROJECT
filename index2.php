<style>
.btn {
  border: 3px solid black;
  border-radius: 5px;
  margin: 3px;
  color: black;
  transition: all 0.3s;
  padding: 10px 15px;
  font-size: 16px;
  cursor: pointer;
}


/* Blue */
.info {
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue
}

.info:hover {
  background: #2196F3;
  color: white;
}
.pop{
border-style: solid;
border-color: orange;
background-color: lightyellow;
color: darkorange;
width: 70%;

}

</style>
<?php
require 'sambung.php';
include 'header.php';
require 'keselamatan.php';
$nokp = $_SESSION['idpengguna'];
?>

<html>
<head>
<?php include 'menu.php'; ?>
</head>
<body>
<center>
<h2 class="pop"><?php echo $pengguna; ?></h2>
</center>
<main>
<table width="70%" border="0" align="center">
<tr>
<td>
<center>
<h3 style="font-size: 25; color: dodgerblue; margin-bottom: -10px;"><b>* SELAMAT DATANG *</b></h3>
<p style="font-size: 20; color: darkorange;">
<?php
//Papar maklumat lengkap pengguna login
$dataA=mysqli_query($hubung, "SELECT * FROM pengguna WHERE idpengguna='$nokp'");
$infoA=mysqli_fetch_array($dataA);
?>

	Nama Anda :<?php echo $infoA['nama']; ?><br>
	Nombor KP :<?php echo $infoA['idpengguna']; ?></br>
</p>
</center>
</td>
</tr>
</table>
</main>
<br>
<?php include 'footer.php'; ?>
</body>
</html>