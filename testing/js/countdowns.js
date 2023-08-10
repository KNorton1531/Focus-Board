document.addEventListener('DOMContentLoaded', function() {
    const endDate = new Date('2024-01-06'); // Set your desired end date here.

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = endDate - now;

        const secondsInMonth = 60 * 60 * 24 * 30;
        const secondsInWeek = 60 * 60 * 24 * 7;
        const secondsInDay = 60 * 60 * 24;
        const secondsInHour = 60 * 60;
        const secondsInMinute = 60;

        let months = Math.floor(distance / 1000 / secondsInMonth);
        let weeks = Math.floor((distance / 1000 - months * secondsInMonth) / secondsInWeek);
        let days = Math.floor((distance / 1000 - months * secondsInMonth - weeks * secondsInWeek) / secondsInDay);
        let hours = Math.floor((distance / 1000 - months * secondsInMonth - weeks * secondsInWeek - days * secondsInDay) / secondsInHour);
        let minutes = Math.floor((distance / 1000 - months * secondsInMonth - weeks * secondsInWeek - days * secondsInDay - hours * secondsInHour) / secondsInMinute);
        let seconds = Math.floor(distance / 1000 - months * secondsInMonth - weeks * secondsInWeek - days * secondsInDay - hours * secondsInHour - minutes * secondsInMinute);

        document.getElementById('months').textContent = months;
        document.getElementById('weeks').textContent = weeks;
        document.getElementById('days').textContent = days;
        document.getElementById('hours').textContent = hours;
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;

        if (distance <= 0) {
            clearInterval(interval);
            document.getElementById('countdown').innerHTML = "EXPIRED";
        }
    }

    const interval = setInterval(updateCountdown, 1000);
});

$("#christmasVis").click(function(){
    $("#christmasCountdown").toggle();
    rememberDisplay();
});

$("#halloweenVis").click(function(){
    $("#HalloweenCountdown").toggle();
    rememberDisplay();
});

$("#bonfireVis").click(function(){
    $("#BonfireCountdown").toggle();
    rememberDisplay();
});

$("#newyearsVis").click(function(){
    $("#NewYearCountdown").toggle();
    rememberDisplay();
});

function updateButtonIcon(button, targetElement) {
    var buttonImg = button.find('img');
    if (targetElement.css('display') === 'none') {
        buttonImg.attr('src', 'assets/svg/visibilityOff.svg');
    } else {
        buttonImg.attr('src', 'assets/svg/visibilityOn.svg');
    }
}

function bindButtonEventListener(buttonId, targetId) {
    var button = $(buttonId);
    var targetElement = $(targetId);

    // Update the button's icon on click
    button.click(function() {
        updateButtonIcon(button, targetElement);
    });
}

function updateIconsOnPageLoad(buttonId, targetId) {
    setTimeout(function() {
        var button = $(buttonId);
        var targetElement = $(targetId);
        updateButtonIcon(button, targetElement);
    }, 1100);
}

$(document).ready(function() {
    // Bind events on page load
    bindButtonEventListener('#christmasVis', '#christmasCountdown');
    bindButtonEventListener('#halloweenVis', '#HalloweenCountdown');
    bindButtonEventListener('#bonfireVis', '#BonfireCountdown');
    bindButtonEventListener('#newyearsVis', '#NewYearCountdown');

    // Update icons 1.1 seconds after page load
    updateIconsOnPageLoad('#christmasVis', '#christmasCountdown');
    updateIconsOnPageLoad('#halloweenVis', '#HalloweenCountdown');
    updateIconsOnPageLoad('#bonfireVis', '#BonfireCountdown');
    updateIconsOnPageLoad('#newyearsVis', '#NewYearCountdown');
});


