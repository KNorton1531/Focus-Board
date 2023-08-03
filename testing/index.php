<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/spotify.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    </head>
    <body>

    <video autoplay muted loop id="myVideo">
        <source src="#" type="video/mp4">
    </video>

        <div class="scene">

            <div id="dragContainer1" style="display: none;">
              <div class="draggable"></div>
              <p onclick="deleteDraggable()">This is Dev testing Branch</p>
            </div>

            <div id="dragContainer2" style="display: none;">
                <div class="draggable"></div>
            </div>

            <?= include 'templates/spotifyContainer.php'; ?>

        </div>

    </body>



        <script src="js/plain-draggable.min.js"></script>
        <script src="js/index.js" defer></script>
        <script src="js/spotifyAPI.js" defer></script>
    </body>
</html>