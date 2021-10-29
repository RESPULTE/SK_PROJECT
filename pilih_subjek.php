<style>
.b3tn {
  border: 3px solid black;
  border-radius: 5px;
  font-size: 18;
  margin: 3px;
  color: black;
  transition: all 0.3s;
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
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
/* Blue */
.info {
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
}

.info2 {
  border-color: forestgreen;
  background-color: lightgreen;
  color: darkgreen;
}

.info:hover {
  background: #2196F3;
  color: white;
}
.info2:hover {
  background: forestgreen;
  color: white;
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
style='font-size:16px'>
  <tr>
    <td id="loll" width="2%"><b>Bil.</b></td>
    <td id="loll" width="50%"><b>Subjek</b></td>
     <td id="loll" width="18%"><b>Pengurusan Topik</b></td>
  </tr> 
<?php
     $no=1;
     $data1=mysqli_query($hubung,"SELECT * FROM subjek"); 
          while ($infol=mysqli_fetch_array($data1))
          {
?>
  <tr>
   <td id="tt"><?php echo $no; ?></td>
   <td id="tt"><?php echo $infol['subjek']; ?></td>
   <td id="tt"><a href="papar_topik.php?idsubjek=<?php echo $infol['idsubjek'];?>"><button class="b3tn info2" >PAPAR</button></a>
  <a href="tambah_topik.php?idsubjek=<?php echo $infol['idsubjek'];?>"><button class="b3tn info" >CIPTA</button></a></td>
  </tr>
  <?php $no++; } ?>  
</table>
</main>
<?php include 'footer.php';?>
  </body>
</html>