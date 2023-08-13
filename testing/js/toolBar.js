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

    $(".barIcon.weather").click(function(){
        $("#weatherContainer").toggle();
        console.log("working");
        rememberDisplay();
    });

    $(".barIcon.timer").click(function(){
        $("#timerContainer").toggle();
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
    var christmasCountdown = $('#christmasCountdown').css('display');
    var HalloweenCountdown = $('#HalloweenCountdown').css('display');
    var BonfireCountdown = $('#BonfireCountdown').css('display');
    var NewYearCountdown = $('#NewYearCountdown').css('display');
    var weatherContainer = $('#weatherContainer').css('display');
    var timerContainer = $('#timerContainer').css('display');

    // Store the states in an object
    var displayStates = {
        spotify: spotifyDisplay,
        welcome: welcomeDisplay,
        countdown: countdownDisplay,
        christmas: christmasCountdown,
        halloween: HalloweenCountdown,
        bonfire: BonfireCountdown,
        newyear: NewYearCountdown,
        weather: weatherContainer,
        timer: timerContainer
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
    $('#christmasCountdown').css('display', displayStates.christmas);
    $('#HalloweenCountdown').css('display', displayStates.halloween);
    $('#BonfireCountdown').css('display', displayStates.bonfire);
    $('#NewYearCountdown').css('display', displayStates.newyear);
    $('#weatherContainer').css('display', displayStates.weather);
    $('#timerContainer').css('display', displayStates.timer);
}
////////////////////////////////////////////////////  Tool Tips  //////////////////////////////////////////////////////////////////////////////////


tippy('.barIcon.settings', {
    content: 'Settings',
  });

  tippy('.barIcon.spotify', {
    content: 'Spotify player',
  });

  tippy('.barIcon.welcome', {
    content: 'Toggle welcome',
  });

  tippy('.barIcon.countdown', {
    content: 'Countdowns',
  });

  tippy('.barIcon.login', {
    content: 'Accounts',
  });

  tippy('.barIcon.weather', {
    content: 'Weather',
  });

  tippy('.barIcon.timer', {
    content: 'Timers',
  });