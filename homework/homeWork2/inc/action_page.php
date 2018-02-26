<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

<?php
session_start();
// define variables and set to empty values
$name = $email = $gender= $password= $comment = $website = $color= $possession ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $password = test_input($_POST["password"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
  $color = test_input($_POST["color"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
if(!empty($_POST['name'] && $_POST['password' ] && $_POST['email'] && $_POST['website'] && $_POST['comment'] && $_POST['gender'])){
    echo "<h2>Info:</h2>";
    echo "Your name is: " . $name;
    echo "<br>";
    echo "Your password is: " . $password;
    echo"<br>";
    echo "Your email is: " . $email;
    echo "<br>";
    echo "Your website is: " . $website;
    echo "<br>";
    echo "Your comment is: " . $comment;
    echo "<br>";
    echo "Your gender is: " . $gender;
    echo "<br>";
    echo "This hex is the color you like: " .$color;
    echo "<br>";
}
if(empty($_POST['name'] && $_POST['password' ] && $_POST['email'] && $_POST['website'] && $_POST['comment'] && $_POST['gender'])){
  echo "can't leave any field blank!";
}

?>

<?php 
echo "You have: " . $_POST["possession"]; 
?><br>


