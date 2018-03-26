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
    
    // initially displayed, ordered by name
    if(isset($_POST['order'])) {
        $order = $_POST['order'];
    }
    else {
        $order = 'deviceName'; //default
    }
    if(isset($_POST['sort'])) {
        $sort = $_POST['sort'];
    }
    else {
        $sort = 'ASC'; //default
    }
    
    // Compose the SQL statement
    $sql = "SELECT * FROM `device` ORDER BY $order $sort";
   
    // Prepare the statement
    $stmt = $dbConn->prepare($sql);
    // Execute the statement, passing in array of parameters
    $stmt->execute(array(':filterText' => $filterText));
   
?>

<html>
    <head>
        <title>Tech Checkout</title>
    </head>
    <body>
      <form action="index.php" method="POST">
        <div class="input-group filter-area">
            <input type="text" name="filterText" class="form-control"
            aria-label="Text input with segmented dropdown button"
            value="<?php echo $filterText; ?>" 
            >
        <div class="input-group-append"> 
             <input type="submit" value="Filter" class="btn btn-outline-secondary">
        </div>
        </div>
      </form>
     
<?php

    if($stmt-> rowCount() > 0) {
        $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';  
        echo"
        <table width='600' border='1' cellpadding='1' cellspacing='1'> 
        <tr>
        <th>deviceId</th>
        <th><a href = '?order = deviceName && sort = $sort'>deviceName</a></th>
        <th>deviceType</th>
        <th><a href = '?order = price && sort = $sort'>price</a></th>
        <th>status</th>
        </tr>
        
        ";

        while($devices = $stmt->fetch()) {
            $deviceId = $devices['deviceId'];
            $deviceName = $devices['deviceName'];
            $deviceType = $devices['deviceType'];
            $price = $devices['price'];
            $status = $devices['status'];
            echo "
            <tr>
            <td>$deviceId</td>
            <td>$deviceName</td>
            <td>$deviceType</td>>
            <td>$price</td>
            <td>$status</td>
            </tr>
            ";
        }
    }
    else {
        echo "<tr>";
        echo "<td>". "Nothing found!" . "</td>";
        echo "</tr>";
    }
    echo "
    </table>
    ";

?>

    </body>
</html>

