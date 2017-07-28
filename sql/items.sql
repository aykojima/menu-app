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
  `SushiPrice` float(6) NOT NULL,
  `SashimiPrice` float(6) NOT NULL,
  PRIMARY KEY (`SushiKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Sushi` (`SushiKey`,`Sustainability`, `SushiName`, `Origin`, `SushiPrice`, `SashimiPrice`) VALUES
(1,	TRUE, 'Albacore Tuna*', '(Washington)', 5, 10),
(2,	TRUE, 'Albacore Tuna*, belly', '(Washington)', 6, 12),
(3,	TRUE, 'Sockeye Salmon*', '(B.C.)', 5, 10),
(4,	TRUE, 'Sockeye Salmon*, belly', '(B.C.)', 6, 12),
(5,	TRUE, 'King Salmon*', '(Washington)', 5, 10),
(6,	TRUE, 'King Salmon*, belly', '(Washington)', 6, 12),
(7,	TRUE, 'Sea Urchin* / Uni', '(Santa Barbara)', 6, 12),
(8,	TRUE, 'Sea Urchin* / Uni', '(Hokkaido)', 9, 18),
(9,	TRUE, 'Amberjack / Kanpachi*', '(Kona, Hawaii)', 4, 8),
(10,	TRUE, 'Black Cod, belly, grilled', '(Neah Bay)', 5, 10),
(11,	TRUE, 'Halibut kelp cured*', '(Neah Bay)', 5, 10),
(12,	TRUE, 'Halibut Engawa*, seared', '(Neah Bay)', 5, 10),
(13,	TRUE, 'Herring* / Nishin', '(B.C.)', 3.5, 7),
(14,	FALSE, 'Jidori Egg Omelet / Tamago', '', 3, 6),
(15,	TRUE, 'King Crab', 'Alaska', 6, 12),
(16,	TRUE, 'King Mackarel* / Sawara', '(East Coast)', 4, 8),
(17,	TRUE, 'King Salmon*, Spring', '(Washington)', 6, 12),
(18,	TRUE, 'Mackerel* / Saba', '(Norway)', 3, 6),
(19,	TRUE, 'Octopus / Tako', '(Spain)', 3, 6),
(20,	TRUE, 'Geoduck* / Mirugai', '(Puget Sound)', 9, 18),
(21,	TRUE, 'Salmon Roe (Chum)* / Ikura', '(WA)', 5, 10),
(22,	FALSE, 'Seabream* / Madai', '(Japan)', 5, 10),
(23,	FALSE, 'Sea Eel / Anago', '(Japan)', 4.5, 9),
(24,	TRUE, 'Sea Scallops* / Hotate', '(Hokkaido)', 4, 8),
(25,	TRUE, 'Seared Sea Scallops* w/Yuzu Gosyo', '', 4.5, 9),
(26,	TRUE, 'Smelt Roe* / Masago', '(Canada)', 3, 6),
(27,	TRUE, 'Spot Prawn* / Amaebi', '(B.C.)', 5, 10),
(28,	TRUE, 'Spot Prawn Live* / Amaebi', '(B.C.)', 6, 12),
(29,	TRUE, 'Squid* / Surume Ika', '(Japan)', 4, 8),
(30,	TRUE, 'Squid Tentacles* / Ika Geso', '(Japan)', 4, 8),
(31,	TRUE, 'Surf Clam / Hokkigai', '(Nova Scotia)', 3.5, 7),
(32,	FALSE, 'Tuna* / Marugo', '(South Pacific)', 5, 10),
(33,	TRUE, 'White Prawns/Ebi', '(Gulf of Mexico)', 3.5, 7),
(34,	FALSE, 'YellowTail* / Hamachi', '(Kagoshima, Japan)', 5, 10),
(35,	FALSE, 'YellowTail*, belly / Hamachi, belly', '', 6, 12)
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
(6,	TRUE, TRUE, 'Chawan mushi with jidori eggs, snow crab and Neah Bay black cod', '11', 'appetizer'),
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
(19,	TRUE, FALSE, 'Madai (Ehime, Japan) aradaki with hari ginger and fresh gobo', 'MP', 'fish_dish'),
(20,	TRUE, FALSE, 'Braised Snake River Farms wagyu beef skirt konabe with maitake mushrooms and yuchoi', '20', 'meat_dish'),
(21,	FALSE, FALSE, 'Skagit River Ranch organic pork tenderloin tonkatsu with sesame tonkatsu sauce', '19', 'meat_dish'),
(22,	TRUE, FALSE, 'Jidori chicken karaage with sansho sea salt', '15', 'meat_dish')
ON DUPLICATE KEY UPDATE `IppinKey` = VALUES(`IppinKey`), `GF` = VALUES(`GF`), `Sustainability` = VALUES(`Sustainability`), 
`IppinName` = VALUES(`IppinName`), `IppinPrice` = VALUES(`IppinPrice`), `Category` = VALUES(`Category`);

DROP TABLE IF EXISTS `Rolls`;
CREATE TABLE `Rolls` (
  `RollKey` int(11) NOT NULL AUTO_INCREMENT,
  `Raw` boolean NULL,
  `Sustainability` boolean NULL,
  `RollName` varchar (500) NOT NULL,
  `RollPrice` varchar(6) NOT NULL,
  `Description` varchar (500),
  `Category` varchar(50) NOT NULL,
  PRIMARY KEY (`RollKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Rolls` (`RollKey`,`Raw`, `Sustainability`, `RollName`, `RollPrice`,`Description`, `Category`) VALUES
(1,	TRUE, TRUE, 'Black Cod, Avocado and Cucumber Roll', '12', 'Grilled Neah Bay black cod, avocado and cucumber', 'special_rolls'),
(2,	TRUE, FALSE, 'Oishi Roll', '20', 'Shrimp tempura, avocado and cucumber inside topped with seared creamy spicy crab, scallop and masago', 'special_rolls'),
(3,	TRUE, FALSE, 'Black Dragon Roll', '23', 'Shrimp tempura, avocado, cucumber inside and topped with grilled black cod, black tobiko, yuzu gosho and tsume sauce', 'special_rolls'),
(4,	TRUE, FALSE, 'Golden Dragon Roll', '21', 'Spicy tuna, avocado, cucumber and jalapeno inside topped with spicy tuna and golden tobiko', 'special_rolls'),
(5,	TRUE, FALSE, 'Hamtastic Roll', '23', 'Yellowtail, green onions, cucumber, avocado topped with yellowtail, jalapeno, golden tobiko and ponzu', 'special_rolls'),
(6,	TRUE, FALSE, 'Rising Salmon Roll', '21', 'Wild salmon, avocado, cucumber topped with seared salmon, nikiri sauce, jalapeno and golden tobiko', 'special_rolls'),
(7,	TRUE, FALSE, 'California Roll', '10', 'Crab, avocado, mayo, cucumber, masago', 'rolls'),
(8,	TRUE, FALSE, 'Ebi-Tempura Roll', '11', 'Wild shrimp tempura, cucumber, avocado, masago', 'rolls'),
(9,	TRUE, TRUE, 'Gari Saba', '9', 'Japanese mackerel, ginger, shiso leaf', 'rolls'),
(10,	FALSE, FALSE, 'Futomaki', '9', 'Kampyo gourd, organic tamago, spinach, oboro', 'rolls'),
(11,	TRUE, FALSE, 'Negihama Roll', '10', 'Yellowtail and green onions, avocado, cucumber', 'rolls'),
(12,	TRUE, FALSE, 'Rosanna Roll', '9', 'Hokkaido sea scallops, crab, masago, avocado, mayo', 'rolls'),
(13,	FALSE, TRUE, 'Salmon Skin Roll', '8', 'Kaiware, green onion, gobo, broiled wild salmon skin', 'rolls'),
(14,	TRUE, TRUE, 'Seattle Roll', '10', 'Wild salmon, avocado, cucumber, masago', 'rolls'),
(15,	TRUE, FALSE, 'Spicy Tuna Roll', '9', 'Tuna, spicy cili sauce, cucumber, avocado', 'rolls'),
(16,	TRUE, TRUE, 'Spider Roll', '13', 'Fried Maryland blue soft shell crab, cucumber, avocado, masago', 'rolls'),
(17,	FALSE, FALSE, 'Avocado Roll', '4', 'Fresh avocado', 'vegetable_rolls'),
(18,	FALSE, FALSE, 'Cucumber and Avocado Roll', '5', 'Fresh avocado and cucumber slices', 'vegetable_rolls'),
(19,	FALSE, FALSE, 'Oshinko Maki', '4', 'Pickled daikon radish', 'vegetable_rolls'),
(20,	FALSE, FALSE, 'Kappa Maki', '4', 'Cucumber roll', 'vegetable_rolls'),
(21,	FALSE, FALSE, 'Super Yummy Roll', '8', 'Spinach, shiidake, kanpyo gourd, avocado, pickled plum, shiso leaf', 'vegetable_rolls'),
(22,	FALSE, FALSE, 'Ume Shiso Roll', '4', 'Pickled plum, shiso leaf, cucumber', 'vegetable_rolls'),
(23,	FALSE, FALSE, 'Eastlake Vegetable Roll', '9', 'Satsuma yam and kabocha squash tempura, romaine lettuce, cucumber, avocado and ume paste', 'vegetable_rolls')
ON DUPLICATE KEY UPDATE `RollKey` = VALUES(`RollKey`), `Raw` = VALUES(`Raw`), `Sustainability` = VALUES(`Sustainability`),
`RollName` = VALUES(`RollName`), `RollPrice` = VALUES(`RollPrice`), `Category` = VALUES(`Category`);

DROP TABLE IF EXISTS `Courses`;
CREATE TABLE `Courses` (
  `CourseKey` int(11) NOT NULL AUTO_INCREMENT,
  `Course` varchar (500) NOT NULL,
  `CoursePrice` varchar (10) NULL,
  `AdditionalOne` varchar (500) NULL,
  `AdditionalOnePrice` varchar (10) NULL,
  `AdditionalTwo` varchar(500) NULL,
  `AdditionalTwoPrice` varchar (10) NULL,
  `AppetizerFirst` varchar(500) NULL,
  `AppetizerSecond` varchar(500) NULL,
  `AppetizerThird` varchar(500) NULL,
  `EntreeFirst` varchar(500) NULL,
  `EntreeFirstDescription` varchar(500) NULL,
  `EntreeFirstPrice` varchar (10) NULL,
  `EntreeSecond` varchar(500) NULL,
  `EntreeSecondDescription` varchar(500) NULL,
  `EntreeSecondPrice` varchar (10) NULL,
  `EntreeThird` varchar(500) NULL,
  `EntreeThirdDescription` varchar(500) NULL,
  `EntreeThirdPrice` varchar (10) NULL,
  `EntreeFourth` varchar(500) NULL,
  `DessertFirst` varchar(500) NULL,
  `DessertSecond` varchar(500) NULL,
  `DessertThird` varchar(500) NULL,
  PRIMARY KEY (`CourseKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Courses` (`CourseKey`,`Course`, `CoursePrice`, 
`AdditionalOne`, `AdditionalOnePrice`, `AdditionalTwo`,`AdditionalTwoPrice`,
`AppetizerFirst`, `AppetizerSecond`, `AppetizerThird`, 
`EntreeFirst`, `EntreeFirstDescription`, `EntreeFirstPrice`, 
`EntreeSecond`, `EntreeSecondDescription`, `EntreeSecondPrice`,
`EntreeThird`,  `EntreeThirdDescription`, `EntreeThirdPrice`, `EntreeFourth`,
`DessertFirst`, `DessertSecond`, `DessertThird`) VALUES

(1,	'Two courses', '', 
'Served with miso soup', '', 'Substitute with all sustainable fish/ +3', '',
'', '', '', 
'Bara Chirashi*', 'sushi rice layered with nori, tamago, ginger and topped with a mix of tuna, salmon, yellowtail and ikura', '25',
'Sushi Combo*', 'seven pieces of nigiri sushi and a roll', '28',
'Sashimi Combo*', 'variety of sashimi chosen by the chef served with rice', '30', '',
'', '', ''),
(2,	'Three courses', '39', 
'Add sashimi course', '15', 'Add sake pairing', '23',
'Washington albacore tuna and mustard green*', 'Shigoku oysters on the half shell*', 'String bean salad',
'Bara chirashi', '', '',
'Sushi combination', '', '', '', 
'', '', '',
'Chestnut and butter scotch creme brulee', 'House made millet mochi with azuki beans', 'Yuzu and yogurt panna cotta'),
(3,	'Five courses', '55', 
'Add sashimi course', '15', 'Add sake pairing', '34',
'Washington albacore tuna and mustard green*', 'Shigoku oysters on the half shell*', 'String bean salad',
'Chawanmushi', '', '',
'Special roll*', '', '',
"Chef's selection of 7 pieces of Sushi", '', '', '',
'Chestnut and butter scotch creme brulee', 'House made millet mochi with azuki beans', 'Yuzu and yogurt panna cotta'),
(4,	'Six courses', '90', 
'Add sashimi course', '15', 'Add sake pairing', '40',
'Washington albacore tuna and mustard green*', 'Shigoku oysters on the half shell*', 'String bean salad',
'Chawanmushi', '', '',
'Black cod miso yuan yaki', '', '',
"Chef's selection of 5 pieces of Sushi", '', '', "Chef's selection of 5 pieces of Sushi",
'Chestnut and butter scotch creme brulee', 'House made millet mochi with azuki beans', 'Yuzu and yogurt panna cotta'),
(5,	'Omakase', '', 
'', '', 'Add sake pairing', '55',
'', '', '',
'Omakase sashimi', '', 'MP',
'Omakase sushi', '', 'MP',
"Seven course Omakase", '', '110', "",
'', '', '')


ON DUPLICATE KEY UPDATE `CourseKey` = VALUES(`CourseKey`), `Course` = VALUES(`Course`), `CoursePrice` = VALUES(`CoursePrice`),
`AdditionalOne` = VALUES(`AdditionalOne`), `AdditionalOnePrice` = VALUES(`AdditionalOnePrice`), `AdditionalTwo` = VALUES(`AdditionalTwo`),
`AppetizerFirst` = VALUES(`AppetizerFirst`), `AppetizerSecond` = VALUES(`AppetizerSecond`), `AppetizerThird` = VALUES(`AppetizerThird`),
`EntreeFirst` = VALUES(`EntreeFirst`), `EntreeFirstDescription` = VALUES(`EntreeFirstDescription`), `EntreeFirstPrice` = VALUES(`EntreeFirstPrice`),
`EntreeSecond` = VALUES(`EntreeSecond`), `EntreeSecondDescription` = VALUES(`EntreeSecondDescription`), `EntreeSecondPrice` = VALUES(`EntreeSecondPrice`),
`EntreeThird` = VALUES(`EntreeThird`), `EntreeThirdDescription` = VALUES(`EntreeThirdDescription`), `EntreeThirdPrice` = VALUES(`EntreeThirdPrice`),
`EntreeFourth` = VALUES(`EntreeFourth`), `DessertFirst` = VALUES(`DessertFirst`), `DessertSecond` = VALUES(`DessertSecond`), `DessertThird` = VALUES(`DessertThird`);
 


DROP TABLE IF EXISTS `Lunch`;
CREATE TABLE `Lunch` (
  `LunchKey` int(11) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar (500) NOT NULL,
  `ItemPrice` varchar (10) NULL,
  `ItemDescription` varchar (500) NULL,
  PRIMARY KEY (`LunchKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 INSERT INTO `Lunch` (`LunchKey`,`ItemName`, `ItemPrice`, `ItemDescription`) VALUES

(1,	'Hijiki', '', ''),
(2,	'Agedashi tofu', '', ''),
(3,	'string beans', '', ''),
(4,	'rice and miso soup', '', ''),
(5,	'Substitute chawanmushi for miso', '+4', ''),
(6,	"Add chef's sashimi selection", '+10', ''),
(7,	'Add yuzu and yogurt panna cotta', '+3', ''),

(8,	'Asa Gozen', '23', 'Wild sockeye salmon shioyaki and organic tamago yaki'),
(9,	'Hiru Gozen', '28', "Maitake mushrooms, braised Snake River Ranch Wagyu beef skirt steak konabe and Chef's sashimi selection of the day"),
(10,	'Nigiri Gozen', '33', "seven pieces of chef's choice nigiri sushi"),

(11,	'All combinations are served with miso soup', '', ''),
(12,	'with all sustainable fish', '+3', ''),

(13,	'Bara Chirashi*', '25', 'Sushi rice layered with nori, tamago, ginger and topped with a mix of tuna, salmon, yellowtail, albacore and ikura'),
(14,	'Sushi Combo*', '28', '7 pieces of nigiri with a roll'),
(15,	'Deluxe Sushi Combo*', '33', '9 pieces of nigiri with a roll'),
(16,	'Sashimi Combo*', '30', "Daily selection of sashimi served with rice"),

(17,	'Tempura Udon*', '19', 'Udon with two wild gulf prawn tempura and scallion'),
(18,	'Tempura Udon Combo*', '25', 'Tempura udon with 3 piece of nigiri of maguro, hamachi, and sockeye salmon'),

(19,	'Mustard greens and Washington albacore tuna dressed with an almond wasabi sauce*', '19', ''),
(20,	'Organic spring mix, radishes, toasted almonds and Washington Fuji apples tossed in a sweet miso dressing', '15', ''),
(21,	'Totten Shigoku oysters on the half shell with momiji ponzu*', '20', ''),
(22,	'Chawan mushi with Jidori eggs, red crab and Neah Bay black cod', '11', ''),

(23,	'Shredded cabbage, Snake River Ranch Kurobuta tonkatsu, miso, rice and tsukemono', '', ''),

(24,	'Tonkatsu(loin)set', '20', ''),
(25,	'Hire-katsu(tenderloin)set', '22', ''),
(26,	'Combo katsu(loin and tenderloin)set', '26', '')
ON DUPLICATE KEY UPDATE `LunchKey` = VALUES(`LunchKey`), `ItemName` = VALUES(`ItemName`), 
`ItemPrice` = VALUES(`ItemPrice`), `ItemDescription` = VALUES(`ItemDescription`);