<div id="welcomeDraggable">
    <div class="firstLineWelcome">
        <div id="welcomeContainer"></div>

        <div class="timeContainer">
            <div id="time" class="time"></div>
            <div class="sunTimes">
                <div class="sunriseContainer">
                    <img src="assets/svg/sunrise.svg" alt="">
                    <div class="sunrise"></div>
                </div>

                <div class="sunsetContainer">
                    <img src="assets/svg/sunset.svg" alt="">
                    <div class="sunset"></div>
                </div>
            </div>
        </div>

    </div> 
    <div class="subWelcome"></div>
</div>


<script>

    function isInDateRange(month, day, startMonth, startDay, endMonth, endDay) {
        return (month > startMonth || (month === startMonth && day >= startDay)) &&
            (month < endMonth || (month === endMonth && day <= endDay));
    }

    function isExactDate(month, day, exactMonth, exactDay) {
        return month === exactMonth && day === exactDay;
    }

    function getWelcomeMessage() {
        let currentDate = new Date();
        let currentHour = currentDate.getHours();
        let welcomeMessage = "";
        let subWelcome = "";
        let specialMessage = "";

        let today = currentDate.getDay();
        let isWeekend = (today === 6 || today === 0);

        let currentMonth = currentDate.getMonth();
        let currentDay = currentDate.getDate();

        console.log(currentDay);
        
        // Christmas Dates
        const isAlmostDecember = isInDateRange(currentMonth, currentDay, 10, 25, 10, 31);
        const isEarlyDecember = isInDateRange(currentMonth, currentDay, 11, 1, 11, 3);
        const isAlmostChristmas = isInDateRange(currentMonth, currentDay, 11, 1, 11, 24);
        const isChristmas = isExactDate(currentMonth, currentDay, 11, 25);

        // Bonfire Night
        const isAlmostBonfire = isInDateRange(currentMonth, currentDay, 10, 1, 10, 4);
        const isBonfire = isExactDate(currentMonth, currentDay, 10, 5);

        // New Years
        const isAlmostNewYears = isInDateRange(currentMonth, currentDay, 11, 28, 11, 30);
        const isNewYearsEve = isExactDate(currentMonth, currentDay, 11, 31);
        const isNewYears = isInDateRange(currentMonth, currentDay, 0, 1, 0, 10);

        // Halloween Dates
        const isAlmostHalloween = isInDateRange(currentMonth, currentDay, 9, 20, 9, 30);
        const isHalloween = isExactDate(currentMonth, currentDay, 10, 31);

        // Today Debugging
        const isToday = isExactDate(currentMonth, currentDay, 7, 23); 

        // Season Dates
        const isAlmostSpring = isInDateRange(currentMonth, currentDay, 1, 25, 1, 31);
        const isSpring = isInDateRange(currentMonth, currentDay, 2, 1, 2, 15);

        const isAlmostSummer = isInDateRange(currentMonth, currentDay, 4, 25, 4, 30);
        const isSummer = isInDateRange(currentMonth, currentDay, 5, 1, 5, 15);

        const isAlmostAutumn = isInDateRange(currentMonth, currentDay, 7, 25, 7, 31);
        const isAutumn = isInDateRange(currentMonth, currentDay, 8, 1, 8, 15);

        const isAlmostWinter = isInDateRange(currentMonth, currentDay, 10, 25, 10, 31);
        const isWinter = isInDateRange(currentMonth, currentDay, 11, 1, 11, 15);
        
        // Unique days
        const isLongestDay = isExactDate(currentMonth, currentDay, 5, 20); 
        const isShortestDay = isExactDate(currentMonth, currentDay, 11, 22); 


        let userName = "<?php echo $_SESSION["first_name"]?>"; 

        if (userName) {
            userName = " " + userName;
        }


        // Should be ordered for importance
        // Christmas Dates
        if (isAlmostDecember) {
            subWelcome = "Winter's chill is in the air, December is almost upon us!";
        }
        
        if (isEarlyDecember) {
            subWelcome = "December has just begun! The holidays are near!";
        }
        
        if (isAlmostChristmas) {
            subWelcome = "Christmas is almost here! The season of joy!";
        }
        
        if (isChristmas) {
            subWelcome = "Merry Christmas! Wishing you a joyous day!";
        }

        // Bonfire Night
        if (isAlmostBonfire) {
            subWelcome = "Bonfire night is drawing close. Remember, remember the fifth of November!";
        }
        
        if (isBonfire) {
            subWelcome = "It's Bonfire Night! Stay safe and enjoy the fireworks!";
        }

        // New Years
        if (isAlmostNewYears) {
            subWelcome = "The year is drawing to a close. Time to reflect and celebrate!";
        }
        
        if (isNewYearsEve) {
            subWelcome = "Happy New Year's Eve! Here's to new beginnings!";
        }
        
        if (isNewYears) {
            subWelcome = "Happy New Year! Wishing you 365 days of happiness!";
        }

        // Halloween Dates
        if (isAlmostHalloween) {
            subWelcome = "The spookiest time of the year is nearing. Get your costumes ready!";
        }
        
        if (isHalloween) {
            subWelcome = "Boo! Happy Halloween!";
        }

        // Today Debugging
        if (isToday) {
            subWelcome = "It's today! Enjoy the moment!";
        }

        // Season Dates
        if (isAlmostSpring) {
            subWelcome = "The flowers are about to bloom. Spring is near!";
        }
        
        if (isSpring) {
            subWelcome = "Welcome to Spring! Time for fresh starts!";
        }

        if (isAlmostSummer) {
            subWelcome = "The days are getting longer. Summer's warmth is just around the corner!";
        }
        
        if (isSummer) {
            subWelcome = "Welcome to Summer! Let's hope it's not too hot";
        }

        if (isAlmostAutumn) {
            subWelcome = "Leaves are falling. Autumn is near!";
        }
        
        if (isAutumn) {
            subWelcome = "Fallen leaves and crisp air. Welcome to Autumn!";
        }
        
        if (isAlmostWinter) {
            subWelcome = "Winter is close! The days are getting short";
        }
        
        if (isWinter) {
            subWelcome = "Cold winds and cozy nights. It's Winter time!";
        }

        // Unique days
        if (isLongestDay) {
            subWelcome = "It's the Summer Solstice. Longest day of the year!";
        }
        
        if (isShortestDay) {
            subWelcome = "It's the Winter Solstice. Shortest day of the year!";
        }


    if (isWeekend) {
        if (currentHour >= 0 && currentHour < 2) {
        welcomeMessage = "It's the early hours of the weekend, " + userName + "!";
        } else if (currentHour >= 2 && currentHour < 4) {
            welcomeMessage = "Still quite early," + userName + "!";
        } else if (currentHour >= 4 && currentHour < 6) {
            welcomeMessage = "Dawn's breaking on this weekend morning, " + userName + "!";
        } else if (currentHour >= 6 && currentHour < 8) {
            welcomeMessage = "Rise and shine, " + userName + ". The weekend awaits!";
        } else if (currentHour >= 8 && currentHour < 10) {
            welcomeMessage = "Weekend mornings are the best, aren't they, " + userName + "?";
        } else if (currentHour >= 10 && currentHour < 12) {
            welcomeMessage = "Weekend brunch time, " + userName + "!";
        } else if (currentHour >= 12 && currentHour < 14) {
            welcomeMessage = "How's the weekend treating you, " + userName + "?";
        } else if (currentHour >= 14 && currentHour < 16) {
            welcomeMessage = "Hope you're enjoying your weekend afternoon, " + userName + "!";
        } else if (currentHour >= 16 && currentHour < 18) {
            welcomeMessage = "Perfect time for a weekend walk, don't you think, " + userName + "?";
        } else if (currentHour >= 18 && currentHour < 20) {
            welcomeMessage = "A pleasant weekend evening to you, " + userName + "!";
        } else if (currentHour >= 20 && currentHour < 22) {
            welcomeMessage = "Weekend nights have their own charm, right " + userName + "?";
        } else { // 22 to 23
            welcomeMessage = "Almost bedtime, " + userName + ". Make the most of your weekend night!";
        }
    // Friday
    } else  if (today === 5 ){
        if (currentHour >= 0 && currentHour < 2) {
            welcomeMessage = "Early hours of Friday, the weekend's almost here, " + userName + "!";
        } else if (currentHour >= 2 && currentHour < 4) {
            welcomeMessage = "Still early, but hang in there! Weekend's on the horizon, " + userName + "!";
        } else if (currentHour >= 4 && currentHour < 6) {
            welcomeMessage = "Dawn's breaking. The final push before the weekend, " + userName + "!";
        } else if (currentHour >= 6 && currentHour < 8) {
            welcomeMessage = "Rise and shine! Friday's calling, " + userName + "!";
        } else if (currentHour >= 8 && currentHour < 10) {
            welcomeMessage = "That Friday feeling is kicking in, isn't it, " + userName + "?";
        } else if (currentHour >= 10 && currentHour < 12) {
            welcomeMessage = "Almost lunchtime! Friday's in full swing, " + userName + "!";
        } else if (currentHour >= 12 && currentHour < 14) {
            welcomeMessage = "Friday afternoon! Are you feeling it, " + userName + "?";
        } else if (currentHour >= 14 && currentHour < 16) {
            welcomeMessage = "Not much longer now! Friday's winding down, " + userName + "!";
        } else if (currentHour >= 16 && currentHour < 18) {
            welcomeMessage = "How about those after-work Friday plans, " + userName + "?";
        } else if (currentHour >= 18 && currentHour < 20) {
            welcomeMessage = "Friday evening! The gateway to the weekend, " + userName + "!";
        } else if (currentHour >= 20 && currentHour < 22) {
            welcomeMessage = "Kick back and relax, " + userName + ". Friday night is all yours!";
        } else { // 22 to 23
            welcomeMessage = "Night's deepening, but remember, tomorrow's the weekend, " + userName + "!";
        }
    } else {
        if (currentHour >= 0 && currentHour < 2) {
            welcomeMessage = "It's the early hours, peaceful isn't it." ;
        } else if (currentHour >= 2 && currentHour < 4) {
            welcomeMessage = "Still quite early," + userName;
        } else if (currentHour >= 4 && currentHour < 6) {
            welcomeMessage = "Dawn's breaking," + userName;
        } else if (currentHour >= 6 && currentHour < 8) {
            welcomeMessage = "Good Early Morning," + userName;
        } else if (currentHour >= 8 && currentHour < 10) {
            welcomeMessage = "Morning's in full swing," + userName;
        } else if (currentHour >= 10 && currentHour < 12) {
            welcomeMessage = "Approaching midday," + userName;
        } else if (currentHour >= 12 && currentHour < 14) {
            welcomeMessage = "It's noon, time for lunch" + userName;
        } else if (currentHour >= 14 && currentHour < 16) {
            welcomeMessage = "Mid-afternoon," + userName; 
        } else if (currentHour >= 16 && currentHour < 18) {
            welcomeMessage = "Late afternoon," + userName; 
        } else if (currentHour >= 18 && currentHour < 20) {
            welcomeMessage = "Evening's upon us," + userName;  
        } else if (currentHour >= 20 && currentHour < 22) {
            welcomeMessage = "It's late evening," + userName;  
        } else { // 22 to 23
            welcomeMessage = "Night's almost here," + userName;  
        }
    }

        return {
            'welcomeMessage': welcomeMessage,
            'subWelcome': subWelcome,
            
        };
    }


$( document ).ready(function() {
    function formatTime(dateTimeStr) {
        // Create a Date object from the given date-time string
        const date = new Date(dateTimeStr);

        // Extract hours and minutes
        let hours = date.getHours();
        const minutes = String(date.getMinutes()).padStart(2, '0'); // padStart ensures that we always have two digits

        // Determine AM or PM
        let amOrPm = hours >= 12 ? 'pm' : 'am';

        // Convert to 12-hour format
        if (hours > 12) hours -= 12;
        if (hours === 0) hours = 12; // For midnight

        return `${hours}:${minutes}${amOrPm}`;
    }



    function getSunTimes() {
        const options = {
            method: 'GET',
            headers: {
                'User-Agent': 'Insomnia/2023.5.4'
            }
        };

        fetch('https://api.open-meteo.com/v1/forecast?name=Preston&latitude=53.7628&longitude=-2.7045&daily=sunrise%2Csunset&timezone=Europe%2FLondon&forecast_days=1', options)
        .then(response => response.json())
        .then(response => {
            const sunriseTime = formatTime(response.daily.sunrise[0]);
            const sunsetTime = formatTime(response.daily.sunset[0]);

            // Log the formatted times
            console.log(sunriseTime);
            console.log("Sunset:", sunsetTime);

            console.log("Sunrise:", response.daily.sunrise[0]);
            console.log("Sunset:", response.daily.sunset[0]);

            $(".sunrise").text(sunriseTime);
            $(".sunset").text(sunsetTime);
        })
        .catch(err => console.error(err));
    }


    getSunTimes();
});
</script>