$(document).ready(function(){
    $(".barIcon.settings").click(function(){
        ToggleSettings();
    });

    $(".barIcon.spotify").click(function(){
        $("#spotifyContainer").toggle();
    });

    $(".barIcon.welcome").click(function(){
        $("#welcomeDraggable").toggle();
    });
});