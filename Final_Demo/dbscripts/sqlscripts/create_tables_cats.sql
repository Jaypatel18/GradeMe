CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(60) DEFAULT NULL,
  `percentage` int(3)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `clstocat` (
  `clsid` int(10) NOT NULL,
  `catid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSuprofilesET=latin1;
