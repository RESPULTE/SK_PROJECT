<?php
//TAMATKAN SEST LOGIN
session_start();
session_destroy();
//LENCONGKAN KE FAIL LAMAN UTAMA
header("location:index.php");
?>