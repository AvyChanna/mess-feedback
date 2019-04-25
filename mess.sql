######## CAUTION: THIS WILL CLEAR ALL DATA IN DB ########

# PHPMYADMIN + MySQL SETUP

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';
FLUSH PRIVILEGES;

# CLEAR SCHEMA

DROP DATABASE IF EXISTS `mess`;

# CREATE A NEW SCHEMA

CREATE DATABASE `mess` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `mess`;

# CREATE REQUIRED TABLES

CREATE TABLE `mess`.`users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `mess`.`words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(90) NOT NULL,
  PRIMARY KEY (`id`,`word`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `word_UNIQUE` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `mess`.`feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `feedback` varchar(45) NOT NULL,
  `rating` int(11) NOT NULL,
  `mess` varchar(45) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `mess`.`mess_managers` (
  `mess` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`mess`),
  UNIQUE KEY `mess_UNIQUE` (`mess`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;