-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


DROP TABLE IF EXISTS `Sushi`;
CREATE TABLE `Sushi` (
  `SushiKey` int(11) NOT NULL AUTO_INCREMENT,
  `Sustainability` boolean NULL,
  `SushiName` varchar(128) NOT NULL,
  `Origin` varchar(128) NULL,
  `SushiPrice` int(3) NOT NULL,
  `SashimiPrice` int(3) NOT NULL,
  PRIMARY KEY (`SushiKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Sushi` (`SushiKey`,`Sustainability`, `SushiName`, `Origin`, `SushiPrice`, `SashimiPrice`) VALUES
(1,	TRUE, 'Albacore Tuna*', '(Washington)', 4, 8),
(2,	TRUE, 'Albacore Tuna Belly*', '(Washington)', 5, 10),
(3,	TRUE, 'Sockey Salmon*', '(B.C.)', 4, 8),
(4,	TRUE, 'Sockey Salmon Belly*', '(B.C.)', 5, 10),
(5,	TRUE, 'King Salmon*', '(Washington)', 4, 8),
(6,	TRUE, 'King Salmon Belly*', '(Washington)', 5, 10),
(7,	TRUE, 'Sea Urchin/Uni*', '(Santa Barbara)', 6, 12),
(8,	TRUE, 'Sea Urchin/Uni*', '(Hokkaido)', 9, 18),
(9,	TRUE, 'Amberjack/Kanpachi*', '(Kona, Hawaii)', 4, 8),
(10,	TRUE, 'Black Cod Belly, grilled', '(Neah Bay)', 5, 10),
(11,	TRUE, 'Halibut kelp cured*', '(Neah Bay)', 5, 10),
(12,	TRUE, 'Halibut Engawa, seared*', '(Neah Bay)', 5, 10),
(13,	TRUE, 'Herring/Nishin', '(B.C.)', 3.5, 7),
(14,	FALSE, 'Jidori Egg Omelet/Tamago', '', 3, 6),
(15,	TRUE, 'King Crab', '(Alaska)', 6, 12),
(16,	TRUE, 'King Mackarel*/Sawara', '(East Coast)', 4, 8),
(17,	TRUE, 'King Salmon, Spring*', '(Washington)', 6, 12),
(18,	TRUE, 'Mackerel*/Saba', '(Norway)', 3, 6),
(19,	TRUE, 'Octopus/Tako', '(Spain)', 3, 6),
(20,	TRUE, 'Geoduck*/Mirugai', '(Puget Sound)', 9, 18),
(21,	TRUE, 'Salmon Roe (Chum)*/Ikura', '(Washington)', 5, 10),
(22,	FALSE, 'Seabream*/Madai', '(Japan)', 5, 10),
(23,	FALSE, 'Sea Eel/Anago', '(Japan)', 4.5, 9),
(24,	TRUE, 'Sea Scallops*/Hotate', '(Hokkaido)', 4, 8),
(25,	TRUE, 'Seared Sea Scallops w/Yuzu Gosyo*', '', 4.5, 9),
(26,	TRUE, 'Smelt Roe*/Masago', '(Canada)', 3, 6),
(27,	TRUE, 'Spot Prawn*/Amaebi', '(B.C.)', 5, 10),
(28,	TRUE, 'Spot Prawn Live*/Amaebi', '(B.C.)', 6, 12),
(29,	TRUE, 'Squid*/Surume Ika', '(Japan)', 4, 8),
(30,	TRUE, 'Squid Tentacles*/Ika Geso', '(Japan)', 4, 8),
(31,	TRUE, 'Surf Clam/Hokkigai', '(Nova Scotia)', 3.5, 7),
(32,	FALSE, 'Tuna*/Marugo', '(South Pacific)', 5, 10),
(33,	TRUE, 'White Prawns/Ebi', '(Gulf of Mexico)', 3.5, 7),
(34,	FALSE, 'YellowTail*/Hamachi', '(Kagoshima, Japan)', 5, 10),
(35,	FALSE, 'YellowTail Belly*/Hamachi Belly', '', 6, 12)
ON DUPLICATE KEY UPDATE `SushiKey` = VALUES(`SushiKey`), `Sustainability` = VALUES(`Sustainability`), `SushiName` = VALUES(`SushiName`), `Origin` = VALUES(`Origin`), `SushiPrice` = VALUES(`SushiPrice`), `SashimiPrice` = VALUES(`SashimiPrice`);
