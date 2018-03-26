<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location: login.php');
    exit;
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title style="color:white">Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        
        <h1 style="color:white">Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to MoviesDB.</h1>
        <h2 style="color:white">Review movies <a href="movies.php">Movies</a></h2>
        
        <br>
        <br>
        <br>
        <h1>Your Basket</h1>
        
        <?php

include 'DBConnection.php';

function db_query($query)
{
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection, $query);

    return $result;
}

// A select query. $result will be a `mysqli_result` object if successful
$sessionUser = htmlspecialchars($_SESSION['username']);
$query = db_query('SELECT * from users');
$queryB = db_query('SELECT basketId FROM Basket ');
/*
$order = $_GET['order'];
$filter = $_GET['filter'];
$typeN = $_GET['dName'];
$typeT = $_GET['dType'];
$typeS = $_GET['dStatus'];
*/
//var_dump($typeN);

/*
$sql = 'SELECT *
        FROM sales';

$query = mysqli_query($conn, $sql);*/
$basketId = '';
if (!$query) {
    die('SQL Error: '.mysqli_error($conn));
} else {
    while ($res = mysqli_fetch_array($query) and '' == $basketId) {
        if ($sessionUser == $res['username']) {
            $basketId = $res['basketId'];
        }
    }
}
echo $basketId;
?>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<link rel="stylesheet" type="text/css" href="cssRules.css">
</head>
<body style="background-color:#001f3f;">
    
	<h1 style="color:white;">Movies in your shopping cart</h1>
	<table class="data-table">
		<caption class="title">List items details</caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>TITLE</th>
				<th>YEAR</th>
				<th>GENRE</th>
				<th>REALISATOR</th>
				<th>ACTORS</th>
				<th>More Info</th>
			</tr>
		</thead>
		<tbody>
		
			
		<?php


                $sql = db_query("SELECT * FROM Basket WHERE basketID='$basketId'");

                $row1 = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                $movies = $row1['movies'];
                $l = strlen($movies);

                $array = array();
                $str = '';
                $n = 0;
                for ($i = 0; $i < $l; ++$i) {
                    $tmp = substr($movies, $i, 1);

                    //echo $tmp;
                    if ('-' == $tmp) {
                        array_push($array, $str);
                        $str = '';
                        $n += 1;
                    }
                    if ('-' != $tmp) {
                        $str = $str.$tmp;
                    }
                }

                $no = 1;
                $total = 0;

                $x = 0;
                while ($x < $n) {
                    $film = $array[$x];

                    $sql = db_query("SELECT * FROM movies WHERE title='$film'");

                    $no = 1;
                    $total = 0;
                    while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                        $amount = 0 == $row['number'] ? '' : number_format($row['number']);
                        $link = $row['Link'];

                        echo '<tr>
			    		
						    <td>'.$no.'</td>
						    <td>'.$row['title'].'</td>
						    <td>'.$row['year'].'</td>
						    <td>'.$row['genre'].'</td>
						    <td>'.$row['realisator'].'</td>
						    <td>'.$row['Actors'].'</td>
						    <td>'; ?><a href="<?php echo $link; ?>">Wiki</a><?php '</td>
						    
						    </tr>';

                        $x += 1;
                        $no = $x + 1;
                        $total += 1;
                    }
                }

        ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="6">TOTAL</th>
				<th><?=number_format($total); ?></th>
			</tr>
		</tfoot>
	</table>

        
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>