
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `beauty_service`;

CREATE TABLE IF NOT EXISTS `beauty_service` (
  `service_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `optionvalue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `beauty_service` (`service_id`, `title`, `optionvalue`, `description`, `image_file`) VALUES(1, 'Manicure', 'do your Manicure', 'We will put your clothes in the washer, dryer and fold and/or iron your clothes', 'laundry_lady.jpg');
INSERT INTO `beauty_service` (`service_id`, `title`, `optionvalue`, `description`, `image_file`) VALUES(2, 'WAXING', 'do your WAXING', NULL, '');
INSERT INTO `beauty_service` (`service_id`, `title`, `optionvalue`, `description`, `image_file`) VALUES(3, 'EYELASH EXTENSIONS', 'EYELASH EXTENSIONS', NULL, '');
INSERT INTO `beauty_service` (`service_id`, `title`, `optionvalue`, `description`, `image_file`) VALUES(4, 'SPRAY TAN', 'SPRAY TAN', NULL, '');
INSERT INTO `beauty_service` (`service_id`, `title`, `optionvalue`, `description`, `image_file`) VALUES(5, 'AROMATHERAPY', 'AROMATHERAPY', NULL, '');
INSERT INTO `beauty_service` (`service_id`, `title`, `optionvalue`, `description`, `image_file`) VALUES(6, 'EYELASH TINTING', 'EYELASH TINTING', NULL, '');
INSERT INTO `beauty_service` (`service_id`, `title`, `optionvalue`, `description`, `image_file`) VALUES(7, 'GEL NAILS', 'GEL NAILS', NULL, '');
INSERT INTO `beauty_service` (`service_id`, `title`, `optionvalue`, `description`, `image_file`) VALUES(8, 'ACRYLIC NAILS', 'ACRYLIC NAILS', NULL, '');

ALTER TABLE `beauty_service`
  ADD PRIMARY KEY (`service_id`);


ALTER TABLE `beauty_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;

