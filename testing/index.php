<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/scenes.css">
        <link rel="stylesheet" href="css/weather.css">
        <link rel="stylesheet" href="css/timer.css">
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
            <source src="https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/lake-house/Outside_Day.mp4" type="video/mp4">
        </video>
    </div>

    <div class="scene">

        <?php

        if(!isset($_SESSION["loggedin"])) {
            include 'templates/login.php';
        }?>

        <?php include 'templates/spotifyContainer.php';?>
        <?php include 'templates/weather.php';?>
        <?php include 'templates/timer.php';?>
        <?php include 'templates/settings.php';?>
        <?php include 'templates/toolBar.php';?>
        <?php include 'templates/welcome.php';?>
        <?php include 'templates/information.php';?>
        <?php include 'templates/loader.php';?>
        <?php include 'templates/scenes.php';?>
        <?php include 'templates/countdowns.php';

        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?> 
            <style>
                .loginContent, .signupContent{
                    display: none;
                }

                #loginContainer{
                    padding: 35px;
                }
            </style>
        <?php } else { ?>
            <style>
                .loggedInContent{
                    display: none;
                }
            </style>
        <?php } ?>

    <div id="loginContainer">
        <div class="loginContent">
            <h2>Login</h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="usernameLogin">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                </div>    
                <div class="passwordLogin">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                </div>
                <div class="loginButton">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a class="signupLink" href="#">Sign up now</a>.</p>
            </form>
        </div>

        <?php 
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { 
            include 'templates/register.php';
        }
        ?>

        <div class="loggedInContent">
        <div class="closeAccount">x</div>
            <img class="loginTick" src="assets/svg/tick.svg" alt="">
            <h2>You are logged in as <?php echo $_SESSION["username"]; ?></h2>
            <h4>Go to settings to configure your account</h4>
            <a href="logout.php" class="signoutLink">Log Out</a>
        </div>
    </div>

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
        <script src="js/timer.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/scenes.js"></script>
        <script src="js/information.js"></script>
        <script src="js/toolBar.js"></script>
        <script src="js/index.js" defer></script>
        <script src="js/spotifyAPI.js" defer></script>
        <script src="js/plain-draggable.js"></script>
    </body>
</html>