CREATE DATABASE `mini`;
SHOW DATABASES LIKE 'mini';

USE `mini`;

CREATE TABLE `listings`(
	`id` int(11) NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address`  varchar(255) NOT NULL,
	`city`  varchar(255) NOT NULL,
	`zip` int(11) NOT NULL,
  `description`  TEXT,
  `image` BLOB,
  `price` int(11),
  `bathroom` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `listings`
ADD COLUMN `type` VARCHAR(45) NULL AFTER `user_id`,
ADD COLUMN `deposit` INT(11) NULL AFTER `type`,
ADD COLUMN `area` INT(11) NULL AFTER `deposit`;

ALTER TABLE `listings`
ADD COLUMN `bus` INT(11) NULL AFTER `area`,
ADD COLUMN `bike` INT(11) NULL AFTER `bus`,
ADD COLUMN `car` INT(11) NULL AFTER `bike`,
ADD COLUMN `walk` INT(11) NULL AFTER `car`;

CREATE TABLE `users`(
  `id` int(11) NULL AUTO_INCREMENT,
  `name`  varchar(255) NOT NULL,
  `lastName`  varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password`  TEXT,
  `image` BLOB,
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `listingApplications` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `listing_id` int(11) unsigned NOT NULL,
 `user_id` int(11) unsigned NOT NULL,
 `comment` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
