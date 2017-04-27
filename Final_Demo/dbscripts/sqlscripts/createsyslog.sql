CREATE TABLE `syslog` (
  `date` datetime default current_timestamp primary key,
  `numusers` int(9) default null,
  `totclasses` int (10) default null,
  `aciveusers` int(9) default null,
  `totstdyg` int (9) default null,
  `msg` varchar(30) default null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;