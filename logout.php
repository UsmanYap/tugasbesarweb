<?php
session_start();
unset($_SESSION['sesi']);
unset($_SESSION['iduser']);
session_destroy();
header("Location:login.php");
?>