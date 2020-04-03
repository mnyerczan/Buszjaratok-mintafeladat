CREATE DATABASE `Buses` DEFAULT CHARSET utf8 COLLATE utf8_hungarian_ci;

CREATE TABLE `busz`(
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `indulas` varchar(30),
    `cel` varchar(30),
    `menetido` smallint,
    `alacsony` tinyint CHECK (`alacsony` IN (0, 1))
)DEFAULT CHARSET = UTF8;

CREATE TABLE `szerviz`(
    `id` smallint AUTO_INCREMENT PRIMARY KEY ,
    `buszID` int,
    `datum` date,
    `megjegyzes` varchar(100),
    `engedelyezve` tinyint CHECK (`engedelyezve` IN (0, 1)),
    FOREIGN KEY( `buszID`) REFERENCES `busz`(`id`) ON DELETE SET NULL ON UPDATE CASCADE
)DEFAULT CHARSET = UTF8;



INSERT INTO  `busz` VALUES 
(1,'Őrs vezér tere','Árpád híd',42,1),
(2,'Őrs vezér tere','Cinkota garázs',32,1),
(3,'Rákosborzasztó','Etele tér',62,0);

INSERT INTO `szerviz` VALUES
(1,1,'2018-01-12','minden rendben',1),
(2,2,'2018-01-12','lengőkar hiba',0),
(3,3,'2018-01-12','minden rendben',1),
(4,null,'2018-01-13','ajtók nem záródnak',0),
(5,null,'2018-01-14','minden rendben',1);