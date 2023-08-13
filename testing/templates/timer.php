
<div id="timerContainer">
    <div class="draggable"></div>

    <div class="timerContent">
        <div class="time-control">
            <button id="minus" style="border-radius: 10px 0 0 10px;">-</button>
            <input type="text" id="inputDisplay" value="00:00">
            <button id="plus" style="border-radius: 0 10px 10px 0;">+</button>
        </div>
        
        <div class="time-settings">
            <button id="saveTime">Save Time</button>
            <div class="saveConfirm">Time saved ✓</div>
        </div>

        <div class="timer-actions">
            <button id="togglePlayPause"><img class="timerPlayPause" src="assets/svg/playpause.svg" alt="Reset"></button>
            <button id="reset"><img src="assets/svg/reset.svg" alt="Reset"></button>
            <div class="showOptions">⛭</div>
        </div>


        <div class="timerOptions">
            <div class="optionsGroup">
            <hr>
                <input type="checkbox" id="loopCheckbox">
                <label for="loopCheckbox">Repeat</label>

                <label for="alarmSet">Alarm</label>
                <select name="" id="alarmSet">
                    <option value="https://www.tones7.com/media/text_notification.mp3">Soft bounce</option>
                    <option value="https://www.tones7.com/media/nice_sms.mp3">Electric Bounce</option>
                    <option value="https://www.tones7.com/media/message_notify.mp3">Option 3</option>
                </select>
                <button style="margin-top: 10px;font-size: 24px;">🕪</button>
                <audio id="alarmSound" src="https://www.tones7.com/media/text_notification.mp3" preload="auto"></audio>
            </div>

            <div class="optionsGroup" style="margin-top: 20px;">
                <label for="volumeSlider">Volume</label>
                <input type="range" id="volumeSlider" min="0" max="1" step="0.01" value="0.5">
            </div>
        </div>

    </div>

</div>
