<div id="countdownContainer">
    <div class="draggable"></div>
    <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>

        <div class="countdownContent">

        <div class="countdownItem">
            <h4 class="countdownTitle">Mayrhofen Countdown 🏂</h4>
            <div class="countdownDate">
                <div class="dateItem"><span id="months"></span>Months</div>
                <div class="dateItem"><span id="weeks"></span>Weeks</div> 
                <div class="dateItem"><span id="days"></span>Days</div> 
                <div class="dateItem"><span id="hours"></span>Hours</div> 
                <div class="dateItem"><span id="minutes"></span>Minutes</div> 
                <div class="dateItem"><span id="seconds"></span>Seconds</div> 
            </div>
        </div>
        
        <?php } else {?>
        <!-- If logged out, do this -->
        <div class="countdownLogin">
            <h4>Please log in to use countdowns</h4>
        </div>


        <?php } ?>
        </div>
</div>





<div id="christmasCountdown" class="presetCountdown">
<div class="draggable"></div>
    <h3>Christmas</h3>
    <div class="countdownDate">
                <div class="dateItem"><span id="months"></span>Months</div>
                <div class="dateItem"><span id="weeks"></span>Weeks</div> 
                <div class="dateItem"><span id="days"></span>Days</div> 
                <div class="dateItem"><span id="hours"></span>Hours</div> 
                <div class="dateItem"><span id="minutes"></span>Minutes</div> 
                <div class="dateItem"><span id="seconds"></span>Seconds</div> 
            </div>
</div>

<div id="HalloweenCountdown" class="presetCountdown">
<div class="draggable"></div>
<h3>Halloween</h3>
<div class="countdownDate">
                <div class="dateItem"><span id="months"></span>Months</div>
                <div class="dateItem"><span id="weeks"></span>Weeks</div> 
                <div class="dateItem"><span id="days"></span>Days</div> 
                <div class="dateItem"><span id="hours"></span>Hours</div> 
                <div class="dateItem"><span id="minutes"></span>Minutes</div> 
                <div class="dateItem"><span id="seconds"></span>Seconds</div> 
            </div>
    
</div>

<div id="BonfireCountdown" class="presetCountdown">
<div class="draggable"></div>
<h3>Bonfire Night</h3>
    <div class="countdownDate">
        <div class="dateItem"><span id="months"></span>Months</div>
        <div class="dateItem"><span id="weeks"></span>Weeks</div> 
        <div class="dateItem"><span id="days"></span>Days</div> 
        <div class="dateItem"><span id="hours"></span>Hours</div> 
        <div class="dateItem"><span id="minutes"></span>Minutes</div> 
        <div class="dateItem"><span id="seconds"></span>Seconds</div> 
    </div>
</div>

<div id="NewYearCountdown" class="presetCountdown">
<div class="draggable"></div>
<h3>New Years</h3>
<div class="countdownDate">
                <div class="dateItem"><span id="months"></span>Months</div>
                <div class="dateItem"><span id="weeks"></span>Weeks</div> 
                <div class="dateItem"><span id="days"></span>Days</div> 
                <div class="dateItem"><span id="hours"></span>Hours</div> 
                <div class="dateItem"><span id="minutes"></span>Minutes</div> 
                <div class="dateItem"><span id="seconds"></span>Seconds</div> 
            </div>
    
</div>




