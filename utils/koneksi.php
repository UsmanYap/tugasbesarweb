<?php
$server = "localhost";
$user = "root";
$password ="";
$nama_database = "tubesweb";

$conn = mysqli_connect($server, $user, $password,$nama_database);
if (!$conn){
    die("gagal terhubung dengan database : " . mysqli_connect_error());
}

?>