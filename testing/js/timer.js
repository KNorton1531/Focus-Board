$(document).ready(function() {
    let interval;
    let minutes = 0;
    let seconds = 0;
    let isRunning = false;

    function updateDisplay() {
        $('#inputDisplay').val(("0" + minutes).slice(-2) + ':' + ("0" + seconds).slice(-2));
    }

    function toggleTimer() {
        if (isRunning) {
            stopTimer();
            $('.timerPlayPause').src('#');
        } else {
            startTimer();
            $('.timerPlayPause').src('#');
        }
    }
    

    function startTimer() {
        if (isRunning) return;
    
        // Only start the timer if minutes or seconds are not 0
        if (minutes === 0 && seconds === 0) {
            return; // If the display is "00:00", exit the function and don't start the timer.
        }
    
        isRunning = true;
    
        interval = setInterval(() => {
            if (seconds > 0) {
                seconds--;
            } else if (minutes > 0) {
                minutes--;
                seconds = 59;
            } else {
                // Only play the alarm sound if the timer wasn't already at zero when the user clicked play
                if (minutes !== 0 || seconds !== 0) {
                    playAlarmSound();
                }
    
                // Check if the loop checkbox is checked
                if ($("#loopCheckbox").prop("checked")) {
                    // If checked, restart the timer from the saved values
                    minutes = savedMinutes;
                    seconds = savedSeconds;
                } else {
                    // Reset the display to the saved values without auto-starting
                    minutes = savedMinutes;
                    seconds = savedSeconds;
                    stopTimer(); // Stop the timer
                }
                updateDisplay();
            }
            updateDisplay();
        }, 1000); 
    }
    
    
    $("#loopCheckbox").change(function() {
        const isChecked = $(this).prop("checked");
        localStorage.setItem('loopCheckboxState', isChecked);
    });

    const storedCheckboxState = localStorage.getItem('loopCheckboxState');

    if (storedCheckboxState !== null) {
        $("#loopCheckbox").prop("checked", storedCheckboxState === "true");
    }
    
    function playAlarmSound() {
        $("#alarmSound")[0].play();
    }
    

    function stopTimer() {
        clearInterval(interval);
        isRunning = false;
    }

    $('#plus').click(function() {
        minutes++;
        updateDisplay();
    });

    $('#minus').click(function() {
        if (minutes > 0) {
            minutes--;
            updateDisplay();
        }
    });

    $('#togglePlayPause').click(toggleTimer);

    $('#reset').click(function() {
        stopTimer();
        minutes = savedMinutes;
        seconds = savedSeconds;
        updateDisplay();
    });
    

    $('#inputDisplay').on('change', function() {
        const val = $(this).val();
        const match = val.match(/^(\d{1,2}):(\d{2})$/);
        if (match) {
            minutes = parseInt(match[1], 10);
            seconds = parseInt(match[2], 10);
            if (seconds >= 60) {
                alert('Seconds should be between 00 and 59.');
                updateDisplay();  // Revert to last valid state
            }
        } else {
            alert('Invalid format. Please use MM:SS format.');
            updateDisplay();  // Revert to last valid state
        }
    });

    let savedMinutes = 0;
    let savedSeconds = 0;

    function startTimer() {
        if (isRunning) return;
        isRunning = true;

        interval = setInterval(() => {
            if (seconds > 0) {
                seconds--;
            } else if (minutes > 0) {
                minutes--;
                seconds = 59;
            } else {
                playAlarmSound();

                // Check if the loop checkbox is checked
                if ($("#loopCheckbox").prop("checked")) {
                    // If checked, restart the timer from the saved values
                    minutes = savedMinutes;
                    seconds = savedSeconds;
                    updateDisplay();
                } else {
                    stopTimer();
                }
            }
            updateDisplay();
        }, 1000); 
    }

    // Save the current timer settings
    $('#saveTime').click(function() {
        const val = $('#inputDisplay').val();
        const match = val.match(/^(\d{1,2}):(\d{2})$/);
        if (match) {
            savedMinutes = parseInt(match[1], 10);
            savedSeconds = parseInt(match[2], 10);
            if (seconds >= 60) {
                alert('Seconds should be between 00 and 59.');
                updateDisplay();  // Revert to last valid state
            } else {
                minutes = savedMinutes;
                seconds = savedSeconds;
                updateDisplay();
            }
        } else {
            alert('Invalid format. Please use MM:SS format.');
            updateDisplay();  // Revert to last valid state
        }

        localStorage.setItem('savedMinutes', savedMinutes);
        localStorage.setItem('savedSeconds', savedSeconds);
    });

    if (localStorage.getItem('savedMinutes') && localStorage.getItem('savedSeconds')) {
        savedMinutes = parseInt(localStorage.getItem('savedMinutes'), 10);
        savedSeconds = parseInt(localStorage.getItem('savedSeconds'), 10);
        minutes = savedMinutes;
        seconds = savedSeconds;
        updateDisplay();
    }

    $("#saveTime").on("click", function() {
        $(".saveConfirm")
            .show()
            .delay(1000)
            .fadeOut();
    });

    $(".showOptions").on("click", function() {
        $(".timerOptions").slideToggle();
    });

    const $alarmSetDropdown = $('#alarmSet');
    const $alarmSound = $('#alarmSound');
    const $volumeSlider = $('#volumeSlider');

    // Load the saved alarm from local storage on page load
    const storedAlarmSound = localStorage.getItem('selectedAlarmSound');
    if (storedAlarmSound) {
        $alarmSetDropdown.val(storedAlarmSound);
        $alarmSound.attr('src', storedAlarmSound);
    }

    // Load the saved volume from local storage on page load
    const storedVolume = localStorage.getItem('selectedVolume');
    if (storedVolume) {
        $volumeSlider.val(storedVolume);
        $alarmSound[0].volume = storedVolume;
    }

    // When the dropdown changes
    $alarmSetDropdown.change(function() {
        const selectedSound = $(this).val();
        $alarmSound.attr('src', selectedSound);
        localStorage.setItem('selectedAlarmSound', selectedSound);
    });

    // When the volume slider changes
    $volumeSlider.on('input', function() {
        const volumeValue = $(this).val();
        $alarmSound[0].volume = volumeValue;
        localStorage.setItem('selectedVolume', volumeValue);
    });

    // Play the sound when "Preview" button is clicked
    $('.timerOptions button').click(function() {
        $alarmSound[0].play();
    });

});
