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
        <link rel="stylesheet" href="css/effects.css">
        <link rel="stylesheet" href="css/spotify.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="css/settings.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>

    <script src="js/jquery.min.js"></script>

    <?php 
        session_start();
    ?>
        
    <div class="videoContainer">
        <video autoplay muted loop id="myVideo">
            <source src="https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/lake-house/Outside_Day.mp4" type="video/mp4">
        </video>
    </div>

    <div class="scene">

        <?php

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include 'templates/DBconfig.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['login'])) {
                // Login Logic
                $username = $_POST['username'];
                $password = $_POST['password'];

                $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
                $stmt->execute(['username' => $username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    // User authenticated
                    $_SESSION["loggedin"] = true;
                    $_SESSION["first_name"] = $user['first_name'];
                    $_SESSION["user_id"] = $user['id'];
                    $_SESSION["username"] = $user['username'];
                    
                    header("Location: index.php");
                    exit;
                }
                 else {
                    echo "Invalid username or password!";
                }
            } else {
                // Signup Logic
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $first_name = $_POST['first_name'];

                $stmt = $pdo->prepare("INSERT INTO users (first_name, username, password, created_at) VALUES (:first_name, :username, :password, NOW())");
                $stmt->execute(['username' => $username, 'password' => $password, 'first_name' => $first_name]);
                header("Location: index.php");
                exit;

            }
        }
        ?>

        <?php include 'templates/spotifyContainer.php';?>
        <?php include 'templates/weather.php';?>
        <?php include 'templates/timer.php';?>
        <?php include 'templates/settings.php';?>
        <?php include 'templates/toolBar.php';?>
        <?php include 'templates/welcome.php';?>
        <?php include 'templates/information.php';?>
        <?php include 'templates/loader.php';?>
        <?php include 'templates/scenes.php';?>
        <?php include 'templates/countdowns.php';?>


    <div id="loginContainer">

        <?php
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            ?>
            <div class="loginContent">
            <h2>Login</h2>
            <form action="index.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>

        <div class="signupContent">
            <h2>Sign up</h2>
            <form action="index.php" method="post">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required>
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <button type="submit" name="signup">Signup</button>
            </form>
        </div>
        <?php
        } else { ?>
            <div class="loggedInContent">
            <div class="closeAccount">x</div>
                <img class="loginTick" src="assets/svg/tick.svg" alt="">
                <h2>You are logged in as <?php echo $_SESSION["username"]; ?></h2>
                <h4>Go to settings to configure your account</h4>
                <a href="logout.php" class="signoutLink">Log Out</a>
            </div>
            <?php
        }
        ?>
    </div>

    
</div>

<canvas id="canvas"></canvas>

        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <script src="js/countdowns.js"></script>
        <script src="js/timer.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/scenes.js"></script>
        <script src="js/information.js"></script>
        <script src="js/toolBar.js"></script>
        <script src="js/spotifyAPI.js" defer></script>
        <script src="js/plain-draggable.js"></script>
        <script src="js/effects.js"></script>
        <script src="js/index.js" defer></script>
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </body>
</html>