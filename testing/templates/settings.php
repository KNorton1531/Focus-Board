<div id="settingsContainer">
    <div onclick="ToggleSettings()" class="closeButton">X</div>

    <div class="settingsNavContainer">
        <div>
            <h5>General</h5>
        </div>

        <div>
            <h5>Spotify</h5>
        </div>

    </div>

    <div class="settingsContent">
   
        <div>
            <a onclick="checkAndRefresh()" id="nowPlayingContainer" href="https://accounts.spotify.com/authorize?response_type=code&client_id=7b96a668f8cf4b848819ebef289a2336&redirect_uri=https%3A%2F%2Fnortonwebtesting.free.nf&scope=user-read-playback-state%20user-modify-playback-state%20user-read-currently-playing">Link Spotify</a>
        </div>

        <div class="userDetails">
            <div class="nameLabel">First Name</div>
            <div class="nameInputWrapper">
                <input class="nameInput" type="text">
                <button class="submitName">Submit</button>
                <button class="clearName"><i class="fa-solid fa-trash-can"></i></button>
            </div>

            <div class="weatherLabel">Location for Weather</div>
            <div class="weatherInputWrapper">
                <input class="weatherInput" type="text">
                <button class="submitWeather">Submit</button>
                <button class="clearWeather"><i class="fa-solid fa-trash-can"></i></button>
            </div>

        </div>

        

    </div>






</div>