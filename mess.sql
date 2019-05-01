CREATE DATABASE IF NOT EXISTS `mess` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mess`;


DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `username` varchar(45) NOT NULL,
  `feedback` varchar(45) NOT NULL,
  `rating` float NOT NULL,
  `mess` varchar(45) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `mess`;
CREATE TABLE IF NOT EXISTS `mess` (
  `mess` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mess`),
  UNIQUE KEY `mess_UNIQUE` (`mess`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `rollno` varchar(45) NOT NULL,
  `mess` varchar(45) NOT NULL,
  `passwordhash` varchar(130) NOT NULL,
  `passwordsalt` varchar(10) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'student',
  PRIMARY KEY (`id`,`username`,`rollno`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `rollno_UNIQUE` (`rollno`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `words`;
CREATE TABLE IF NOT EXISTS `words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` decimal(4,2) NOT NULL,
  `word` varchar(90) NOT NULL,
  PRIMARY KEY (`id`,`word`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `word_UNIQUE` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

