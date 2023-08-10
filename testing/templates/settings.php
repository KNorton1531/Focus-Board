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
        <div class="countdown">
        <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>

            <div class="countdownContent">

                <?php
                // LOCAL DETAILS
                $host = 'localhost';
                $db   = 'focus_board';
                $user = 'root';
                $pass = '';
                $charset = 'utf8mb4';

                // LIVE DETAILS
                // $host = 'sql212.infinityfree.com';
                // $db   = 'if0_34709976_focus_board';
                // $user = 'if0_34709976';
                // $pass = 'zs9Q8FIOu57';
                // $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                try {
                    $pdo = new PDO($dsn, $user, $pass, $options);
                } catch (\PDOException $e) {
                    throw new \PDOException($e->getMessage(), (int)$e->getCode());
                }

                // Store current session ID
                $currentUserId = $_SESSION['id'];

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
                    // Insert date to database
                    $stmt = $pdo->prepare('INSERT INTO countdowns (user_id, date) VALUES (?, ?)');
                    $stmt->execute([$currentUserId, $_POST['date']]);
                }

                // Fetch dates for current user
                $stmt = $pdo->prepare('SELECT date, title FROM countdowns WHERE user_id = ?');
                $stmt->execute([$currentUserId]);
                $dates = $stmt->fetchAll();
                ?>
                    <form action="" method="post">
                        <label for="date">Add Date:</label>
                        <input type="date" name="date" required>
                        <input type="submit" value="Add">
                    </form>

                    <div class="dates-container">
                        <h3>Custom Countdowns</h3>
                        <ul>
                        <?php foreach ($dates as $date) : ?>
                            <li>
                                <h3><?= htmlspecialchars($date['title']) ?></h3>
                                <?= htmlspecialchars($date['date']) ?>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>

                <div class="presetCountdowns">
                    <h4>Preset countdowns</h4>

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

            <?php } else {?>
            <!-- If logged out, do this -->
            <div class="countdownLogin">
            <h4>Please log in to use countdowns</h4>
            </div>


        <?php } ?>
        </div>

    </div>
</div>