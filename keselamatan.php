<?php
session_start();
//mulakan sesi login
if(!isset($_SESSION['idpengguna']) && !isset($_SESSION['isLoggedIn'])){
//jika belum login, lencongkan ke fail ini
header('Location: index.php');
exit(); }
?>