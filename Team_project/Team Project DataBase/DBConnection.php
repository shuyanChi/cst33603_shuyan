<?php

function db_connect()
{
    // Define connection as a static variable, to avoid connecting more than once
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if (!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
        //$config = parse_ini_file('config.ini');
        $host = 'gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306';
        $dbname = 'nqr68zfdvix5y7b7';
        $username = 'f3rejht2pet6pru9';
        $password = 'h6b26i130adunwok';
        $connection = mysqli_connect($host, $username, $password, $dbname);
    }

    // If connection was not successful, handle the error
    if (false === $connection) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }

    return $connection;
}
