<style type="text/css">
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
#loll{
  border: 3px solid blue; 
  text-align: center; 
  border-radius: 5px; 
  font-size: 20;
  background-color: dodgerblue; 
  color: white;
}
#tt{
  border-radius: 8px; 
  padding: 10px 10px; 
  font-size: 20;
  text-align: center;
  background-color: lightcyan; 
  font-size: 20;
}
.kill{
  color: white; 
  border: border: 3px solid red; 
  border-radius: 5px; 
  transition: all 0.5s;
  background-color: red; 
  font-size: 20px;
}
.kill:hover{
  background: white;
  color:  red;
}
</style>
<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI 
include 'header.php';
?>
<html>
<head><?php include 'menu.php'; ?></head>
  <body> 
<center><h2 class="pop">SENARAI GURU BERDAFTAR</h2></center>
<main>	
<table width="70%" border="0" align="center" style='font-size:16px'>
  <tr>
    <td id="loll" width="2%"><b>Bil.</b></td>
    <td id="loll" width="44%"><b>Nama Guru</b></td> 
	<td id="loll" width="5%"><b>Nom. KP</b></td>
     <td id="loll" width="7%"><b>Bil. Topik</b></td> 
	 <td id="loll" width="7%"><b>Bil. Soalan</b></td> 
	 <td id="loll" width="5%"><b>Tindakan</b></td>
  </tr>
 <?php
$no=1; 
$data1=mysqli_query($hubung,"SELECT *	FROM pengguna WHERE aras='GURU' ORDER BY nama ASC");
while ($infol=mysqli_fetch_array($data1)){
  $topik=mysqli_query($hubung,"SELECT idtopik, COUNT(idtopik) as 'biltopik' FROM topik WHERE idpengguna='$infol[idpengguna]'"); 
  $infoTopik=mysqli_fetch_array($topik);
  //TABLE SOALAN
  $soalan=mysqli_query($hubung,"SELECT idsoalan, COUNT(idsoalan) as 'bilsoalan' FROM soalan WHERE idtopik='$infoTopik[idtopik]'");
  $infoSoalan=mysqli_fetch_array($soalan);
?>
  <tr>
    <td id="tt"><?php echo $no; ?></td>
     <td id="tt"><?php echo $infol['nama']; ?></td>
     <td id="tt"><?php echo $infol['idpengguna']; ?></td>
     <td id="tt"><?php echo $infoTopik['biltopik'] ?? ''; ?></td>
     <td id="tt"><?php echo $infoSoalan['bilsoalan'] ?? ''; ?></td>
<td id="tt"><a href="hapus_guru.php?idpengguna=<?php echo $infol['idpengguna'];?>" 
onclick="return confirm('AWAS!!, Semua rekod akan dihapuskan, Anda Pasti?')">
<button class='kill'>Hapus</button></a></td>
  </tr>
  <?php $no++; } ?>
</table>
      </main>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?> 
</font></center>
  </body>
</html>
