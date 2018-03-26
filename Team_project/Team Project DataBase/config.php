<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306');
define('DB_USERNAME', 'f3rejht2pet6pru9');
define('DB_PASSWORD', 'h6b26i130adunwok');
define('DB_NAME', 'nqr68zfdvix5y7b7');
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if (false === $link) {
    die('ERROR: Could not connect. '.mysqli_connect_error());
}
