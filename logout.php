<?php
// END THE CURRENT SESSION
session_start();
session_destroy();
// REDIRECT THE USER TO THE INDEX PAGE
header("location:index.php");
?>