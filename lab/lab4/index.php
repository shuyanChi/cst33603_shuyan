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
       
    //$sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';  
    //$records = mysql_query($sql);
   
    //"SELECT  ch.`charge_id`,
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
           <!--Filter Section-->
      <form action="index.php" method="POST">
      <div class="input-group filter-area">
        <input type = "text" name = "deviceName">
        <input type = "text" name = "price">
        <input type="text" name="filterText" class="form-control"
        aria-label="Text input with segmented dropdown button"
        value="<?php echo $filterText; ?>"
        >
        <div class="input-group-append">
          <input type="submit" value="Filter" class="btn btn-outline-secondary">
        </div>
      </div>
      </form>
      
    <table width="600" border="1" cellpadding="1" cellspacing="1"> 
        <tr>
        <td>deviceId</td>
        <td><a href = '?order = deviceName && sort = $sort'>deviceName</a></td>
        <td>deviceType</td>
        <td><a href = '?order = price && sort = $sort'>price</a></td>
        <td>status</td>
        </tr> 
        <?php
            
            if($stmt-> rowCount() > 0) {
             if($sort == 'DESC') {
                 $sort = 'ASC';
             }
             else {
                 $sort = 'DESC';
             }
            // $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';    
                while($devices = $stmt->fetch()) {
                    
                    echo "<tr>";
                    echo "<td>". $devices['deviceId']."</td>";
                    ksort($devices['deviceName']);
                    echo "<td>".$devices['deviceName']."</td>";
                    echo "<td>". $devices['deviceType']."</td>";
                    echo "<td>". $devices['price']."</td>";
                    echo "<td>". $devices['status']."</td>";
                    echo "</tr>";
                }
            }
            else {
                echo "<tr>";
                echo "<td>". "Nothing found!" . "</td>";
                echo "</tr>";
            }
           
        ?>
    
    </table>
    

    </body>
</html>

