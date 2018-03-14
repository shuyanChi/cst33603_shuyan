<?php
    //card decks
    $clubs = array("1","2","3","4","5","6","7","8","9","10","11","12","13");
    $diamonds = array("1","2","3","4","5","6","7","8","9","10","11","12","13");
    $hearts = array("1","2","3","4","5","6","7","8","9","10","11","12","13");
    $spades = array("1","2","3","4","5","6","7","8","9","10","11","12","13");
    
    //main deck , contains all 4 card decks
    $main = array();
    array_push($main, $clubs,$diamonds,$hearts,$spades);
    //var_dump($main);
    
    
    //player decks - keep tracks of the state of the game 
    $player1 = array();
    $player2 = array();
    $player3 = array();
    $player4 = array();
    
    $numbs = array();
    $scores = array(0,0,0,0);
    
    
    function selectCard()
    {
        global $main;
        global $player1;
        global $player2;
        global $player3;
        global $player4;
        global $main;
        global $numbs;
        global $scores;

        for($i=0; $i<4;$i++)
        {
        
            
            if($i == 0)                                 //$i is the player number 
            {
                $random = rand(0,3);                    //select the deck
                $random2 = rand(0,12);                  //select the card 
                $value = "".$random."".$random2;         //cards are display like this 312 -> first digit is the deck, so 3 is the 3rd deck (spades), 12 is the 12th card (so the king, card number 13) so we have a king of hearts
            
               while(check_duplicates($value))             //check if the card has already been played, if it has, it loops until it finds a card that is available 
                {
                    $random = rand(0,3);
                    $random2 = rand(0,12);
                    $value = "".$random.$random2;
                }
                
                
                array_push($numbs,$value);
                $card = $main[$random][$random2];       //cards here is the reference to the card in the array -> call displayCard($card) 
                array_push($player1, $value);
                $scores[0] += intval($card);
                
            }
            
             else if($i == 1)
            {
                $random = rand(0,3);
                $random2 = rand(0,12);
                $value = "".$random.$random2;
               while(check_duplicates($value))
                {
                    $random = rand(0,3);
                    $random2 = rand(0,12);
                    $value = "".$random.$random2;
                }
                array_push($numbs,$value);
                $card = $main[$random][$random2];
                array_push($player2, $value);
                $scores[1] += intval($card);
                
            }
            
            else if($i == 2)
            {
                $random = rand(0,3);
                $random2 = rand(0,12);
                $value = "".$random.$random2;
                while(check_duplicates($value))
                {
                    $random = rand(0,3);
                    $random2 = rand(0,12);
                    $value = "".$random.$random2;
                }
                array_push($numbs,$value);
                $card = $main[$random][$random2];
                array_push($player3, $value);
                $scores[2] += intval($card);
            }
            
             else if($i == 3)
            {
                $random = rand(0,3);
                $random2 = rand(0,12);
                $value = "".$random.$random2;
               while(check_duplicates($value))
                {
                    $random = rand(0,3);
                    $random2 = rand(0,12);
                    $value = "".$random.$random2;
                }
                array_push($numbs,$value);
                $card = $main[$random][$random2];
                array_push($player4, $value);
                $scores[3] += intval($card);
            }
            
            
        }
        
        /*var_dump($player1);
        
        var_dump($player2);
        var_dump($player3);
        var_dump($player4);*/
        //var_dump($numbs);
        return $scores;
        
    }
    
    //check if a card has already been played 
    function check_duplicates($value) 
    {
        global $numbs;
        
        $l = count($numbs);
        for($i = 0 ; $i<$l ; $i++)
        {
            $tmp = $numbs[$i];
            if($tmp == $value)
                return true;
        }
        return false;
        
        
    }
    
    
    function displayCard($player)
    {
        $l = sizeof($player);
        for($i = 0 ; $i<$l ; $i++)
        {
            $card = $player[$i];
            $j = strlen($card);
            $deck = $card[0];
            $number;
            switch($deck)
                    {
                        case 0: $symbol = "clubs";
                                break;
                        case 1: $symbol = "diamonds";
                                break;
                        case 2: $symbol = "hearts";
                                break;
                        case 3: $symbol = "spades";
                                break;
                                
                    }
            if($j == 1)
            {
                $number = $card[1] + 1;
            }
            else
                $number = substr($card,1,2)+1;
            
                    
            echo "<img id='reel$pos' src ='cards/$symbol/$number.png' alt='$symbol' title='".ucfirst($symbol)."' width='70'/>";
            
        }
         
    }



    function check_winner($players)
    {
        global $scores;
        
        if($scores[0] == 42 )
        {
            $score = $scores[1] + $scores[2] + $scores[3];
            echo "Player 1 is the winner - score : $score";
        }
        else if($scores[1] == 42 )
        {
            $score = $scores[0] + $scores[2] + $scores[3];
            echo "Player 2 is the winner - score : $score";
        }
        else if($scores[2] == 42 )
        {
            $score = $scores[1] + $scores[0] + $scores[3];
            echo "Player 3 is the winner - score : $score";
        }
        else if($scores[3] == 42 )
        {
            $score = $scores[1] + $scores[2] + $scores[0];
            echo "Player 4 is the winner - score : $score";
        }
        else
        {
            $n1 = 42;
            $n2 = 42;
            $n3 = 42;
            $n4 = 42;
            if($scores[0] < 42 )
                $n1 = 42 - $scores[0];
            if($scores[1] < 42 )
                $n2 = 42 - $scores[1];
            if($scores[2] < 42 )
                $n3 = 42 - $scores[2];
            if($scores[3] < 42 )
                $n4 = 42 - $scores[3];
            
            if($n1 < $n2 and $n1 < $n3 and $n1<$n4)
            {
                $score = $scores[1] + $scores[2] + $scores[3];
                echo "Player 1 is the winner - score : $score";
            }
            if($n2 < $n1 and $n2 < $n3 and $n2<$n4)
            {
                $score = $scores[0] + $scores[2] + $scores[3];
                echo "Player 2 is the winner - score : $score";
            }
            if($n3 < $n2 and $n3 < $n1 and $n3<$n4)
            {
                $score = $scores[1] + $scores[0] + $scores[3];
                echo "Player 3 is the winner - score : $score";
            }
            if($n4 < $n2 and $n4 < $n3 and $n4<$n1)
            {
                $score = $scores[1] + $scores[2] + $scores[0];
                echo "Player 4 is the winner - score : $score";
            }
        }
        
    }
    
    function select_player()
    {
        $players = array("Benedict Saladino", "Shirleen Sagers", "Michale Gerry", "Esteban Foster","Antonina Auston", "Janis Rossin");
        $playerGame = array();
        $random = rand(0,6);                    
        $random2 = rand(0,5);
        for($i = 0; $i<6;$i++)
        {
            if($i != $random and $i != $random2 )
            {
                array_push($playerGame, $players[$i] );
            }
        }
        return $playerGame;
        
    }
  
    
    function play()
    {
        global $player1;
        global $player2;
        global $player3;
        global $player4;
        global $numbs;
        
        $players = select_player();
        
        $score = array(0,0,0,0);
        //we need to loop as long as there is no winer 
       while($score[0] < 42 and $score[1] < 42 and $score[2] < 42 and $score[3] < 42)
       {
            $score = selectCard();
            
        }


        ?>
        <!DOCTYPE html>
            <html>
                <head>
                    <link rel="stylesheet" href="style.css" type="text/css">
                </head>
                
                <game class = "game">
                        <p>SilverJack</p>
                    
                </game>
                
                <div1 class = "div1">
                    
                    <?php
                        echo "$players[0] ";
                        //echo "<img id='reel$pos' src ='cards/$symbol/$number.png' alt='$symbol' title='".ucfirst($symbol)."' width='70'/>";
                        displayCard($player1);
                        echo " score : $score[0] pts";
                    
                    ?>
                    <br>
                </div1>
                
                <div1 class = "div1">
                    <?php
                        echo "$players[1] ";
                        displayCard($player2);
                        echo " score : $score[1] pts";
                    ?>
                    <br>
                </div1>
                <div1 class = "div1">
                    <?php
                        echo "$players[2] ";
                        displayCard($player3);
                        echo " score : $score[2] pts";
                    
                    ?>
                    <br>
                </div1>
                
                <div1 class = "div1">
                    <?php
                        echo "$players[3] ";
                        displayCard($player4);
                        echo " score : $score[3] pts";
                    ?>
                    <br>
                </div1>
                
                <div2 class = "div2">
                    <br>
                    <?php
            
                        check_winner($players);
                   ?>

                </div2>
            </html>
            
            
    <?php        
        
    }

  
?>

