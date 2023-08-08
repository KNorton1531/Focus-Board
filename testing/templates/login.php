<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
 
// Include config file
require_once "DBconfig.php";

session_start();
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, testing, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    $testing = ""; // initialize the variable
                    mysqli_stmt_bind_result($stmt, $id, $username, $testing, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["Testing"] = $testing;
                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

}

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?> 
    <style>
        .loginContent, .signupContent{
            display: none;
        }

        #loginContainer{
            padding: 35px;
        }
    </style>
<?php } else { ?>
    <style>
        .loggedInContent{
            display: none;
        }
    </style>
<?php } ?>

    <div id="loginContainer">
        <div class="loginContent">
            <h2>Login</h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="usernameLogin">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                </div>    
                <div class="passwordLogin">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                </div>
                <div class="loginButton">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a class="signupLink" href="#">Sign up now</a>.</p>
            </form>
        </div>

        <?php 
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { 
            include 'templates/register.php';
        }
        ?>

        <div class="loggedInContent">
            <img class="loginTick" src="assets/svg/tick.svg" alt="">
            <h2>You are logged in as <?php echo $_SESSION["username"]; ?></h2>
            <h4>Go to settings to configure your account</h4>
            <a href="logout.php" class="signoutLink">Log Out</a>
        </div>
    </div>