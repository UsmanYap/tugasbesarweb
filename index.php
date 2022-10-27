<?php
include'koneksi.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binotify</title>

</head>
<body>
    <div class="login-user">
        <div class="login-user-logo">
            <!-- <i class="fab fa-binotify"></i> -->
        <h2>Binotify</h2>
        </div>
        <div class="login-user__info">
            <p>you must login to next the music </p>
            <a href="login.php" class="login">Login</a>
            <a href="signup.php"class="sign up">Miku : 'Haven't create an account yet?'</a>
            <div class="close">+</div>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <!-- sidebar -->
            <?php include("./components/sidebar.php"); ?>
            <!-- End sidebar -->

            <!-- Music ui -->
            <div class="musicContainer" id="home">
                <?php include("./pages/homeContent.php"); ?>
            </div>

           
    </div>
    <!-- Music player -->
    
    
</body>
</html>
