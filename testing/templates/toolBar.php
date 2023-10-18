<div class="toolBarContainer">
    <div class="toolbarWrapper">
        <div class="barIcon settings" data-container="#settingsContainer">
            <img src="assets/svg/settingsIcon.svg" alt="">
        </div>

        <div class="barIcon spotify" data-container="#spotifyContainer">
            <img src="assets/svg/spotifyToolbar.svg" alt="">
        </div>

        <div class="barIcon welcome" data-container="#welcomeDraggable">
            <img src="assets/svg/wavingHand.svg" alt="">
        </div>

        <div class="barIcon countdown" data-container="#countdownContainer">
            <img src="assets/svg/calendar.svg" alt="">
        </div>

        <div class="barIcon login" data-container="#loginContainer">
            <img src="assets/svg/account.svg" alt="">
        </div>

        <div class="barIcon weather" data-container="#weatherContainer">
            <img src="assets/svg/weather.svg" alt="">
        </div>

        <div class="barIcon scenes" data-container="#toolbarContainer">
            <img src="assets/svg/scenes.svg" alt="">
        </div>

        <div class="barIcon timer" data-container="#timerContainer">
            <img src="assets/svg/timer.svg" alt="">
        </div>
        <div class="barIcon effects" data-container="#timerContainer">
            <img src="assets/svg/effects.svg" alt="">
            <div class="effectsContainer">
                <div class="effectsIcons">
                    <div class="effectBox rainEffect">Rain</div>
                    <div class="effectBox rainEffect">Leafs</div>
                    <div class="effectBox rainEffect">Snow</div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    var timer;

    $('.effects').on('mouseenter', function() {
        // When mouse enters .effects, show the .effectsContainer
        $('.effectsContainer').fadeIn(100);
    }).on('mouseleave', function() {
        // When mouse leaves .effects, set a timer to hide .effectsContainer
        timer = setTimeout(function() {
            $('.effectsContainer').fadeOut(100);
        }, 300); // 300ms delay
    });

    $('.effectsContainer').on('mouseenter', function() {
        // When mouse enters .effectsContainer, clear the timer to keep it open
        clearTimeout(timer);
    }).on('mouseleave', function() {
        // When mouse leaves .effectsContainer, hide it
        $('.effectsContainer').fadeOut(100);
    });
});


</script>