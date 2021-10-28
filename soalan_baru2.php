<style>
.bt4n {
  border: 3px solid;
  border-radius: 5px;
  margin: 3px;
  font-size: 20;
  transition: all 0.3s;
  cursor: pointer;
}

.info2 {
  padding: 0px 4px;
  text-align: center;
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
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
}

.info:hover {
  background: #2196F3;
  color: white;
}
.warn {
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
}

.warn:hover {
  background: orange;
  color: white;
}
.pop{
  border-style: solid;
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
  width: 70%;
}
input[type="file"] {
    display: none;
}
</style>
<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//ID DARI URL
if(isset($_SESSION['idtopik'])){
  $idTopik=$_SESSION['idtopik'];
}
else{
  $idTopik=$_GET['idtopik'];
}
$_SESSION['idtopik'] = $idTopik;
//JUMLAH SOALAN
$query = "SELECT * FROM soalan WHERE idtopik='$idTopik'";
$soalan = mysqli_query($hubung,$query); 
$total=mysqli_num_rows($soalan);
$next=$total+1;
?>

<html>
<script type="text/javascript" src="jquery.js"></script>  
<script type="text/javascript">
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
function add_row()
{
 $rowno=$("#jawapan tr").length;
 $rowno=$rowno+1;
 $("#jawapan tr:last").after(
  "<tr id='row"+$rowno+"'><td><input type='text' name='idJAWAPAN1[]' placeholder='Taip Cadangan Jawapan' size='70%'></td><td><input type='text' name='idTOPIK[]' value='<?php echo $idTopik; ?>' size='60%' hidden></td><td><input class='bt4n' type='bt4n' value='BUANG' on_click=delete_row('row"+$rowno+"')></td></tr>");
}
</script>
  <head>
<?php include 'menu.php'; ?>
</head>
<center><h2 class="pop">TAMBAH SOALAN</h2></center>

   <main>
<table width="70%" border="0" align="center">
<tr> 
<td> 
<body>
<form method="post" enctype="multipart/form-data" action="soalan_proses.php">
<p>
<label>Bilangan Soalan</label>
<input size='2%' type="text" value="<?php echo $next; ?>" name="nom_soalan" readonly />
</p>
<p>
<label>Soalan:</label><br>
<textarea id="paparan_soalan" name="paparan_soalan" rows="7" cols="105" class="bt4n info"  required></textarea> 
</p>
<br>
<br>
<p>
<label class="bt4n info2">
  <input  type="file" name="gambar"/> 
  UPLOAD GAMBAR
</label>

</p>
<br>
<br>
<label>Cadangan Jawapan:</label><br>
<small>*Boleh tambah jawapan yang mungkin</small>
</span><br>
<table id="jawapan" align=left width ='30%' border=0>
<tr id="rowl">
<td><input type="text" name="idJAWAPAN1[]" placeholder="Taip Cadangan Jawapan" size="70%" class="bt4n info" required>
</td> 
<td><input type="text" name="idTOPIK[]" value="<?php echo $idTopik; ?>" hidden></td>
</tr>
</table>
  <br>
  <table width='100%' border=0>
  <tr><td>
  <fieldset><legend>MENU</legend><center>
<input class="bt4n info2" type="bt4n" onclick="add_row();" value="TAMBAH JAWAPAN">
<input class="bt4n info" type="submit" name="submit" value="CIPTA">
<button class="bt4n warn" onclick="window.location.href='soalan_baru1.php?idtopik=<?php echo $idTopik;?>'">+MCQ</button>
<button class="bt4n warn" onclick="window.location.href='pilih_subjek.php'" >TAMAT</button>
  </center></fieldset>
  </td></tr>
  </table>
 </form>
           </td>
          </tr>
     </table>
</bodY> 
</html>

