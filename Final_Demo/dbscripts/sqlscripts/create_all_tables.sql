CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `percentage` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `classes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `classname` varchar(60) DEFAULT NULL,
  `professor` varchar(60) DEFAULT NULL,
  `numstud` int(4) DEFAULT NULL,
  `filepath` varchar(60) NOT NULL,
  `gradepath` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `clstocat` (
  `clsid` int(10) NOT NULL,
  `catid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `stdyg` (
  `id` int(10) NOT NULL,
  `filepath` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `clstostdyg` (
  `clsid` int(10) NOT NULL,
  `stdygid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `syslog` (
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numusers` int(9) DEFAULT NULL,
  `totclasses` int(10) DEFAULT NULL,
  `aciveusers` int(9) DEFAULT NULL,
  `totstdyg` int(9) DEFAULT NULL,
  `msg` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `uprofiles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `utoclass` (
  `userid` int(10) NOT NULL,
  `classid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





