# ************************************************************
# Sequel Pro SQL dump
# Версия 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Адрес: 127.0.0.1 (MySQL 5.5.38)
# Схема: yii_crm
# Время создания: 2015-01-14 17:29:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы crm_companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_companies`;

CREATE TABLE `crm_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `web` varchar(200) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_user_name` varchar(500) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `created_ip` varchar(500) DEFAULT NULL,
  `last_modified_user_id` int(11) NOT NULL,
  `last_modified_user_name` varchar(500) NOT NULL,
  `last_modified_datetime` datetime NOT NULL,
  `last_modified_ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `last_modified_user_id` (`last_modified_user_id`),
  CONSTRAINT `crm_companies_ibfk_2` FOREIGN KEY (`last_modified_user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_companies_ibfk_1` FOREIGN KEY (`created_user_id`) REFERENCES `crm_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_company_email_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_company_email_relations`;

CREATE TABLE `crm_company_email_relations` (
  `type_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  KEY `type_id` (`type_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `crm_company_email_relations_ibfk_3` FOREIGN KEY (`company_id`) REFERENCES `crm_companies` (`id`),
  CONSTRAINT `crm_company_email_relations_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `crm_email_types` (`id`),
  CONSTRAINT `crm_company_email_relations_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `crm_email_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_company_phone_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_company_phone_relations`;

CREATE TABLE `crm_company_phone_relations` (
  `type_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  KEY `type_id` (`type_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `crm_company_phone_relations_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `crm_companies` (`id`),
  CONSTRAINT `crm_company_phone_relations_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `crm_phone_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_contact_email_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_contact_email_relations`;

CREATE TABLE `crm_contact_email_relations` (
  `type_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  KEY `type_id` (`type_id`),
  KEY `contact_id` (`contact_id`),
  CONSTRAINT `crm_contact_email_relations_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `crm_contacts` (`id`),
  CONSTRAINT `crm_contact_email_relations_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `crm_email_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_contact_phone_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_contact_phone_relations`;

CREATE TABLE `crm_contact_phone_relations` (
  `type_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  KEY `type_id` (`type_id`),
  KEY `contact_id` (`contact_id`),
  CONSTRAINT `crm_contact_phone_relations_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `crm_contacts` (`id`),
  CONSTRAINT `crm_contact_phone_relations_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `crm_phone_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_contacts`;

CREATE TABLE `crm_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `job_title` varchar(500) DEFAULT NULL,
  `skype` varchar(200) DEFAULT NULL,
  `note` mediumtext,
  `created_user_id` int(11) NOT NULL,
  `created_user_name` varchar(500) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `created_ip` varchar(500) DEFAULT NULL,
  `last_modified_user_id` int(11) NOT NULL,
  `last_modified_user_name` varchar(500) NOT NULL,
  `last_modified_datetime` datetime NOT NULL,
  `last_modified_ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `last_modified_user_id` (`last_modified_user_id`),
  CONSTRAINT `crm_contacts_ibfk_2` FOREIGN KEY (`last_modified_user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_contacts_ibfk_1` FOREIGN KEY (`created_user_id`) REFERENCES `crm_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_dealing_status_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_dealing_status_logs`;

CREATE TABLE `crm_dealing_status_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dealing_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dealing_id` (`dealing_id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `crm_dealing_status_logs_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_dealing_status_logs_ibfk_1` FOREIGN KEY (`dealing_id`) REFERENCES `crm_dealings` (`id`),
  CONSTRAINT `crm_dealing_status_logs_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `crm_dealing_statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_dealing_statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_dealing_statuses`;

CREATE TABLE `crm_dealing_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT '#ffffff',
  `sorting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `crm_dealing_statuses` WRITE;
/*!40000 ALTER TABLE `crm_dealing_statuses` DISABLE KEYS */;

INSERT INTO `crm_dealing_statuses` (`id`, `title`, `color`, `sorting`)
VALUES
	(1,'Первичный контакт','#ffffff',NULL),
	(2,'Переговоры','#ffffff',NULL),
	(3,'Принимают решение','#ffffff',NULL),
	(4,'Согласование договора','#ffffff',NULL),
	(5,'Успешно реализовано','#ffffff',NULL),
	(6,'Закрыто и не реализовано','#ffffff',NULL);

/*!40000 ALTER TABLE `crm_dealing_statuses` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы crm_dealing_tag_names
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_dealing_tag_names`;

CREATE TABLE `crm_dealing_tag_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_dealing_tag_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_dealing_tag_relations`;

CREATE TABLE `crm_dealing_tag_relations` (
  `dealing_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  KEY `dealing_id` (`dealing_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `crm_dealing_tag_relations_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `crm_dealing_tag_names` (`id`),
  CONSTRAINT `crm_dealing_tag_relations_ibfk_1` FOREIGN KEY (`dealing_id`) REFERENCES `crm_dealings` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_dealings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_dealings`;

CREATE TABLE `crm_dealings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) DEFAULT NULL,
  `title` varchar(500) NOT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `responsible_user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `note` mediumtext,
  `created_user_id` int(11) NOT NULL,
  `created_user_name` varchar(500) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `created_ip` varchar(500) DEFAULT NULL,
  `last_modified_user_id` int(11) NOT NULL,
  `last_modified_user_name` varchar(500) NOT NULL,
  `last_modified_datetime` datetime NOT NULL,
  `last_modified_ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_id` (`contact_id`),
  KEY `responsible_user_id` (`responsible_user_id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `last_modified_user_id` (`last_modified_user_id`),
  CONSTRAINT `crm_dealings_ibfk_5` FOREIGN KEY (`last_modified_user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_dealings_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `crm_contacts` (`id`),
  CONSTRAINT `crm_dealings_ibfk_2` FOREIGN KEY (`responsible_user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_dealings_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `crm_dealing_statuses` (`id`),
  CONSTRAINT `crm_dealings_ibfk_4` FOREIGN KEY (`created_user_id`) REFERENCES `crm_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_email_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_email_types`;

CREATE TABLE `crm_email_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `sorting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `crm_email_types` WRITE;
/*!40000 ALTER TABLE `crm_email_types` DISABLE KEYS */;

INSERT INTO `crm_email_types` (`id`, `title`, `sorting`)
VALUES
	(1,'Рабочий',NULL),
	(2,'Домашний',NULL);

/*!40000 ALTER TABLE `crm_email_types` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы crm_log_actions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_log_actions`;

CREATE TABLE `crm_log_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_logs`;

CREATE TABLE `crm_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(500) DEFAULT NULL,
  `before_data` mediumtext NOT NULL,
  `after_data` mediumtext NOT NULL,
  `restore_flag` tinyint(1) NOT NULL DEFAULT '0',
  `restore_user_id` int(11) NOT NULL,
  `restore_user_name` int(11) DEFAULT NULL,
  `restore_datetime` datetime NOT NULL,
  `restore_ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `action_id` (`action_id`),
  KEY `user_id` (`user_id`),
  KEY `restore_user_id` (`restore_user_id`),
  CONSTRAINT `crm_logs_ibfk_3` FOREIGN KEY (`restore_user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_logs_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `crm_log_actions` (`id`),
  CONSTRAINT `crm_logs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `crm_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_phone_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_phone_types`;

CREATE TABLE `crm_phone_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `sorting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `crm_phone_types` WRITE;
/*!40000 ALTER TABLE `crm_phone_types` DISABLE KEYS */;

INSERT INTO `crm_phone_types` (`id`, `title`, `sorting`)
VALUES
	(1,'Рабочий',NULL),
	(2,'Рабочий прямой',NULL),
	(3,'Мобильный',NULL),
	(4,'Факс',NULL),
	(5,'Домашний',NULL),
	(6,'Другой',NULL);

/*!40000 ALTER TABLE `crm_phone_types` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы crm_task_status_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_task_status_logs`;

CREATE TABLE `crm_task_status_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `crm_task_status_logs_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_task_status_logs_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `crm_tasks` (`id`),
  CONSTRAINT `crm_task_status_logs_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `crm_task_statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_task_statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_task_statuses`;

CREATE TABLE `crm_task_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT '#ffffff',
  `sorting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `crm_task_statuses` WRITE;
/*!40000 ALTER TABLE `crm_task_statuses` DISABLE KEYS */;

INSERT INTO `crm_task_statuses` (`id`, `title`, `color`, `sorting`)
VALUES
	(1,'Не просмотрена','#ffffff',NULL),
	(2,'Просмотрена','#ffffff',NULL),
	(3,'Завершена','#ffffff',NULL);

/*!40000 ALTER TABLE `crm_task_statuses` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы crm_task_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_task_types`;

CREATE TABLE `crm_task_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sorting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `crm_task_types` WRITE;
/*!40000 ALTER TABLE `crm_task_types` DISABLE KEYS */;

INSERT INTO `crm_task_types` (`id`, `name`, `sorting`)
VALUES
	(1,'Напоминание',NULL),
	(2,'Встреча',NULL),
	(3,'Прочее',NULL);

/*!40000 ALTER TABLE `crm_task_types` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы crm_tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_tasks`;

CREATE TABLE `crm_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `custom_type_name` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `dealing_id` int(11) DEFAULT NULL,
  `text` mediumtext,
  `result` mediumtext NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_user_name` varchar(500) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `created_ip` varchar(500) DEFAULT NULL,
  `last_modified_user_id` int(11) NOT NULL,
  `last_modified_user_name` varchar(500) NOT NULL,
  `last_modified_datetime` datetime NOT NULL,
  `last_modified_ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `type_id` (`type_id`),
  KEY `contact_id` (`contact_id`),
  KEY `dealing_id` (`dealing_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `last_modified_user_id` (`last_modified_user_id`),
  CONSTRAINT `crm_tasks_ibfk_6` FOREIGN KEY (`last_modified_user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_tasks_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `crm_task_statuses` (`id`),
  CONSTRAINT `crm_tasks_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `crm_task_types` (`id`),
  CONSTRAINT `crm_tasks_ibfk_3` FOREIGN KEY (`contact_id`) REFERENCES `crm_contacts` (`id`),
  CONSTRAINT `crm_tasks_ibfk_4` FOREIGN KEY (`dealing_id`) REFERENCES `crm_dealings` (`id`),
  CONSTRAINT `crm_tasks_ibfk_5` FOREIGN KEY (`created_user_id`) REFERENCES `crm_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы crm_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crm_users`;

CREATE TABLE `crm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `work_phone` varchar(50) DEFAULT NULL,
  `note` mediumtext,
  `photo` varchar(200) DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_user_name` varchar(500) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `created_ip` varchar(500) DEFAULT NULL,
  `last_modified_user_id` int(11) NOT NULL,
  `last_modified_user_name` varchar(500) NOT NULL,
  `last_modified_datetime` datetime NOT NULL,
  `last_modified_ip` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `last_modified_user_id` (`last_modified_user_id`),
  CONSTRAINT `crm_users_ibfk_2` FOREIGN KEY (`last_modified_user_id`) REFERENCES `crm_users` (`id`),
  CONSTRAINT `crm_users_ibfk_1` FOREIGN KEY (`created_user_id`) REFERENCES `crm_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
