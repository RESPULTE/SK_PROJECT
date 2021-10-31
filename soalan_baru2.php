<style>
.bt4n {
  border: 4px solid;
  border-radius: 10px;
  margin: 3px;
  font-size: 20;
  transition: all 0.3s;
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
.info90 {
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
}

.info90:hover {
  background: #2196F3;
  color: white;
}
.info901 {
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
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

input[type="file"] {
    display: none;
}
.kill{
  color: white; 
  border: 3px solid darkred; 
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
  "<tr id='row"+$rowno+"'><td><input id='row' type='text' name='idJAWAPAN1[]' placeholder='Taip Cadangan Jawapan' size='70%' required class='bt4n info90' ></td><td><input type='text' name='idTOPIK[]' value='<?php echo $idTopik; ?>' size='60%' hidden></td><td><input class='bt4n kill' type='button' value='BUANG' on_click=delete_row('row"+$rowno+"')></td></tr>");
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
<p class="b3tn info901" style="width: 30%; border-radius:10px; border: 4px solid dodgerblue; padding: 10px 10px;">
<label style="font-size: 25; margin-top: 5px; color: dodgerblue;">Bilangan Soalan: </label>
<input style="font-size: 25; margin-top: 5px; color: dodgerblue; background-color: transparent; border: none" type="text" value="<?php echo $next; ?>" name="nom_soalan" size="5" readonly />
</p>
<p>
<label style="font-size: 40; color: darkorange;">Soalan:</label><br>
<textarea id="paparan_soalan" name="paparan_soalan" rows="7" cols="105" class="bt4n info90"  required></textarea> 
</p>
<br>
<br>
<p>
<label class="bt4n info2" style="padding: 5px 10px;">
  <input  type="file" name="gambar"/> 
  UPLOAD GAMBAR
</label>

</p>
<br>
<br>

</span><br>
<table id="jawapan" align=left width ='30%'  class="bt4n info901" >
<tr>
<td>
    <label style="font-size: 20; ">Cadangan Jawapan:</label><br>
  <small style="font-size: 20; ">*Boleh tambah jawapan yang mungkin</small>
  <input id="row" type="text" name="idJAWAPAN1[]" placeholder="Taip Cadangan Jawapan" size="70%" required class="bt4n info90" >
</td> 
<td><input type="text" name="idTOPIK[]" value="<?php echo $idTopik; ?>" hidden></td>
</tr>
</table>
  <br>
  <table width='100%' border=0>
  <tr><td>
  <fieldset class="bt4n info901">
    <legend style="font-size: 30; color: dodgerblue;" >MENU</legend>
    <center>
  <input class="bt4n info2" type="bt4n" onclick="add_row();" value="TAMBAH JAWAPAN">
  <input class="bt4n info90" type="submit" name="submit" value="CIPTA">
  <button class="bt4n warn" onclick="window.location.href='soalan_baru1.php?idtopik=<?php echo $idTopik;?>'">+MCQ</button>
  <input class="bt4n warn" type="reset" name="Reset" onclick="window.location.href='pilih_subjek.php'" value='TAMAT'>

  </center></fieldset>
  </td></tr>
  </table>
 </form>
           </td>
          </tr>
     </table>
</bodY> 
</html>

