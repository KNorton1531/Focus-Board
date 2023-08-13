

    var spotifyContainer = new PlainDraggable(document.getElementById('spotifyContainer'),
    {handle: document.querySelector('#spotifyContainer .draggable')});

    var welcomeContainer = new PlainDraggable(document.getElementById('welcomeDraggable'),
    {handle: document.querySelector('#welcomeDraggable .draggable')});

    var countdownContainer = new PlainDraggable(document.getElementById('countdownContainer'),
    {handle: document.querySelector('#countdownContainer .draggable')});

    var weatherContainer = new PlainDraggable(document.getElementById('weatherContainer'),
    {handle: document.querySelector('#weatherContainer .draggable')});

    var christmasCountdown = new PlainDraggable(document.getElementById('christmasCountdown'),
    {handle: document.querySelector('#christmasCountdown .draggable')});

    var HalloweenCountdown = new PlainDraggable(document.getElementById('HalloweenCountdown'),
    {handle: document.querySelector('#HalloweenCountdown .draggable')});

    var BonfireCountdown = new PlainDraggable(document.getElementById('BonfireCountdown'),
    {handle: document.querySelector('#BonfireCountdown .draggable')});

    var NewYearCountdown = new PlainDraggable(document.getElementById('NewYearCountdown'),
    {handle: document.querySelector('#NewYearCountdown .draggable')});

    var timerContainer = new PlainDraggable(document.getElementById('timerContainer'),
    {handle: document.querySelector('#timerContainer .draggable')});




    //****************************************** Handle container locations  ********************************************************/

    welcomeContainer.onDragEnd = function(pointerXY) {
      var transformValue = $('#welcomeDraggable').css('transform');
      var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
      var match = transformValue.match(regex);
      
      if (match) {
          
          var xValue = parseFloat(match[5]);  
          var yValue = parseFloat(match[6]);  

          var positions = JSON.parse(localStorage.getItem('positions') || '{}');
          positions.welcome = { x: xValue, y: yValue };
          localStorage.setItem('positions', JSON.stringify(positions));

        }
    }

spotifyContainer.onDragEnd = function(pointerXY) {
    var transformValue = $('#spotifyContainer').css('transform');
    var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
    var match = transformValue.match(regex);

    if (match) {
        var xValue = parseFloat(match[5]);  
        var yValue = parseFloat(match[6]);  

        var positions = JSON.parse(localStorage.getItem('positions') || '{}');
        positions.spotify = { x: xValue, y: yValue };
        localStorage.setItem('positions', JSON.stringify(positions));
    }
}

countdownContainer.onDragEnd = function(pointerXY) {
  var transformValue = $('#countdownContainer').css('transform');
  var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
  var match = transformValue.match(regex);

  if (match) {
      var xValue = parseFloat(match[5]);  
      var yValue = parseFloat(match[6]);  

      var positions = JSON.parse(localStorage.getItem('positions') || '{}');
      positions.countdown = { x: xValue, y: yValue };
      localStorage.setItem('positions', JSON.stringify(positions));
  }
}

weatherContainer.onDragEnd = function(pointerXY) {
  var transformValue = $('#weatherContainer').css('transform');
  var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
  var match = transformValue.match(regex);

  if (match) {
      var xValue = parseFloat(match[5]);  
      var yValue = parseFloat(match[6]);  

      var positions = JSON.parse(localStorage.getItem('positions') || '{}');
      positions.weather = { x: xValue, y: yValue };
      localStorage.setItem('positions', JSON.stringify(positions));
  }
}

timerContainer.onDragEnd = function(pointerXY) {
  var transformValue = $('#timerContainer').css('transform');
  var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
  var match = transformValue.match(regex);

  if (match) {
      var xValue = parseFloat(match[5]);  
      var yValue = parseFloat(match[6]);  

      var positions = JSON.parse(localStorage.getItem('positions') || '{}');
      positions.timer = { x: xValue, y: yValue };
      localStorage.setItem('positions', JSON.stringify(positions));
  }
}


/////////////////////////////////////////////////////  Countdown Containers  ////////////////////////////////////////////////////////////////////////////////////////////////

christmasCountdown.onDragEnd = function(pointerXY) {
  var transformValue = $('#christmasCountdown').css('transform');
  var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
  var match = transformValue.match(regex);

  if (match) {
      var xValue = parseFloat(match[5]);  
      var yValue = parseFloat(match[6]);  

      var positions = JSON.parse(localStorage.getItem('positions') || '{}');
      positions.christmas = { x: xValue, y: yValue };
      localStorage.setItem('positions', JSON.stringify(positions));
  }
}

HalloweenCountdown.onDragEnd = function(pointerXY) {
  var transformValue = $('#HalloweenCountdown').css('transform');
  var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
  var match = transformValue.match(regex);

  if (match) {
      var xValue = parseFloat(match[5]);  
      var yValue = parseFloat(match[6]);  

      var positions = JSON.parse(localStorage.getItem('positions') || '{}');
      positions.halloween = { x: xValue, y: yValue };
      localStorage.setItem('positions', JSON.stringify(positions));
  }
}

BonfireCountdown.onDragEnd = function(pointerXY) {
  var transformValue = $('#BonfireCountdown').css('transform');
  var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
  var match = transformValue.match(regex);

  if (match) {
      var xValue = parseFloat(match[5]);  
      var yValue = parseFloat(match[6]);  

      var positions = JSON.parse(localStorage.getItem('positions') || '{}');
      positions.bonfire = { x: xValue, y: yValue };
      localStorage.setItem('positions', JSON.stringify(positions));
  }
}

NewYearCountdown.onDragEnd = function(pointerXY) {
  var transformValue = $('#NewYearCountdown').css('transform');
  var regex = /matrix\(([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+),\s*([^,]+)\)/;
  var match = transformValue.match(regex);

  if (match) {
      var xValue = parseFloat(match[5]);  
      var yValue = parseFloat(match[6]);  

      var positions = JSON.parse(localStorage.getItem('positions') || '{}');
      positions.newyear = { x: xValue, y: yValue };
      localStorage.setItem('positions', JSON.stringify(positions));
  }
}





/////////////////////////////////////////////////////  Countdown Containers  ////////////////////////////////////////////////////////////////////////////////////////////////

  
  $(document).ready(function() {
      var positions = JSON.parse(localStorage.getItem('positions') || '{}');
  
      if (positions.welcome) { 
          $('#welcomeDraggable').css('transform', 'translate(' + positions.welcome.x + 'px,' + positions.welcome.y + 'px)');
          $('#welcomeDraggable').css('display', 'block');
      }
  
      if (positions.spotify) { 
          $('#spotifyContainer').css('transform', 'translate(' + positions.spotify.x + 'px,' + positions.spotify.y + 'px)');
          $('#spotifyContainer').css('display', 'block');
      }

      if (positions.countdown) { 
        $('#countdownContainer').css('transform', 'translate(' + positions.countdown.x + 'px,' + positions.countdown.y + 'px)');
        $('#countdownContainer').css('display', 'block');
      }

      if (positions.christmas) { 
        $('#christmasCountdown').css('transform', 'translate(' + positions.christmas.x + 'px,' + positions.christmas.y + 'px)');
        $('#christmasCountdown').css('display', 'block');
      }

      if (positions.halloween) { 
        $('#HalloweenCountdown').css('transform', 'translate(' + positions.halloween.x + 'px,' + positions.halloween.y + 'px)');
        $('#HalloweenCountdown').css('display', 'block');
      }

      if (positions.bonfire) { 
        $('#BonfireCountdown').css('transform', 'translate(' + positions.bonfire.x + 'px,' + positions.bonfire.y + 'px)');
        $('#BonfireCountdown').css('display', 'block');
      }

      if (positions.newyear) { 
        $('#NewYearCountdown').css('transform', 'translate(' + positions.newyear.x + 'px,' + positions.newyear.y + 'px)');
        $('#NewYearCountdown').css('display', 'block');
      }

      if (positions.weather) { 
        $('#weatherContainer').css('transform', 'translate(' + positions.weather.x + 'px,' + positions.weather.y + 'px)');
        $('#weatherContainer').css('display', 'block');
      }

      if (positions.timer) { 
        $('#timerContainer').css('transform', 'translate(' + positions.timer.x + 'px,' + positions.timer.y + 'px)');
        $('#timerContainer').css('display', 'block');
      }
  });

    //****************************************** Handle container locations ENDS  ********************************************************/

  function ToggleSettings() {
    var x = document.getElementById("settingsContainer");
    if (x.style.display === "flex") {
      x.style.display = "none";
    } else {
      x.style.display = "flex";
    }
  }


  
  function setWelcomeMessage() {
    var currentHour = new Date().getHours();
    var welcomeMessage = "";
    let subWelcome;

    let userName = localStorage.getItem('userName');
    $('.nameInput').attr('placeholder', userName);

    if (!userName){
      userName = '';
    } else {
      userName = ' '+userName;
    }
  
    if (currentHour >= 0 && currentHour < 2) {
      welcomeMessage = "It's the early hours, " + userName;
      subWelcome = "The world is quiet.";
  } else if (currentHour >= 2 && currentHour < 4) {
      welcomeMessage = "Still quite early, " + userName;
      subWelcome = "Most people are deep in slumber.";
  } else if (currentHour >= 4 && currentHour < 6) {
      welcomeMessage = "Dawn's breaking, " + userName;
      subWelcome = "A new day begins.";
  } else if (currentHour >= 6 && currentHour < 8) {
      welcomeMessage = "Good Early Morning, " + userName;
      subWelcome = "The world is waking up.";
  } else if (currentHour >= 8 && currentHour < 10) {
      welcomeMessage = "Morning's in full swing, " + userName;
      subWelcome = "The day is bright and active.";
  } else if (currentHour >= 10 && currentHour < 12) {
      welcomeMessage = "Approaching midday, " + userName;
      subWelcome = "The sun is high in the sky.";
  } else if (currentHour >= 12 && currentHour < 14) {
      welcomeMessage = "It's noon, " + userName;
      subWelcome = "Time for a midday break.";
  } else if (currentHour >= 14 && currentHour < 16) {
      welcomeMessage = "Mid-afternoon, " + userName;
      subWelcome = "The day is in full motion.";
  } else if (currentHour >= 16 && currentHour < 18) {
      welcomeMessage = "Late afternoon, " + userName;
      subWelcome = "Golden hour approaches.";
  } else if (currentHour >= 18 && currentHour < 20) {
      welcomeMessage = "Evening's upon us, " + userName;
      subWelcome = "The sun sets, casting long shadows.";
  } else if (currentHour >= 20 && currentHour < 22) {
      welcomeMessage = "Late evening, " + userName;
      subWelcome = "The world prepares for night.";
  } else { // 22 to 23
      welcomeMessage = "Night's almost here, " + userName;
      subWelcome = "The night is calm and serene.";
  }

    
    $('#welcomeContainer').text(welcomeMessage);
    $('.subWelcome').text(subWelcome);
  }

  function updateClock() {
    const date = new Date();
    let hours = date.getHours();
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    
    const ampm = hours >= 12 ? 'PM' : 'AM';

    // Convert hour from 24-hour format to 12-hour format
    hours = hours % 12;
    
    // 0 should be displayed as 12 in 12-hour format
    hours = hours ? hours : 12;

    const timeElement = document.getElementById("time");
    timeElement.textContent = `${String(hours).padStart(2, '0')}:${minutes} ${ampm}`;

    //Seconds on the clock for when you can change this in the options
    //timeElement.textContent = `${String(hours).padStart(2, '0')}:${minutes}:${seconds} ${ampm}`;
  }
  
  setInterval(updateClock, 1000);

  $(document).ready(function() {
    updateClock();
    setWelcomeMessage();
    setInterval(setWelcomeMessage, 30000); 
});

$(".signupLink").click(function(){
  $(".loginContent").addClass("hidden");
  $(".signupContent").removeClass("hidden");
});

$(".loginLink").click(function(){
  $(".loginContent").removeClass("hidden");
  $(".signupContent").addClass("hidden");
});

$('.closeAccount').click(function(){
  $("#loginContainer").hide();
});

