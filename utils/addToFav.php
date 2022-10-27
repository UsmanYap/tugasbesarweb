<?php
include("./koneksi.php");
include("../auth/autentikasi.php");

if (isset($_GET['songID'])) {
    $songID = $_GET['songID'];
    $addToFavQuery ="INSERT INTO favourites
                    VALUES ($uid, $songID);";

    if (mysqli_queryf($db, $addToFavQuery)){
        echo json_encode($songID);
    }
    else {
        echo json_encode("Error");
    }
}