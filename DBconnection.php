<?php

/*function DBconnection($dbName) {
    $connParts = parse_url($url);
    $host = $connParts['host'];
    $dbname = ltrim($connParts['path'],'/');
    $username = $connParts['user'];
    $password = $connParts['pass'];
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn;
}*/

function DBconnection($dbName) {
    
    $connParts = parse_url($url);
    $host = $connParts['host'];
    $dbname = ltrim($connParts['path'],'/');
    $username = $connParts['user'];
    $password = $connParts['pass'];
    
    $connUrl = getenv('JAWSDB_MARIA_URL');
    $connUrl = "mysql://krgdv8ggvuz65p5h:v2a3lmzl8mtwaazf@d5x4ae6ze2og6sjo.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/d04jwzvbeu716rhb";
    $hasConnUrl = !empty($connUrl);
    
    $connParts = null;
    if ($hasConnUrl) {
        $connParts = parse_url($connUrl);
    }
    
    var_dump($hasConnUrl);
    $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
    $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'crime_tips';
    $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
    $password = $hasConnUrl ? $connParts['pass'] : '';
    
    $dbCon = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   
    return $dbConn;
    
    
    
}

?>
