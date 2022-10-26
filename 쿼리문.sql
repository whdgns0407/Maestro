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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=euckr COLLATE=euckr_bin DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `accounts`
--

/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`,`name`,`password`,`2ndpassword`,`email`,`birth`,`btc`,`krw`,`realname`,`bankname`,`banknumber`) VALUES 
 (1,'admin','6cff222db01b76dbd90d69d8f9e359d4f86bed6a','904283a8d145df1957f1d79d6cce66e9229aa4e1','whdgns0407@gmail.com','960407','0.2500','507562.0',0xEAB480EBA6ACEC9E90,NULL,NULL),
 (2,'akdzl456','7d0b3dfe28595ed4a7cc24a2e0b9645a97d1f224','7d0b3dfe28595ed4a7cc24a2e0b9645a97d1f224','akdzl456@naver.com','960407','0.1894','236763.0',0xEBB095ECA285ED9B88,NULL,NULL),
 (3,'청은이꼬추장볶음','63a876afd95b3e34ca7475d57c36453aa4754a53','45879014f7666ec12d1689613c035101d654ae8c','dign32199@naver.com','970626','100002.9632','45019999249.0',0xEAB980ECB2ADEAB8B0,NULL,NULL),
 (4,'키작은청은이','60149a289a3623cd214943af2892e103f4bddafb','8929b61a0e6b985943edc6d13c9992dc661e4f09','rms6990@naver.com','960618','0.0000','8.0',0xEAB980ECB2ADEC9D80E38584,NULL,NULL),
 (5,'asd','8929b61a0e6b985943edc6d13c9992dc661e4f09','8929b61a0e6b985943edc6d13c9992dc661e4f09','asd@asd.com','000115','0.3005','102735.0',0x617364,NULL,NULL),
 (6,'qweqweqw','76aa61600afb9fdb479706598ee615c2a37ef84f','461959680cfc32ada2e47a871606ca534c40cb94','qqqq@qqqq.com','123123','0.3000','87500.0',0x61646173736164736164,NULL,NULL),
 (8,'asdzxc','0be8eddd857066ca2eaae01794310812ffe99e08','0be8eddd857066ca2eaae01794310812ffe99e08','cjddms2@naver.com','123456','0.3000','100000.0',0xECB2ADEC9D80EAB980,NULL,NULL),
 (9,'Easier','4fd29727946df36ca20b48e3329ca2271f66df91','58d310561215ea09e4dda2ff37a91e39ea8ee944','kslel721@naver.com','960409','0.3000','100000.0',0xEAB980EAB79CED9998,NULL,NULL);
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
 (5,'admin','게시글 5 입니다.','게시글 5 입니다.','2018-12-03',6,'whdgns0407@gmail.com','2018-12-03 05:59:31',NULL,NULL),
 (6,'admin','아무말 대잔치 !','아무말 대잔치 !','2018-12-03',3,'whdgns0407@gmail.com','2018-12-03 06:00:07',NULL,NULL),
 (7,'admin','아 할말 없다!','아 할말 없다!','2018-12-03',11,'whdgns0407@gmail.com','2018-12-03 06:00:26',NULL,NULL),
 (8,'admin','아 할말 없다 2','아 할말 없다 2','2018-12-03',2,'whdgns0407@gmail.com','2018-12-03 06:00:36',NULL,NULL),
 (9,'admin','아 ㅇㄻㄴㅇㄹㄴㅁㄻㄴㅇㄻㄴㅇㄹ','ㅁㄴㅇㄻㄴㅇㄻㄴㄹㅇㄴ','2018-12-03',4,'whdgns0407@gmail.com','2018-12-03 06:00:45',NULL,NULL),
 (10,'admin','ㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋ','ㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋ','2018-12-03',14,'whdgns0407@gmail.com','2018-12-03 06:00:57',NULL,NULL),
 (11,'','관라지에 의해 차단 된 글 입니다.','관라지에 의해 차단 된 글 입니다.','2018-12-03',41,'','2018-12-03 19:10:03',NULL,NULL),
 (13,'akdzl456','ㅇㅋㅇㅋ','ㅇㅋㅇ\r\nㅇㅋㅇㅋㅇㅋ','2018-12-03',16,'akdzl456@naver.com','2018-12-03 23:00:02',NULL,NULL),
 (14,'admin','비트코인 가즈아ㅏㅏ','비트코인 가즈아ㅏㅏ','2018-12-05',28,'whdgns0407@gmail.com','2018-12-05 00:18:54',NULL,NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`idx`,`title`,`content`,`date`,`email`,`reply`,`type`,`ing`) VALUES 
 (1,'관리자님 안녕하세요 ㅎㅎ','관리자님 안녕하세요 ㅎㅎ','2018-12-02 22:03:33','whdgns0407@gmail.com','네 반가워요 박종훈 류현우 김지훈 씨~','입금출금 관련',1),
 (2,'ㅎㅇㅎㅇㅎㅇㅎ','ㅇㅎㅇㅎㅇㅎㅇㅎㅇ','2018-12-03 06:09:11','whdgns0407@gmail.com',NULL,'입금출금 관련',0),
 (3,'내역체크','나보기가 역겨워 가실 때에는\r\n뒤지지 왜 여기왔냐\r\n엔터키는 되던가','2018-12-03 20:26:08','asd@asd.com','엔터키 적용 됩니다. 감사합니다.','기타 문의 사항',1),
 (4,'돈좀줘요','1231231','2018-12-05 17:32:08','akdzl456@naver.com',NULL,'입금출금 관련',0);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


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
 (1,'admin','whdgns0407@gmail.com','[안내] 마에스트로거래소에 오신것을 환영 합니다.','마에스트로거래소에 오신것을 환영 합니다. \r\n서비스에 최선을 다하겠습니다.\r\n감사합니다.','2018-11-11',67,0,'','2018-11-11 23:52:00'),
 (2,'admin','whdgns0407@gmail.com','[안내] 마에스트로거래소 베타서비스 오픈','마에스트로거래소 베타서비스 오픈\r\n\r\n\r\n\r\n베타서비스 오픈 기념\r\n마에스트로거래소에 회원가입 시 0.3 BTC 상당의 비트코인 과 100,000 KRW 가 계정에 반영 됩니다.\r\n\r\n\r\n마에스트로거래소를 이용해 주셔서 감사합니다.\r\n','2018-11-14',20,NULL,NULL,'2018-11-14 01:52:35'),
 (3,'admin','whdgns0407@gmail.com','[보안] 지갑주소 변환 악성코드 주의','최근 악성코드를 이용하여 지갑주소를 바꿔치기 하는 사례가 확인되어 주의를 당부 드립니다.\r\n\r\n\r\n\r\n암호화폐 지갑 주소는 화폐 종류에 따라 영문 대소문자와 숫자가 무질서하게 뒤섞인 30~40 긴 문자열로 이루어져있습니다.\r\n\r\n예시: 1DT4vwU8DYZVtgVHdU######1GyoDPLBaF\r\n\r\n\r\n\r\n악성코드는 사용자가 입출금을 위해 지갑주소를 복사(Ctrl+C)하여 붙여넣기(Ctrl+V)하는 과정에서, 클립보드에 저장된 정상 주소를 공격자(해커)의 지갑 주소로 변환합니다. 사용자는 이런 현상을 인지하지 못하고, 정상 주소가 아닌 공격자(해커)의 지갑으로 전송 하게 됩니다.\r\n\r\n\r\n\r\n위와 같은 피해를 막기위해, 아래의 사항을 권장 합니다.\r\n\r\n1. OS, 백신, 웹 브라우저 등의 최신 업데이트를 권장\r\n\r\n2. 발신처가 불분명한 메일의 첨부 파일 다운로드 및 열람 금지\r\n\r\n3. 암호화폐 송금 시 송금 주소를 다시 한번 확인','2018-11-23',16,NULL,NULL,'2018-11-23 20:26:23'),
 (4,'admin','whdgns0407@gmail.com','[이벤트] 가입하고 비트코인 받자!','[이벤트] 가입하고 비트코인 받자!\r\n\r\n\r\n지급대상:\r\n대상 기간 내 회원가입 시\r\n\r\n경품:\r\n0.3 BTC 지급\r\n\r\n지급방법:\r\n가입 즉시\r\n\r\n마에스트로를 이용해 주셔서 감사합니다.\r\n\r\n마에스트로 거래소 드림','2018-11-25',7,NULL,NULL,'2018-11-25 06:47:29'),
 (5,'admin','whdgns0407@gmail.com','[이벤트] 가입하고 원화 받자!','[이벤트] 가입하고 원화 받자!\r\n\r\n\r\n지급대상:\r\n대상 기간 내 회원가입 시\r\n\r\n경품:\r\n100,000 KRW 지급\r\n\r\n지급방법:\r\n가입 즉시\r\n\r\n마에스트로를 이용해 주셔서 감사합니다.\r\n\r\n마에스트로 거래소 드림','2018-11-25',25,NULL,NULL,'2018-11-25 06:48:32'),
 (6,'admin','whdgns0407@gmail.com','[안내]숫자 도박 게임 오픈 안내','[안내] 마에스트로 거래소 게임 오픈 안내\r\n\r\n숫자 도박 게임이 창설 되었으니 많은 이용 바랍니다.\r\n\r\n해당 숫자 입력시 1/입력숫자 로 당첨확률이 계산되며, 배팅 금액 * 입력숫자 가 당첨 금액 입니다.\r\n\r\n감사합니다.\r\n\r\n<a href=\"http://coinpark.iptime.org/game/numbergame.php\" target=\"_parent\"> 숫자도박 하러가기 </a>\r\n\r\n-마에스트로 거래소','2018-12-01',13,NULL,NULL,'2018-12-01 06:13:58'),
 (7,'admin','whdgns0407@gmail.com','[보안] 비트코인 핫 월렛 보안상태 안내','안녕하세요.\r\n마에스트로 거래소 입니다.\r\n저희 마에스트로 거래소는 핫 월렛 접근 비밀번호 및 보안이 15글자 이상의 문자열, 대소문자, 숫자가 조합되어 있으며, 접근 시 이메일 인증(이메일 OTP로 보호중) 및 30초 마다 변경되는 OTP에 의해 안전하게 보관 되고 있습니다.\r\n\r\n마에스트로 거래소 핫 월렛은 거래소와 연결점이 없도록 망분리를 통하여 관리 되고 있습니다.\r\n\r\n항상 최선을 다하는 마에스트로 거래소가 되겠습니다.\r\n\r\n감사합니다.','2018-12-01',16,NULL,NULL,'2018-12-01 06:17:06'),
 (8,'admin','whdgns0407@gmail.com','[안내] 호가창 개설','[안내] 호가창 개설\r\n\r\n국내최대 암호화폐 거래소 업비트 API의 실시간 가격연동으로 실시간 호가창이 개설 되었습니다.\r\n이용해 주셔서 감사합니다.\r\n\r\n- 마에스트로거래소\r\n\r\n','2018-12-02',13,NULL,NULL,'2018-12-02 06:50:10'),
 (9,'admin','whdgns0407@gmail.com','[안내] 랜덤 게임 오픈 안내','[안내] 마에스트로 거래소 게임 오픈 안내\r\n\r\n랜덤 도박 게임이 창설 되었으니 많은 이용 바랍니다.\r\n\r\n감사합니다.\r\n\r\n\r\n-마에스트로 거래소','2018-12-03',13,NULL,NULL,'2018-12-03 06:05:06'),
 (10,'admin','whdgns0407@gmail.com','[안내] 마에스트로 거래소','[안내] 마에스트로 거래소\r\n\r\n해당 웹페이지는 경상대학교 컴퓨터과학과 마에스트로거래소 발표 페이지 이며, 팀원은 박종훈, 류현우, 김지훈 입니다.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<b>해당 웹페이지의 저작권은 박종훈에게 있으며, 해당 웹페이지의 소스를 다운로드하여 응용은 가능하나, 무단 유포를 금지합니다.</b>\r\n\r\n무단 유포시 강력하게 법적 처벌 하오니 참고하시기 바랍니다.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n','2018-12-05',10,NULL,NULL,'2018-12-05 00:10:22');
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=euckr;

--
-- Dumping data for table `reply`
--

/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` (`idx`,`con_num`,`name`,`pw`,`content`,`date`) VALUES 
 (1,5,'admin','whdgns0407@gmail.com','댓글','2018-12-03 05:59:39'),
 (3,11,'키작은청은이','rms6990@naver.com','키가 좀...','2018-12-03 21:50:31'),
 (7,14,'admin','whdgns0407@gmail.com','DZ','2018-12-05 02:55:16'),
 (10,14,'akdzl456','akdzl456@naver.com','떡상 가즈아ㅣ\r\n','2018-12-05 17:30:07'),
 (11,11,'akdzl456','akdzl456@naver.com','210202','2018-12-05 17:30:14');
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
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=euckr;

--
-- Dumping data for table `txid`
--

/*!40000 ALTER TABLE `txid` DISABLE KEYS */;
INSERT INTO `txid` (`idx`,`email`,`type`,`address`,`krwamount`,`commission`,`krwsum`,`ing`,`ledger`,`changemoney`,`date`,`btcamount`,`changebtc`,`btcsum`,`memo`) VALUES 
 (1,'whdgns0407@gmail.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'입금','100000.0','2018-12-03 05:28:36',NULL,NULL,NULL,'이벤트 입금'),
 (2,'whdgns0407@gmail.com','BTC',NULL,NULL,NULL,NULL,3,'입금','100000.0','2018-12-03 05:28:36','0.30000','0.30000','0.30000','이벤트 입금'),
 (3,'whdgns0407@gmail.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','95000.0','2018-12-03 05:35:50',NULL,'0.30000',NULL,'5000원 2배 배팅'),
 (4,'whdgns0407@gmail.com','KRW',NULL,'10000.0',NULL,'10000.0',3,'배팅-입금','105000.0','2018-12-03 05:35:50',NULL,'0.30000',NULL,'당첨금'),
 (5,'whdgns0407@gmail.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','105000.0','2018-12-03 05:35:55','-0.00500','0.29500','-0.00500','0.005BTC 2배 배팅'),
 (6,'whdgns0407@gmail.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-입금','105000.0','2018-12-03 05:35:55','0.01000','0.30500','0.01000','당첨금'),
 (7,'whdgns0407@gmail.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','104000.0','2018-12-03 05:36:19',NULL,'0.30500',NULL,'1000원 100배 배팅'),
 (8,'whdgns0407@gmail.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'배팅-입금','204000.0','2018-12-03 05:36:19',NULL,'0.30500',NULL,'당첨금'),
 (9,'whdgns0407@gmail.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','203000.0','2018-12-03 05:39:01',NULL,'0.30500',NULL,'1000원 돌림판 배팅'),
 (10,'whdgns0407@gmail.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','203000.0','2018-12-03 05:39:01',NULL,'0.30500',NULL,'0배 당첨금'),
 (11,'whdgns0407@gmail.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','202000.0','2018-12-03 05:41:30',NULL,'0.30500',NULL,'1000원 돌림판 배팅'),
 (12,'whdgns0407@gmail.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','202000.0','2018-12-03 05:41:30',NULL,'0.30500',NULL,'0배 당첨금'),
 (13,'whdgns0407@gmail.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','201000.0','2018-12-03 05:41:39',NULL,'0.30500',NULL,'1000원 돌림판 배팅'),
 (14,'whdgns0407@gmail.com','KRW',NULL,'2000.0',NULL,'2000.0',3,'배팅-입금','203000.0','2018-12-03 05:41:39',NULL,'0.30500',NULL,'2배 당첨금'),
 (15,'whdgns0407@gmail.com','KRW',NULL,'-5.0',NULL,'-5.0',3,'배팅-출금','202995.0','2018-12-03 05:42:04',NULL,'0.30500',NULL,'5원 돌림판 배팅'),
 (16,'whdgns0407@gmail.com','KRW',NULL,'15.0',NULL,'15.0',3,'배팅-입금','203010.0','2018-12-03 05:42:04',NULL,'0.30500',NULL,'3배 당첨금'),
 (17,'whdgns0407@gmail.com','KRW',NULL,'-5.0',NULL,'-5.0',3,'배팅-출금','203005.0','2018-12-03 05:42:28',NULL,'0.30500',NULL,'5원 돌림판 배팅'),
 (18,'whdgns0407@gmail.com','KRW',NULL,'10.0',NULL,'10.0',3,'배팅-입금','203015.0','2018-12-03 05:42:28',NULL,'0.30500',NULL,'2배 당첨금'),
 (19,'whdgns0407@gmail.com','KRW',NULL,'-5.0',NULL,'-5.0',3,'배팅-출금','203010.0','2018-12-03 05:42:34',NULL,'0.30500',NULL,'5원 돌림판 배팅'),
 (20,'whdgns0407@gmail.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','203010.0','2018-12-03 05:42:34',NULL,'0.30500',NULL,'0배 당첨금'),
 (21,'whdgns0407@gmail.com','KRW',NULL,'-100.0',NULL,'-100.0',3,'배팅-출금','202910.0','2018-12-03 05:43:22',NULL,'0.30500',NULL,'100원 돌림판 배팅'),
 (22,'whdgns0407@gmail.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','202910.0','2018-12-03 05:43:22',NULL,'0.30500',NULL,'0배 당첨금'),
 (23,'whdgns0407@gmail.com','KRW',NULL,'-2.0',NULL,'-2.0',3,'배팅-출금','202908.0','2018-12-03 05:43:32',NULL,'0.30500',NULL,'2원 돌림판 배팅'),
 (24,'whdgns0407@gmail.com','KRW',NULL,'10.0',NULL,'10.0',3,'배팅-입금','202918.0','2018-12-03 05:43:32',NULL,'0.30500',NULL,'5배 당첨금'),
 (25,'whdgns0407@gmail.com','KRW',NULL,'-2.0',NULL,'-2.0',3,'배팅-출금','202916.0','2018-12-03 05:43:43',NULL,'0.30500',NULL,'2원 돌림판 배팅'),
 (26,'whdgns0407@gmail.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','202916.0','2018-12-03 05:43:43',NULL,'0.30500',NULL,'0배 당첨금'),
 (27,'whdgns0407@gmail.com','KRW',NULL,'-2.0',NULL,'-2.0',3,'배팅-출금','202914.0','2018-12-03 05:43:55',NULL,'0.30500',NULL,'2원 돌림판 배팅'),
 (28,'whdgns0407@gmail.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','202914.0','2018-12-03 05:43:55',NULL,'0.30500',NULL,'0배 당첨금'),
 (29,'whdgns0407@gmail.com','KRW','농협중앙회 3021209045321','-50000.0','-1000.0000','-51000.0',2,'출금','151914.0','2018-12-03 06:10:42',NULL,'0.30500',NULL,'출금 완료'),
 (30,'whdgns0407@gmail.com','KRW','한국은행 12132132123123','-5000.0','-1000.0000','-6000.0',0,'출금','145914.0','2018-12-03 06:12:05',NULL,'0.30500',NULL,'계좌 오류'),
 (31,'whdgns0407@gmail.com','KRW',NULL,'6000.0',NULL,'6000.0',3,'입금','151914.0','2018-12-03 06:13:15',NULL,NULL,NULL,'출금 취소 환급'),
 (32,'whdgns0407@gmail.com','BTC',NULL,NULL,NULL,NULL,3,'외부입금',NULL,'2018-12-03 06:15:15','0.00350','0.30850','0.00350','4ef0bb4b5eeaef367a2d52b2cca07e15a036958c8eb09a9d67508f6953ddaea4'),
 (33,'whdgns0407@gmail.com','KRW',NULL,'5000.0',NULL,'5000.0',3,'계좌입금','156914.0','2018-12-03 06:18:18',NULL,NULL,NULL,'계좌 입금'),
 (34,'whdgns0407@gmail.com','KRW',NULL,'-5.0',NULL,'-5.0',3,'배팅-출금','151909.0','2018-12-03 06:55:53',NULL,'0.30850',NULL,'5원 돌림판 배팅'),
 (35,'whdgns0407@gmail.com','KRW',NULL,'10.0',NULL,'10.0',3,'배팅-입금','151919.0','2018-12-03 06:55:53',NULL,'0.30850',NULL,'2배 당첨금'),
 (36,'whdgns0407@gmail.com','KRW-BTC',NULL,'1457354.0',NULL,'1457354.0',3,'매도-BTC','1609273.0','2018-12-03 07:16:24','-0.30850','0.00000','-0.30850','4724000.0원/0.3085BTC'),
 (37,'whdgns0407@gmail.com','KRW',NULL,'-2.0',NULL,'-2.0',3,'배팅-출금','1609271.0','2018-12-03 07:18:07',NULL,'0.00000',NULL,'2원 돌림판 배팅'),
 (38,'whdgns0407@gmail.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','1609271.0','2018-12-03 07:18:07',NULL,'0.00000',NULL,'0배 당첨금'),
 (39,'whdgns0407@gmail.com','KRW',NULL,'-2.0',NULL,'-2.0',3,'배팅-출금','1609269.0','2018-12-03 07:18:23',NULL,'0.00000',NULL,'2원 돌림판 배팅'),
 (40,'whdgns0407@gmail.com','KRW',NULL,'2.0',NULL,'2.0',3,'배팅-입금','1609271.0','2018-12-03 07:18:23',NULL,'0.00000',NULL,'1배 당첨금'),
 (41,'whdgns0407@gmail.com','KRW-BTC',NULL,'-1608853.0',NULL,'-1608853.0',3,'매수-BTC','418.0','2018-12-03 07:21:23','0.34180','0.34180','0.34180','4707000.0원/0.3418BTC'),
 (42,'whdgns0407@gmail.com','KRW-BTC',NULL,'1609194.0',NULL,'1609194.0',3,'매도-BTC','1609612.0','2018-12-03 07:22:10','-0.34180','0.00000','-0.34180','4708000.0원/0.3418BTC'),
 (43,'akdzl456@naver.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'입금','100000.0','2018-12-03 16:18:32',NULL,NULL,NULL,'이벤트 입금'),
 (44,'akdzl456@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금','100000.0','2018-12-03 16:18:32','0.30000','0.30000','0.30000','이벤트 입금'),
 (45,'akdzl456@naver.com','KRW',NULL,'-2000.0',NULL,'-2000.0',3,'배팅-출금','98000.0','2018-12-03 16:20:38',NULL,'0.30000',NULL,'2000원 돌림판 배팅'),
 (46,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','98000.0','2018-12-03 16:20:38',NULL,'0.30000',NULL,'0배 당첨금'),
 (47,'akdzl456@naver.com','KRW',NULL,'-1.0',NULL,'-1.0',3,'배팅-출금','97999.0','2018-12-03 17:44:16',NULL,'0.30000',NULL,'1원 돌림판 배팅'),
 (48,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','97999.0','2018-12-03 17:44:16',NULL,'0.30000',NULL,'0배 당첨금'),
 (49,'akdzl456@naver.com','KRW-BTC',NULL,'-97889.0',NULL,'-97889.0',3,'매수-BTC','110.0','2018-12-03 17:46:16','0.02170','0.32170','0.02170','4511000.0원/0.0217BTC'),
 (50,'akdzl456@naver.com','KRW-BTC',NULL,'455.0',NULL,'455.0',3,'매도-BTC','565.0','2018-12-03 18:28:09','-0.00010','0.32160','-0.00010','4551000.0원/0.0001BTC'),
 (51,'akdzl456@naver.com','KRW-BTC',NULL,'455000.0',NULL,'455000.0',3,'매도-BTC','455565.0','2018-12-03 18:28:33','-0.10000','0.22160','-0.10000','4550000.0원/0.1BTC'),
 (52,'akdzl456@naver.com','KRW','한국은행 121321231','-5000.0','-1000.0000','-6000.0',1,'출금','449565.0','2018-12-03 18:40:38',NULL,'0.22160',NULL,NULL),
 (53,'akdzl456@naver.com','BTC','fsdfdsfsdfdsfsd',NULL,'-0.0001',NULL,1,'출금','449565.0','2018-12-03 18:53:46','-0.02000','0.20150','-0.02010',NULL),
 (54,'dign32199@naver.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'입금','100000.0','2018-12-03 19:08:50',NULL,NULL,NULL,'이벤트 입금'),
 (55,'dign32199@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금','100000.0','2018-12-03 19:08:50','0.30000','0.30000','0.30000','이벤트 입금'),
 (56,'dign32199@naver.com','KRW-BTC',NULL,'-91040.0',NULL,'-91040.0',3,'매수-BTC','8960.0','2018-12-03 19:11:23','0.02000','0.32000','0.02000','4552000.0원/0.02BTC'),
 (57,'akdzl456@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','449565.0','2018-12-03 19:11:41','-0.05000','0.15150','-0.05000','미당첨 0.05BTC 2배 배팅'),
 (58,'dign32199@naver.com','KRW-BTC',NULL,'1455680.0',NULL,'1455680.0',3,'매도-BTC','1464640.0','2018-12-03 19:12:20','-0.32000','0.00000','-0.32000','4549000.0원/0.32BTC'),
 (59,'dign32199@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','1459640.0','2018-12-03 19:13:11',NULL,'0.00000',NULL,'5000원 돌림판 배팅'),
 (60,'dign32199@naver.com','KRW',NULL,'15000.0',NULL,'15000.0',3,'배팅-입금','1474640.0','2018-12-03 19:13:11',NULL,'0.00000',NULL,'3배 당첨금'),
 (61,'dign32199@naver.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','1473640.0','2018-12-03 19:13:32',NULL,'0.00000',NULL,'1000원 돌림판 배팅'),
 (62,'dign32199@naver.com','KRW',NULL,'1000.0',NULL,'1000.0',3,'배팅-입금','1474640.0','2018-12-03 19:13:32',NULL,'0.00000',NULL,'1배 당첨금'),
 (63,'dign32199@naver.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','1473640.0','2018-12-03 19:16:26',NULL,'0.00000',NULL,'1000원 2배 배팅'),
 (64,'dign32199@naver.com','KRW',NULL,'2000.0',NULL,'2000.0',3,'배팅-입금','1475640.0','2018-12-03 19:16:26',NULL,'0.00000',NULL,'당첨금'),
 (65,'dign32199@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','1465640.0','2018-12-03 19:16:47',NULL,'0.00000',NULL,'미당첨 10000원 5배 배팅'),
 (66,'dign32199@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','1455640.0','2018-12-03 19:16:54',NULL,'0.00000',NULL,'미당첨 10000원 5배 배팅'),
 (67,'dign32199@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','1445640.0','2018-12-03 19:16:55',NULL,'0.00000',NULL,'10000원 5배 배팅'),
 (68,'dign32199@naver.com','KRW',NULL,'50000.0',NULL,'50000.0',3,'배팅-입금','1495640.0','2018-12-03 19:16:55',NULL,'0.00000',NULL,'당첨금'),
 (69,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1395640.0','2018-12-03 19:17:23',NULL,'0.00000',NULL,'100000원 2배 배팅'),
 (70,'dign32199@naver.com','KRW',NULL,'200000.0',NULL,'200000.0',3,'배팅-입금','1595640.0','2018-12-03 19:17:23',NULL,'0.00000',NULL,'당첨금'),
 (71,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1495640.0','2018-12-03 19:17:29',NULL,'0.00000',NULL,'미당첨 100000원 2배 배팅'),
 (72,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1395640.0','2018-12-03 19:17:35',NULL,'0.00000',NULL,'100000원 2배 배팅'),
 (73,'dign32199@naver.com','KRW',NULL,'200000.0',NULL,'200000.0',3,'배팅-입금','1595640.0','2018-12-03 19:17:35',NULL,'0.00000',NULL,'당첨금'),
 (74,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1495640.0','2018-12-03 19:17:41',NULL,'0.00000',NULL,'100000원 2배 배팅'),
 (75,'dign32199@naver.com','KRW',NULL,'200000.0',NULL,'200000.0',3,'배팅-입금','1695640.0','2018-12-03 19:17:41',NULL,'0.00000',NULL,'당첨금'),
 (76,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1595640.0','2018-12-03 19:17:47',NULL,'0.00000',NULL,'100000원 2배 배팅'),
 (77,'dign32199@naver.com','KRW',NULL,'200000.0',NULL,'200000.0',3,'배팅-입금','1795640.0','2018-12-03 19:17:47',NULL,'0.00000',NULL,'당첨금'),
 (78,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1695640.0','2018-12-03 19:17:54',NULL,'0.00000',NULL,'미당첨 100000원 2배 배팅'),
 (79,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1595640.0','2018-12-03 19:18:01',NULL,'0.00000',NULL,'미당첨 100000원 2배 배팅'),
 (80,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1495640.0','2018-12-03 19:18:07',NULL,'0.00000',NULL,'미당첨 100000원 2배 배팅'),
 (81,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1395640.0','2018-12-03 19:18:12',NULL,'0.00000',NULL,'미당첨 100000원 2배 배팅'),
 (82,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1295640.0','2018-12-03 19:18:17',NULL,'0.00000',NULL,'100000원 2배 배팅'),
 (83,'dign32199@naver.com','KRW',NULL,'200000.0',NULL,'200000.0',3,'배팅-입금','1495640.0','2018-12-03 19:18:17',NULL,'0.00000',NULL,'당첨금'),
 (84,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','1395640.0','2018-12-03 19:18:23',NULL,'0.00000',NULL,'미당첨 100000원 2배 배팅'),
 (85,'dign32199@naver.com','KRW',NULL,'-1000000.0',NULL,'-1000000.0',3,'배팅-출금','395640.0','2018-12-03 19:18:29',NULL,'0.00000',NULL,'미당첨 1000000원 2배 배팅'),
 (86,'dign32199@naver.com','KRW',NULL,'-390000.0',NULL,'-390000.0',3,'배팅-출금','5640.0','2018-12-03 19:18:37',NULL,'0.00000',NULL,'390000원 2배 배팅'),
 (87,'dign32199@naver.com','KRW',NULL,'780000.0',NULL,'780000.0',3,'배팅-입금','785640.0','2018-12-03 19:18:37',NULL,'0.00000',NULL,'당첨금'),
 (88,'dign32199@naver.com','KRW',NULL,'-700000.0',NULL,'-700000.0',3,'배팅-출금','85640.0','2018-12-03 19:18:42',NULL,'0.00000',NULL,'미당첨 700000원 2배 배팅'),
 (89,'dign32199@naver.com','KRW',NULL,'-80000.0',NULL,'-80000.0',3,'배팅-출금','5640.0','2018-12-03 19:18:52',NULL,'0.00000',NULL,'80000원 2배 배팅'),
 (90,'dign32199@naver.com','KRW',NULL,'160000.0',NULL,'160000.0',3,'배팅-입금','165640.0','2018-12-03 19:18:52',NULL,'0.00000',NULL,'당첨금'),
 (91,'dign32199@naver.com','KRW',NULL,'-160000.0',NULL,'-160000.0',3,'배팅-출금','5640.0','2018-12-03 19:19:04',NULL,'0.00000',NULL,'미당첨 160000원 2배 배팅'),
 (92,'dign32199@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','640.0','2018-12-03 19:19:10',NULL,'0.00000',NULL,'5000원 2배 배팅'),
 (93,'dign32199@naver.com','KRW',NULL,'10000.0',NULL,'10000.0',3,'배팅-입금','10640.0','2018-12-03 19:19:10',NULL,'0.00000',NULL,'당첨금'),
 (94,'dign32199@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','640.0','2018-12-03 19:19:15',NULL,'0.00000',NULL,'10000원 2배 배팅'),
 (95,'dign32199@naver.com','KRW',NULL,'20000.0',NULL,'20000.0',3,'배팅-입금','20640.0','2018-12-03 19:19:15',NULL,'0.00000',NULL,'당첨금'),
 (96,'dign32199@naver.com','KRW',NULL,'-20000.0',NULL,'-20000.0',3,'배팅-출금','640.0','2018-12-03 19:19:20',NULL,'0.00000',NULL,'미당첨 20000원 2배 배팅'),
 (97,'dign32199@naver.com','KRW',NULL,'10000000.0',NULL,'10000000.0',3,'입금','10000640.0','2018-12-03 20:15:03',NULL,NULL,NULL,'김청은섹스비'),
 (98,'rms6990@naver.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'입금','100000.0','2018-12-03 20:19:32',NULL,NULL,NULL,'이벤트 입금'),
 (99,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금','100000.0','2018-12-03 20:19:32','0.30000','0.30000','0.30000','이벤트 입금'),
 (100,'rms6990@naver.com','KRW-BTC',NULL,'-99836.0',NULL,'-99836.0',3,'매수-BTC','164.0','2018-12-03 20:20:35','0.02200','0.32200','0.02200','4538000.0원/0.022BTC'),
 (101,'rms6990@naver.com','KRW-BTC',NULL,'1462524.0',NULL,'1462524.0',3,'매도-BTC','1462688.0','2018-12-03 20:20:50','-0.32200','0.00000','-0.32200','4542000.0원/0.322BTC'),
 (102,'rms6990@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','1452688.0','2018-12-03 20:21:24',NULL,'0.00000',NULL,'미당첨 10000원 2배 배팅'),
 (103,'asd@asd.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'입금','100000.0','2018-12-03 20:21:35',NULL,NULL,NULL,'이벤트 입금'),
 (104,'asd@asd.com','BTC',NULL,NULL,NULL,NULL,3,'입금','100000.0','2018-12-03 20:21:35','0.30000','0.30000','0.30000','이벤트 입금'),
 (105,'rms6990@naver.com','KRW',NULL,'-1450000.0',NULL,'-1450000.0',3,'배팅-출금','2688.0','2018-12-03 20:21:53',NULL,'0.00000',NULL,'1450000원 돌림판 배팅'),
 (106,'rms6990@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','2688.0','2018-12-03 20:21:53',NULL,'0.00000',NULL,'0배 당첨금'),
 (107,'rms6990@naver.com','KRW',NULL,'-2600.0',NULL,'-2600.0',3,'배팅-출금','88.0','2018-12-03 20:22:05',NULL,'0.00000',NULL,'2600원 돌림판 배팅'),
 (108,'rms6990@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','88.0','2018-12-03 20:22:05',NULL,'0.00000',NULL,'0배 당첨금'),
 (109,'asd@asd.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','99000.0','2018-12-03 20:22:06',NULL,'0.30000',NULL,'1000원 돌림판 배팅'),
 (110,'asd@asd.com','KRW',NULL,'3000.0',NULL,'3000.0',3,'배팅-입금','102000.0','2018-12-03 20:22:06',NULL,'0.30000',NULL,'3배 당첨금'),
 (111,'rms6990@naver.com','KRW',NULL,'-80.0',NULL,'-80.0',3,'배팅-출금','8.0','2018-12-03 20:22:20',NULL,'0.00000',NULL,'80원 돌림판 배팅'),
 (112,'rms6990@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','8.0','2018-12-03 20:22:20',NULL,'0.00000',NULL,'0배 당첨금'),
 (113,'asd@asd.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','101000.0','2018-12-03 20:22:27',NULL,'0.30000',NULL,'1000원 돌림판 배팅'),
 (114,'asd@asd.com','KRW',NULL,'4000.0',NULL,'4000.0',3,'배팅-입금','105000.0','2018-12-03 20:22:27',NULL,'0.30000',NULL,'4배 당첨금'),
 (115,'asd@asd.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','104000.0','2018-12-03 20:22:42',NULL,'0.30000',NULL,'1000원 돌림판 배팅'),
 (116,'asd@asd.com','KRW',NULL,'1000.0',NULL,'1000.0',3,'배팅-입금','105000.0','2018-12-03 20:22:42',NULL,'0.30000',NULL,'1배 당첨금'),
 (117,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','9900640.0','2018-12-03 20:27:41',NULL,'0.00000',NULL,'100000원 2배 배팅'),
 (118,'dign32199@naver.com','KRW',NULL,'200000.0',NULL,'200000.0',3,'배팅-입금','10100640.0','2018-12-03 20:27:41',NULL,'0.00000',NULL,'당첨금'),
 (119,'dign32199@naver.com','KRW',NULL,'-1000000.0',NULL,'-1000000.0',3,'배팅-출금','9100640.0','2018-12-03 20:27:50',NULL,'0.00000',NULL,'1000000원 2배 배팅'),
 (120,'dign32199@naver.com','KRW',NULL,'2000000.0',NULL,'2000000.0',3,'배팅-입금','11100640.0','2018-12-03 20:27:50',NULL,'0.00000',NULL,'당첨금'),
 (121,'dign32199@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','11090640.0','2018-12-03 20:32:47',NULL,'0.00000',NULL,'미당첨 10000원 2배 배팅'),
 (122,'dign32199@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','11080640.0','2018-12-03 20:32:52',NULL,'0.00000',NULL,'미당첨 10000원 2배 배팅'),
 (123,'dign32199@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','11070640.0','2018-12-03 20:32:57',NULL,'0.00000',NULL,'10000원 2배 배팅'),
 (124,'dign32199@naver.com','KRW',NULL,'20000.0',NULL,'20000.0',3,'배팅-입금','11090640.0','2018-12-03 20:32:57',NULL,'0.00000',NULL,'당첨금'),
 (125,'dign32199@naver.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','11080640.0','2018-12-03 20:33:05',NULL,'0.00000',NULL,'10000원 2배 배팅'),
 (126,'dign32199@naver.com','KRW',NULL,'20000.0',NULL,'20000.0',3,'배팅-입금','11100640.0','2018-12-03 20:33:05',NULL,'0.00000',NULL,'당첨금'),
 (127,'dign32199@naver.com','KRW',NULL,'-1000000.0',NULL,'-1000000.0',3,'배팅-출금','10100640.0','2018-12-03 20:33:13',NULL,'0.00000',NULL,'미당첨 1000000원 2배 배팅'),
 (128,'dign32199@naver.com','KRW',NULL,'-1000000.0',NULL,'-1000000.0',3,'배팅-출금','9100640.0','2018-12-03 20:33:24',NULL,'0.00000',NULL,'미당첨 1000000원 5배 배팅'),
 (129,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','9000640.0','2018-12-03 20:33:31',NULL,'0.00000',NULL,'미당첨 100000원 5배 배팅'),
 (130,'dign32199@naver.com','KRW',NULL,'-100000.0',NULL,'-100000.0',3,'배팅-출금','8900640.0','2018-12-03 20:33:32',NULL,'0.00000',NULL,'미당첨 100000원 5배 배팅'),
 (131,'dign32199@naver.com','KRW-BTC',NULL,'-8900391.0',NULL,'-8900391.0',3,'매수-BTC','249.0','2018-12-03 20:33:46','1.96260','1.96260','1.96260','4535000.0원/1.9626BTC'),
 (132,'asd@asd.com','KRW-BTC',NULL,'-2265.0',NULL,'-2265.0',3,'매수-BTC','102735.0','2018-12-03 21:00:11','0.00050','0.30050','0.00050','4529000.0원/0.0005BTC'),
 (133,'akdzl456@naver.com','KRW',NULL,'-2.0',NULL,'-2.0',3,'배팅-출금','449563.0','2018-12-03 21:43:19',NULL,'0.15150',NULL,'2원 돌림판 배팅'),
 (134,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','449563.0','2018-12-03 21:43:19',NULL,'0.15150',NULL,'0배 당첨금'),
 (135,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금',NULL,'2018-12-03 21:46:32','10000.00000','10000.00000','10000.00000','청은이랑 섹스 하고 싶어요'),
 (136,'dign32199@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금',NULL,'2018-12-03 21:46:49','15000.00000','15001.96260','15000.00000','청은이 섹스비'),
 (137,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-03 21:49:09','-1000.00000','9000.00000','-1000.00000','미당첨 1000BTC 2배 배팅'),
 (138,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-03 21:49:15','-1000.00000','8000.00000','-1000.00000','1000BTC 2배 배팅'),
 (139,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-입금','8.0','2018-12-03 21:49:15','2000.00000','10000.00000','2000.00000','당첨금'),
 (140,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-03 21:49:24','-1000.00000','9000.00000','-1000.00000','미당첨 1000BTC 2배 배팅'),
 (141,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-03 21:49:29','-1000.00000','8000.00000','-1000.00000','미당첨 1000BTC 2배 배팅'),
 (142,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-03 21:49:34','-1000.00000','7000.00000','-1000.00000','1000BTC 2배 배팅'),
 (143,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-입금','8.0','2018-12-03 21:49:34','2000.00000','9000.00000','2000.00000','당첨금'),
 (144,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-03 21:49:45','-1000.00000','8000.00000','-1000.00000','미당첨 1000BTC 2배 배팅'),
 (145,'qqqq@qqqq.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'입금','100000.0','2018-12-03 21:49:53',NULL,NULL,NULL,'이벤트 입금'),
 (146,'qqqq@qqqq.com','BTC',NULL,NULL,NULL,NULL,3,'입금','100000.0','2018-12-03 21:49:53','0.30000','0.30000','0.30000','이벤트 입금'),
 (147,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-03 21:50:47','-1000.00000','7000.00000','-1000.00000','1000BTC 2배 배팅'),
 (148,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-입금','8.0','2018-12-03 21:50:47','2000.00000','9000.00000','2000.00000','당첨금'),
 (149,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-03 21:50:51','-1000.00000','8000.00000','-1000.00000','1000BTC 2배 배팅'),
 (150,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-입금','8.0','2018-12-03 21:50:51','2000.00000','10000.00000','2000.00000','당첨금'),
 (151,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','444563.0','2018-12-03 23:41:51',NULL,'0.15150',NULL,'5000원 2배 배팅'),
 (152,'akdzl456@naver.com','KRW',NULL,'10000.0',NULL,'10000.0',3,'배팅-입금','454563.0','2018-12-03 23:41:51',NULL,'0.15150',NULL,'당첨금'),
 (153,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','449563.0','2018-12-03 23:42:05',NULL,'0.15150',NULL,'미당첨 5000원 100배 배팅'),
 (154,'akdzl456@naver.com','KRW',NULL,'-2.0',NULL,'-2.0',3,'배팅-출금','449561.0','2018-12-03 23:42:26',NULL,'0.15150',NULL,'2원 돌림판 배팅'),
 (155,'akdzl456@naver.com','KRW',NULL,'2.0',NULL,'2.0',3,'배팅-입금','449563.0','2018-12-03 23:42:26',NULL,'0.15150',NULL,'1배 당첨금'),
 (156,'whdgns0407@gmail.com','KRW-BTC',NULL,'-882000.0',NULL,'-882000.0',3,'매수-BTC','727612.0','2018-12-04 00:53:57','0.20000','0.20000','0.20000','4410000.0원/0.2BTC'),
 (157,'akdzl456@naver.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','448563.0','2018-12-04 02:27:41',NULL,'0.15150',NULL,'1000원 돌림판 배팅'),
 (158,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','448563.0','2018-12-04 02:27:41',NULL,'0.15150',NULL,'0배 당첨금'),
 (159,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','443563.0','2018-12-04 02:28:00',NULL,'0.15150',NULL,'5000원 돌림판 배팅'),
 (160,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','443563.0','2018-12-04 02:28:00',NULL,'0.15150',NULL,'0배 당첨금'),
 (161,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','438563.0','2018-12-04 02:28:16',NULL,'0.15150',NULL,'5000원 돌림판 배팅'),
 (162,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','438563.0','2018-12-04 02:28:16',NULL,'0.15150',NULL,'0배 당첨금'),
 (163,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','433563.0','2018-12-04 02:28:32',NULL,'0.15150',NULL,'5000원 돌림판 배팅'),
 (164,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','433563.0','2018-12-04 02:28:32',NULL,'0.15150',NULL,'0배 당첨금'),
 (165,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','428563.0','2018-12-04 02:28:43',NULL,'0.15150',NULL,'5000원 돌림판 배팅'),
 (166,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','428563.0','2018-12-04 02:28:43',NULL,'0.15150',NULL,'0배 당첨금'),
 (167,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','423563.0','2018-12-04 02:29:27',NULL,'0.15150',NULL,'5000원 돌림판 배팅'),
 (168,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','423563.0','2018-12-04 02:29:27',NULL,'0.15150',NULL,'0배 당첨금'),
 (169,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','418563.0','2018-12-04 02:29:38',NULL,'0.15150',NULL,'5000원 돌림판 배팅'),
 (170,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','418563.0','2018-12-04 02:29:38',NULL,'0.15150',NULL,'0배 당첨금'),
 (171,'akdzl456@naver.com','KRW',NULL,'-50000.0',NULL,'-50000.0',3,'배팅-출금','368563.0','2018-12-04 02:29:52',NULL,'0.15150',NULL,'50000원 돌림판 배팅'),
 (172,'akdzl456@naver.com','KRW',NULL,'50000.0',NULL,'50000.0',3,'배팅-입금','418563.0','2018-12-04 02:29:52',NULL,'0.15150',NULL,'1배 당첨금'),
 (173,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','413563.0','2018-12-04 02:30:09',NULL,'0.15150',NULL,'5000원 돌림판 배팅'),
 (174,'akdzl456@naver.com','KRW',NULL,'20000.0',NULL,'20000.0',3,'배팅-입금','433563.0','2018-12-04 02:30:09',NULL,'0.15150',NULL,'4배 당첨금'),
 (175,'dign32199@naver.com','KRW-BTC',NULL,'45020000000.0',NULL,'45020000000.0',3,'매도-BTC','45020000249.0','2018-12-04 16:09:20','-10000.00000','5001.96260','-10000.00000','4502000.0원/10000BTC'),
 (176,'dign32199@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','45020000249.0','2018-12-04 16:10:35','-1.00000','5000.96260','-1.00000','1BTC 2배 배팅'),
 (177,'dign32199@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-입금','45020000249.0','2018-12-04 16:10:35','2.00000','5002.96260','2.00000','당첨금'),
 (178,'dign32199@naver.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','45019999249.0','2018-12-04 16:11:00',NULL,'5002.96260',NULL,'미당첨 1000원 100배 배팅'),
 (179,'dign32199@naver.com','BTC','cjddmsdltprtmql',NULL,'-0.0001',NULL,0,'출금','45019999249.0','2018-12-04 16:12:51','-1.00000','5001.96250','-1.00010','출금주소가 김청은 엉덩이여야 합니다.'),
 (180,'rms6990@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','8.0','2018-12-04 17:05:21','-10000.00000','0.00000','-10000.00000','미당첨 10000BTC 2배 배팅'),
 (181,'dign32199@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금',NULL,'2018-12-04 17:06:50','1.00100','5002.96350','1.00100','출금 취소 환급'),
 (182,'dign32199@naver.com','BTC','3H16eRCpoavVJjV362xakUDFABYnV9SLvf',NULL,'-0.0001',NULL,2,'출금','45019999249.0','2018-12-04 17:14:24','-100.00000','4902.96340','-100.00010','관리자 아이디로 출금 되었습니다.'),
 (183,'dign32199@naver.com','BTC','rlacjddmsdjdejddl',NULL,'-0.0001',NULL,2,'출금','45019999249.0','2018-12-04 17:15:13','-3500.00000','1402.96330','-3500.00010','삽입에 성공 하였습니다. 감사합니다.'),
 (184,'dign32199@naver.com','BTC','rlacjddmsrhcnxjf',NULL,'-0.0001',NULL,2,'출금','45019999249.0','2018-12-04 17:15:53','-1400.00000','2.96320','-1400.00010','김청은 꼬추털을 한가닥 뽑았습니다. 감사합니다.'),
 (185,'akdzl456@naver.com','KRW-BTC',NULL,'-180600.0',NULL,'-180600.0',3,'매수-BTC','252963.0','2018-12-04 19:11:34','0.04000','0.19150','0.04000','4515000.0원/0.04BTC'),
 (186,'dign32199@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금',NULL,'2018-12-04 23:21:29','100000.00000','100002.96320','100000.00000','청은이 교육비'),
 (190,'whdgns0407@gmail.com','BTC','12312312312',NULL,'-0.0001',NULL,0,'출금','727612.0','2018-12-05 01:47:02','-0.19990','0.00000','-0.20000',NULL),
 (191,'whdgns0407@gmail.com','BTC',NULL,NULL,NULL,NULL,3,'입금',NULL,'2018-12-05 01:59:32','0.20000','0.20000','0.20000','출금 취소 환급'),
 (192,'qqqq@qqqq.com','KRW',NULL,'-1000.0',NULL,'-1000.0',3,'배팅-출금','99000.0','2018-12-05 02:33:56',NULL,'0.30000',NULL,'1000원 돌림판 배팅'),
 (193,'qqqq@qqqq.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','99000.0','2018-12-05 02:33:56',NULL,'0.30000',NULL,'0배 당첨금'),
 (194,'qqqq@qqqq.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','89000.0','2018-12-05 02:34:18',NULL,'0.30000',NULL,'10000원 돌림판 배팅'),
 (195,'qqqq@qqqq.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','89000.0','2018-12-05 02:34:18',NULL,'0.30000',NULL,'0배 당첨금'),
 (196,'qqqq@qqqq.com','KRW',NULL,'-15000.0',NULL,'-15000.0',3,'배팅-출금','74000.0','2018-12-05 02:34:29',NULL,'0.30000',NULL,'15000원 돌림판 배팅'),
 (197,'qqqq@qqqq.com','KRW',NULL,'15000.0',NULL,'15000.0',3,'배팅-입금','89000.0','2018-12-05 02:34:29',NULL,'0.30000',NULL,'1배 당첨금'),
 (198,'qqqq@qqqq.com','KRW',NULL,'-14000.0',NULL,'-14000.0',3,'배팅-출금','75000.0','2018-12-05 02:34:41',NULL,'0.30000',NULL,'14000원 돌림판 배팅'),
 (199,'qqqq@qqqq.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','75000.0','2018-12-05 02:34:41',NULL,'0.30000',NULL,'0배 당첨금'),
 (200,'qqqq@qqqq.com','KRW',NULL,'-14500.0',NULL,'-14500.0',3,'배팅-출금','60500.0','2018-12-05 02:34:53',NULL,'0.30000',NULL,'14500원 돌림판 배팅'),
 (201,'qqqq@qqqq.com','KRW',NULL,'29000.0',NULL,'29000.0',3,'배팅-입금','89500.0','2018-12-05 02:34:53',NULL,'0.30000',NULL,'2배 당첨금'),
 (202,'qqqq@qqqq.com','KRW',NULL,'-11000.0',NULL,'-11000.0',3,'배팅-출금','78500.0','2018-12-05 02:35:06',NULL,'0.30000',NULL,'11000원 돌림판 배팅'),
 (203,'qqqq@qqqq.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','78500.0','2018-12-05 02:35:06',NULL,'0.30000',NULL,'0배 당첨금'),
 (204,'qqqq@qqqq.com','KRW',NULL,'-11000.0',NULL,'-11000.0',3,'배팅-출금','67500.0','2018-12-05 02:35:19',NULL,'0.30000',NULL,'11000원 돌림판 배팅'),
 (205,'qqqq@qqqq.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','67500.0','2018-12-05 02:35:19',NULL,'0.30000',NULL,'0배 당첨금'),
 (206,'qqqq@qqqq.com','KRW',NULL,'-10000.0',NULL,'-10000.0',3,'배팅-출금','57500.0','2018-12-05 02:35:31',NULL,'0.30000',NULL,'10000원 돌림판 배팅'),
 (207,'qqqq@qqqq.com','KRW',NULL,'30000.0',NULL,'30000.0',3,'배팅-입금','87500.0','2018-12-05 02:35:31',NULL,'0.30000',NULL,'3배 당첨금'),
 (208,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','247963.0','2018-12-05 03:09:56',NULL,'0.19150',NULL,'5000원 2배 배팅'),
 (209,'akdzl456@naver.com','KRW',NULL,'10000.0',NULL,'10000.0',3,'배팅-입금','257963.0','2018-12-05 03:09:56',NULL,'0.19150',NULL,'당첨금'),
 (210,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','252963.0','2018-12-05 03:14:44',NULL,'0.19150',NULL,'5000원 돌림판 배팅'),
 (211,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','252963.0','2018-12-05 03:14:44',NULL,'0.19150',NULL,'0배 당첨금'),
 (212,'cjddms2@naver.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'입금','100000.0','2018-12-05 13:47:47',NULL,NULL,NULL,'이벤트 입금'),
 (213,'cjddms2@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금','100000.0','2018-12-05 13:47:47','0.30000','0.30000','0.30000','이벤트 입금'),
 (214,'akdzl456@naver.com','KRW','한국은행 12646489','-5000.0','-1000.0000','-6000.0',1,'출금','246963.0','2018-12-05 17:19:19',NULL,'0.19150',NULL,NULL),
 (215,'akdzl456@naver.com','BTC','dasdasdww',NULL,'-0.0001',NULL,1,'출금','246963.0','2018-12-05 17:25:02','-0.00200','0.18940','-0.00210',NULL),
 (216,'akdzl456@naver.com','KRW-BTC',NULL,'-216650.0',NULL,'-216650.0',3,'매수-BTC','30313.0','2018-12-05 17:34:03','0.05000','0.23940','0.05000','4333000.0원/0.05BTC'),
 (217,'akdzl456@naver.com','KRW-BTC',NULL,'216450.0',NULL,'216450.0',3,'매도-BTC','246763.0','2018-12-05 17:35:16','-0.05000','0.18940','-0.05000','4329000.0원/0.05BTC'),
 (218,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','241763.0','2018-12-05 17:36:23',NULL,'0.18940',NULL,'미당첨 5000원 2배 배팅'),
 (219,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','236763.0','2018-12-05 17:36:33',NULL,'0.18940',NULL,'미당첨 5000원 2배 배팅'),
 (220,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','231763.0','2018-12-05 17:36:39',NULL,'0.18940',NULL,'5000원 2배 배팅'),
 (221,'akdzl456@naver.com','KRW',NULL,'10000.0',NULL,'10000.0',3,'배팅-입금','241763.0','2018-12-05 17:36:39',NULL,'0.18940',NULL,'당첨금'),
 (222,'akdzl456@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','241763.0','2018-12-05 17:37:49','-0.00010','0.18930','-0.00010','미당첨 0.0001BTC 2배 배팅'),
 (223,'akdzl456@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-출금','241763.0','2018-12-05 17:38:01','-0.00010','0.18920','-0.00010','0.0001BTC 2배 배팅'),
 (224,'akdzl456@naver.com','BTC',NULL,NULL,NULL,NULL,3,'배팅-입금','241763.0','2018-12-05 17:38:01','0.00020','0.18940','0.00020','당첨금'),
 (225,'akdzl456@naver.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','236763.0','2018-12-05 17:39:19',NULL,'0.18940',NULL,'5000원 돌림판 배팅'),
 (226,'akdzl456@naver.com','KRW',NULL,'0.0',NULL,'0.0',3,'배팅-입금','236763.0','2018-12-05 17:39:19',NULL,'0.18940',NULL,'0배 당첨금'),
 (227,'kslel721@naver.com','KRW',NULL,'100000.0',NULL,'100000.0',3,'입금','100000.0','2018-12-05 20:02:18',NULL,NULL,NULL,'이벤트 입금'),
 (228,'kslel721@naver.com','BTC',NULL,NULL,NULL,NULL,3,'입금','100000.0','2018-12-05 20:02:18','0.30000','0.30000','0.30000','이벤트 입금'),
 (229,'whdgns0407@gmail.com','KRW','케이뱅크 654951954','-5000.0','-1000.0000','-6000.0',1,'출금','721612.0','2018-12-05 20:04:07',NULL,'0.20000',NULL,NULL),
 (230,'whdgns0407@gmail.com','KRW-BTC',NULL,'-219050.0',NULL,'-219050.0',3,'매수-BTC','502562.0','2018-12-05 20:05:55','0.05000','0.25000','0.05000','4381000.0원/0.05BTC'),
 (231,'whdgns0407@gmail.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','497562.0','2018-12-05 20:06:18',NULL,'0.25000',NULL,'5000원 2배 배팅'),
 (232,'whdgns0407@gmail.com','KRW',NULL,'10000.0',NULL,'10000.0',3,'배팅-입금','507562.0','2018-12-05 20:06:18',NULL,'0.25000',NULL,'당첨금'),
 (233,'whdgns0407@gmail.com','KRW',NULL,'-5000.0',NULL,'-5000.0',3,'배팅-출금','502562.0','2018-12-05 20:06:33',NULL,'0.25000',NULL,'5000원 돌림판 배팅'),
 (234,'whdgns0407@gmail.com','KRW',NULL,'5000.0',NULL,'5000.0',3,'배팅-입금','507562.0','2018-12-05 20:06:33',NULL,'0.25000',NULL,'1배 당첨금');
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
