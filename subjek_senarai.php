<style>
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
.btn {
  border: 3px solid black;
  border-radius: 5px;
  margin: 3px;
  transition: all 0.3s;
  color: black;
  font-size: 10px;
  cursor: pointer;
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
.info11 {
  border: 3px solid dodgerblue;
  border-radius: 5px;
  margin: 3px;
  transition: all 0.3s;
  font-size: 18px;
  cursor: pointer;
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
  width: 70px;
  height: 30px;
}
.info11:hover {
  background: #2196F3;
  color: white;
}
.kill{
  color: white; 
  border: 3px solid red; 
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
//FAIL WAJIB
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header.php';
?>
<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2 class="pop">SENARAI SUBJEK BERDAFTAR</h2></center>
  <main>
<table width="70%" border="0" align="center" 
style='font-size:16px'>
  <tr> 
    <td id="loll" width="5%"><b>Bil.</b></td>
    <td id="loll" width="40%"><b>Nama Subjek</b></td>
     <td id="loll" width="20%"><b>Tindakan</b></td>
  </tr> 
 <?php 
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM subjek ORDER BY subjek ASC");
while ($infol=mysqli_fetch_array($data1))
          {
          ?>
  <tr>
  <td id="tt"><?php echo $no; ?></td>
  <td id="tt"><?php echo $infol['subjek']; ?></td>
  <td id="tt"><a href="edit_subjek.php?idsubjek=<?php echo $infol['idsubjek'];?>" onclick="return confirm('Anda Pasti?')"><button class="info11">Edit</button></a>
<a href="hapus_subjek.php?idsubjek=<?php echo $infol ['idsubjek'];?>" 
onclick="return confirm('AWAS!!!, Topik,Soalan dan jawapan akan dihapuskan. Anda Pasti?')">
<button class="kill">Hapus</button> </a></td>
</tr>
  <?php $no++; } ?>

</table></main><center><font style='font-size:14px'> 
  <br>
<center><a href="subjek_daftar.php"><button class="btn info">Daftar Subjek</button></a></center>

* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font></center>
  </body>
</html>
