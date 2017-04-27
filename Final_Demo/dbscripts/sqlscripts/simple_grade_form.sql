CREATE TABLE `sgf` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `classid` int(10) DEFAULT NULL,
  `stdid` int(10) DEFAULT NULL,
  `exam` int(3) DEFAULT NULL,
  `quiz` int(3) DEFAULT NULL,
  `participation` int(3) DEFAULT NULL,
  `desiredgrade` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
