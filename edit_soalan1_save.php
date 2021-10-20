<?php
require 'sambung.php';	
require 'keselamatan.php'; 

if (isset($_POST['submit'])){ 
	$picAsal = $_POST['gambarAsal'];

	if ($_FILES['gambar']['name']==NULL){
		$newnamepic=$picAsal;
	}else{
		$gambar=$FILES['gambar']['name'];
		//PROSES GAMBAR
		$imageArr=explode('.',$gambar); 
		$random=rand(10000,99999);
		$newnamepic=$imageArr[0].$random.'.'.$imageArr[1];
		$uploadPath="gambar/".$newnamepic; 
		$isUploaded=move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadPath);
	}
	   //POST VARIABLE
	   $idsoalan = $_POST['idsoalan'];
	   $soalan = $_POST['paparan_soalan'];
	   //SIMPAN REKOD BARU
		$result = mysqli_query($hubung, "UPDATE soalan SET nom_soalan=
			nom_soalan,soalan='$soalan',gambarajah='newnamepic',idtopik=
			idtopik WHERE idsoalan='$idsoalan'");
		echo "<script>alert('Soalan berjaya dikemaskini'); window.location='papar_topik.php'</script>";

}
?>