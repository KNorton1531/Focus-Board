$(document).ready(function() {
    $('.generalLabel').on('click', function() {

        $('.settingsItem').removeClass("settingsActive");
        $('.tabContainer').hide();

        $('.generalLabel').addClass("settingsActive");
        $('.userTab').show();
    });

    $('.spotifyLabel').on('click', function() {
        $('.settingsItem').removeClass("settingsActive");
        $('.tabContainer').hide();

        $('.spotifyLabel').addClass("settingsActive");
        $('.spotifyTab').show();
    });

    $('.countdownsLabel').on('click', function() {
        $('.settingsItem').removeClass("settingsActive");
        $('.tabContainer').hide();

        $('.countdownsLabel').addClass("settingsActive");
        $('.countdownTab').show();
    });
});