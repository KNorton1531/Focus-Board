<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/countdown.css">
        <link rel="stylesheet" href="css/information.css">
        <link rel="stylesheet" href="css/welcome.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/toolBar.css">
        <link rel="stylesheet" href="css/spotify.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="css/settings.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        
    <div class="videoContainer">
        <video autoplay muted loop id="myVideo">
            <source src="https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/cottage/cottage-exterior-final.mp4" type="video/mp4">
        </video>
    </div>

    <div class="scene">

        <?php include 'templates/login.php'?>
        <?php include 'templates/spotifyContainer.php'?>
        <?php include 'templates/settings.php'?>
        <?php include 'templates/toolBar.php'?>
        <?php include 'templates/welcome.php'?>
        <?php include 'templates/information.php'?>
        <?php include 'templates/loader.php'?>
        <?php include 'templates/countdowns.php'?>

        <!-- Handle showing elements depending on login status -->
        <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?> 
            <style>
                .hideLoggedIn{
                    display: none;
                }

            </style>

        <php }  else {?>
            <style>
                .hideLoggedOut{
                    display: none;
                }

            </style>
        <?php } ?>

    </div>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/countdowns.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/information.js"></script>
        <script src="js/toolBar.js"></script>
        <script src="js/plain-draggable.min.js"></script>
        <script src="js/index.js" defer></script>
        <script src="js/spotifyAPI.js" defer></script>
    </body>
</html>