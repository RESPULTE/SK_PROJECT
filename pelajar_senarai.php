<style type="text/css">
  .pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
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
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<html>
<head><?php include 'menu.php'; ?></head> 
  <body>
     <center><h2 class="pop">SENARAI PELAJAR BERDAFTAR</h2></center> 
	  <main>
<table width="70%" border="0" align="center" 
style='font-size:16px'>
  <tr>
    <td width="5%"><b>Bil.</b></td>
    <td width="10%"><b>ID Pelajar</b></td> 
	<td width="5%"><b>Password</b></td>
    <td width="50%"><b>Nama Pelajar</b></td> 
	<td width="5%"><b>Jantina</b></td>
    <td width="5%"><b>Tindakan</b></td> 
  </tr>
 <?php
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM pengguna WHERE aras='PELAJAR' ORDER BY nama ASC");
while ($infol=mysqli_fetch_array($data1))
          {
?>
  <tr>
    <td><?php echo $no; ?></td>
      <td><?php echo $infol['idpengguna']; ?></td> 
	  <td><?php echo $infol['password']; ?></td> 
	  <td><?php echo $infol['nama']; ?></td> 
	  <td><?php echo $infol['jantina']; ?></td> 
	 <td><a href="hapus_pelajar.php?idpengguna=<?php echo $infol['idpengguna'];?>"
onclick="return confirm('AWAS!, Semua rekod yang berkaitan akan dihapuskan, Anda Pasti?')">
<button class="kill">HAPUS</button> 
</a></td>
  </tr>
  <?php $no++; } ?>
</table>
      </main>
<center><font style='font-size:14px.>
• Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?> 
</font></center></body>
</html>

