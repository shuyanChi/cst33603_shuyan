<?php
    include '../../DBconnection.php';
    $dbConn = DBConnection("test_database");
?>  

<?php
$filterText = '';

// We only care about the filter if we are posting back
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $filterText = $_POST['filterText'];
}

// Compose the SQL statement
   $sql = "SELECT * FROM `device`";
   
    //"SELECT  ch.`charge_id`,

