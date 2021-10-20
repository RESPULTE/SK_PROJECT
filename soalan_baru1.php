<?php
require 'sambung.php'; 
require 'keselamatan.php'; 
include 'header.php';
$idtopik = $_GET['idtopik'];
?>

<?php
if (isset($_POST['submit'])){
  if ($_FILES['gambar']['name']==NULL){
       $newnamepic="";
  }else{
    $gambar=$_FILES['gambar']['name']; 
    //PROSES GAMBAR
    $imageArr=explode('.',$gambar); 
    $random=rand(10000,99999); 
    $newnamepic=$imageArr[0].$random.'.'.$imageArr[1]; 
    $uploadPath="gambar/".$newnamepic; 
    $isUploaded=move_uploaded_file($_FILES["gambar"] 
    ["tmp_name"],$uploadPath);
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
    $num = 1;
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
$query = "SELECT * FROM soalan WHERE idtopik='$idtopik' AND jenis='1'";
$soalan = mysqli_query($hubung,$query); 
$total=mysqli_num_rows($soalan);
$next=$total+1;
?>
<html>
  <head><?php include 'menu.php'; ?></head>
  <body>
<center><h2>TAMBAH SOALAN BARU</h2></center>
  <main>
<table width="70%" border="0" align="center">
  <tr>
     <td>
<form method="post" enctype="multipart/form-data">
<p>
<label>Bilangan Soalan</label>
<input type="text" value="<?php echo $next; ?>" name="nom_soalan" size="5" readonly />
</P> 
<p> 
<label>Soalan</label>
<textarea id="paparan_soalan" name="paparan_soalan" 
rows="7" cols="105" required></textarea>
</p> 
<p> 
<label>Gambar<br>
<small style="color:red">*Jika perlu</small></label>
     <input type="file" name="gambar"/>
</p> 
<p>
     <label>Pilihan 1: </label>
<input type="text" name="pilih1" size="50"/>
</p> 
<p>
     <label>Pilihan 2: </label>
<input type="text" name="pilih2" size="50"/>
</p> 
<p>
     <label>Pilihan 3: </label> 
<input type="text" name="pilih3" size="50"/>
</p>
<p>
     <label>Pilihan 4: </label>
<input type="text" name="pilih4" size="50"/>
</p>
<p>
	 <label>Pilihan Jawapan [1-4] </label>
<input type="number" name="jawapan_betul" size="5" min="1" max="4" required />
</p> 
<fieldset><legend>MENU</legend>
<CENTER><input type="submit" name="submit" value="CIPTA" />
<button onclick="window.location='pilih_subjek.php'">TAMAT</button>
     </CENTER> 
</fieldset>
<p>
</p>
</form></td></tr></table>
      </main>
<?php include 'footer.php';?> 
  </body>
</html>

