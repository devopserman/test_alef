<?php
// Задание 2
// Нарисуйте в свободной форме схему следующей БД:
// 1) есть ученики, учителя и классы
// 2) каждый ученик учится в каком-то классе
// 3) учитель может преподавать в одном или более классах
// 4) в одном классе может преподавать один или более учителей

// Саенко Александр


?>

-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'Classes'
-- Классы
-- ---

DROP TABLE IF EXISTS `Classes`;
		
CREATE TABLE `Classes` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`)
) COMMENT 'Классы';

-- ---
-- Table 'Students'
-- Ученики
-- ---

DROP TABLE IF EXISTS `Students`;
		
CREATE TABLE `Students` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `first_name` VARCHAR(30) NOT NULL DEFAULT 'NULL',
  `last_name` VARCHAR(30) NOT NULL DEFAULT 'NULL',
  `class_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
KEY ()
) COMMENT 'Ученики';

-- ---
-- Table 'Teachers'
-- Учителя
-- ---

DROP TABLE IF EXISTS `Teachers`;
		
CREATE TABLE `Teachers` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `first_name` VARCHAR(30) NOT NULL DEFAULT 'NULL',
  `last_name` VARCHAR(30) NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) COMMENT 'Учителя';

-- ---
-- Table 'ClassTeacher'
-- Связь классов и учителей
-- ---

DROP TABLE IF EXISTS `ClassTeacher`;
		
CREATE TABLE `ClassTeacher` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `class_id` INTEGER NOT NULL DEFAULT NULL,
  `teacher_id` INTEGER NOT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) COMMENT 'Связь классов и учителей';

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `Students` ADD FOREIGN KEY (class_id) REFERENCES `Classes` (`id`);
ALTER TABLE `ClassTeacher` ADD FOREIGN KEY (class_id) REFERENCES `Classes` (`id`);
ALTER TABLE `ClassTeacher` ADD FOREIGN KEY (teacher_id) REFERENCES `Teachers` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `Classes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Students` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Teachers` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `ClassTeacher` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `Classes` (`id`,`name`) VALUES
-- ('','');
-- INSERT INTO `Students` (`id`,`first_name`,`last_name`,`class_id`) VALUES
-- ('','','','');
-- INSERT INTO `Teachers` (`id`,`first_name`,`last_name`) VALUES
-- ('','','');
-- INSERT INTO `ClassTeacher` (`id`,`class_id`,`teacher_id`) VALUES
-- ('','','');