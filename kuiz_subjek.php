<style>
.pop{
  font-size: 35;
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
.btn {
  border: 3px solid black;
  border-radius: 5px;
  color: black;
  padding: 10px 15px;
  font-size: 16px;
  cursor: pointer;
}
.b3tn {
  border: 3px solid black;
  border-radius: 5px;
  font-size: 18;
  margin: 3px;
  color: black;
  transition: all 0.3s;
  cursor: pointer;
}
.info2 {
  border-color: forestgreen;
  background-color: lightgreen;
  color: darkgreen;
}
.info2:hover {
  background: forestgreen;
  color: white;
}
/* Blue */
.info {
  font-size: 20;
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue
}
.info09 {
  font-size: 20;
  border-color: forestgreen;
  color: darkgrey;
}
.info:hover {
  background: #2196F3;
  color: white;
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
<center><h2 class="pop">SENARAI SUBJEK</h2></center>
      <main>
<table width="70%" border="0" align="center" 
style='font-size:20px'>
  <tr>
    <td id="loll" width="2%"><b>Bil.</b></td>
    <td id="loll" width="50%"><b>Subjek</b></td>
    <td id="loll" width="8%"><b>Tindakan</b></td>
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
    <td id="tt"><?php echo $no; ?></td>
    <td id="tt"><?php echo $infol['subjek']; ?></td>
    <td id="tt"><?php if($getBil['bil']==0){?>
      <button class="b3tn info09"  disabled>PILIH</button>
     <?php }else{ ?>
     <a href="kuiz_topik.php?idsubjek=
     <?php echo $infol['idsubjek'];?>"><button class="b3tn info2">PILIH 
</button></a>
     <?php } ?></td></tr>
  <?php $no++; } ?>
</table></main>
<br>
<center><font style='font-size:18px'>* Senarai Tamat
*<br />Jumlah Rekod:<?php echo $no-1; ?></font></center>
</body>
</html>	
