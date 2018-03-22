-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: movie
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `realisator` varchar(255) NOT NULL,
  `Actors` text NOT NULL,
  `Link` varchar(2048) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Oh Lucy!',2017,'Drama & Comedy','Atsuko Hirayanagi','Josh Hartnett, Kaho Minami, Shinobu Terajima','http://ohlucyfilm.com/'),(2,'Ready Player One',2018,'Action & Adventure, Science Fiction & Fantasy','Steven Spielberg','Tye Sheridan, Olivia Cooke, Ben Mendelsohn ','https://www.rottentomatoes.com/m/ready_player_one/'),(3,'Tomb Raider',2018,' Action & Fantasy','Roar Uthaug','Alicia Vikander, Daniel Wu, Walton Goggins','https://www.rottentomatoes.com/m/tomb_raider_2018/'),(4,'A Wrinkle in Time',2018,' science fiction & fantasy','Ava DuVernay','Oprah Winfrey, Reese Witherspoon, Chris Pine','https://www.commonsensemedia.org/movie-reviews/a-wrinkle-in-time'),(5,'Black Panther',2018,'Action & Fantasy','Ryan Coogler','Chadwick Boseman, Michael B. Jordan, Lupita Nyong\'o','http://marvel.com/movies/movie/224/black_panther'),(6,'pacific rim uprising',2018,'Fantasy & Science fiction ','Steven S. DeKnight','John Boyega, Jing Tian, Scott Eastwood','http://www.imdb.com/title/tt2557478/'),(7,'sherlock gnomes',2018,'Fantasy & Mystery ','John Stevenson','Johnny Depp, Emily Blunt, James McAvoy','http://www.imdb.com/title/tt2296777/'),(8,'love, simon',2018,'Drama & Romance','Greg Berlanti','Nick Robinson, Katherine Langford, Miles Heizer\r\n','https://www.rottentomatoes.com/m/love_simon/'),(9,'I Can Only Imagine',2018,'Drama & Family ',' Andrew Erwin, Jon Erwin','Dennis Quaid, Madeline Carroll, Priscilla Shirer','https://icanonlyimagine.com/'),(10,'The Strangers: Prey at Night',2018,'Horror','Johannes Roberts','Gemma Ward, Bailee Madison, Christina Hendricks','https://thestrangers2018.com/'),(11,'Peter Rabbit',2018,'Fantasy & Adventure','Will Gluck','Rose Byrne, James Corden, Daisy Ridley','http://www.peterrabbit-movie.com/'),(12,'Paul, Apostle of Christ',2018,'Drama & History',' Andrew Hyatt','Jim Caviezel, James Faulkner, James Faulkner','http://www.paulmovie.com/site/'),(13,'Game Night',2018,' Mystery/Crime','John Francis Daley, Jonathan M. Goldstein','Rachel McAdams, Jason Bateman, Kylie Bunbury','http://www.gamenight.movie/'),(14,'Red Sparrow',2018,'Thriller & film/Mystery ',' Francis Lawrence','Jennifer Lawrence, Joel Edgerton, Matthias Schoenaerts','https://www.foxmovies.com/movies/red-sparrow'),(15,'death wish',2018,'Drama & Crime ','Eli Roth','Bruce Willis, Vincent D\'Onofrio, Dean Norris','https://www.deathwish.movie/'),(16,'midnight sun',2018,'Drama & Teen film','Scott Speer','Bella Thorne, Patrick Schwarzenegger, Rob Riggle','http://midnightsunmov.com/'),(17,'unsane',2018,'Thriller film & Horror','Steven Soderbergh','Claire Foy, Juno Temple, Jay Pharoah','https://bleeckerstreetmedia.com/unsane'),(18,'entebbe',2018,'Drama & Thriller film','José Padilha','Rosamund Pike, Daniel Brühl, Eddie Marsan','https://www.rottentomatoes.com/m/7_days_in_entebbe/'),(19,'The Hurricane Heist',2018,'Thriller & Action ','Rob Cohen','Maggie Grace, Toby Kebbell, Ryan Kwanten','http://hurricaneheistmovie.com/'),(20,'Jumanji: Welcome to the Jungle',2017,'Fantasy & Action','Jake Kasdan','Dwayne Johnson, Karen Gillan, Kevin Hart','http://www.jumanjimovie.com/discanddigital/'),(21,'gringo',2018,'Drama & Crime film','Nash Edgerton','Charlize Theron, Joel Edgerton, David Oyelowo','https://www.gringo-movie.com/'),(22,'The Death of Stalin',2017,'Drama & Comedy-drama','Armando Iannucci','Steve Buscemi, Olga Kurylenko, Jeffrey Tambor','https://www.nytimes.com/2018/03/08/movies/the-death-of-stalin-armando-iannucci-steve-buscemi.html'),(23,'The Shape of Water',2017,'Drama & Fantasy ','Guillermo del Toro','Sally Hawkins, Doug Jones, Michael Shannon','https://www.rottentomatoes.com/m/the_shape_of_water_2017/'),(24,'Isle of Dogs',2018,'Drama & Fantasy','Wes Anderson','Scarlett Johansson, Edward Norton, Bill Murray','http://www.isleofdogsmovie.com/'),(25,'Thoroughbreds',2017,'Drama & Thriller','Cory Finley','Anya Taylor?Joy, Olivia Cooke, Anton Yelchin, Anton Yelchin','http://focusfeatures.com/thoroughbreds'),(26,'Three Billboards Outside Ebbing, Missouri',2017,'Drama & Crime film ','Martin McDonagh','Frances McDormand, Sam Rockwell, Woody Harrelson','http://www.imdb.com/title/tt5027774/'),(27,'A Fantastic Woman',2017,'Drama','Sebastián Lelio','Daniela Vega, Luis Gnecco, Francisco Reyes','www.imdb.com/title/tt5639354/'),(28,'Winchester',2018,'Thriller film & Fantasy ',' Michael Spierig, Peter Spierig','Helen Mirren, Jason Clarke, Sarah Snook','http://www.winchestermysteryhouse.com/'),(29,'I, Tonya',2017,' Drama & Sport','Craig Gillespie','Margot Robbie, Sebastian Stan, Allison Janney','https://www.itonyamovie.com/'),(30,'darkest hour',2017,'Drama & History','Joe Wright','Gary Oldman, Lily James, Kristin Scott Thomas','https://www.rottentomatoes.com/m/darkest_hour_2017/'),(31,'The Party',2017,'Drama & Comedy','Sally Potter','Emily Mortimer, Cillian Murphy, Kristin Scott Thomas','https://www.rottentomatoes.com/m/the_party_2018/'),(32,'Raid',2018,'Drama & Thriller','Raj Kumar Gupta','Ajay Devgan, Ileana D\'Cruz, Gayathri Iyer','http://www.imdb.com/title/tt7363076/'),(33,'La leyenda del Charro Negro',2018,'Action & Adventure','Alberto Rodriguez','Erick Elías, Eduardo España','http://www.imdb.com/title/tt6772418/'),(34,'call me by your name',2017,' Drama & Romance','Luca Guadagnino','Armie Hammer, Timothée Chalamet, Michael Stuhlbarg','http://sonyclassics.com/callmebyyourname/'),(35,'Loveless',2017,'Drama','Andrey Zvyagintsev','Maryana Spivak, Marina Vasilyeva, Alexey Rozin','http://sonyclassics.com/loveless/'),(36,'Leaning Into the Wind: Andy Goldsworthy',2017,'Documentary','Thomas Riedelsheimer','Andy Goldsworthy','http://www.leaningintothewind.com/'),(37,'Lady Bird',2017,'Drama & Comedy-drama','Greta Gerwig','Saoirse Ronan, Lucas Hedges, Timothée Chalamet','https://a24films.com/films/lady-bird'),(38,'Kirrak Party',2018,' Drama & Romance ','Sharan Koppisetty','Simran Pareenja, Nikhil Siddharth, Samyuktha Hegde','http://www.imdb.com/title/tt7756082/'),(39,'Hichki',2018,'Drama & Family','Siddharth Malhotra','Rani Mukerji, Supriya Pilgaonkar, Asif Basra, ','http://www.imdb.com/title/tt6588966/'),(40,'Sonu Ke Titu Ki Sweety',2018,' Drama & Romance','Luv Ranjan','Nushrat Bharucha, Kartik Aaryan, Sunny Nijar','http://www.imdb.com/title/tt7581902/'),(41,'Operation Red Sea',2018,'Drama & Thriller','Dante Lam','Huang Jingyu, Luxia Jiang, Jiang Du','https://www.rottentomatoes.com/m/operation_red_sea/'),(42,'Pirates 1.0',2018,'Thriller','Raj Madiraju',' Indraneil Sengupta, Abhishek, Zara Shah, Neeraj','https://www.youtube.com/watch?v=U7WfRQWORyk'),(43,'Padmaavat',2018,'Drama & Action','Sanjay Leela Bhansali','Deepika Padukone, Ranveer Singh, Shahid Kapoor','http://www.imdb.com/title/tt5935704/');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-22  2:36:15
