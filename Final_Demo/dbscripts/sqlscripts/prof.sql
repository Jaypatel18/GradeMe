CREATE TABLE `prof` (
  `userid` int(10) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `numrating` int(10) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;