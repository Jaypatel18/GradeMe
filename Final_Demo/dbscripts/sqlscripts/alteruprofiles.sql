/*ALTER TABLE uprofiles
ADD `username` varchar(60) NOT NULL,
ADD `password` varchar(60) NOT NULL,
ALTER TABLE uprofiles
MODIFY COLUMN `email` varchar(60) NOT NULL*/

ALTER TABLE `db309ss3`.`uprofiles` 

ADD COLUMN `usrtype` INT NULL DEFAULT NULL AFTER `password`,

ADD COLUMN `phone` VARCHAR(45) NULL AFTER `usrtype`,

ADD COLUMN `filepath` VARCHAR(45) NULL AFTER `phone`;



