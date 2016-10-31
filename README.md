# apk-1.1
Aplikasi Pembuatan Kwitansi Berbasis Web (Web based)<br/>
Features :<br/>
*Profiles (View and update your username and password)<br/>
*Configuration (Setup company name, logo, city and street name, Signer name)<br/>
*New Kwitansi (Submit inquiry, preview, back to edit, download, print in PDF Reader)<br/>
*History (Can download again all kwitansi you have made before)<br/>
<br/>
**User default, username & password admin<br/>
**Setup DB Connection in inc.define_connection.php<br/>
<br/>
Before run this application, don't forget to setup database. These are querys :<br/>
<br/>
CREATE DATABASE IF NOT EXISTS `dbapk` /*!40100 DEFAULT CHARACTER SET latin1 */;<br/>
USE `dbapk`;<br/>
<br/>
CREATE TABLE IF NOT EXISTS `tbl_config` (<br/>
  `CONF_ID` char(50) NOT NULL,<br/>
  `CONF_INST_NAME` char(100) DEFAULT NULL,<br/>
  `CONF_INST_LOGO` char(225) DEFAULT NULL,<br/>
  `CONF_CITY` char(100) DEFAULT NULL,<br/>
  `CONF_STREET` char(150) DEFAULT NULL,<br/>
  `CONF_SIGNED` char(100) DEFAULT NULL,<br/>
  `CONF_INST_WIDTH` char(50) DEFAULT NULL,<br/>
  `CONF_INST_HEIGHT` char(50) DEFAULT NULL,<br/>
  PRIMARY KEY (`CONF_ID`)<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br/>
<br/>
CREATE TABLE IF NOT EXISTS `tbl_e_kw` (<br/>
  `E_KW_ID` char(50) NOT NULL,<br/>
  `K_ID` char(50) NOT NULL,<br/>
  `E_KW_KID` char(50) DEFAULT NULL,<br/>
  `E_KW_ETIME` char(100) DEFAULT NULL,<br/>
  PRIMARY KEY (`E_KW_ID`),<br/>
  KEY `FK_RECORD_EDITABLE` (`K_ID`),<br/>
  CONSTRAINT `FK_RECORD_EDITABLE` FOREIGN KEY (`K_ID`) REFERENCES `tbl_kwitansi` (`K_ID`) ON DELETE CASCADE<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br/>
<br/>
CREATE TABLE IF NOT EXISTS `tbl_kwitansi` (<br/>
  `K_ID` char(50) NOT NULL DEFAULT '',<br/>
  `K_UID` char(50) DEFAULT NULL,<br/>
  `K_PAYEE` char(125) DEFAULT NULL,<br/>
  `K_TOT_PAY_TXT` char(150) DEFAULT NULL,<br/>
  `K_PAYTO` char(125) DEFAULT NULL,<br/>
  `K_PAY_NAME` longtext,<br/>
  `K_PAY_DATE` char(8) DEFAULT NULL,<br/>
  PRIMARY KEY (`K_ID`)<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br/>
<br/>
CREATE TABLE IF NOT EXISTS `tbl_session` (<br/>
  `SESSION_UID` char(50) NOT NULL DEFAULT '',<br/>
  `SESSION_ID` char(100) DEFAULT NULL,<br/>
  `SESSION_DATE` datetime DEFAULT NULL,<br/>
  PRIMARY KEY (`SESSION_UID`)<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br/>
<br/>
CREATE TABLE IF NOT EXISTS `tbl_user` (<br/>
  `USR_ID` char(50) NOT NULL DEFAULT '',<br/>
  `USR_NAME` char(100) DEFAULT NULL,<br/>
  `USR_PWD` char(50) DEFAULT NULL,<br/>
  PRIMARY KEY (`USR_ID`)<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br/>
<br/>
REPLACE INTO `tbl_user` (`USR_ID`, `USR_NAME`, `USR_PWD`) VALUES<br/>
	('apk1', 'admin', 'c4ca4238a0b923820dcc509a6f75849b');<br/>

CREATE TABLE IF NOT EXISTS `tbl_version` (<br/>
  `VERSION_ID` char(50) NOT NULL,<br/>
  `E_KW_ID` char(50) NOT NULL,<br/>
  `VERSION_EID` char(50) DEFAULT NULL,<br/>
  PRIMARY KEY (`VERSION_ID`),<br/>
  KEY `FK_RECORD_VERSION` (`E_KW_ID`),<br/>
  CONSTRAINT `FK_RECORD_VERSION` FOREIGN KEY (`E_KW_ID`) REFERENCES `tbl_e_kw` (`E_KW_ID`) ON DELETE CASCADE<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br/>
