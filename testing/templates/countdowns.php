<div id="countdownContainer">
    <div class="draggable"></div>
    <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>

        <div class="countdownContent">
            <span id="months"></span> Months 
            <span id="weeks"></span> Weeks 
            <span id="days"></span> Days 
            <span id="hours"></span> Hours 
            <span id="minutes"></span> Minutes 
            <span id="seconds"></span> Seconds 
        

        <?php
            $host = 'localhost';
            $db   = 'focus_board';
            $user = 'root';
            $pass = '';
            $charset = 'utf8mb4';

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

            // Assuming user ID is stored in session after login
            $currentUserId = $_SESSION['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
                // Insert date to database
                $stmt = $pdo->prepare('INSERT INTO countdowns (user_id, date) VALUES (?, ?)');
                $stmt->execute([$currentUserId, $_POST['date']]);
            }

            // Fetch dates for current user
            $stmt = $pdo->prepare('SELECT date FROM countdowns WHERE user_id = ?');
            $stmt->execute([$currentUserId]);
            $dates = $stmt->fetchAll();
        ?>
            <form action="" method="post">
                <label for="date">Add Date:</label>
                <input type="date" name="date" required>
                <input type="submit" value="Add">
            </form>

            <div class="dates-container">
                <h3>Your Dates:</h3>
                <ul>
                <?php foreach ($dates as $date) : ?>
                    <li><?= htmlspecialchars($date['date']) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
        
    <?php } else {?>
    <!-- If logged out, do this -->
    <div class="countdownLogin">
        <h4>Please log in to use countdowns</h4>
    </div>


    <?php } ?>
</div>