CREATE TABLE `stdyg` (
  `id` int(10) NOT NULL PRIMARY KEY,
  `filepath` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `clstostdyg` (
  `clsid` int(10) NOT NULL,
  `stdygid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
