<?php
   include 'config.php';
   include 'DBConnection.php';

function db_query($query)
{
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection, $query);

    return $result;
}

function check($userName, $pass, $result)
{
    while ($res = mysqli_fetch_array($result)) {
        if ($userName == $res['username'] && $pass == $res['password']) {
            return true;
        }
    }

    return false;
}

function addUser($user, $pass)
{
    if ($nameErr == $passErr and $passErr == $emailErr and '' == $nameErr) {
        $Date = getdate();
        $basketId = md5(uniqid(rand(), true));
        echo $basketId;
        $query = "INSERT INTO `users` (`number`, `username`, `password`, `basketId`, `Date`) VALUES
	    (NULL,'$user','$pass','$basketId','$Date')";

        $result = db_query($query);
        $query2 = "INSERT INTO `Basket` (`number`, `basketID`, `movies`) VALUES
	    (NULL,'$basketId','')";
        $result2 = db_query($query2);

        var_dump($result2);
        if (!empty($result2)) {
            header('location: main.php');
        } else {
            $error_message = 'Problem in registration. Try Again!';
        }
    }
}

   session_start();

   if ('POST' == $_SERVER['REQUEST_METHOD']) {
       // username and password sent from form
       $db = $link;
       $myusername = mysqli_real_escape_string($db, $_POST['username']);
       $mypassword = mysqli_real_escape_string($db, $_POST['password']);

       $sql = 'SELECT username, password FROM users';
       $result = db_query($sql);
       $check = check($myusername, $mypassword, $result);
       if (!check($myusername, $mypassword, $result)) {
           addUser($myusername, $mypassword);
           header('location: main.php');
       } else {
           echo 'It seems that you already have an account'; ?>
           <h2>Already have an Account <a href="login.php">login</a></h2>
           <?php
       }

       //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       //$active = $row['active'];
       $count = mysqli_num_rows($result);
   }
?>
<html>
   
   <head>
      <title>Register Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><br><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><br><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
                  <h2>Already have an Account <a href="login.php">login</a></h2>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>





