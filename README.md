# apk-1.1
Aplikasi Pembuatan Kwitansi Berbasis Web (Web based)
Features :
*Profiles (View and update your username and password)
*Configuration (Setup company name, logo, city and street name, Signer name)
*New Kwitansi (Submit inquiry, preview, back to edit, download, print in PDF Reader)
*History (Can download again all kwitansi you have made before)

**User default, username & password admin
**Setup DB Connection in inc.define_connection.php

Before run this application, don't forget to setup database. These are querys :

CREATE DATABASE IF NOT EXISTS `dbapk` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbapk`;

CREATE TABLE IF NOT EXISTS `tbl_config` (
  `CONF_ID` char(50) NOT NULL,
  `CONF_INST_NAME` char(100) DEFAULT NULL,
  `CONF_INST_LOGO` char(225) DEFAULT NULL,
  `CONF_CITY` char(100) DEFAULT NULL,
  `CONF_STREET` char(150) DEFAULT NULL,
  `CONF_SIGNED` char(100) DEFAULT NULL,
  `CONF_INST_WIDTH` char(50) DEFAULT NULL,
  `CONF_INST_HEIGHT` char(50) DEFAULT NULL,
  PRIMARY KEY (`CONF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_e_kw` (
  `E_KW_ID` char(50) NOT NULL,
  `K_ID` char(50) NOT NULL,
  `E_KW_KID` char(50) DEFAULT NULL,
  `E_KW_ETIME` char(100) DEFAULT NULL,
  PRIMARY KEY (`E_KW_ID`),
  KEY `FK_RECORD_EDITABLE` (`K_ID`),
  CONSTRAINT `FK_RECORD_EDITABLE` FOREIGN KEY (`K_ID`) REFERENCES `tbl_kwitansi` (`K_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_kwitansi` (
  `K_ID` char(50) NOT NULL DEFAULT '',
  `K_UID` char(50) DEFAULT NULL,
  `K_PAYEE` char(125) DEFAULT NULL,
  `K_TOT_PAY_TXT` char(150) DEFAULT NULL,
  `K_PAYTO` char(125) DEFAULT NULL,
  `K_PAY_NAME` longtext,
  `K_PAY_DATE` char(8) DEFAULT NULL,
  PRIMARY KEY (`K_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_session` (
  `SESSION_UID` char(50) NOT NULL DEFAULT '',
  `SESSION_ID` char(100) DEFAULT NULL,
  `SESSION_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`SESSION_UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `USR_ID` char(50) NOT NULL DEFAULT '',
  `USR_NAME` char(100) DEFAULT NULL,
  `USR_PWD` char(50) DEFAULT NULL,
  PRIMARY KEY (`USR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

REPLACE INTO `tbl_user` (`USR_ID`, `USR_NAME`, `USR_PWD`) VALUES
	('apk1', 'admin', 'c4ca4238a0b923820dcc509a6f75849b');

CREATE TABLE IF NOT EXISTS `tbl_version` (
  `VERSION_ID` char(50) NOT NULL,
  `E_KW_ID` char(50) NOT NULL,
  `VERSION_EID` char(50) DEFAULT NULL,
  PRIMARY KEY (`VERSION_ID`),
  KEY `FK_RECORD_VERSION` (`E_KW_ID`),
  CONSTRAINT `FK_RECORD_VERSION` FOREIGN KEY (`E_KW_ID`) REFERENCES `tbl_e_kw` (`E_KW_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
