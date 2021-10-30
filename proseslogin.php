<?php
require 'sambung.php';
include 'header.php';
session_start();

// grab the provided ic number and password from the database
if (isset($_POST['idpengguna'])) {
	$user  = $_POST['idpengguna'];
	$pass  = $_POST['password'];
	$query = mysqli_query($hubung, "SELECT * FROM pengguna WHERE idpengguna='$user' AND password='$pass'");
	$row   = mysqli_fetch_assoc($query);
	$_SESSION['isLoggedIn'] = true;

// if the provided ic number or password doesnt not match or does not exist, throw an error and alert the user about it
if(mysqli_num_rows($query) == 0||$row['password']!= $pass){
	echo "<script>alert('ID Pengguna atau katalaluan yang salah');
	window.location='login.php'</script>";
}

// if the login was successful redirect user to the homepage
else{
	$_SESSION['idpengguna']= $row['idpengguna'];
	$_SESSION['level'] = $row['aras'];
	header("Location: index2.php");
	}
}
?>