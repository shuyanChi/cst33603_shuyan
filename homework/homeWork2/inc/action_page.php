<?php
        $name = $email = $gender = $color = $comment = $website = $password = $password_again ="";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $website = test_input($_POST["website"]);
            $color = test_input($_POST["color"]);
            $comment = test_input($_POST["comment"]);
            $gender = test_input($_POST["gender"]);
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed"; 
            echo "$nameErr";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
            echo "$emailErr";
        }
        elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
          $websiteErr = "Invalid URL"; 
          echo "$websiteErr";
        }
        elseif($password != $password_again) {
            echo "Your passwords do not match!";
        }
        elseif(strlen($password) > 10) {
            echo "Your password is too long!";
        } 
        elseif(strlen($comment) > 120) {
            echo "Your comment is too long!";
        }
        else{
            echo "<h2> See Your  Input: </h2>";
            echo "your name: " . $name;
            echo "<br>";
            echo "Your email: " . $email;
            echo "<br>";
            echo "Your website: " . $website;
            echo "<br>";
            echo "Your hex value of color: " . $color;
            echo "<br>";
            echo "Your comment: " . $comment;
            echo "<br>";
            echo "Your gender: " . $gender;
        }
    
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>


