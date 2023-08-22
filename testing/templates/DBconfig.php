<?php


// LIVE Details
define('DB_SERVER', 'sql212.infinityfree.com');
define('DB_USERNAME', 'if0_34709976');
define('DB_PASSWORD', 'zs9Q8FIOu57');
define('DB_NAME', 'if0_34709976_focus_board');

// LOCAL Details
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'focus_board');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>


