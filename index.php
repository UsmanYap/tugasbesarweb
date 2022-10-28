<?php
include("./utils/getUrl.php");
include("./utils/koneksi.php");
include("./auth/auth.php");

function redirect($url)
{
    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
}

$getAllSongsQuery = "SELECT songs.id, songs.title title,
                            songs.filePath audio, songs.imgPath img,
                            singers.name singerName, singers.id singerID
                    FROM songs 
                    LEFT JOIN singers on singers.id = songs.singerID
                    ORDER BY songs.dateAdded DESC";

$result = mysqli_query($conn, $getAllSongsQuery);
$songs = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Generate random songs
$randomKeys = (count($songs) >= 3) ? array_rand($songs, 3) : $songs;

$formatSongs = array();

foreach ($songs as $song) {
    $formatSongs[$song["id"]] = $song;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/homePage.css">
    <link rel="stylesheet" href="./css/singerPage.css">
    <link rel="stylesheet" href="./css/searchPage.css">
    <link rel="stylesheet" href="./css/favourite.css">
    <link href='https://css.gg/home.css' rel='stylesheet'>
    <title>Binotify</title>

</head>
<body>
    <div class="login-user">
        <div class="login-user-logo">
            <i class="fab fa-binotify"></i>
            <h2>Binotify</h2>
        </div>
        <div class="login-user__info">
            <p>You must login to next the music</p>
            <a href="login.php" class="login">Login</a>
            <a href="signup.php"class="sign up">Haven't create an account yet?</a>
            <div class="close">+</div>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <!-- sidebar -->
            <?php include("./components/sidebar.php"); ?>
            <!-- End sidebar -->

            <!-- Music UI -->
            <div class="musiccontainer"id="home">
                <?php include("./pages/homeContent.php"); ?>
            </div>

            <div class="musiccontainer hide" id="favorites">
                <?php if ($authenticated) : ?>
                    <?php include("./pages/favContent.php"); ?>
                <?php endif; ?></div>
                
            <div class="musicContainer hide" id="search">
                <?php include("./pages/searchContent.php"); ?>
            </div>
            </div>
            <div class="musiccontainer hide" id="singer"> 
                <?php include("./pages/singerContent.php"); ?>
            </div>
            <!-- end music UI -->
    </div>
    <!-- Music player -->
    <?php include("./components/musicPlayer.php"); ?>
    </div>
</body>
<script>
    let songDetails = JSON.parse('<?php echo json_encode($formatSongs); ?>');
    let authenticated = JSON.parse('<?php echo json_encode($authenticated); ?>');
</script>
<script src="./js/songTile.js"></script>
<script src="./js/playingQueue.js"></script>
<script src="./js/loginRequired.js"></script>
<script src="./js/main.js"></script>
<?php if ($authenticated) : ?>
    <script src="./js/favourite.js"></script>
<?php endif; ?>
<?php include("./utils/changePageJs.php"); ?>

</html>