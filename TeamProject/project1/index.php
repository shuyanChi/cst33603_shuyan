<?php
    include '../../DBconnection.php';
    $dbConn = DBConnection("movie");
?>  

<?php
$filterText = '';

// We only care about the filter if we are posting back
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $filterText = $_POST['filterText'];
}
$totalRows = $dbConn->query("SELECT COUNT(*) FROM movies")->fetchColumn();
echo  $totalRows . "<br><br>";