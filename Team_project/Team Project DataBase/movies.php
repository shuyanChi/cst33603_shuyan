
<?php

// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('location: login.php');
    exit;
}

function get_basket()
{
    $username = $_SESSION['username'];
    $query = db_query('SELECT * from users');
    while ($res = mysqli_fetch_array($query) and '' == $basketId) {
        if ($username == $res['username']) {
            return $res['basketId'];
        }
    }
}

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
$query = db_query('SELECT * FROM movies');
$basketId = get_basket();

$filter = $_GET['filter'];
$type = $_GET['type'];
$movieT = $_GET['mTitle'];
$movieG = $_GET['mGenre'];
$movieY = $_GET['mYear'];
$items = $_GET['cart'];

/*
$sql = 'SELECT *
        FROM sales';

$query = mysqli_query($conn, $sql);*/

if (!$query) {
    die('SQL Error: '.mysqli_error($conn));
}

function add_to_cart($item)
{
    $basketId = get_basket();
    $query = db_query('SELECT * FROM Basket');

    while ($res = mysqli_fetch_array($query)) {
        if ($basketId == $res['basketID']) {
            $movies = $res['movies'].$item.'-';
            echo $movies;
            /*$queryInsert = db_query("INSERT INTO  (`number`, `basketID`, `movies`) VALUES
            			(NULL,'$basketId','$movies')");*/
            $queryInsert = db_query("UPDATE Basket
									SET movies = '$movies'
									WHERE basketID = '$basketId';");
            var_dump($queryInsert);
        }
    }
}

if (null != $items) {
    add_to_cart($items);
}

?>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<link rel="stylesheet" type="text/css" href="cssRules.css">
</head>
<body style="background-color:#001f3f;">
    <h2 style="color:white">Get Back <a href="main.php">Back</a></h2>
	<h1 style="color:white">Movies Table</h1>
	<table class="data-table" >
		<caption class="title" style="color:white">List items details</caption>
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
			<div style="background-color:powderblue; margin:30px;" >
			<form  method="get ">
				
				
				
				<p>Sort By</p> 
				
            	<input type="radio" name="filter" value="name asc"> Name asc
            	<input type="radio" name="filter" value="name desc"> Name desc
            	<input type="radio" name="filter" value="year asc" > Year asc
            	<input type="radio" name="filter" value="year desc" > Year desc<br>
           		
           		<input type="submit">
           		<br>
           		<br>
           		Filter By (select the type of filter then search by Title, Genre or Year)
					<div>
					    
            	        <input type="radio" name="type" value="title"> Title
            	        <input type="radio" name="type" value="genre" > Genre
            	        <input type="radio" name="type" value="year" > Year<br>
           		
					    
					<br>
						
					    Film Title<br>
            			<input type="text" name="mTitle"  autocomplete="off">
              			<input type="submit">
				
						<br>
						Genre<br>
            			<select name="mGenre">
            			    
        	  				<option value="">all</option>
              				<option value="Action ">Action</option>
              				<option value="Adventure">Adventure</option>
              				<option value="Action & Adventure">Action & Adventure</option>
              				<option value="Action & Fantasy">Action & Fantasy</option>
              				<option value="Horror">Horror</option>
              				<option value="Drama & Romance">Drama & Romance</option>
              				<option value="Drama & Comedy">Drama & Comedy</option>
              				<option value="Drama & Crime film">Drama & Crime film</option>
              				<option value="science fiction & fantasy">science fiction & fantasy</option>
              				<option value="Fantasy & Mystery">Fantasy & Mystery</option>
              				<option value="Drama & Romance">Drama & Romance</option>
              				<option value="Drama & Family">Drama & Family</option>
              				<option value="Fantasy & Adventure">Fantasy & Adventure</option>
              				<option value="Drama & History">Drama & History</option>
              				<option value="Drama & Crime">Drama & Crime</option>
              				<option value="Drama & Thriller">Drama & Thriller</option>
              				<option value="Thriller & Action">Thriller & Action</option>
              				
              				
              				
              			<input type="submit">
				
						<br>
						Year<br>
            			<select name="mYear">
        	  				<option value="">all</option>
              				<option value="2018">2018</option>
              				<option value="2017">2017</option>
              				<option value="2016">2016</option>
              				<option value="2015">2015</option>
              				<option value="2014">2014</option>
              				<option value="2013">2013</option>
              			
              			<input type="submit">
				
					</div>
        		</div>
              
            </select>
            
  
      
	</form>
	
			
		<?php

            if (null == $type and null == $filter) {
                $sql = db_query('SELECT * FROM movies');

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
						<td>'; ?>
			    			<form  method="get">
  									<input type="checkbox" name="cart" value="<?php echo $row['title']; ?>">
  								<input type="submit" value="Add To Cart">
							</form>
			    		<?php '</td>
						</tr>';

                    $total += 1;
                    ++$no;
                }
            } elseif ('name asc' == $filter) {
                $sql = db_query('SELECT * FROM movies ORDER BY title');

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
						<td>'; ?>
			    			<form  method="get">
  									<input type="checkbox" name="cart" value="<?php echo $row['title']; ?>">
  								<input type="submit" value="Add To Cart">
							</form>
			    		<?php '</td>
						</tr>';

                    $total += 1;
                    ++$no;
                }
            } elseif ('name desc' == $filter) {
                $sql = db_query('SELECT * FROM movies ORDER BY title DESC');

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
						<td>'; ?>
			    			<form  method="get">
  									<input type="checkbox" name="cart" value="<?php echo $row['title']; ?>">
  								<input type="submit" value="Add To Cart">
							</form>
			    		<?php '</td>
						</tr>';

                    $total += 1;
                    ++$no;
                }
            } elseif ('year asc' == $filter) {
                $sql = db_query('SELECT * FROM movies ORDER BY year');

                $no = 1;
                $total = 0;
                while ($row = mysqli_fetch_array($sql)) {
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
						<td>'; ?>
			    			<form  method="get">
  									<input type="checkbox" name="cart" value="<?php echo $row['title']; ?>">
  								<input type="submit" value="Add To Cart">
							</form>
			    		<?php '</td>
						</tr>';

                    $total += 1;
                    ++$no;
                }
            } elseif ('year desc' == $filter) {
                $sql = db_query('SELECT * FROM movies ORDER BY year desc');

                $no = 1;
                $total = 0;
                while ($row = mysqli_fetch_array($sql)) {
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
						<td>'; ?>
			    			<form  method="get">
  									<input type="checkbox" name="cart" value="<?php echo $row['title']; ?>">
  								<input type="submit" value="Add To Cart">
							</form>
			    		<?php '</td>
						</tr>';

                    $total += 1;
                    ++$no;
                }
            } elseif (null == $filter and 'title' == $type) {
                $sql = db_query("SELECT * FROM movies WHERE title='$movieT'");
                var_dump($sql);
                $no = 1;
                $total = 0;
                while ($row = mysqli_fetch_array($sql)) {
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
                        <td>'; ?>
                            <form  method="get">
                                    <input type="checkbox" name="cart" value="<?php echo $row['title']; ?>">
                                <input type="submit" value="Add To Cart">
                            </form>
                        <?php '</td>
                        </tr>';

                    $total += 1;
                    ++$no;
                }
            } elseif (null == $filter and 'genre' == $type) {
                $sql = db_query("SELECT * FROM movies WHERE genre ='$movieG'");

                $no = 1;
                $total = 0;
                while ($row = mysqli_fetch_array($sql)) {
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
                        <td>'; ?>
                            <form  method="get">
                                    <input type="checkbox" name="cart" value="<?php echo $row['title']; ?>">
                                <input type="submit" value="Add To Cart">
                            </form>
                        <?php '</td>
                        </tr>';

                    $total += 1;
                    ++$no;
                }
            } elseif (null == $filter and 'year' == $type) {
                $sql = db_query("SELECT * FROM movies WHERE year ='$movieY'");

                $no = 1;
                $total = 0;
                while ($row = mysqli_fetch_array($sql)) {
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
                        <td>'; ?>
                            <form  method="get">
                                    <input type="checkbox" name="cart" value="<?php echo $row['title']; ?>">
                                <input type="submit" value="Add To Cart">
                            </form>
                        <?php '</td>
                        </tr>';

                    $total += 1;
                    ++$no;
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
</body>
</html>