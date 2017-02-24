DROP DATABASE IF EXISTS onlinefarmermarket;


CREATE DATABASE onlinefarmermarket ;

USE onlinefarmermarket;
CREATE TABLE `onlinefarmermarket`.`user` (
  `userid` INT NOT NULL AUTO_INCREMENT,
  `role` CHAR(1) NOT NULL,
  `emailid` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `license` VARCHAR(45) NULL,
  `descp` VARCHAR(45) NULL,
  `phonenum` INT NULL,
  `streetname` VARCHAR(45) NULL,
  `steetname2` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `zipcode` INT(5) NULL,
  `state` VARCHAR(45) NULL,
  `country` VARCHAR(45) NULL,
  PRIMARY KEY (`userid`));
  
  CREATE TABLE `onlinefarmermarket`.`itemdetails` (
  `itemid` INT NOT NULL AUTO_INCREMENT,
  `userid` INT NULL,
  `itemname` VARCHAR(45) NULL,
  `price` FLOAT NULL,
  `stock` FLOAT NULL,
  PRIMARY KEY (`itemid`),
  INDEX `userid_idx` (`userid` ASC),
  CONSTRAINT `userid`
    FOREIGN KEY (`userid`)
    REFERENCES `onlinefarmermarket`.`user` (`userid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
	
	CREATE TABLE `onlinefarmermarket`.`order` (
  `orderConformationId` INT NOT NULL AUTO_INCREMENT,
  `orderUserId` INT NOT NULL,
  `oderDateTime` DATETIME NULL,
  `totalPrice` FLOAT NULL,
  `status` TINYINT NULL,
  PRIMARY KEY (`orderConformationId`),
  INDEX `orderUserId_idx` (`orderUserId` ASC),
  CONSTRAINT `orderUserId`
    FOREIGN KEY (`orderUserId`)
    REFERENCES `onlinefarmermarket`.`user` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `onlinefarmermarket`.`cart` (
  `cartuserid` INT NOT NULL,
  `cartitemid` INT NOT NULL,
  `weight` DOUBLE NULL,
  INDEX `cartuseid_idx` (`cartuserid` ASC),
  INDEX `cartitemid_idx` (`cartitemid` ASC),
  CONSTRAINT `cartuseid`
    FOREIGN KEY (`cartuserid`)
    REFERENCES `onlinefarmermarket`.`user` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cartitemid`
    FOREIGN KEY (`cartitemid`)
    REFERENCES `onlinefarmermarket`.`itemdetails` (`itemid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `onlinefarmermarket`.`payment` (
  `orderconfirmationid` INT NOT NULL,
  `paymentuserid` INT NOT NULL,
  `cardnumber` INT NULL,
  `cardname` VARCHAR(45) NULL,
  `expirydate` DATE NULL,
  `cvv` INT NULL,
  INDEX `orderconfirmationid_idx` (`orderconfirmationid` ASC),
  INDEX `paymentuserid_idx` (`paymentuserid` ASC),
  CONSTRAINT `orderconfirmationid`
    FOREIGN KEY (`orderconfirmationid`)
    REFERENCES `onlinefarmermarket`.`order` (`orderConformationId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `paymentuserid`
    FOREIGN KEY (`paymentuserid`)
    REFERENCES `onlinefarmermarket`.`user` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `onlinefarmermarket`.`feedback` (
  `feedbackid` INT NOT NULL,
  `feedbackuserid` INT NOT NULL,
  `feedbacktext` VARCHAR(45) NULL,
  `rating` INT NULL,
  PRIMARY KEY (`feedbackid`),
  INDEX `feedbackuserid_idx` (`feedbackuserid` ASC),
  CONSTRAINT `feedbackuserid`
    FOREIGN KEY (`feedbackuserid`)
    REFERENCES `onlinefarmermarket`.`user` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	
	
	

GRANT SELECT, INSERT, DELETE, UPDATE
ON onlinefarmermarket.*
TO admin@localhost
IDENTIFIED BY 'pass@word';

ALTER TABLE `onlinefarmermarket`.`user` 
CHANGE COLUMN `name` `lastname` VARCHAR(45) NULL DEFAULT NULL ,
CHANGE COLUMN `phonenum` `homephone` INT(11) NULL DEFAULT NULL ,
ADD COLUMN `firstname` VARCHAR(45) NULL DEFAULT NULL AFTER `password`,
ADD COLUMN `mobilephone` INT(11) NULL DEFAULT NULL AFTER `descp`;

ALTER TABLE `onlinefarmermarket`.`user` 
ADD UNIQUE INDEX `emailid_UNIQUE` (`emailid` ASC);
