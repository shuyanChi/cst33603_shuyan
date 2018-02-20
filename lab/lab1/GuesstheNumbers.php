<!DOCTYPE html>
<html>
    <head>
        <title>Guess the Numbers</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
           <nav>
            <hr width = "50%"/>
            <a href = "index.php">Home</a>
            <a href = "about.html">About</a>
            <a href = "contact.html">Contact</a>
            <a href ="GuesstheNumbers.php"> guess number</a>
        </nav>
        <blockquote>
        <h1> Guess the Numbers </h1>
        <h3> Guess two numbers between 1 and 10!</h3>
        <form>
            
            Number 1: <input type="text" name="number1"/>
            <br />
            Number 2: <input type="text" name="number2" />
            <br /><br />
            <input type="submit" value="Guess Numbers" name="guessForm"/>
            <br /><br />
             <input type="submit" value="Give Up" name="giveUp"/>
             <input type="submit" value="Reset" name="reset"/>
            
        </form>
                </blockquote>
    </body>
</html>
