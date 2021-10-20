<?php
require 'sambung.php'; 
require 'keselamatan.php';
include 'header.php';

?>

<html>
<head><?php include 'menu.php'; ?></head>
<body> 
<center><h2>SENARAI SUBJEK</h2></center>
      <main>
<table width="70%" border="0" align="center" 
style='font-size:16px'>
  <tr>
    <td width="2%"><b>Bil.</b></td>
    <td width="50%"><b>Subjek</b></td>
    <td width="8%"><b>Tindakan</b></td>
  </tr> 
 <?php
     $no=1;
     $datal=mysqli_query($hubung,"SELECT * FROM subjek");
     while ($infol=mysqli_fetch_array($datal)) 
	      {
$dataBil=mysqli_query($hubung,"SELECT COUNT(idsubjek) AS 
'bil' FROM topik WHERE idsubjek='$infol[idsubjek]'");
$getBil=mysqli_fetch_array($dataBil);
          ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $infol['subjek']; ?></td>
    <td><?php if($getBil['bil']==0){
     }else{ ?>
     <a href="kuiz_topik.php?idsubjek=
     <?php echo $infol['idsubjek'];?>"><button>PILIH 
</button></a>
     <?php } ?></td></tr>
  <?php $no++; } ?>
</table></main>
<center><font style='font-size:14px'>* Senarai Tamat
*<br />Jumlah Rekod:<?php echo $no-1; ?></font></center>
</body>
</html>	
