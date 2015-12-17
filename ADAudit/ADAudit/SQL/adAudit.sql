DROP DATABASE if EXISTS adAudit;
CREATE DATABASE adAudit;
USE adAudit;



DROP TABLE if EXISTS yesUsers;
CREATE TABLE yesUsers (
  yuid 				int(10) AUTO_INCREMENT,
  fullName			varchar (255) COLLATE utf8_unicode_ci,
  firstName			varchar (255) COLLATE utf8_unicode_ci,
  middleName		varchar (255) COLLATE utf8_unicode_ci,
  lastName			varchar (255) COLLATE utf8_unicode_ci,
  probability		int(1),
  indexFound		varchar (100),
  namesFound		varchar (255) COLLATE utf8_unicode_ci,
  PRIMARY KEY (yuid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE if EXISTS undeterminedUsers;
CREATE TABLE undeterminedUsers (
  uuid 				int(10) AUTO_INCREMENT,
  fullName			varchar (255) COLLATE utf8_unicode_ci,
  firstName			varchar (255) COLLATE utf8_unicode_ci,
  middleName		varchar (255) COLLATE utf8_unicode_ci,
  lastName			varchar (255) COLLATE utf8_unicode_ci,
  probability		int(1),
  indexFound		varchar (100),
  namesFound		varchar (255) COLLATE utf8_unicode_ci,
  PRIMARY KEY (uuid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE if EXISTS noUsers;
CREATE TABLE noUsers (
  nuid 				int(10) AUTO_INCREMENT,
  fullName			varchar (255) COLLATE utf8_unicode_ci,
  firstName			varchar (255) COLLATE utf8_unicode_ci,
  middleName		varchar (255) COLLATE utf8_unicode_ci,
  lastName			varchar (255) COLLATE utf8_unicode_ci,
  probability		int(1),
  indexFound		varchar (100),
  namesFound		varchar (255) COLLATE utf8_unicode_ci,
  PRIMARY KEY (nuid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE if EXISTS serviceUsers;
CREATE TABLE serviceUsers (
  suid 				int(10) AUTO_INCREMENT,
  fullName			varchar (255) COLLATE utf8_unicode_ci,
  firstName			varchar (255) COLLATE utf8_unicode_ci,
  middleName		varchar (255) COLLATE utf8_unicode_ci,
  lastName			varchar (255) COLLATE utf8_unicode_ci,
  probability		int(1),
  indexFound		varchar (100),
  namesFound		varchar (255) COLLATE utf8_unicode_ci,
  PRIMARY KEY (suid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


