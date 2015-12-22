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
  category  		varchar (50) COLLATE utf8_unicode_ci,
  productPic		longblob,
  thumbnail			longblob,
  numOfReviews		int(5),
  rating			float(3),
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
  phoneNumber		varchar(20),
  PRIMARY KEY (uid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE if EXISTS Orders;
CREATE TABLE Orders (
  oid				int(10) AUTO_INCREMENT,
  firstName			varchar (255) COLLATE utf8_unicode_ci,
  lastName 			varchar (255) COLLATE utf8_unicode_ci,
  email				varchar (255) COLLATE utf8_unicode_ci,
  notes				varchar (512) COLLATE utf8_unicode_ci,
  phoneNumber		varchar(20),
  status			varchar(20),
  customerID		int(10),
  orderTotal		float(10),
  dateCreated       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (oid),
  FOREIGN KEY (customerID) REFERENCES Users(uid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE if EXISTS OrderedItems;
CREATE TABLE OrderedItems (
  orid				int(10) AUTO_INCREMENT,
  iid				int(10),
  oid				int(10),
  numberOrdered		int(4),
  dateCreated       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (orid),
  FOREIGN KEY (iid) REFERENCES Inventory(iid),
  FOREIGN KEY (oid) REFERENCES Orders(oid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE if EXISTS Subscribers;
CREATE TABLE Subscribers (
  suid				int(10) AUTO_INCREMENT,
  email				varchar (255) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
  PRIMARY KEY (suid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO inventory(description, iid, price, productName, quantity)
VALUES('Product Description1','1','50.49','Chlorine Tablets','15');
INSERT INTO inventory(description, iid, price, productName, quantity)
VALUES('Product Description2','2','9.99','Pool Shade','100');
INSERT INTO inventory(description, iid, price, productName, quantity)
VALUES('Product Description3','3','999.99','Above Ground Pool 20x20','2');