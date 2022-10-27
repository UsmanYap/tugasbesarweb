<?php
include('./auth.php');

if (!$authenticated) {
    header("Location: ../login.php");
} else {
    if (!$admin) {
        header("Location: ./unauth.php");
    }
}

include("../utils/koneksi.php");
$sql = "SELECT * FROM songs";
$result = mysqli_query($conn, $sql);
$songs = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song</title>
    <link rel="stylesheet" href="./css/editSong.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="link">
            <a class="ca2" href="adminDashboard.php">BACK</a>
        </div>

        <table align="center" border="1" style="border-color: #fff;" class="displaySong">
            <tr>
                <th colspan="6">SONGS INFO</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Images</th>
                <th>Name</th>
                <th>Music File</th>
                <th colspan="3">Operations</th>
            </tr>

            

         

    </div>


</body>

</html>