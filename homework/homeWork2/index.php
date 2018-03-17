<?php
    include 'inc/action_page.php';
?>

<html>
    <head>
        <title>Information Collection Website</title>
        <link  rel="stylesheet"  type="text/css" href="css/styles.css" >
    </head>
    <body>
    <style>
         @import url("css/styles.css");
    </style>
    <body>
     <p id = "center">
        <h1>&#128544;</h1>
        <h3>Please let us to have your information,
        your life will be more transparent and convenient. <br>
    </p>
    <h2> Please Fill Out This Form</h2>
        <form method = "post" action = "<?php echo htmlspecialchars($S_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name">
        <br><br>
        Password: <input type = "password" name ="password">
        <br><br>
        password_again: <input type ="password" name ="password_again">
        <br><br>
        E-mail: <input type="text" name="email">
        <br><br>
        Website:<input type="text" name="website">
        <br><br>
       
        Comment: <textarea name="comment" rows="5" cols="40"> </textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female"> Female 
        <input type ="radio" name="gender" value = "male"> Male
        <br><br>
         Color you Like:<input type="color" name="color" value="color">Color 
         <br><br>
        <input type="submit" name="submit" value="Submit">
        </form>
        
    </body>
</html>