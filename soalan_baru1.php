<style>
  label {
    font-size: 20;
  }
.btn1 {
  border: 3px solid black;
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

/* Blue */
.info {
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
}
.info1010 {
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
}
.info:hover {
  background: #2196F3;
  color: white;
}
.info3 {
  width: 90%;
  border-color: #2196F3;
  background-color: lightcyan;
  color: dodgerblue;
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
  background: forestgreen;
  color: white;
}
.info3:hover {
  background: #2196F3;
  color: white;
}
.warn {
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
}
.warn1 {
  border-color: orange;
  background-color: lightyellow;
  color: darkorange;
}
.warn:hover {
  background: orange;
  color: white;
}
input[type="submit"] {
    display: none;
}
input[type="file"] {
    display: none;
}
</style>
<?php
require 'sambung.php'; 
require 'keselamatan.php'; 
include 'header.php';
$idtopik = $_GET['idtopik'];
?>

<?php
if (isset($_POST['submit'])){
  if ($_FILES['gambar']['name']==NULL){
       $newnamepic=null;
  }else{
    $gambar=$_FILES['gambar']['name']; 
    //PROSES GAMBAR
    $imageArr=explode('.',$gambar); 
    $random=rand(10000,99999); 
    $newnamepic=$imageArr[0].$random.'.'.$imageArr[1]; 
    $uploadPath="gambar/".$newnamepic; 
    $isUploaded=move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadPath);
  }
   //NILAI POST
  $nom_soalan = $_POST['nom_soalan']; 
  $soalan = $_POST['paparan_soalan']; 
  $jawapan_betul = $_POST['jawapan_betul']; 
  $pilihan = array();
  $pilihan[1] = $_POST['pilih1'];
  $pilihan[2] = $_POST['pilih2'];
  $pilihan[3] = $_POST['pilih3'];
  $pilihan[4] = $_POST['pilih4'];
  //query soalan
  $query="INSERT INTO soalan(nom_soalan,soalan,gambarajah,jenis,idtopik) values
  ('$nom_soalan','$soalan','$newnamepic','1','$idtopik')";
  $insert_row=mysqli_query($hubung,$query);
  $last_id = mysqli_insert_id($hubung);

  echo "<script>alert('Soalan baru telah berjaya ditambah'); 
  window.location='soalan_baru1.php?idtopik=$idtopik'
  </script>";
  //MASUK JAWAPAN
  if($insert_row){
    $num = 0;
    foreach($pilihan as $pilihan_jawapan => $pilih){ 
      $num++;
      if($pilih != ''){
        if($jawapan_betul == $pilihan_jawapan){
          $jawapan = 1;
        }else{
          $jawapan = 0;
        }

  $query="INSERT INTO pilihan(nom_soalan, jawapan, pilihan_jawapan, idsoalan)
  values('$nom_soalan','$jawapan_betul','$pilihan[$num]','$last_id')"; 
  $insert_row=mysqli_query($hubung,$query);

	    }
    }
}

}
//3UMLAH SOALAN
$query = "SELECT * FROM soalan WHERE idtopik='$idtopik'";
$soalan = mysqli_query($hubung,$query); 
$total=mysqli_num_rows($soalan);
$next=$total+1;
?>
<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2 class="pop">TAMBAH SOALAN BARU</h2></center>
  <main>
<table width="70%" border="0" align="center">
  <tr>
     <td>
<form method="post" enctype="multipart/form-data">
<p class="b3tn info1010" style="width: 30%; border-radius:10px; border: 4px solid dodgerblue; padding: 10px 10px;">
<label style="font-size: 25; margin-top: 5px; color: dodgerblue;">Bilangan Soalan: </label>
<input style="font-size: 25; margin-top: 5px; color: dodgerblue; background-color: transparent; border: none" type="text" value="<?php echo $next; ?>" name="nom_soalan" size="5" readonly />
</p>

<br> 
<label class="warn1" style="font-size: 40; background-color: transparent;">Soalan</label>
<p> 
<textarea id="paparan_soalan" name="paparan_soalan"  
rows="7" cols="105" required class="btn1 info3" style="margin-top: -10px; margin-bottom: 20px; border: 4px solid dodgerblue; border-radius: 10px;"></textarea>
</p> 
<br>
<label class="btn1 info2" style="padding: 5px 10px;">
  <input  type="file" name="gambar"/> 
  UPLOAD GAMBAR
</label>
<br>
<div class="b3tn info1010" style="text-indent: 10px; width: 75%; border: 4px solid dodgerblue; border-radius: 10px; padding-bottom: 40px; margin-top: 20px;">
  <p>
     <label >Pilihan 1: </label>
<input type="text" name="pilih1" size="50" class="btn1 info" required style=" margin-bottom: 20px;"/>
</p> 
<p>
     <label>Pilihan 2: </label>
<input type="text" name="pilih2" size="50" class="btn1 info" required style=" margin-bottom: 20px;"/>
</p> 
<p>
     <label>Pilihan 3: </label> 
<input type="text" name="pilih3" size="50" class="btn1 info" required style=" margin-bottom: 20px;"/>
</p>
<p>
     <label>Pilihan 4: </label>
<input type="text" name="pilih4" size="50" class="btn1 info" required style=" margin-bottom: 20px;"/>
</p>
<p>
   <label>Pilihan Jawapan [1-4] </label>
<input type="number" class="btn1 info" name="jawapan_betul" size="5" min="1" max="4"  required />
</p> 
</div>

<br>
<fieldset class="b3tn info1010" style="border: 4px solid dodgerblue; border-radius: 10px;"><legend style="font-size: 30; color: dodgerblue;" >MENU</legend>
<CENTER>
<label>
   <button class="btn1 info" type="submit" name="submit">
  CIPTA 
</button> 
</label>

<button onclick="window.location.href='soalan_baru2.php?idtopik=<?php echo $idtopik;?>'" class="btn1 warn" >+FIB</button>
<button onclick="window.location.href='pilih_subjek.php'" class="btn1 warn" >TAMAT</button>
     </CENTER> 
</fieldset>
<p>
</p>
</form></td></tr></table>
      </main>
<?php include 'footer.php';?> 
  </body>
</html>

