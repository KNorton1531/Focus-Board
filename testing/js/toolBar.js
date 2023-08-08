$(document).ready(function(){
    $(".barIcon.settings").click(function(){
        ToggleSettings();
    });

    $(".barIcon.spotify").click(function(){
        $("#spotifyContainer").toggle();
        rememberDisplay();
    });

    $(".barIcon.welcome").click(function(){
        $("#welcomeDraggable").toggle();
        rememberDisplay();
    });

    $(".barIcon.countdown").click(function(){
        $("#countdownContainer").toggle();
        console.log("working");
        rememberDisplay();
    });

    $(".barIcon.login").click(function(){
        $("#loginContainer").toggle();
        console.log("working");
        rememberDisplay();
    });

    setTimeout(initContainer, 1000);

});

function rememberDisplay(){
    // Get the current display states
    var spotifyDisplay = $('#spotifyContainer').css('display');
    var welcomeDisplay = $('#welcomeDraggable').css('display');
    var countdownDisplay = $('#countdownContainer').css('display');

    // Store the states in an object
    var displayStates = {
        spotify: spotifyDisplay,
        welcome: welcomeDisplay,
        countdown: countdownDisplay
    };

    // Save the object to localStorage as a JSON string
    localStorage.setItem('displayStates', JSON.stringify(displayStates));
}

function initContainer() {
    var displayStates = JSON.parse(localStorage.getItem('displayStates') || '{}');

    // Check for the existence of the key rather than its truthy value
    $('#spotifyContainer').css('display', displayStates.spotify);
    $('#welcomeDraggable').css('display', displayStates.welcome);
    $('#countdownContainer').css('display', displayStates.countdown);
}