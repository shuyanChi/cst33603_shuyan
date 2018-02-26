<?php
    include 'inc/action_page.php';
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Information Collection Website</title>
        <link  rel="stylesheet"  type="text/css" href="css/styles.css" >
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    </head>
     <style>
         @import url("css/styles.css");
        </style>
    <body>
        <p id = "center">
            <h1>&#128544;</h1>
            <h3>Please let us to have your information,
            your life will be more transparent and convenient. <br>
        </p>
        <div>
            <form action = "inc/action_page.php" method="post">
                Name: <input  type="text" name="name"> <br><br>
                Password: <input type = "password" name = "password"> <br><br>
                E-mail: <input type="text" name="email"><br>
                Website: <input type="text" name="website"><br>
                Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
                <input type="radio" name="gender" value="female">Female<br>
                <input type="radio" name="gender" value="male">Male<br>
                <input type="color" name="color" value="color">Color <br>
                <select name ="possession">
                    <option value="car">car</option>
                    <option value="house">house</option>
                    <option value="land">land</option>
                    <option value="nothing">nothing</option>
                </select>
                 <br>
                <input type="submit" value ="submit">
                </form>

        </div>
        
    </body>
</html>
