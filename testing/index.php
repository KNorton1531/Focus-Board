<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>

    <video autoplay muted loop id="myVideo">
        <source src="https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/cottage/cottage-exterior-final.mp4" type="video/mp4">
    </video>

        <div class="scene">

            <div id="dragContainer1">
              <div class="draggable"></div>
              <p onclick="deleteDraggable()">This is a git commit test</p>
            </div>

            <div id="dragContainer2">
                <div class="draggable"></div>
            </div>

        </div>

    </body>



        <script src="js/plain-draggable.min.js"></script>
        <script src="js/index.js" defer></script>
    </body>
</html>