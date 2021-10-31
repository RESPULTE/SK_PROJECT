<style>
.warsn {
  border: 3px solid forestgreen;
  border-color: forestgreen;
  font-size: 30;
  border-color: forestgreen;
  background-color: lightgreen;
  color: darkgreen;
  text-align: center;
}
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
  color: black;
  padding: 10px 15px;
  font-size: 16px;
  cursor: pointer;
}
.b3tn {
  border: 5px solid black;
  border-radius: 8px;
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

<?php
//QUERY SOALAN
$query="INSERT INTO perekodan (idperekodan,idpengguna,idtopik,jenis,skor,catatan_masa)
VALUES (NULL,'{$_SESSION['idpengguna']}','{$_SESSION['idtopik']}','{$_SESSION['jenis_soalan']}',
'{$_SESSION['score']}',NULL)";
mysqli_query($hubung,$query) or die("<br />".$query);
?>
 
<html>
  <body>
<center><h2 class="pop">SOALAN TAMAT</h2></center>
      <main>
<table width="70%" border="0" align="center">
     <tr>
          <td>
<p class="warsn">Tahniah! Anda telah selesai menjawab semua soalan</p>
<center> 

<p style="font-size: 30; margin-bottom: 10px;">Bilangan Betul: <?php echo $_SESSION['score']; ?></p>
</center>
         </td>
     </tr>
     <tr>
<td>
<center>
    <br>
<button  class="b3tn info" style=' margin-left: 8px; border: 3px solid dodgerblue; border-radius: 3px;' onclick="window.location.href='soalan_papar.php?&idtopik=<?php echo $_SESSION['idtopik']?>&n=1'">Cuba Lagi</button>

<button  class="b3tn info" style='margin-left: 8px; border: 3px solid dodgerblue; border-radius: 3px;' onclick="window.location.href='index2.php'">Tamat</button>

<button  class="b3tn info" style='margin-left: 8px; border: 3px solid dodgerblue; border-radius: 3px;' onclick="window.location.href='skor_individu.php'">Prestasi</button>

<?php $_SESSION['score']=0; ?>
          </td>
     </tr>
</table>
</center>
<br>
<?php include 'footer.php';?>
</body>
</html>
