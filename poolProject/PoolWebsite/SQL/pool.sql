DROP DATABASE if EXISTS pool;
CREATE DATABASE pool;
USE pool;



DROP TABLE if EXISTS Inventory;
CREATE TABLE Inventory (
  iid 				int(10),
  productName		varchar (255) COLLATE utf8_unicode_ci,
  price				float(10),
  quantity 			int(8),
  description		varchar (255) COLLATE utf8_unicode_ci,
  productPic		longblob,
  thumbnail			longblob,
  PRIMARY KEY (iid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE if EXISTS Specials;
CREATE TABLE Specials (
  sid				int(10) AUTO_INCREMENT,
  iid				int(10),
  PRIMARY KEY (sid),
  FOREIGN KEY (iid) REFERENCES Inventory(iid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE if EXISTS Users;
CREATE TABLE Users (
  uid				int(10) AUTO_INCREMENT,
  email				varchar (255) COLLATE utf8_unicode_ci,
  firstName			varchar (255) COLLATE utf8_unicode_ci,
  lastName 			varchar (255) COLLATE utf8_unicode_ci,
  password          varchar(40) COLLATE utf8_unicode_ci,
  subscribed		int(1),
  PRIMARY KEY (uid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE if EXISTS Subscribers;
CREATE TABLE Subscribers (
  suid				int(10) AUTO_INCREMENT,
  email				varchar (255) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
  PRIMARY KEY (suid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



