<div id="settingsContainer">
    <div onclick="ToggleSettings()" class="closeButton">X</div>

    <div class="settingsNavContainer">
        <div class="generalLabel settingsItem settingsActive">
            <h5>General</h5>
        </div>

        <div class="spotifyLabel settingsItem">
            <h5>Spotify</h5>
        </div>

        <div class="countdownsLabel settingsItem">
            <h5>Countdowns</h5>
        </div>

    </div>

    <div class="userTab tabContainer">

        <div class="userDetails">
            <div class="nameLabel">First Name</div>
            <div class="nameInputWrapper">
                <input class="nameInput" type="text">
                <button class="submitName">Submit</button>
                <button class="clearName"><i class="fa-solid fa-trash-can"></i></button>
            </div>
        </div>

    </div>


    <div class="spotifyTab tabContainer">
   
        <div>
            <a onclick="checkAndRefresh()" id="nowPlayingContainer" href="https://accounts.spotify.com/authorize?response_type=code&client_id=7b96a668f8cf4b848819ebef289a2336&redirect_uri=https%3A%2F%2Fnortonwebtesting.free.nf&scope=user-read-playback-state%20user-modify-playback-state%20user-read-currently-playing">Link Spotify</a>
        </div>

    </div>

    <div class="countdownTab tabContainer">
        <h5>Countdowns are being worked on</h5>
        <div class="countdownSettings">
            <div class="countdownContent">

                

                    <div class="dates-container">
                        <h3>Custom Countdowns</h3>
                        <ul>
                        
                        </ul>
                    </div>

                <div class="presetCountdowns">
                    <h3>Preset countdowns</h3>

                    <div class="christmasCountdown">
                            <h3>Christmas</h3>
                            <button id="christmasVis"><img src="assets/svg/visibilityOn.svg" alt=""></button>
                            
                    </div>

                    <div class="christmasCountdown">
                            <h3>Halloween</h3>
                            <button id="halloweenVis"><img src="assets/svg/visibilityOn.svg" alt=""></button>
                            
                    </div>

                    <div class="christmasCountdown">
                            <h3>Bonfire Night</h3>
                            <button id="bonfireVis"><img src="assets/svg/visibilityOn.svg" alt=""></button>
                            
                    </div>

                    <div class="christmasCountdown">
                            <h3>New Years</h3>
                            <button id="newyearsVis"><img src="assets/svg/visibilityOn.svg" alt=""></button>
                            
                    </div>



                </div>












            </div>
        </div>

    </div>
</div>