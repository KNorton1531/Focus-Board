$(document).ready(function() {
    var storedBackground = localStorage.getItem('background');
    
    // Check if there's a background URL stored in localStorage
    if(storedBackground) {
        $('#myVideo > source').attr('src', storedBackground);
        $('#myVideo')[0].load();
        $('#myVideo')[0].play();
    } else {
        // Optionally, set a default video if no background is set in localStorage
        var defaultVideo = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/lake-house/Outside_Day.mp4";
        $('#myVideo > source').attr('src', defaultVideo);
        $('#myVideo')[0].load();
        $('#myVideo')[0].play();
    }
});

$('.lakehouse').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/lake-house/Outside_Day.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.northenlights').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/cottage/cottage-exterior-final.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.planenight').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/plane/plane-night.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.planeday').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/plane/plane-day.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.chillvibesnight').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/chill-vibes/LVR%20STARRY%20NIGHT.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.seoulnight').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/seoul/inside-night.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.seoulday').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/seoul/inside-day.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.gardenday').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/slowgarden/slow-garden-night.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.gardennight').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/slowgarden/slow-garden-day.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$('.studysnow').on('click', function() {
    var newVideoSource = "https://lofico.nyc3.cdn.digitaloceanspaces.com/scenes/study/snow-scene.mp4";
    $('#myVideo > source').attr('src', newVideoSource);
    $('#myVideo')[0].load();
    $('#myVideo')[0].play();
    localStorage.setItem('background', newVideoSource);
});

$(document).on('click', function(event) {
    // If the clicked element is not inside #myContainer and is not #toggleButton
    if (!$(event.target).closest('#scenesContainer').length && !$(event.target).closest('.barIcon.scenes').length) {
        $('#scenesContainer').hide();
    }
});

