<?php


// Include config file
require_once "DBconfig.php";

session_start();
ob_start();
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$first_name = "";
$first_name_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate first name
    if(!isset($_POST["first_name"]) || empty(trim($_POST["first_name"]))){
        $first_name_err = "Please enter your first name.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
        // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, first_name) VALUES (?, ?, ?)";

            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_first_name);
                
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_first_name = $first_name;
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Set session variables to log the user in
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = mysqli_insert_id($link); // Get the ID of the last inserted record
                $_SESSION["username"] = $param_username;
                    
                // Redirect to a welcome or dashboard page
                header("location: index.php"); // change 'index.php' to your desired landing page for logged-in users
                exit;
            } else{
                echo "Error: " . mysqli_error($link);
            }
                
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

        
        // Close connection
        mysqli_close($link);
    }

    ob_end_flush(); // Send the buffered output
?>

<div class="signupContent hidden">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <!-- Ready for first name -->
        <!-- <div class="passwordLogin">
            <label>Username</label>
            <input type="text" name="username" class="form-control <?php //echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $username; ?>">
        </div>    -->

        <div class="passwordLogin">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
        </div>

        
        <div class="passwordLogin">
            <label>Username</label>
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
        </div> 

        <div class="passwordLogin">
            <label>Password</label>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
        </div>

        <div class="loginButton">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </div>
        <p>Already have an account? <a class="loginLink" href="#">Login here</a>.</p>
    </form>

    <div class="importantNote">
        <p>Please <u>DO NOT</u> use any password you use elsewhere.</p> <p> While passwords are encrypted, validation and databases are being worked on.</p>
        <p>There is no password reset yet. Make as many accounts as you want</p>
    </div>
</div>
