<div id="spotifyContainer">
    <div class="draggable"></div>

    <div class="spotifyWrapper">
        <div class="spotifyLogoWrapper">
        <a target="_blank" href="https://open.spotify.com/"><img src="assets/svg/spotifyLogo.svg" alt=""></a>
        </div>

        <img id="nowPlayingAlbum"  src="https://placehold.jp/75x75.png" alt="">

        <div class="nowPlayingContainer">

            <div class="songContainer">
                <div id="nowPlaying">Please Link Spotify Account</div>
            </div>

            <div class="artistContainer">
                <div id="artistPlaying">Waiting for Playback</div>
            </div>

            <div class="playbackContainer">
                <img class="spotifyPrev" onclick ="previousSpotify()" src="assets/svg/skipPrevious.svg" alt="">
                <img class="spotifyPlay" onclick="playSpotify()" src="assets/svg/playCircle.svg" alt="">
                <img class="spotifyPause" onclick="pauseSpotify()" src="assets/svg/stopCircle.svg" alt="">
                <img class="spotifyNext" onclick ="nextSpotify()" src="assets/svg/skipNext.svg" alt="">

            </div>


        </div>

        <div id="sound-bars" class="paused">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>


    </div>

</div>


