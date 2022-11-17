-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: team06
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audience_num_by_day`
--

DROP TABLE IF EXISTS `audience_num_by_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audience_num_by_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(5) NOT NULL,
  `audience_num` bigint(20) NOT NULL,
  `nation` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `audience_num_by_day_nation` (`nation`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audience_num_by_day`
--

LOCK TABLES `audience_num_by_day` WRITE;
/*!40000 ALTER TABLE `audience_num_by_day` DISABLE KEYS */;
INSERT INTO `audience_num_by_day` VALUES (1,'Mon',6328066,'한국'),(2,'Tue',4228422,'한국'),(3,'Wed',6976255,'한국'),(4,'Thu',5219010,'한국'),(5,'Fri',6608012,'한국'),(6,'Sat',12456150,'한국'),(7,'Sun',12240421,'한국'),(8,'Mon',3353774,'외국'),(9,'Tue',2818395,'외국'),(10,'Wed',5555519,'외국'),(11,'Thu',4384627,'외국'),(12,'Fri',4496102,'외국'),(13,'Sat',9397014,'외국'),(14,'Sun',8439638,'외국');
/*!40000 ALTER TABLE `audience_num_by_day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audience_range`
--

DROP TABLE IF EXISTS `audience_range`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audience_range` (
  `range_id` int(11) NOT NULL AUTO_INCREMENT,
  `audience_range` varchar(50) NOT NULL,
  PRIMARY KEY (`range_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audience_range`
--

LOCK TABLES `audience_range` WRITE;
/*!40000 ALTER TABLE `audience_range` DISABLE KEYS */;
INSERT INTO `audience_range` VALUES (1,'over 10 million'),(2,'5 million ~ 10 million'),(3,'1 million ~ 5 million'),(4,'under 1 million');
/*!40000 ALTER TABLE `audience_range` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audience_range_comment`
--

DROP TABLE IF EXISTS `audience_range_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audience_range_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_idx` int(11) NOT NULL,
  `range_id` int(11) DEFAULT NULL,
  `nation_id` int(11) DEFAULT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`user_idx`),
  KEY `range_id` (`range_id`),
  KEY `nation_id` (`nation_id`),
  CONSTRAINT `audience_range_comment_ibfk_1` FOREIGN KEY (`user_idx`) REFERENCES `user` (`user_idx`),
  CONSTRAINT `audience_range_comment_ibfk_2` FOREIGN KEY (`range_id`) REFERENCES `audience_range` (`range_id`),
  CONSTRAINT `audience_range_comment_ibfk_3` FOREIGN KEY (`nation_id`) REFERENCES `nation` (`nation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audience_range_comment`
--

LOCK TABLES `audience_range_comment` WRITE;
/*!40000 ALTER TABLE `audience_range_comment` DISABLE KEYS */;
INSERT INTO `audience_range_comment` VALUES (1,1,4,1,'The storyline was too boring!'),(2,2,4,1,'OST was fantastic.'),(3,3,4,2,'The movie was not bad but little bit boring'),(4,4,1,1,'actors\' acting was good'),(5,5,1,1,'I loved the plot'),(6,6,1,1,'Not bad..'),(7,55,NULL,NULL,'amazing result!'),(8,56,NULL,NULL,'interesting result'),(9,57,NULL,NULL,'criminal genre is my favorite'),(10,58,NULL,NULL,'greate analyze'),(11,59,NULL,NULL,'wow'),(12,60,NULL,NULL,'wow....'),(13,61,NULL,NULL,'i love top gun'),(14,65,NULL,NULL,'wanna sleep'),(15,63,NULL,NULL,'no....'),(16,64,NULL,NULL,'not really interesting'),(17,65,NULL,NULL,'i love them!!!!!!!!'),(18,51,1,NULL,'i\'ve expected'),(19,52,2,NULL,'wow amazing'),(20,53,3,NULL,'interesting!'),(21,54,4,NULL,'interesting result'),(22,55,1,NULL,'lol'),(23,56,2,NULL,'i love this'),(24,57,3,NULL,'nice!'),(25,58,4,NULL,'oh my god'),(26,63,1,NULL,'too boring!'),(27,64,2,NULL,'i expected..'),(28,65,3,NULL,'love this result'),(29,66,4,NULL,'wow~~~~'),(30,67,4,NULL,'how..'),(31,68,1,NULL,'why!'),(32,69,2,NULL,'i can\'t believe it!'),(33,70,3,NULL,'omg'),(34,51,1,NULL,'wow interesting'),(35,52,2,NULL,'amazing'),(36,53,3,NULL,'lol that is funny'),(37,54,4,NULL,'wow now i knew it'),(38,56,1,NULL,'great'),(39,57,2,NULL,'is it possible?'),(40,58,3,NULL,'so interesting..'),(41,51,1,1,'wow'),(42,52,2,1,'amazing~~!!!'),(43,53,3,2,'funny result'),(44,54,4,2,'i expected it'),(45,7,1,1,'I loved the storyline of this movie!'),(46,8,4,4,'Laboriously unfunny and pointless'),(47,9,3,4,'This is and elevated genre exercise'),(48,10,3,4,'A fascinating film!!'),(49,11,4,4,'One of the best films of the year'),(50,12,2,1,'This is a grand cinematic achievement'),(51,13,2,1,'Loved the movie but storytelling lacks in coherency'),(52,14,2,1,'It has a fresh tone'),(53,15,2,1,'This movie worth rewatching several times'),(54,16,1,1,'Really great and well-acted'),(55,56,1,3,'great configure'),(56,57,2,3,'is it possible?..?????'),(57,58,3,4,'kidding me!!'),(58,58,4,4,'how this could be'),(59,59,1,1,'intereting~~'),(60,60,2,1,'i love it'),(61,64,3,1,'i can\'t believe this'),(62,63,4,1,'valuable'),(63,64,1,1,'interesting result'),(64,65,2,1,'isntit'),(65,66,3,1,'i love them all'),(66,67,4,1,'so sad..'),(67,68,1,2,'big data'),(68,69,2,2,'good data'),(69,70,3,2,'really nice'),(70,51,4,2,'really..??????'),(71,52,1,2,'how this could be'),(72,53,2,2,'wanna watch them all'),(73,54,1,3,'so interesting'),(74,55,2,3,'what can i say'),(75,56,3,3,'so boring..'),(76,57,4,3,'great!'),(77,61,1,3,'is this real?'),(78,60,2,3,'really amazing'),(79,63,3,3,'so boring..'),(80,64,4,3,'great job!'),(81,58,1,4,'how this could be!'),(82,59,2,4,'amazing result'),(83,60,3,4,'wow!!!!!!!!'),(84,61,4,4,'can you see this??'),(85,65,1,4,'amazigggg!'),(86,63,2,4,'how can i say this....'),(87,64,3,4,'intersting data'),(88,65,4,4,'wow!'),(89,66,2,4,'amazigg'),(90,60,3,4,'i wanna see them all'),(91,61,4,4,'oh my god'),(92,65,1,4,'good analyze'),(93,66,2,4,'wowww'),(94,67,3,4,'intersting!'),(95,68,4,4,'what?????'),(96,69,4,4,'i have cute cat!');
/*!40000 ALTER TABLE `audience_range_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audience_ranking_by_day_comment`
--

DROP TABLE IF EXISTS `audience_ranking_by_day_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audience_ranking_by_day_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_idx` int(11) NOT NULL,
  `content` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`user_idx`),
  CONSTRAINT `audience_ranking_by_day_comment_ibfk_1` FOREIGN KEY (`user_idx`) REFERENCES `user` (`user_idx`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audience_ranking_by_day_comment`
--

LOCK TABLES `audience_ranking_by_day_comment` WRITE;
/*!40000 ALTER TABLE `audience_ranking_by_day_comment` DISABLE KEYS */;
INSERT INTO `audience_ranking_by_day_comment` VALUES (1,1,'huge number in weekend'),(2,2,'amazing result!'),(3,3,'there are so many people who enjoy watching movie'),(4,4,'i should avoid weekend.....');
/*!40000 ALTER TABLE `audience_ranking_by_day_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_name_list`
--

DROP TABLE IF EXISTS `food_name_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_name_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_name_list`
--

LOCK TABLES `food_name_list` WRITE;
/*!40000 ALTER TABLE `food_name_list` DISABLE KEYS */;
INSERT INTO `food_name_list` VALUES (1,'sweetpopcorn'),(2,'cheesepopcorn'),(3,'nachos'),(4,'hotdog'),(5,'squid');
/*!40000 ALTER TABLE `food_name_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'드라마'),(2,'멜로/로맨스'),(3,'액션'),(4,'애니메이션'),(5,'기타장르');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre_ranking_by_nation_comment`
--

DROP TABLE IF EXISTS `genre_ranking_by_nation_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre_ranking_by_nation_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_idx` int(11) NOT NULL,
  `nation_id` int(11) DEFAULT NULL,
  `genre_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`user_idx`),
  KEY `nation_id` (`nation_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `genre_ranking_by_nation_comment_ibfk_1` FOREIGN KEY (`user_idx`) REFERENCES `user` (`user_idx`),
  CONSTRAINT `genre_ranking_by_nation_comment_ibfk_2` FOREIGN KEY (`nation_id`) REFERENCES `nation` (`nation_id`),
  CONSTRAINT `genre_ranking_by_nation_comment_ibfk_3` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre_ranking_by_nation_comment`
--

LOCK TABLES `genre_ranking_by_nation_comment` WRITE;
/*!40000 ALTER TABLE `genre_ranking_by_nation_comment` DISABLE KEYS */;
INSERT INTO `genre_ranking_by_nation_comment` VALUES (1,1,NULL,1,'I like how Koreans love drama'),(2,2,1,2,'As expected, Hollywood!'),(3,3,2,3,'When it comes to animation movies... There\'s no place like Japan'),(4,4,1,4,'Is this a ranking for all the rest of the world? How interesting ');
/*!40000 ALTER TABLE `genre_ranking_by_nation_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mv_info`
--

DROP TABLE IF EXISTS `mv_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mv_info` (
  `mvcode` int(11) NOT NULL,
  `movie_name_kor` varchar(100) NOT NULL,
  `earned_money` bigint(20) NOT NULL,
  `audience` int(11) NOT NULL,
  `nation` varchar(5) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `movie_name_En` varchar(100) NOT NULL,
  PRIMARY KEY (`mvcode`),
  KEY `mv_info_genre` (`genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mv_info`
--

LOCK TABLES `mv_info` WRITE;
/*!40000 ALTER TABLE `mv_info` DISABLE KEYS */;
INSERT INTO `mv_info` VALUES (19978805,'큐어',249802969,23808,'일본','공포(호러)','Cure'),(20135304,'극장판 포켓몬스터DP: 기라티나와 하늘의 꽃다발 쉐이미',5477104710,581225,'일본','애니메이션','Pokemon the Movie: Giratina and the Sky Warrior'),(20143441,'몬스터 싱어: 매직 인 파리',128787720,15187,'프랑스','애니메이션','A Monster in Paris'),(20176068,'나를 만나는 길',101947800,11041,'영국','다큐멘터리','Walk with Me'),(20178501,'니 부모 얼굴이 보고 싶다',3948631280,416375,'한국','드라마','I want to know your parents'),(20188441,'킹메이커',7313720610,775583,'한국','드라마','Kingmaker'),(20190299,'이상한 나라의 수학자',5044936520,534220,'한국','드라마','In Our Prime'),(20191162,'녹턴',75541100,10767,'한국','다큐멘터리','Nocturne'),(20192354,'특송',4172193200,443177,'한국','범죄','Special Delivery'),(20193082,'웨스트 사이드 스토리',1225528640,122706,'미국','드라마','West Side Story'),(20194376,'탑건: 매버릭',87695075016,8161915,'미국','액션','Top Gun: Maverick'),(20194403,'킹스맨: 퍼스트 에이전트',4159334510,406904,'미국','액션','The King\'s Man'),(20196410,'비상선언',20926363328,2058760,'한국','드라마','Emergency Declaration'),(20196669,'앵커',1651791610,171255,'한국','스릴러','Anchor'),(20196776,'프린세스 아야',132437896,16564,'한국','판타지','Princess Aya'),(20196906,'스텔라',853798300,94213,'한국','코미디','Stellar'),(20198317,'인생은 아름다워',1314507651,141700,'한국','뮤지컬','Life is Beautiful'),(20199500,'뜨거운 피',3795382970,400589,'한국','범죄','Hot Blooded'),(20199882,'경관의 피',6687389520,679503,'한국','범죄','The Policeman’s Lineage'),(20200155,'모어',93154900,11009,'한국','다큐멘터리','I am More'),(20200418,'배니싱: 미제사건',301348110,35164,'프랑스','범죄','Vanishing'),(20201965,'해적: 도깨비 깃발',12523963990,1339242,'한국','어드벤처','The Pirates : The Last Royal Treasure'),(20202689,'우리가 사랑이라고 믿는 것',135121030,14601,'영국','드라마','Hope Gap'),(20204431,'모비우스',4662620390,474560,'미국','액션','Morbius'),(20204548,'범죄도시 2',131296328978,12693239,'한국','범죄','The Roundup'),(20204845,'공기살인',1473339250,158265,'한국','드라마','TOXIC'),(20205261,'나의 촛불',405835950,42123,'한국','다큐멘터리','Candlelight Revolution'),(20205362,'미니언즈2',21986219672,2266931,'미국','애니메이션','Minions: The Rise of Gru'),(20205443,'나일 강의 죽음',2242081480,232883,'미국','범죄','Death on the Nile'),(20206061,'쥬라기 월드: 도미니언',29237126310,2837415,'미국','액션','Jurassic World: Dominion'),(20206257,'브로커',12584395030,1260836,'한국','드라마','Broker'),(20208006,'인민을 위해 복무하라',709334190,79105,'한국','멜로/로맨스','SERVE THE PEOPLE'),(20208446,'외계+인 1부',15987992548,1538518,'한국','액션','Alienoid'),(20208721,'리미트',616420402,65981,'한국','범죄','Limit'),(20209297,'니얼굴',135370600,15108,'한국','다큐멘터리','Please Make Me Look Pretty'),(20209343,'한산: 용의 출현',73651798381,7257575,'한국','액션','Hansan: Rising Dragon'),(20209654,'헤어질 결심',19516360046,1881387,'한국','미스터리','Decision to Leave'),(20210541,'스펜서',781792830,83047,'영국','드라마','Spencer'),(20210542,'로스트 도터',121116200,13008,'미국','드라마','The Lost Daughter'),(20210590,'카시오페아',209279300,23863,'한국','드라마','Cassiopeia'),(20210843,'실종',105365000,11451,'일본','스릴러','Missing'),(20210962,'우연과 상상',256985440,26046,'일본','드라마','Wheel of Fortune and Fantasy'),(20211177,'하우스 오브 구찌',1415370730,143605,'미국','범죄','House of Gucci'),(20211200,'언차티드',7116304100,730924,'미국','액션','Uncharted'),(20211238,'도쿄 리벤저스',128177240,13122,'일본','드라마','Tokyo Revengers'),(20211241,'클리포드 더 빅 레드 독',267143090,30248,'미국','어드벤처','Clifford the Big Red Dog'),(20211281,'매트릭스: 리저렉션',198212640,22413,'미국','액션','The Matrix Resurrections'),(20211321,'빅샤크4: 바다공룡 대모험',541593280,61613,'중국','어드벤처','Happy Little Submarine: Journey to the Center of the Deep Ocean'),(20211382,'오마주',101000500,13132,'한국','드라마','Hommage'),(20211423,'피그',106769970,11625,'미국','드라마','Pig'),(20211472,'늑대사냥',4117553911,399298,'한국','액션','Project Wolf Hunting'),(20211529,'청춘적니',116128670,14012,'중국','멜로/로맨스','Love Will Tear Us Apart'),(20211568,'아치의 노래, 정태춘',321853210,33877,'한국','다큐멘터리','Song of the Poet'),(20211740,'비욘드라이브 더 무비 : 엔시티 레조넌스',339307500,22621,'한국','공연','Beyond LIVE NCT: Resonance'),(20211792,'헌트',44558739560,4348048,'한국','액션','HUNT'),(20212317,'컴온 컴온',154658500,16877,'미국','드라마','C’mon C’mon'),(20212618,'수퍼 소닉2',2848373410,315123,'미국','애니메이션','Sonic the Hedgehog 2'),(20212672,'레지던트 이블: 라쿤시티',216277970,24722,'미국','액션','Resident Evil: Welcome to Raccoon City'),(20212708,'시라노',203932200,24751,'미국','멜로/로맨스','Cyrano'),(20212709,'블랙폰',1071701042,105603,'미국','공포(호러)','The Black Phone'),(20212724,'앰뷸런스',1156403110,117512,'미국','액션','Ambulance'),(20212725,'신비한 동물들과 덤블도어의 비밀',12305812580,1195563,'미국','어드벤처','Fantastic Beasts: The Secrets of Dumbledore'),(20212741,'안테벨룸',899691250,95983,'미국','미스터리','Antebellum'),(20212783,'로스트 시티',1023084850,113186,'미국','액션','The Lost City'),(20212836,'355 ',418026590,49098,'미국','액션','The 355'),(20212855,'닥터 스트레인지: 대혼돈의 멀티버스',62648830870,5884600,'미국','액션','Doctor Strange in the Multiverse of Madness'),(20212952,'극장판 안녕 자두야: 제주도의 비밀',1068187980,121169,'한국','애니메이션','Hello Jadoo : The Secret of Jeju Island'),(20212973,'더 배트맨',9338714700,904156,'미국','액션','The Batman'),(20215601,'공조2: 인터내셔날',59872672184,5838901,'한국','액션','Confidential Assignment2: International'),(20216064,'하늘의 푸르름을 아는 사람이여',104358500,11688,'일본','애니메이션','Her Blue Sky'),(20216224,'오! 마이 고스트',87894391,11124,'한국','코미디','Oh! My Ghost'),(20217298,'불도저에 탄 소녀',104258240,12452,'한국','드라마','The Girl on a Bulldozer'),(20217334,'안녕하세요',183017360,25140,'한국','드라마','Good morning'),(20217688,'광대: 소리꾼',125460170,16427,'한국','사극',''),(20217769,'봄날',239740830,34100,'한국','드라마','When Spring Comes'),(20217807,'해피 뉴 이어',1183820530,122596,'한국','멜로/로맨스','A YEAR-END MEDLEY'),(20217826,'육사오(6/45)',19545250898,1951159,'한국','코미디','6/45'),(20217982,'서울괴담',1076281490,112725,'한국','공포(호러)','Urban Myths'),(20218415,'드라이브 마이 카',551641780,59060,'일본','드라마','Drive My Car'),(20218764,'씽2게더',8186997050,883973,'미국','애니메이션','Sing 2'),(20218904,'코다',114566060,12748,'프랑스','드라마','CODA'),(20219245,'만년이 지나도 변하지 않는 게 있어',204705110,24278,'대만','멜로/로맨스','Till We Meet Again'),(20219310,'말임씨를 부탁해',155322670,20409,'한국','드라마','Take Care of My Mom'),(20219345,'놉',4697181338,414834,'미국','미스터리','Nope'),(20219626,'어나더 라운드',335050390,36126,'기타','코미디','Another Round'),(20219628,'정직한 후보2',1867774730,202207,'한국','코미디','Honest Candidate 2'),(20223278,'극장판 주술회전 0',6504162394,653165,'일본','애니메이션','Jujutsu Kaisen: Zero'),(20223302,'리코리쉬 피자',213876700,21188,'미국','멜로/로맨스','Licorice Pizza'),(20223308,'극장판 바다 탐험대 옥토넛 : 해저동굴 대탈출',239104800,28704,'영국','애니메이션','OCTONAUTS: Octonauts and the Caves of Sac Actun'),(20223350,'프리! 더 파이널 스트로크 전편',127488230,12996,'일본','애니메이션','Free! – the Final Stroke – the first volume'),(20223388,'토르: 마법 검의 전설',90551300,11583,'독일','애니메이션','Vic the Viking and the Magic Sword'),(20223398,'장민호 드라마 최종회',223662200,11687,'한국','공연','Jang Minho Drama'),(20223583,'벨파스트',129566070,14152,'미국','드라마','Belfast'),(20223614,'루이스 웨인: 사랑을 그린 고양이 화가',410431110,43306,'미국','드라마','The Electrical Life of Louis Wain'),(20223676,'문폴',1962779300,195346,'미국','액션','Moonfall'),(20223743,'나이트메어 앨리',401511820,40679,'미국','범죄','Nightmare Alley'),(20223828,'나의 히어로 아카데미아 더 무비: 월드 히어로즈 미션',471587590,48436,'일본','애니메이션','My Hero Academia: World Heroes\' Mission'),(20223839,'버즈 라이트이어',3509782460,344441,'미국','애니메이션','Lightyear'),(20223940,'민스미트 작전',346200480,36984,'미국','드라마','Operation Mincemeat'),(20223950,'메리 미',99754800,15164,'미국','멜로/로맨스','Marry Me'),(20223953,'블랙라이트',228699190,25401,'미국','액션','Blacklight'),(20223991,'어부바',188334470,23970,'한국','가족','Eobuba'),(20224069,'뱅드림! 팝핀\' 드림!',121601460,12386,'일본','애니메이션','BanG Dream! Poppin\' Dream!'),(20224142,'세븐틴 파워 오브 러브 : 더 무비',967402500,48383,'한국','공연','SEVENTEEN POWER OF LOVE : THE MOVIE'),(20224148,'극장판 엉덩이 탐정: 수플레 섬의 비밀',1409092740,152607,'일본','애니메이션','Butt Detective the Movie: the Secret of Souffle Island'),(20224223,'엄마',169848800,19485,'미국','스릴러','UMMA'),(20224270,'배드 가이즈',3781655170,400504,'미국','애니메이션','The Bad Guys'),(20224301,'몬스터 아카데미',141292000,16647,'기타','판타지','Cranston Academy: Monster Zone'),(20224304,'피는 물보다 진하다',90700500,14201,'한국','액션','The Goblin'),(20224333,'더 컨트랙터',90330780,11365,'미국','액션','The Contractor'),(20224468,'애프터 양',386233390,39852,'미국','드라마','After Yang'),(20224634,'그대가 조국',3109454870,333544,'한국','다큐멘터리','The Red Herring'),(20224662,'토르: 러브 앤 썬더',29505092221,2716307,'미국','액션','Thor: Love and Thunder'),(20224757,'룸 쉐어링',137085480,16992,'한국','드라마','My Perfect Roommate'),(20224791,'그레이 맨',277264160,29842,'미국','액션','The Gray Man'),(20224882,'마녀(魔女) Part2. The Other One',28922800670,2806524,'한국','액션','The Witch: Part 2. The Other One'),(20224891,'특수요원 빼꼼',109893400,12511,'중국','애니메이션','Agent Backkom : Kings Bear'),(20224965,'DC 리그 오브 슈퍼-펫',2321987159,248700,'미국','애니메이션','DC League of Super-Pets'),(20225055,'뜨거운 피: 디 오리지널',111999200,13854,'한국','액션','Hot Blooded: The Original'),(20225057,'드래곤볼 슈퍼: 슈퍼 히어로',197892740,18127,'일본','애니메이션','Dragon Ball Super: Super Hero'),(20225114,'극장판 윌벤져스 : 수상한 캠핑 대소동',293037800,29432,'한국','애니메이션','The Movie WillBengers : Mysterious Camping'),(20225175,'엘비스',1075948628,99048,'미국','드라마','Elvis'),(20225180,'뒤틀린 집',331549100,34886,'한국','공포(호러)','Contorted'),(20225183,'프리! 더 파이널 스트로크 후편',188961979,18526,'일본','애니메이션','Free! - the Final Stroke - the second volume'),(20225186,'더 킬러: 죽어도 되는 아이',601780660,60175,'한국','액션','THE KILLER _ A GIRL WHO DESERVES TO DIE'),(20225190,'뽀로로 극장판 드래곤캐슬 대모험',4190738075,447475,'한국','애니메이션','Pororo Movie_Dragon castle Adventure'),(20225237,'명탐정 코난: 할로윈의 신부',4990922231,479400,'일본','애니메이션','Detective Conan: The Bride of Halloween'),(20225238,'체리마호: 30살까지 동정이면 마법사가 될 수 있대',164247600,18501,'일본','판타지','Cherry Magic! Thirty Years Of Virginity Can Make You A Wizard?!: The Movie'),(20225293,'썸머 필름을 타고!',310443526,32731,'일본','기타','It\'s a Summer Film!'),(20225448,'불릿 트레인',1544825073,142640,'미국','액션','Bullet Train'),(20225556,'사랑할 땐 누구나 최악이 된다',407814178,40185,'노르웨이','멜로/로맨스','The Worst Person in the World'),(20225637,'뿌까의 짜장면파티',128658500,21317,'한국','기타','Pucca\'s Black Bean Noodles Party'),(20225657,'극장판 살아남기 시리즈: 인체에서 살아남기',149305000,15892,'일본','애니메이션','The Movie of Survival : Human body and Deep sea'),(20225892,'시맨틱 에러: 더 무비',598545000,54016,'한국','멜로/로맨스','Semantic Error'),(20226034,'바다 탐험대 옥토넛 : 탐험선 대작전',744420950,78863,'영국','애니메이션','OCTONAUTS Season 5'),(20226107,'극장판 도라에몽: 진구의 우주소전쟁 리틀스타워즈 2021',444546198,48098,'일본','애니메이션','Doraemon the Movie: Nobita/’s Little Star Wars 2021'),(20226125,'어쩌다 공주, 닭냥이 왕자를 부탁해!',383408482,40559,'프랑스','애니메이션','Pil\'s Adventures'),(20226201,'귀멸의 칼날: 아사쿠사 편',231532500,22388,'일본','애니메이션','Demon Slayer: Kimetsu no Yaiba Tsuzumi Mansion Arc'),(20226444,'극장판 엄마 까투리: 도시로 간 까투리 가족',1546969879,165876,'한국','애니메이션','KATURI the Movie: The Big City Adventure'),(20226670,'극장판 헬로카봇: 수상한 마술단의 비밀',158165352,17118,'한국','애니메이션','Hello Carbot the Movie: The Secret of the Suspicious Magic Troupe'),(20226679,'쥬라기캅스 극장판: 공룡시대 대모험',239249088,26045,'한국','애니메이션','Jurassic Cops Theatrical Version: The Great Adventure of the Age of Dinosaurs'),(20226751,'극장판 5등분의 신부',319986900,28748,'일본','애니메이션','The Quintessential Quintuplets Movie'),(20226777,'극장판 짱구는 못말려: 수수께끼! 꽃피는 천하떡잎학교',330515346,33918,'일본','애니메이션','Crayon Shin-chan: School Mystery! The Splendid Tenkasu Academy'),(20226879,'인생은 뷰티풀: 비타돌체',1661528500,52746,'한국','다큐멘터리','Vita Dolce'),(20226957,'아바타 리마스터링',2467804590,150137,'미국','SF','Avatar'),(20227308,'스파이더맨: 노 웨이 홈',19496498450,1991050,'미국','액션','Spider-Man: No Way Home - The More Fun Stuff Version');
/*!40000 ALTER TABLE `mv_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nation`
--

DROP TABLE IF EXISTS `nation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nation` (
  `nation_id` int(11) NOT NULL AUTO_INCREMENT,
  `nation_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`nation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nation`
--

LOCK TABLES `nation` WRITE;
/*!40000 ALTER TABLE `nation` DISABLE KEYS */;
INSERT INTO `nation` VALUES (1,'한국'),(2,'미국'),(3,'일본'),(4,'etc');
/*!40000 ALTER TABLE `nation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prefer_food_ranking_comment`
--

DROP TABLE IF EXISTS `prefer_food_ranking_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prefer_food_ranking_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_idx` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`user_idx`),
  CONSTRAINT `prefer_food_ranking_comment_ibfk_1` FOREIGN KEY (`user_idx`) REFERENCES `user` (`user_idx`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prefer_food_ranking_comment`
--

LOCK TABLES `prefer_food_ranking_comment` WRITE;
/*!40000 ALTER TABLE `prefer_food_ranking_comment` DISABLE KEYS */;
INSERT INTO `prefer_food_ranking_comment` VALUES (1,1,'I like nachos the best'),(2,2,'Interesting result!'),(3,3,'I do not like eating at the cinema.');
/*!40000 ALTER TABLE `prefer_food_ranking_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_idx` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_pw` varchar(20) NOT NULL,
  PRIMARY KEY (`user_idx`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user1','1234'),(2,'user2','1234'),(3,'user3','1234'),(4,'user4','1234'),(5,'user5','1234'),(6,'user6','1234'),(7,'user7','1234'),(8,'user8','1234'),(9,'user9','1234'),(10,'user10','1234'),(11,'user11','1234'),(12,'user12','1234'),(13,'user13','1234'),(14,'user14','1234'),(15,'user15','1234'),(16,'user16','1234'),(17,'user17','1234'),(18,'user18','1234'),(19,'user19','1234'),(20,'user20','1234'),(21,'user21','1234'),(22,'user22','1234'),(23,'user23','1234'),(24,'user24','1234'),(25,'user25','1234'),(26,'user26','1234'),(27,'user27','1234'),(28,'user28','1234'),(29,'user29','1234'),(30,'user30','1234'),(31,'user31','1234'),(32,'user32','1234'),(33,'user33','1234'),(34,'user34','1234'),(35,'user35','1234'),(36,'user36','1234'),(37,'user37','1234'),(38,'user38','1234'),(39,'user39','1234'),(40,'user40','1234'),(41,'user41','1234'),(42,'user42','1234'),(43,'user43','1234'),(44,'user44','1234'),(45,'user45','1234'),(46,'user46','1234'),(47,'user47','1234'),(48,'user48','1234'),(49,'user49','1234'),(50,'user50','1234'),(51,'user51','1234'),(52,'user52','1234'),(53,'user53','1234'),(54,'user54','1234'),(55,'user55','1234'),(56,'user56','1234'),(57,'user57','1234'),(58,'user58','1234'),(59,'user59','1234'),(60,'user60','1234'),(61,'user61','1234'),(62,'user62','1234'),(63,'user63','1234'),(64,'user64','1234'),(65,'user65','1234'),(66,'user66','1234'),(67,'user67','1234'),(68,'user68','1234'),(69,'user69','1234'),(70,'user70','1234');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_prefer_food_vote`
--

DROP TABLE IF EXISTS `user_prefer_food_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_prefer_food_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_idx` int(11) NOT NULL,
  `food_name_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`user_idx`),
  KEY `food_name_id` (`food_name_id`),
  CONSTRAINT `user_prefer_food_vote_ibfk_1` FOREIGN KEY (`user_idx`) REFERENCES `user` (`user_idx`),
  CONSTRAINT `user_prefer_food_vote_ibfk_2` FOREIGN KEY (`food_name_id`) REFERENCES `food_name_list` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_prefer_food_vote`
--

LOCK TABLES `user_prefer_food_vote` WRITE;
/*!40000 ALTER TABLE `user_prefer_food_vote` DISABLE KEYS */;
INSERT INTO `user_prefer_food_vote` VALUES (1,1,1),(2,2,2),(3,3,2),(4,4,4),(5,5,4),(6,6,3),(7,7,3),(8,8,3),(9,9,1),(10,10,1),(11,11,1),(12,12,2),(13,13,2),(14,14,2),(15,15,1),(16,16,2),(17,17,1),(18,18,2);
/*!40000 ALTER TABLE `user_prefer_food_vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-17 13:06:45
