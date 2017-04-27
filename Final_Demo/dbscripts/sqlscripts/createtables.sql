CREATE TABLE `uprofiles` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `classes` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `classname` varchar(60) DEFAULT NULL,
  `professor` varchar(60) DEFAULT NULL,
  `numstud` int(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `utoclass` (
  `userid` int(10) NOT NULL,
  `classid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
