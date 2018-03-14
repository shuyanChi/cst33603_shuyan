<?php
    session_start();

    class Card {
        /**
         * Type of the card.
         *      0 => clubs
         *      1 => diamonds
         *      2 => hearts
         *      3 => spades
         * @var integer
         */
        public $type;

        /**
         * Value of the card, ranges from 1 to 13.
         * @var integer
         */
        public $val;

        public function __construct($type, $val) {
            $this->type = $type;
            $this->val = $val;
        }

        private function display() {
            if ($this->val == 1) return "A";
            if ($this->val <= 10) return $this->val;
            if ($this->val == 11) return "J";
            if ($this->val == 12) return "Q";
            return "K";
        }

        public function render($active=FALSE) {
            echo("<div class=\"card");
            if ($active) echo(" active");
            echo("\"><div class=\"type-".$this->type."\"></div>");
            echo($this->display()."</div>");
        }
    }

    class Deck {
        /**
         * An array of cards (52 different cards at most).
         * @var array(Card)
         */
        private $deck;

        public function __construct() {
            $this->init();
        }

        /**
          * Reset the deck.
          */
        public function init() {
            $this->deck = array();
            for ($type = 0; $type < 4; $type++) {
                for ($val = 1; $val <= 13; $val++) {
                    array_push($this->deck, new Card($type, $val));
                }
            }
        }

        /**
          * Draw a card from the deck
          * @return Card
          */
        public function draw() {
            if (count($this->deck) == 0) return NULL;
            $index = rand(0, count($this->deck) - 1);
            $card = $this->deck[$index];
            array_splice($this->deck, $index, 1);
            return $card;
        }
    }

    class Player {
        /**
         * The hand of a player. An array of cards.
         * @var array(Card)
         */
        private $hand;

        /**
         * The current score of a player.
         * @var integer
         */
        private $score;

        /**
         * The display name of a player.
         * @var string
         */
        private $name;

        /**
         * The profile image of a player.
         * @var string
         */
        private $img;

        public function __construct($name, $img) {
            $this->name = $name;
            $this->img = $img;
            $this->init();
        }

        /**
          * Reset the player.
          */
        public function init() {
            $this->hand = array();
            $this->score = 0;
        }
        
        /**
          * Render the cards.
          * @param boolean $current Indicates if this is the current player.
          */
        public function render($id, $current=FALSE) {
            $className = "player player-".$id;
            if ($this->score > 42) $className .= " lost";
            echo("<div class=\"".$className."\">");
            echo("<img src=\"".$this->img."\" alt=\"".$this->name."\">");
            echo("<div class=\"player-name\">".$this->name."</div>");
            $n = count($this->hand);
            for ($i = 0; $i < $n - 1; $i++) {
                $this->hand[$i]->render();
            }
            if ($current && $n != 0) $this->hand[$n - 1]->render(TRUE);
            else if ($n != 0) $this->hand[$n - 1]->render(FALSE);
            echo("<div class=\"player-score\">".$this->score."</div>");
            echo("</div>");
        }

        /**
          * Draw a new card and add it into a player's hand.
          * @param Card $card The card the player drew.
          */
        public function draw($card) {
            array_push($this->hand, $card);
            $this->score += $card->val;
        }

        public function get_score() {
            return $this->score;
        }
    }

    function init() {
        $_SESSION["winner"] = -1;
        $_SESSION["round"] = 0;
        $_SESSION["deck"] =  new Deck();
        $names = array(
            "Brooklyn Rasmussen",
            "Alexia Palmer",
            "Callum Moyer",
            "Lincoln Reed", 
            "Lawrence Ramos", 
            "Charlie Russo", 
            "Teagan Kerr", 
            "Tony Jordan", 
            "Evie Nixon", 
            "Kayla Hodges"
        );
        $imgs = array(
"https://www.nationalgeographic.com/content/dam/animals/thumbs/rights-exempt/mammals/d/domestic-dog_thumb.jpg",
"http://4.bp.blogspot.com/-r6eP2VXMVrg/UFdF6phaqlI/AAAAAAAAAhk/LZtmq9VBoCs/s1600/cutedog.jpg",
"http://www.cahs-pets.org/PTMSCMS/lib/locLayout/site/host/styles/graphics/chloe.png",
"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSfDNTfyY5cGfZ2z6bEzoTZjzRwIoatnUdCeR2Ifgxl9vEBzSF",
"https://lh3.ggpht.com/MKYHEIldGM3H7L1gFbh98mutOy1r4gpsXFeiEeJd038cXX7dg5GcO-tAX_hfyCVrVGFy=h900",
"http://cdn.playbuzz.com/cdn/605450ca-bc8e-4ba6-9255-b82728b81a1b/eab7274b-003e-4c6f-a53c-f3646378e396.png",
"https://www.nationalgeographic.com/content/dam/animals/thumbs/rights-exempt/mammals/a/african-wild-dog_thumb.ngsversion.1474903823508.adapt.1900.1.JPG",
"https://img.buzzfeed.com/buzzfeed-static/static/2017-08/9/11/enhanced/buzzfeed-prod-fastlane-02/enhanced-1731-1502293831-8.jpg?downsize=715:*&output-format=auto&output-quality=auto",
"https://i.pinimg.com/736x/02/d7/01/02d701b77a984a1b6cf970e6eb0468e1--teacup-maltipoo-maltipoo-puppies.jpg",
"http://cdn.iflscience.com/images/89e93637-adbb-507c-bc8b-d94a1f3eec13/content-1508417557-shutterstock-519101614.jpg"
);
        $_SESSION["players"] = array();
        for ($i = 0; $i < 4; $i++) {
            $index = rand(0, count($names) - 1);
            array_push($_SESSION["players"], new Player($names[$index], $imgs[$index]));
            array_splice($names, $index, 1);
            array_splice($imgs, $index, 1);
        }
    }

    function get_turn() {
        return $_SESSION["round"] % 4;
    }

    function next_turn() {
        $round = &$_SESSION["round"];
        $round++;
        $count = 0;
        $players = &$_SESSION["players"];
        $winner = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($players[$i]->get_score() > 42) $count++;
            else $winner = $i;
        }
        if ($count == 3) {
            $_SESSION["winner"] = $winner;
            return;
        }
        while ($players[$round % 4]->get_score() > 42) {
            $round++;
        }
    }

    function play() {
        if ($_SESSION["winner"] >= 0) {
            return;
        }
        $deck = &$_SESSION["deck"];
        $players = &$_SESSION["players"];
        $card = $deck->draw();
        $card->render(TRUE);
        $_SESSION["cur"] = get_turn();
        $players[$_SESSION["cur"]]->draw($card);
        next_turn();
    }

    function render() {
        $players = &$_SESSION["players"];
        for ($i = 0; $i < 4; $i++) {
            if ($_SESSION["cur"] == $i) $players[$i]->render($i + 1, TRUE);
            else $players[$i]->render($i + 1);
        }
        if ($_SESSION["winner"] >= 0) {
            $winner = "Player ".($_SESSION["winner"] + 1)." wins ";
            $total = 0;
            for ($i = 0; $i < 4; $i++) {
                if ($i != $_SESSION["winner"]) $total += $players[$i]->get_score();
            }
            $winner .= $total." points!!";
            echo("<div class=\"msg-win\">".$winner."</div>");
        }
    }
?>
