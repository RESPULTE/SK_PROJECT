<?php
//FAIL WAJIB
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header.php';
?>
<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2>SENARAI SUBJEK BERDAFTAR</h2></center>
  <main>
<table width="70%" border="0" align="center" 
style='font-size:16px'>
  <tr>
    <td colspan="3" valign="middle" align="right"><b>
     <a href="subjek_daftar.php"><button>Daftar Subjek</button></a></b></td>
  </tr> 
  <tr> 
    <td width="2%"><b>Bil.</b></td>
    <td width="58%"><b>Nama Subjek</b></td>
     <td width="10%"><b>Tindakan</b></td>
  </tr> 
 <?php 
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM subjek ORDER BY subjek ASC");
while ($infol=mysqli_fetch_array($data1))
          {
          ?>
  <tr>
  <td><?php echo $no; ?></td>
  <td><?php echo $infol['subjek']; ?></td>
  <td align="center"><a href="edit_subjek.php?idsubjek=<?php echo $infol['idsubjek'];?>" onclick="return confirm('Anda Pasti?')"><button>Edit</button></a>
<a href="hapus_subjek.php?idsubjek=<?php echo $infol ['idsubjek'];?>" 
onclick="return confirm('AWAS!!!, Topik,Soalan dan jawapan akan dihapuskan. Anda Pasti?')">
<button>Hapus</button> </a></td>
</tr>
  <?php $no++; } ?>
</table></main><center><font style='font-size:14px'> 
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font></center>
  </body>
</html>
