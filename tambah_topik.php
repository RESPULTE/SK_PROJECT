<style>
.btn1 {
  border: 3px solid;
  margin: 3px;
  border-radius: 5px;
  transition: all 0.3s;
  color: black;
  font-size: 25;
  margin-bottom: 5px;
  cursor: pointer;
}
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}

.info2 {
  font-size: 20;
  padding: 0px 4px;
  text-align: center;
  border-color: forestgreen;
  background-color: lightgreen;
  color: darkgreen;
}
.info2:hover {
  background: white;
  color: darkgreen;
}
.info2:focus{
  background: white;
  color: darkgreen;
}

input[type="submit"] {
    display: none;
}

</style>

<?php
require 'keselamatan.php';
require 'sambung.php';
//sambung ke fail header
include 'header.php';
$guru = $_SESSION['idpengguna'];
?>

<?php
if (isset($_POST['submit'])){
   //POS VALUE
  $nom_soalan = $_POST['nom_soalan'];
  $topik = $_POST['topik'];
  $jenis_soalan = $_POST['jenis'];
  $idsubjek = $_POST['subjek'];
  $markah = $_POST['markah'];
   //QUERY TOPIK
  $query="INSERT INTO topik(idtopik,topik,markah,idsubjek,idpengguna) values 
  (NULL,'$topik','$markah','$idsubjek', '$guru')";
  $insert_row=mysqli_query($hubung,$query);
  $last_id = mysqli_insert_id($hubung);
  $_SESSION['idtopik']=$last_id;

if($jenis_soalan=="mcq"){
  echo "<script>alert('Topik baru telah ditambah'); window.location='soalan_baru1.php?idtopik=$last_id' </script>";
}

if($jenis_soalan=='fib'){
  echo "<script>alert('Topik baru telah ditambah');        window.location='soalan_baru2.php?idtopik=$last_id' </script>";	
}
}
$subjek_pilihan = $_SESSION['idsubjek'];
$result = mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek='$subjek_pilihan'");
$res = mysqli_fetch_array($result);
$_SESSION['idsubjek']=$subjek_pilihan;
//TOTAL TOPIK
$query = "SELECT * FROM topik WHERE idsubjek='$subjek_pilihan'";
$topik = mysqli_query($hubung,$query); 
$total=mysqli_num_rows($topik); 
$next=$total+1;
?>

<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2 class="pop">TAMBAH TOPIK</h2></center>
      <main>
<table width="70%" border="0" align="center">
  <tr>
     <td>
<form method="POST" action="tambah_topik.php">
<tr>
<td align="right">SUBJEK:</td>
<td>
<h2 style="font-size: 25px; color: forestgreen; margin-bottom: -3px;">
<?php
  $paparsubjek = $res['subjek'];
  echo $paparsubjek;
?>
</h2>
<input type="text" value="<?php echo $subjek_pilihan; ?>" name="subjek" hidden /></td> 
</tr> 
<tr>
<td align="right">BIL.:</td>
<td>
  <h2 style="font-size: 25px; color: forestgreen; margin-bottom: -3px;">
  <?php echo $next; ?>
</h2>
<input style="font-size: 22px; color: forestgreen;" type="text" value="<?php echo $next; ?>"name="nom_soalan" hidden /></td> 
</tr>
<tr>
<td align="right">TOPIK:</td>
<td><input class="btn1 info2" style="font-size: 22px;"  type="text" name="topik" required/></td>
</tr> 
<tr>
<td align="right">FORMAT SOALAN:</td>
<td>
  <select name="jenis" class="btn1 info2" style="font-size: 22px; color: forestgreen;"  required>
    <option hidden selected value="">PILIH FORMAT SOALAN</option>
  	<option value='mcq'>Pelbagai Jawapan / Benar-Palsu</option>
    <option value='fib'>Isi Tempat Kosong</option> 
	</select>
</td>
</tr> 
<tr> 
<td align="right">MARKAH:</td>
<td><input class="btn1 info2" style="font-size: 22px; color: forestgreen;" type="number" name="markah" max="100" size="10" required />	
</td> 
</tr> 
<tr><td></td>
<td>
  <label>
   <button class="btn1 info" style="font-size: 25px;" type="submit" name="submit">
    TAMBAH
  </button>   
  </label>
 
</td> 
</tr>
</form>
</td></tr></table>
      </main>
<?php include 'footer.php';?>
  </body>
</html>