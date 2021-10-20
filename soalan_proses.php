<?php
require 'sambung.php';
require 'keselamatan.php'; 

if(isset($_POST['submit'])){
	
if ($_FILES['gambar']['name']==NULL){
  $newnamepic="";
}
else{
  $gambar=$_FILES['gambar']['name'];
   //PROSES GAMBAR
  $imageArr=explode('.',$gambar);
  $random=rand(10000,99999);
  $newnamepic=$imageArr[0].$random.'.'.$imageArr[1];
  $uploadPath="gambar/".$newnamepic;
  $isUploaded=move_uploaded_file($_FILES["gambar"]
  ["tmp_name"],$uploadPath);
}
 //POST VALUE
$nom_soalan = $_POST['nom_soalan'];
$idtopik	= $_SESSION['idtopik'];
$soalan = $_POST['paparan_soalan']; 

//QUERY SOALAN
$query="INSERT INTO soalan(nom_soalan,soalan,gambarajah,jenis,idtopik) values
('$nom_soalan','$soalan','$newnamepic','2','$idtopik')"; 
$insert_row=$hubung -> query($query);
$last_id = mysqli_insert_id($hubung);
echo "<script>alert('soalan_baru telah berjaya ditambah');
window.location='soalan_baru2.php?idtopik=$idtopik' 
</script>";

//VALUE POST
$jawaban=$_POST['idJAWAPAN1']; 
$topikal=$_POST['idTOPIK' ]; 
for($i=0;$i<count($jawaban);$i++){
  if($jawaban[$i]!="" && $topikal[$i]!=""){
    $jawapan2=$jawaban[$i];
    $idtopikal=$topikal[$i];
    // INSER RECORDS
    $query="INSERT INTO pilihan(nom_soalan,jawapan,pilihan_jawapan,idsoalan) 
    values('$nom_soalan','','$jawapan2','$last_id')";
    $insert_row=$hubung->query($query);
    }
 }

}
?>
