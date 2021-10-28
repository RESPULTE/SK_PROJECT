<?php
require 'sambung.php';
?>

<?php 
if(!isset($_SESSION)){
     session_start();
}

$topik_pilihan = $_SESSION['idtopik'];
if (!isset($_SESSION['score'])){ 
     $_SESSION['score'] = 0;
}
//NILAI YG DI POST
if($_POST){
     $idquestion = $_POST['idsoalan'];
     $number = $_POST['number'];
     $next=$number+1;
     $total=4;
     $jenis_soalan = $_POST['jenis_soalan']; 
     $_SESSION['jenis_soalan']=$jenis_soalan;
     $selected_choice = $_POST['choice'];
     $jawapan_taip = trim(strtoupper($_POST['idJAWAPAN'] ?? ''));
     //JUMLAH SOALAN
     $query="SELECT * FROM soalan where idtopik=$topik_pilihan";
     $results = mysqli_query($hubung,$query);
     $total=mysqli_num_rows($results);
     //SEMAK JAWAPAN BAGI SOALAN JENIS MCQ/TF 
     if($jenis_soalan==1){
          $_SESSION['jenis_soalan']=1;
          //Get correct choice
          $q = "SELECT * FROM pilihan WHERE nom_soalan = $number AND
          jawapan=1 and idsoalan=$idquestion"; 
          $result = mysqli_query($hubung,$q); 
          $row = mysqli_fetch_assoc($result); 
          $correct_choice=$row['idpilihan'];
          //BANDING JAWAPAN
          if($correct_choice == $selected_choice){
               $semakan="TEPAT";
               $_SESSION['score']++;
     	} 
	 }
//SEMAK JAWAPAN BAGI SOALAN JENIS FIB 
     if($jenis_soalan==2){

//SEMAK JAWAPAN
$_SESSION['jenis_soalan']=2;
$q = mysqli_query($hubung, "SELECT * FROM pilihan WHERE
idsoalan='$idquestion' AND nom_soalan = '$number' AND
pilihan_jawapan = '$jawapan_taip'");

$row = mysqli_num_rows($q); 
//BANDINGAN
     if($row>0){
          $semakan="TEPAT"; 
		  $_SESSION['score']++;
	      }
	 }
	 
	 
if($number == $total){
     header("Location: soalan_markah.php?idtopik=".$_SESSION['idtopik']);
     exit();
}else {
     header("Location: soalan_papar.php?semakan=".$semakan."&idtopik=".$topik_pilihan."&n=".$next."&score=".$_SESSION['score']);

     }
}
?>
