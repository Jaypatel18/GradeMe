/*ALTER TABLE classes
DROP COLUMN `gradepath`;*/

/*CREATE TABLE `analytics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `timestamp` DATETIME NOT NULL,
  `loggedissues` int(10) DEFAULT NULL,
  `numusers` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
*/

/*CREATE TABLE `chatlog` (
  `chatid` int(10) NOT NULL,
  `usrid` int(10) NOT NULL,
  `timestamp` DATETIME NOT NULL,
  `text` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
*/

/*CREATE TABLE `chatrooms` (
  `chatid` int(10) NOT NULL auto_increment,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`chatid`)
);*/

/*CREATE TABLE `chats2users` (
  `chatid` int(10) NOT NULL,
  `userid` int(10) NOT NULL
);*/

/*ALTER TABLE `db309ss3`.`stdyg` 
ADD COLUMN `numratings` INT NULL DEFAULT NULL AFTER `filepath`,
ADD COLUMN `currating` INT NULL DEFAULT NULL AFTER `numratings`;*/

CREATE TABLE `forums` (
  `forumid` int(10) NOT NULL,
  `filepath` varchar(100),
  `name` varchar(50),
  `type` int
);



