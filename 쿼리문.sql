-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	6.0.0-alpha-community-nt-debug


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema koreabtc
--

CREATE DATABASE IF NOT EXISTS koreabtc;
USE koreabtc;

--
-- Definition of table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET euckr NOT NULL,
  `password` varchar(128) CHARACTER SET euckr NOT NULL DEFAULT '',
  `2ndpassword` varchar(134) CHARACTER SET euckr NOT NULL,
  `email` varchar(128) CHARACTER SET euckr NOT NULL,
  `birth` varchar(128) CHARACTER SET euckr NOT NULL,
  `btc` decimal(20,4) NOT NULL,
  `krw` decimal(20,1) NOT NULL,
  `realname` text COLLATE euckr_bin NOT NULL,
  `bankname` varchar(10) COLLATE euckr_bin DEFAULT NULL,
  `banknumber` varchar(45) COLLATE euckr_bin DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `ranking1` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=euckr COLLATE=euckr_bin DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `accounts`
--

/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`,`name`,`password`,`2ndpassword`,`email`,`birth`,`btc`,`krw`,`realname`,`bankname`,`banknumber`) VALUES 
 (10,'admin','c4df38581e655163a521f3ad81e7628e5ba513de','817b02180cc67bf5a004a0ca852b935dcb24b6b2','whdgns0407@gmail.com','960407','0.2490','8052271.0',0xEBB095ECA285ED9B88,NULL,NULL);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;


--
-- Definition of table `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE `board` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `datem` datetime NOT NULL,
  `lock_post` varchar(45) DEFAULT NULL,
  `file` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `board`
--

/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` (`idx`,`name`,`title`,`content`,`date`,`hit`,`pw`,`datem`,`lock_post`,`file`) VALUES 
 (1,'admin','안녕하세요 자유게시판 1 입니다.','안녕하세요 자유게시판 1 입니다.','2018-12-03',1,'whdgns0407@gmail.com','2018-12-03 05:58:13',NULL,NULL),
 (2,'admin','안녕하세요 자유게시판 2게시글 입니다.','안녕하세요 자유게시판 2게시글 입니다.','2018-12-03',0,'whdgns0407@gmail.com','2018-12-03 05:58:41',NULL,NULL),
 (3,'admin','안녕하세요 자유게시판 게시글 3 입니당','안녕하세요 자유게시판 게시글 3 입니당','2018-12-03',0,'whdgns0407@gmail.com','2018-12-03 05:59:04',NULL,NULL),
 (4,'admin','안녕하세요 자유게시판 4 입니다.','안녕하세요 자유게시판 4 입니다.','2018-12-03',0,'whdgns0407@gmail.com','2018-12-03 05:59:18',NULL,NULL),
 (5,'admin','게시글 5 입니다.','게시글 5 입니다.','2018-12-03',7,'whdgns0407@gmail.com','2018-12-03 05:59:31',NULL,NULL),
 (6,'admin','아무말 대잔치 !','아무말 대잔치 !','2018-12-03',3,'whdgns0407@gmail.com','2018-12-03 06:00:07',NULL,NULL),
 (7,'admin','아 할말 없다!','아 할말 없다!','2018-12-03',11,'whdgns0407@gmail.com','2018-12-03 06:00:26',NULL,NULL),
 (8,'admin','아 할말 없다 2','아 할말 없다 2','2018-12-03',2,'whdgns0407@gmail.com','2018-12-03 06:00:36',NULL,NULL),
 (9,'admin','아 ㅇㄻㄴㅇㄹㄴㅁㄻㄴㅇㄻㄴㅇㄹ','ㅁㄴㅇㄻㄴㅇㄻㄴㄹㅇㄴ','2018-12-03',4,'whdgns0407@gmail.com','2018-12-03 06:00:45',NULL,NULL),
 (10,'admin','ㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋ','ㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋ','2018-12-03',14,'whdgns0407@gmail.com','2018-12-03 06:00:57',NULL,NULL),
 (11,'','관라지에 의해 차단 된 글 입니다.','관라지에 의해 차단 된 글 입니다.','2018-12-03',42,'','2018-12-03 19:10:03',NULL,NULL),
 (13,'akdzl456','ㅇㅋㅇㅋ','ㅇㅋㅇ\r\nㅇㅋㅇㅋㅇㅋ','2018-12-03',16,'akdzl456@naver.com','2018-12-03 23:00:02',NULL,NULL),
 (14,'admin','비트코인 가즈아ㅏㅏ','비트코인 가즈아ㅏㅏ','2018-12-05',37,'whdgns0407@gmail.com','2018-12-05 00:18:54',NULL,NULL),
 (15,'admin','dd','dd','2022-11-11',0,'whdgns0407@gmail.com','2022-11-11 19:28:35',NULL,NULL),
 (16,'admin','asdf','asdf','2022-11-11',0,'whdgns0407@gmail.com','2022-11-11 19:28:46',NULL,NULL),
 (17,'admin','fsadfasdf','asdfasfa','2022-11-11',11,'whdgns0407@gmail.com','2022-11-11 19:28:57',NULL,NULL),
 (18,'admin','ff','gf','2022-11-11',1,'whdgns0407@gmail.com','2022-11-11 19:32:14',NULL,NULL);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;


--
-- Definition of table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET euckr DEFAULT NULL,
  `content` text CHARACTER SET euckr,
  `date` datetime DEFAULT NULL,
  `email` varchar(128) CHARACTER SET euckr DEFAULT NULL,
  `reply` text CHARACTER SET euckr,
  `type` varchar(128) CHARACTER SET euckr DEFAULT NULL,
  `ing` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`idx`,`title`,`content`,`date`,`email`,`reply`,`type`,`ing`) VALUES 
 (1,'관리자님 안녕하세요 ㅎㅎ','관리자님 안녕하세요 ㅎㅎ','2018-12-02 22:03:33','whdgns0407@gmail.com','어쩌라공','입금출금 관련',1),
 (2,'ㅎㅇㅎㅇㅎㅇㅎ','ㅇㅎㅇㅎㅇㅎㅇㅎㅇ','2018-12-03 06:09:11','whdgns0407@gmail.com',NULL,'입금출금 관련',0),
 (3,'내역체크','나보기가 역겨워 가실 때에는\r\n뒤지지 왜 여기왔냐\r\n엔터키는 되던가','2018-12-03 20:26:08','asd@asd.com','엔터키 적용 됩니다. 감사합니다.','기타 문의 사항',1),
 (4,'돈좀줘요','1231231','2018-12-05 17:32:08','akdzl456@naver.com',NULL,'입금출금 관련',0),
 (5,'llk','kkk','2022-11-11 19:27:24','whdgns0407@gmail.com',NULL,'입금출금 관련',0);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


--
-- Definition of table `named`
--

DROP TABLE IF EXISTS `named`;
CREATE TABLE `named` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `date` datetime DEFAULT NULL,
  `sum` int(10) unsigned DEFAULT NULL,
  `title` int(10) unsigned DEFAULT NULL,
  `link` text,
  PRIMARY KEY (`idx`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='test1';

--
-- Dumping data for table `named`
--

/*!40000 ALTER TABLE `named` DISABLE KEYS */;
INSERT INTO `named` (`idx`,`name`,`date`,`sum`,`title`,`link`) VALUES 
 (1,'없음','2022-02-28 23:59:54',0,123,'https://ssl.nexon.com/s2/game/maplestory/renewal/common/logo.png');
/*!40000 ALTER TABLE `named` ENABLE KEYS */;


--
-- Definition of table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) NOT NULL,
  `lock_post` int(11) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `datem` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notice`
--

/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` (`idx`,`name`,`pw`,`title`,`content`,`date`,`hit`,`lock_post`,`file`,`datem`) VALUES 
 (1,'admin','whdgns0407@gmail.com','[안내] 마에스트로거래소에 오신것을 환영 합니다.','마에스트로거래소에 오신것을 환영 합니다. \r\n서비스에 최선을 다하겠습니다.\r\n감사합니다.','2018-11-11',68,0,'','2018-11-11 23:52:00'),
 (2,'admin','whdgns0407@gmail.com','[안내] 마에스트로거래소 베타서비스 오픈','마에스트로거래소 베타서비스 오픈\r\n\r\n\r\n\r\n베타서비스 오픈 기념\r\n마에스트로거래소에 회원가입 시 0.3 BTC 상당의 비트코인 과 100,000 KRW 가 계정에 반영 됩니다.\r\n\r\n\r\n마에스트로거래소를 이용해 주셔서 감사합니다.\r\n','2018-11-14',21,NULL,NULL,'2018-11-14 01:52:35'),
 (3,'admin','whdgns0407@gmail.com','[보안] 지갑주소 변환 악성코드 주의','최근 악성코드를 이용하여 지갑주소를 바꿔치기 하는 사례가 확인되어 주의를 당부 드립니다.\r\n\r\n\r\n\r\n암호화폐 지갑 주소는 화폐 종류에 따라 영문 대소문자와 숫자가 무질서하게 뒤섞인 30~40 긴 문자열로 이루어져있습니다.\r\n\r\n예시: 1DT4vwU8DYZVtgVHdU######1GyoDPLBaF\r\n\r\n\r\n\r\n악성코드는 사용자가 입출금을 위해 지갑주소를 복사(Ctrl+C)하여 붙여넣기(Ctrl+V)하는 과정에서, 클립보드에 저장된 정상 주소를 공격자(해커)의 지갑 주소로 변환합니다. 사용자는 이런 현상을 인지하지 못하고, 정상 주소가 아닌 공격자(해커)의 지갑으로 전송 하게 됩니다.\r\n\r\n\r\n\r\n위와 같은 피해를 막기위해, 아래의 사항을 권장 합니다.\r\n\r\n1. OS, 백신, 웹 브라우저 등의 최신 업데이트를 권장\r\n\r\n2. 발신처가 불분명한 메일의 첨부 파일 다운로드 및 열람 금지\r\n\r\n3. 암호화폐 송금 시 송금 주소를 다시 한번 확인','2018-11-23',18,NULL,NULL,'2018-11-23 20:26:23'),
 (4,'admin','whdgns0407@gmail.com','[이벤트] 가입하고 비트코인 받자!','[이벤트] 가입하고 비트코인 받자!\r\n\r\n\r\n지급대상:\r\n대상 기간 내 회원가입 시\r\n\r\n경품:\r\n0.3 BTC 지급\r\n\r\n지급방법:\r\n가입 즉시\r\n\r\n마에스트로를 이용해 주셔서 감사합니다.\r\n\r\n마에스트로 거래소 드림','2018-11-25',8,NULL,NULL,'2018-11-25 06:47:29'),
 (5,'admin','whdgns0407@gmail.com','[이벤트] 가입하고 원화 받자!','[이벤트] 가입하고 원화 받자!\r\n\r\n\r\n지급대상:\r\n대상 기간 내 회원가입 시\r\n\r\n경품:\r\n100,000 KRW 지급\r\n\r\n지급방법:\r\n가입 즉시\r\n\r\n마에스트로를 이용해 주셔서 감사합니다.\r\n\r\n마에스트로 거래소 드림','2018-11-25',27,NULL,NULL,'2018-11-25 06:48:32'),
 (6,'admin','whdgns0407@gmail.com','[안내]숫자 도박 게임 오픈 안내','[안내] 마에스트로 거래소 게임 오픈 안내\r\n\r\n숫자 도박 게임이 창설 되었으니 많은 이용 바랍니다.\r\n\r\n해당 숫자 입력시 1/입력숫자 로 당첨확률이 계산되며, 배팅 금액 * 입력숫자 가 당첨 금액 입니다.\r\n\r\n감사합니다.\r\n\r\n<a href=\"http://coinpark.iptime.org/game/numbergame.php\" target=\"_parent\"> 숫자도박 하러가기 </a>\r\n\r\n-마에스트로 거래소','2018-12-01',14,NULL,NULL,'2018-12-01 06:13:58'),
 (7,'admin','whdgns0407@gmail.com','[보안] 비트코인 핫 월렛 보안상태 안내','안녕하세요.\r\n마에스트로 거래소 입니다.\r\n저희 마에스트로 거래소는 핫 월렛 접근 비밀번호 및 보안이 15글자 이상의 문자열, 대소문자, 숫자가 조합되어 있으며, 접근 시 이메일 인증(이메일 OTP로 보호중) 및 30초 마다 변경되는 OTP에 의해 안전하게 보관 되고 있습니다.\r\n\r\n마에스트로 거래소 핫 월렛은 거래소와 연결점이 없도록 망분리를 통하여 관리 되고 있습니다.\r\n\r\n항상 최선을 다하는 마에스트로 거래소가 되겠습니다.\r\n\r\n감사합니다.','2018-12-01',19,NULL,NULL,'2018-12-01 06:17:06'),
 (8,'admin','whdgns0407@gmail.com','[안내] 호가창 개설','[안내] 호가창 개설\r\n\r\n국내최대 암호화폐 거래소 업비트 API의 실시간 가격연동으로 실시간 호가창이 개설 되었습니다.\r\n이용해 주셔서 감사합니다.\r\n\r\n- 마에스트로거래소\r\n\r\n','2018-12-02',14,NULL,NULL,'2018-12-02 06:50:10'),
 (9,'admin','whdgns0407@gmail.com','[안내] 랜덤 게임 오픈 안내','[안내] 마에스트로 거래소 게임 오픈 안내\r\n\r\n랜덤 도박 게임이 창설 되었으니 많은 이용 바랍니다.\r\n\r\n감사합니다.\r\n\r\n\r\n-마에스트로 거래소','2018-12-03',15,NULL,NULL,'2018-12-03 06:05:06'),
 (10,'admin','whdgns0407@gmail.com','[안내] 마에스트로 거래소','[안내] 마에스트로 거래소\r\n\r\n해당 웹페이지는 경상대학교 컴퓨터과학과 마에스트로거래소 발표 페이지입니다.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<b>해당 웹페이지의 저작권은 박종훈에게 있으며, 해당 웹페이지의 소스를 다운로드하여 응용은 가능하나, 무단 유포를 금지합니다.</b>\r\n\r\n무단 유포시 강력하게 법적 처벌 하오니 참고하시기 바랍니다.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','2018-12-05',15,NULL,NULL,'2018-12-05 00:10:22');
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;


--
-- Definition of table `notice_reply`
--

DROP TABLE IF EXISTS `notice_reply`;
CREATE TABLE `notice_reply` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `con_num` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `pw` varchar(45) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice_reply`
--

/*!40000 ALTER TABLE `notice_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `notice_reply` ENABLE KEYS */;


--
-- Definition of table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `con_num` int(10) unsigned DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `pw` varchar(128) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=euckr;

--
-- Dumping data for table `reply`
--

/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` (`idx`,`con_num`,`name`,`pw`,`content`,`date`) VALUES 
 (1,5,'admin','whdgns0407@gmail.com','댓글','2018-12-03 05:59:39'),
 (3,11,'키작은청은이','rms6990@naver.com','키가 좀...','2018-12-03 21:50:31'),
 (7,14,'admin','whdgns0407@gmail.com','DZ','2018-12-05 02:55:16'),
 (10,14,'akdzl456','akdzl456@naver.com','떡상 가즈아ㅣ\r\n','2018-12-05 17:30:07'),
 (11,11,'akdzl456','akdzl456@naver.com','210202','2018-12-05 17:30:14'),
 (13,14,'admin','whdgns0407@gmail.com','ㅇㅇ','2022-11-11 19:10:46'),
 (14,17,'admin','whdgns0407@gmail.com','dd','2022-11-11 19:29:24'),
 (15,17,'admin','whdgns0407@gmail.com','10','2022-11-11 19:29:49'),
 (16,17,'admin','whdgns0407@gmail.com','12','2022-11-11 19:29:54'),
 (17,17,'admin','whdgns0407@gmail.com','11','2022-11-11 19:30:53'),
 (18,17,'admin','whdgns0407@gmail.com','k','2022-11-11 19:31:53');
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;


--
-- Definition of table `txid`
--

DROP TABLE IF EXISTS `txid`;
CREATE TABLE `txid` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` text,
  `type` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `krwamount` decimal(20,1) DEFAULT NULL,
  `commission` decimal(10,4) DEFAULT NULL,
  `krwsum` decimal(20,1) DEFAULT NULL,
  `ing` int(11) DEFAULT NULL,
  `ledger` varchar(45) DEFAULT NULL,
  `changemoney` decimal(20,1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `btcamount` decimal(20,5) DEFAULT NULL,
  `changebtc` decimal(20,5) DEFAULT NULL,
  `btcsum` decimal(20,5) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`idx`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=261 DEFAULT CHARSET=euckr;

--
-- Dumping data for table `txid`
--

/*!40000 ALTER TABLE `txid` DISABLE KEYS */;
/*!40000 ALTER TABLE `txid` ENABLE KEYS */;


--
-- Definition of table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE `wallet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `btc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wallet`
--

/*!40000 ALTER TABLE `wallet` DISABLE KEYS */;
INSERT INTO `wallet` (`id`,`btc`) VALUES 
 (1,'34ExPSr1PVMcoGnsf2iaDNkEmvD3xjHraP'),
 (2,'381ca2raLmCWKa1bkK2LuBiUKyMWFyFNhY'),
 (3,'3H16eRCpoavVJjV362xakUDFABYnV9SLvf'),
 (4,'3GmuCjJgRVxfZpstScrQkh2STi2SHKDE4C'),
 (5,'33nSBHPfkk5vAiteKzswS8rRAtPbS6P1Sn'),
 (6,'36VuETQUfjxR12KRvNQm8cQ7dyRNKZ4jBt'),
 (7,'3Kg3KGUgma7zmtmEBBWCEzzekLMPJR29F4'),
 (8,'38F7yxXUhBDPLwYgRTDPcyRYv7kEJ5mmEu'),
 (9,'35dFRH8fsS1cM54pzJ7g59bAMZtottuPp3'),
 (10,'3PVoFgcFKk6cUFyPE3be44oSCZA2DKHshd'),
 (11,'34MMasE1WJBf4H3sn2fRvPSseWKZydsuuQ'),
 (12,'3NSj9QLL6AUuGFREyaMDyAdop2Bd4wjgY8'),
 (13,'362JELcoqw5h6uozAQ7nZvgR8FssHH9rEa'),
 (14,'3AABqKcsbL6mXxvxnMA8iPHw8JQQxCcxpJ'),
 (15,'3QMMPMpbfE7cjYX4MdZFPosdcJeNuK6ZQc'),
 (16,'39cr2bsp7fowiYxcMhprTZw4wG81T5fGtM'),
 (17,'3BN42NYyqHpgyCt8Po6gyUgCzA8CAJicxj'),
 (18,'32xEutkG7TX2RQEMbcEN8HWohY3Psu3Nep'),
 (19,'3H5WugsPBzmqSAAq5NUsH4U2CLzmr2cxed'),
 (20,'3EswVBdT7iwjq2sRkKMJG4swckHDUkLwk5'),
 (21,'361uBgqsJJCt2436yPbtSVoGKb4n5A1RBw'),
 (22,'382vyUtV8CzjCAu2MKz3fSeKqHLgQkKj6W'),
 (23,'3MEMjaHXDkYo9w3AAkLHTzBjE2nKFsfNN9'),
 (24,'36cDpG2XXkq3quiaSdyvKMuTkEVngDp88b'),
 (25,'37GzUDmH9Kpvf3GxV8uJimRUhPY7zHx7F8'),
 (26,'32uUVwMHeLHzSw8XTvQDZTpvj9i9Aog9pF'),
 (27,'3Gb2NsBUCPYZgpLz5hgchV5qH4RMi6XnDw'),
 (28,'38HkEVeXfuRQ22Ma8R1v7ZQXDRiPWTTaYb'),
 (29,'3NTvi7EW4D5dhMuNNJdXpwTX2jyxvxhks5'),
 (30,'3KqKuf7STNxb7vBkLn3wSAE8AgUiGn3F4p'),
 (31,'38GGXxosngkvMRvYr5vF4LNAxR8soDeEGR'),
 (32,'3BadVe5mt3d58Bwg3vubL2rjp9ivwQSSS3'),
 (33,'3KC8QWYQB9F6EYrrXfgYu7x8FFehdFb8Tp'),
 (34,'3Qw9ZD2C6L4dcs7rS5WKdVPfkqrvUMZ6Y3'),
 (35,'34FarmWTUmT7YZqfeciJAYF3J8JwnaJNRu'),
 (36,'32GYk3sf2JdaMo3MpMRaSqo7kDcFqwuNvH'),
 (37,'3CWAXZyJPDSjAKeTUVKnWa4QqzxauU58nn'),
 (38,'3FGo26dpGQer37uY21kRbhGGw3gQqfXvm4'),
 (39,'3AMzrno8F8aQwo5idEXeURnG8LANu5ib3w'),
 (40,'347gsMC8TBcm9uCMZoJBWUk7aqKJJ61xR4'),
 (41,'3B6jk5HfdFzk9AKd247A9iosSLcq3VZta2'),
 (42,'3Q7epV6AgPRNASxT1qFsrdLiuMRcbHsEL2'),
 (43,'3JKCMfL5Wja5V4JeHw3ZL9WwjKjY4us5nh'),
 (44,'3F6M1Nm6xzSits3kvwoyrUYxzH52s2W4Sg'),
 (45,'3CcPxVyxB385pfCPHLVmZSVec7j9mzNiaY'),
 (46,'3FbPiXLS2DeKwJpcudd5oBB5ZhSN4axfkm'),
 (47,'3GVN1Q1JPhZRSTyrfvZqbuf8KCQjoFAxQq'),
 (48,'3HiWCx7wH8FGWAZYoj3QTMYhjGr5dfz1fx'),
 (49,'36mPeMGbUdby2rhxfqy9jBF2xWGgjiY9Lj'),
 (50,'3DFp8S3WUDfyfyKRARbs6RsA7E8JZ11fHw'),
 (51,'3DPg6JQHWAfphjdKo2JYJGEcpPYg6n6gED	'),
 (52,'3Ht3eezDgRQjX9LjSRtujySTUNWexPUnNj	'),
 (53,'3NXJNZhedPoKmzzjE7gqzHA4xANh1kuwJh'),
 (54,'3G23YcAqtpUD7bwjpzHXSxVn5HNNVTQoq6'),
 (55,'31pBe7Dryf22thrAM2oMkhouvCivb2PKjh'),
 (56,'3MTp5nDcAiiWScEaEHc1v7oCCKogiaFcB7'),
 (57,'373f21GSqU1dHWdHrsQ8NUHoKCFg4WzCZJ'),
 (58,'3ER8Y75KenANxaZmoX4Xfx2pKWuJwwu6q2'),
 (59,'3B4sZy43kKZXpQoi6NEoffPEsUBiXq4GfN'),
 (60,'3Pf3HkWN5S3Q5T3Ui4qeNzvZcx889nR6uz'),
 (61,'3Cn6goDK5c9PqwPEvjn1GFYMgSsjxR7USW'),
 (62,'3LHw7potvLh73rwKdebUAScjh7FL4usMWW'),
 (63,'3CvEid2iTkTRNd6WVU7iKSXXjuUHTNbysm'),
 (64,'372eBqtczgaE3Bohfx22goGc6VoTFxkffL'),
 (65,'3BEVpjcyXtcaidAmZvBf1ip6WgYbDXWweN'),
 (66,'3PDZpBAdPdcTh6GpVd5gwnbbJG2noK9gKG'),
 (67,'39NxJGmPhHeY6Jguw9rHN6K3kSDTddHP9q'),
 (68,'3NcC8TCDX935nqrkG19CECe9gK41W3R9CL'),
 (69,'3BRc7mqMJBjoDikBZVyKVS8Ysc13aRXk5p'),
 (70,'3JvGjnkiiFtX9i58cfCS5N44WbAN1bcx8H'),
 (71,'3CKQdS99vraNEPq6uL9GDk791piQfLguGT'),
 (72,'3HnH7WZqBCRrT2E1c8gycLW1y41Cs6ELNt'),
 (73,'3J2nw6zzKDUBrp4hhaDzPcCH5NTeVg85KB'),
 (74,'3415NNzt9jUNTJPFrMZd4ZJh9KkPnJuh8i'),
 (75,'3GDP3a8UT9xJMX7mytBJnAAPXjRJSCPrqv'),
 (76,'3NsXvZfJCHAkT1VoHJ1LTWJM35E7GraArq'),
 (77,'3DqZopw4i65zFbpJnyL8eesyvtbXv7kRp6'),
 (78,'395vrNoYyiGuknywWdnTUTy7Ymp1ZJaTTV'),
 (79,'3NX8NozJHEsY2YxRpZTPvyBs6GzqsgJmYt'),
 (80,'3ENexuH2JHq1pw78gjUs495xtZ5yCswHo6'),
 (81,'3GztL1rh3CfZmmXqXZekxkQd6hZiagMz6w'),
 (82,'3JLSz4mMxHr979qL5sv48b7jwJ3iWCVFXW'),
 (83,'36P6BrN8b9DcEF7ZcVBcp3EeFNqkD6GhGP'),
 (84,'3LUHqWSEZXJnvuWk9MpY5e5eKKRK2wP8E9'),
 (85,'3JMHLbHrU64Fpb6zjho6LBZZJoaLsfTz2U'),
 (86,'3ECBL4Yjp9AfqFzhh4hShrNMu87CzhqR8p'),
 (87,'35tmGFand86e8AiYm5aHEjVLSQTxk3iy5E'),
 (88,'344WLPCxWdBsJdKvwFC47PiY9k5CqA2Jkv'),
 (89,'3LwsRrumdUnkbyrPnFcNB2sJFTyVi2dm8y'),
 (90,'3Qjvjc6sYbSJu4VAo29r3RU1FCFFPTg8Kr'),
 (91,'3FrS12SN8qCkt8gQKH5JDLYGvrdA9f2Ak1'),
 (92,'3PkcPEepLifReSHJFJ96cTZfcMrhPMSe1D'),
 (93,'3MESvscf7kgJpGCXmwk9V6gaFP3wYshAPm'),
 (94,'3MAoooMtbMVEnHXRFTDcnRdE2puCuxVPdv'),
 (95,'3NKMy4byusyGWHrbg22fFtRotftGUn4eNS'),
 (96,'37cunQ991EoxYeARYs9e5knyfsXFFH9Pvu'),
 (97,'32sa1T18GMyptRukYYhdE71TBLFzLEnhSh'),
 (98,'3FPL1EvTYX6RPEAxrgemvn4Lf52mDX4PCL'),
 (99,'3NVRzMLAN4wbVizYSuoGy25qVT4zXHGKma'),
 (100,'3Q5MH7iVc1Q22o38AnwxQPWs2QktLBt8mG');
/*!40000 ALTER TABLE `wallet` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
