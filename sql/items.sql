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
(1,	TRUE, 'Albacore Tuna*', '(Washington)', 5, 10),
(2,	TRUE, 'Albacore Tuna, Belly*', '(Washington)', 6, 12),
(3,	TRUE, 'Sockeye Salmon*', '(B.C.)', 5, 10),
(4,	TRUE, 'Sockeye Salmon, Belly*', '(B.C.)', 6, 12),
(5,	TRUE, 'King Salmon*', '(Washington)', 5, 10),
(6,	TRUE, 'King Salmon, Belly*', '(Washington)', 6, 12),
(7,	TRUE, 'Sea Urchin/Uni*', '(Santa Barbara)', 6, 12),
(8,	TRUE, 'Sea Urchin/Uni*', '(Hokkaido)', 9, 18),
(9,	TRUE, 'Amberjack/Kanpachi*', '(Kona, Hawaii)', 4, 8),
(10,	TRUE, 'Black Cod, Belly, grilled', '(Neah Bay)', 5, 10),
(11,	TRUE, 'Halibut kelp cured*', '(Neah Bay)', 5, 10),
(12,	TRUE, 'Halibut Engawa, seared*', '(Neah Bay)', 5, 10),
(13,	TRUE, 'Herring/Nishin', '(B.C.)', 3.5, 7),
(14,	FALSE, 'Jidori Egg Omelet/Tamago', '', 3, 6),
(15,	TRUE, 'King Crab', 'Alaska', 6, 12),
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
(35,	FALSE, 'YellowTail, Belly*/Hamachi, Belly', '', 6, 12)
ON DUPLICATE KEY UPDATE `SushiKey` = VALUES(`SushiKey`), `Sustainability` = VALUES(`Sustainability`), `SushiName` = VALUES(`SushiName`), `Origin` = VALUES(`Origin`), `SushiPrice` = VALUES(`SushiPrice`), `SashimiPrice` = VALUES(`SashimiPrice`);

DROP TABLE IF EXISTS `Ippins`;
CREATE TABLE `Ippins` (
  `IppinKey` int(11) NOT NULL AUTO_INCREMENT,
  `GF` boolean NULL,
  `Sustainability` boolean NULL,
  `IppinName` varchar (500) NOT NULL,
  `IppinPrice` varchar(6) NOT NULL,
  `Category` varchar(50) NOT NULL,
  PRIMARY KEY (`IppinKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Ippins` (`IppinKey`,`GF`, `Sustainability`, `IppinName`, `IppinPrice`,`Category`) VALUES
(1,	TRUE, TRUE, 'Mustard greens and Washington albacore tuna deressed with an almond wasabi sauce*', '10', 'appetizer'),
(2,	TRUE, FALSE, 'Asparagus and shimeji mushrooms in a creamy tofu sauce', '9', 'appetizer'),
(3,	TRUE, FALSE, 'Organic roof top butter lettuce, radishes, toasted almonds and Washington Fuji apples tossed in a sweet miso dressing', '15', 'appetizer'),
(4,	TRUE, FALSE, 'String bean salad tossed in a walnut miso dressing', '8', 'appetizer'),
(5,	TRUE, FALSE, 'Hijiki seaweed nimono', '9', 'appetizer'),
(6,	TRUE, TRUE, 'Shawan mushi with jidori eggs, snow crab and Neah Bay black cod', '11', 'appetizer'),
(7,	TRUE, TRUE, 'Shigoku oysters on the half shell with momiji ponzu', '20', 'appetizer'),
(8,	FALSE, TRUE, 'Tempura assortment with white prawns, local rockfish, kabocha squash, shishito pepper, and satsuma yam', '17', 'tempura'),
(9,	FALSE, FALSE, 'Assorted vegetable tempura with rooftop kale, kabocha squash, organic shiitake, shishito pepper and satsuma yam served with shiitake mushroom and konbu dashi', '14', 'tempura'),
(10,	FALSE, TRUE, 'Halibut (Neah Bay, WA) Tempura with matcha sea salt', '18', 'tempura'),
(11,	FALSE, TRUE, 'Geoduck (Puget Sound, WA) tender with mustard greens and shimeji mushrooms sauteed in a sake soy butter sauce', '17', 'fish_dish'),
(12,	TRUE, TRUE, 'Black cod (Neah Bay, WA) miso yuan yaki', '20', 'fish_dish'),
(13,	TRUE, TRUE, 'Hamachi (Kagoshima, Japan) kama shioyaki', '15', 'fish_dish'),
(14,	TRUE, TRUE, 'Kanpachi kama shioyaki', 'MP', 'fish_dish'),
(15,	TRUE, TRUE, 'King salmon (B.C. CAD) kama shioyaki', 'MP', 'fish_dish'),
(16,	TRUE, TRUE, 'White King salmon (WA) kama shioyaki', 'MP', 'fish_dish'),
(17,	TRUE, TRUE, 'Halibut (Neah Bay, WA) kama nitsuke with hari ginger and fresh gobo', 'MP', 'fish_dish'),
(18,	TRUE, TRUE, 'Idiot fish (Neah Bay, WA) nitsuke with hari ginger and fresh gobo', 'MP', 'fish_dish'),
(19,	TRUE, TRUE, 'Madai (Ehime, Japan) aradaki with hari ginger and fresh gobo', 'MP', 'fish_dish'),
(20,	TRUE, TRUE, 'Braised Snake River Farms wagyu beef skirt konabe with maitake mushrooms and yuchoi', '20', 'meat_dish'),
(21,	TRUE, TRUE, 'Skagit River Ranch organic pork tenderloin tonkatsu with sesame tonkatsu sauce', '19', 'meat_dish'),
(22,	TRUE, TRUE, 'Jidori chicken karaage with sansho sea salt', '15', 'meat_dish')
ON DUPLICATE KEY UPDATE `IppinKey` = VALUES(`IppinKey`), `GF` = VALUES(`GF`), `Sustainability` = VALUES(`Sustainability`), `IppinName` = VALUES(`IppinName`), `IppinPrice` = VALUES(`IppinPrice`), `Category` = VALUES(`Category`);
