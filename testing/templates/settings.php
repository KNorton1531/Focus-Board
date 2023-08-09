<?php
ob_start(); // Start output buffering
session_start();

// Include your configuration file
require_once 'DBconfig.php'; 

// Ensure the user is logged in before proceeding
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

    // Check if form data is set
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date']) && isset($_POST['title'])) {
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $date = mysqli_real_escape_string($link, $_POST['date']);

        // SQL query
        $sql = "INSERT INTO countdowns (title, date) VALUES ('$title', '$date')";

        if(mysqli_query($link, $sql)){
            header("location: index.php");
            exit; // This is crucial after a header redirect to stop script execution
        } else {
            echo "Error: " . mysqli_error($link);
        }
    }
}

ob_end_flush(); // Send the buffered output
?>

<div id="settingsContainer">
    <div onclick="ToggleSettings()" class="closeButton">X</div>

    <div class="settingsNavContainer">
        <div class="generalLabel settingsItem settingsActive">
            <h5>General</h5>
        </div>

        <div class="spotifyLabel settingsItem">
            <h5>Spotify</h5>
        </div>

        <div class="countdownsLabel settingsItem">
            <h5>Countdowns</h5>
        </div>

    </div>

    <div class="userTab tabContainer">

        <div class="userDetails">
            <div class="nameLabel">First Name</div>
            <div class="nameInputWrapper">
                <input class="nameInput" type="text">
                <button class="submitName">Submit</button>
                <button class="clearName"><i class="fa-solid fa-trash-can"></i></button>
            </div>
        </div>

    </div>


    <div class="spotifyTab tabContainer">
   
        <div>
            <a onclick="checkAndRefresh()" id="nowPlayingContainer" href="https://accounts.spotify.com/authorize?response_type=code&client_id=7b96a668f8cf4b848819ebef289a2336&redirect_uri=https%3A%2F%2Fnortonwebtesting.free.nf&scope=user-read-playback-state%20user-modify-playback-state%20user-read-currently-playing">Link Spotify</a>
        </div>

    </div>

    <div class="countdownTab tabContainer">
        <h5>Countdowns are being worked on</h5>
        <div class="countdown">
        <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>

            <div class="countdownContent">
                <form action="index.php" method="post">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" required>
                    </div>
                    <div>
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" required>
                    </div>
                    <div>
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>

        <?php } else { ?>
            <!-- Display some content or message for non-logged-in users or redirect them -->
        <?php } ?>
        </div>
    </div>
</div>
