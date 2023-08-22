<?php
// Assuming session with key 'id' is set
if(isset($_SESSION['id'])) {
    $currentUserId = $_SESSION['id'];

    // Prepare the SQL statement
    $stmt = $link->prepare("SELECT first_name FROM users WHERE id = ?");
    
    // Bind the session ID to the SQL statement
    $stmt->bind_param("i", $currentUserId);
    
    // Execute the statement
    $stmt->execute();
    
    // Bind the result
    $stmt->bind_result($first_name);
    
    // Fetch the result. This will store the retrieved first_name into the $first_name variable.
    $stmt->fetch();

    // Close the statement
    $stmt->close();
} else {
    echo "Session ID not set.";
}

function getWelcomeMessage() {
    $currentHour = date('H');
    $welcomeMessage = "";
    $subWelcome = "";
    
    // Assuming you've already started a session or stored the username elsewhere
    $userName = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : '';
    
    if ($userName) {
        $userName = " " . $userName; 
    }
    
    if ($currentHour >= 0 && $currentHour < 2) {
        $welcomeMessage = "It's the early hours," . $userName;
        $subWelcome = "The world is quiet.";
    } elseif ($currentHour >= 2 && $currentHour < 4) {
        $welcomeMessage = "Still quite early," . $userName;
        $subWelcome = "Most people are deep in slumber.";
    } elseif ($currentHour >= 4 && $currentHour < 6) {
        $welcomeMessage = "Dawn's breaking," . $userName;
        $subWelcome = "A new day begins.";
    } elseif ($currentHour >= 6 && $currentHour < 8) {
        $welcomeMessage = "Good Early Morning," . $userName;
        $subWelcome = "The world is waking up.";
    } elseif ($currentHour >= 8 && $currentHour < 10) {
        $welcomeMessage = "Morning's in full swing," . $userName;
        $subWelcome = "The day is bright and active.";
    } elseif ($currentHour >= 10 && $currentHour < 12) {
        $welcomeMessage = "Approaching midday," . $userName;
        $subWelcome = "The sun is high in the sky.";
    } elseif ($currentHour >= 12 && $currentHour < 14) {
        $welcomeMessage = "It's noon," . $userName;
        $subWelcome = "Time for a midday break.";
    } elseif ($currentHour >= 14 && $currentHour < 16) {
        $welcomeMessage = "Mid-afternoon," . $userName;
        $subWelcome = "The day is in full motion.";
    } elseif ($currentHour >= 16 && $currentHour < 18) {
        $welcomeMessage = "Late afternoon," . $userName;
        $subWelcome = "Golden hour approaches.";
    } elseif ($currentHour >= 18 && $currentHour < 20) {
        $welcomeMessage = "Evening's upon us," . $userName;
        $subWelcome = "The sun sets, casting long shadows.";
    } elseif ($currentHour >= 20 && $currentHour < 22) {
        $welcomeMessage = "It's late evening," . $userName;
        $subWelcome = "The world prepares for night.";
    } else { // 22 to 23
        $welcomeMessage = "Night's almost here," . $userName;
        $subWelcome = "The night is calm and serene.";
    }

    return ['welcomeMessage' => $welcomeMessage, 'subWelcome' => $subWelcome];
}

$message = getWelcomeMessage();
?>

<div id="welcomeDraggable">


    <div class="firstLineWelcome">
    <div id="welcomeContainer"></div><div class="firstName"><?php echo $message['welcomeMessage']; ?></div>

        <div id="time" class="time"></div>
    </div> 

    <div class="subWelcome"><?php echo $message['subWelcome']; ?></div>

</div>


<script>
function updateWelcomeMessage() {
    fetch('index.php?ajax=1')  // Note the added query parameter
        .then(response => response.json())
        .then(data => {
            document.getElementById('welcomeContainer').innerText = data.welcomeMessage;
            document.querySelector('.subWelcome').innerText = data.subWelcome;
        })
        .catch(error => {
            console.error('There was an error fetching the welcome message:', error);
        });
}

// Call the function immediately on page load
updateWelcomeMessage();

// And then every hour
setInterval(updateWelcomeMessage, 3600 * 1000);

</script>