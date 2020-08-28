/* Create database */
DROP DATABASE IF EXISTS pokedex;
CREATE DATABASE pokedex;

/* Use database */
USE pokedex;

/* Pokemon table */
DROP TABLE IF EXISTS Pokemon;
CREATE TABLE Pokemon (
  Id INT NOT NULL PRIMARY KEY,
  Species VARCHAR(20) NOT NULL,
  Type1 ENUM('normal', 'fighting', 'flying', 'poison', 'ground', 'rock', 'bug', 'ghost', 'steel', 'fire',
            'water', 'grass', 'electric', 'psychic', 'ice', 'dragon', 'dark', 'fairy') NOT NULL,
  Type2 ENUM('normal', 'fighting', 'flying', 'poison', 'ground', 'rock', 'bug', 'ghost', 'steel', 'fire',
            'water', 'grass', 'electric', 'psychic', 'ice', 'dragon', 'dark', 'fairy') NULL
);

/* Trainer table */
DROP TABLE IF EXISTS Trainers;
CREATE TABLE Trainers (
  Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  Username VARCHAR(25) NOT NULL,
  Password VARCHAR(25) NOT NULL
);

DROP TABLE IF EXISTS TeamMembers;
CREATE TABLE TeamMembers (
  TrainerId INT NOT NULL,
  PokemonId INT NOT NULL
);

/* Populate Pokemon table */
INSERT INTO Pokemon(Id, Species, Type1, Type2) VALUES

/* GEN 1 */
(1, 'Bulbasaur', 'grass', 'poison'),
(2, 'Ivysaur', 'grass', 'poison'),
(3, 'Venusaur', 'grass', 'poison'),

(4, 'Charmander', 'fire', NULL),
(5, 'Charmeleon', 'fire', NULL),
(6, 'Charizard', 'fire', 'flying'),

(7, 'Squirtle', 'water', NULL),
(8, 'Wartortle', 'water', NULL),
(9, 'Blastoise', 'water', NULL),

(10, 'Caterpie', 'bug', NULL),
(11, 'Metapod', 'bug', NULL),
(12, 'Butterfree', 'bug', 'flying'),

(13, 'Weedle', 'bug', 'poison'),
(14, 'Kakuna', 'bug', 'poison'),
(15, 'Beedrill', 'bug', 'poison'),

(16, 'Pidgey', 'normal', 'flying'),
(17, 'Pidgeotto', 'normal', 'flying'),
(18, 'Pidgeot', 'normal', 'flying'),

(19, 'Rattata', 'normal', NULL),
(20, 'Raticate', 'normal', NULL),

(21, 'Spearow', 'normal', 'flying'),
(22, 'Fearow', 'normal', 'flying'),

(23, 'Ekans', 'poison', NULL),
(24, 'Arbok', 'poison', NULL),

(25, 'Pikachu', 'electric', NULL),
(26, 'Raichu', 'electric', NULL),

(27, 'Sandshrew', 'ground', NULL),
(28, 'Sandslash', 'ground', NULL),

(29, 'Nidoran', 'poison', NULL),
(30, 'Nidorina', 'poison', NULL),
(31, 'Nidoqueen', 'poison', 'ground'),

(32, 'Nidoran', 'poison', NULL),
(33, 'Nidorino', 'poison', NULL),
(34, 'Nidoking', 'poison', 'ground'),

(35, 'Clefairy', 'fairy', NULL),
(36, 'Clefable', 'fairy', NULL),

(37, 'Vulpix', 'fire', NULL),
(38, 'Ninetails', 'fire', NULL),

(39, 'Jigglypuff', 'normal', 'fairy'),
(40, 'Wigglytuff', 'normal', 'fairy'),

(41, 'Zubat', 'poison', 'flying'),
(42, 'Golbat', 'poison', 'flying'),

(43, 'Oddish', 'grass', 'poison'),
(44, 'Gloom', 'grass', 'poison'),
(45, 'Vileplume', 'grass', 'poison'),

(46, 'Paras', 'bug', 'grass'),
(47, 'Parasect', 'bug', 'grass'),

(48, 'Venonat', 'bug', 'poison'),
(49, 'Venomoth', 'bug', 'poison'),

(50, 'Diglett', 'ground', NULL),
(51, 'Dugtrio', 'ground', NULL),

(52, 'Meowth', 'normal', NULL),
(53, 'Persian', 'normal', NULL),

(54, 'Psyduck', 'water', NULL),
(55, 'Golduck', 'water', NULL),

(56, 'Mankey', 'fighting', NULL),
(57, 'Primeape', 'fighting', NULL),

(58, 'Growlithe', 'fire', NULL),
(59, 'Arcanine', 'fire', NULL),

(60, 'Poliwag', 'water', NULL),
(61, 'Poliwhirl', 'water', NULL),
(62, 'Poliwrath', 'water', 'fighting'),

(63, 'Abra', 'psychic', NULL),
(64, 'Kadabra', 'psychic', NULL),
(65, 'Alakazam', 'psychic', NULL),

(66, 'Machop', 'fighting', NULL),
(67, 'Machoke', 'fighting', NULL),
(68, 'Machamp', 'fighting', NULL),

(69, 'Bellsprout', 'grass', 'poison'),
(70, 'Weepinbell', 'grass', 'poison'),
(71, 'Victreebel', 'grass', 'poison'),

(72, 'Tentacool', 'water', 'poison'),
(73, 'Tentacruel', 'water', 'poison'),

(74, 'Geodude', 'rock', 'ground'),
(75, 'Graveler', 'rock', 'ground'),
(76, 'Golem', 'rock', 'ground'),

(77, 'Ponyta', 'fire', NULL),
(78, 'Rapidash', 'fire', NULL),

(79, 'Slowpoke', 'water', 'psychic'),
(80, 'Slowbro', 'water', 'psychic'),

(81, 'Magnemite', 'electric', 'steel'),
(82, 'Magneton', 'electric', 'steel'),

(83, "Farfetch'd", 'normal', 'flying'),

(84, 'Doduo', 'normal', 'flying'),
(85, 'Dodrio', 'normal', 'flying'),

(86, 'Seel', 'water', NULL),
(87, 'Dewgong', 'water', 'ice'),

(88, 'Grimer', 'poison', NULL),
(89, 'Muk', 'poison', NULL),

(90, 'Shellder', 'water', NULL),
(91, 'Cloyster', 'water', 'ice'),

(92, 'Gastly', 'ghost', 'poison'),
(93, 'Haunter', 'ghost', 'poison'),
(94, 'Gengar', 'ghost', 'poison'),

(95, 'Onix', 'rock', 'ground'),

(96, 'Drowzee', 'psychic', NULL),
(97, 'Hypno', 'psychic', NULL),

(98, 'Krabby', 'water', NULL),
(99, 'Kingler', 'water', NULL),

(100, 'Voltorb', 'electric', NULL),
(101, 'Electrode', 'electric', NULL),

(102, 'Exeggcute', 'grass', 'psychic'),
(103, 'Exeggutor', 'grass', 'psychic'),

(104, 'Cubone', 'ground', NULL),
(105, 'Marowak', 'ground', NULL),

(106, 'Hitmonlee', 'fighting', NULL),

(107, 'Hitmonchan', 'fighting', NULL),

(108, 'Lickitung', 'normal', NULL),

(109, 'Koffing', 'poison', NULL),
(110, 'Weezing', 'poison', NULL),

(111, 'Rhyhorn', 'ground', 'rock'),
(112, 'Rhydon', 'ground', 'rock'),

(113, 'Chansey', 'normal', NULL),

(114, 'Tangela', 'grass', NULL),

(115, 'Kangaskhan', 'normal', NULL),

(116, 'Horsea', 'water', NULL),
(117, 'Seadra', 'water', NULL),

(118, 'Goldeen', 'water', NULL),
(119, 'Seaking', 'water', NULL),

(120, 'Staryu', 'water', NULL),
(121, 'Starmie', 'water', 'psychic'),

(122, 'Mr. Mime', 'psychic', 'fairy'),

(123, 'Scyther', 'bug', 'flying'),

(124, 'Jynx', 'ice', 'psychic'),

(125, 'Electabuzz', 'electric', NULL),

(126, 'Magmar', 'fire', NULL),

(127, 'Pinsir', 'bug', NULL),

(128, 'Tauros', 'normal', NULL),

(129, 'Magikarp', 'water', NULL),
(130, 'Gyarados', 'water', 'flying'),

(131, 'Lapras', 'water', 'ice'),

(132, 'Ditto', 'normal', NULL),

(133, 'Eevee', 'normal', NULL),
(134, 'Vaporeon', 'water', NULL),
(135, 'Jolteon', 'electric', NULL),
(136, 'Flareon', 'fire', NULL),

(137, 'Porygon', 'normal', NULL),

(138, 'Omanyte', 'rock', 'water'),
(139, 'Omastar', 'rock', 'water'),

(140, 'Kabuto', 'rock', 'water'),
(141, 'Kabutops', 'rock', 'water'),

(142, 'Aerodactyl', 'rock', 'flying'),

(143, 'Snorlax', 'normal', NULL),

(144, 'Articuno', 'ice', 'flying'),

(145, 'Zapdos', 'electric', 'flying'),

(146, 'Moltres', 'fire', 'flying'),

(147, 'Dratini', 'dragon', NULL),
(148, 'Dragonair', 'dragon', NULL),
(149, 'Dragonite', 'dragon', 'flying'),

(150, 'Mewtwo', 'psychic', NULL),

(151, 'Mew', 'psychic', NULL),

/* GEN 2 */
(152, 'Chikorita', 'grass', NULL),
(153, 'Bayleef', 'grass', NULL),
(154, 'Meganium', 'grass', NULL),

(155, 'Cyndaquil', 'fire', NULL),
(156, 'Quilava', 'fire', NULL),
(157, 'Typhlosion', 'fire', NULL),

(158, 'Totodile', 'water', NULL),
(159, 'Croconaw', 'water', NULL),
(160, 'Feraligatr', 'water', NULL),

(161, 'Sentret', 'normal', NULL),
(162, 'Furret', 'normal', NULL),

(163, 'Hoothoot', 'normal', 'flying'),
(164, 'Noctowl', 'normal', 'flying'),

(165, 'Ledyba', 'bug', 'flying'),
(166, 'Ledian', 'bug', 'flying'),

(167, 'Spinarak', 'bug', 'poison'),
(168, 'Ariados', 'bug', 'poison'),

(169, 'Crobat', 'poison', 'flying'),

(170, 'Chinchou', 'water', 'electric'),
(171, 'Lanturn', 'water', 'electric'),

(172, 'Pichu', 'electric', NULL),

(173, 'Cleffa', 'Fairy', NULL),

(174, 'Igglybuff', 'normal', 'fairy'),

(175, 'Togepi', 'fairy', NULL),
(176, 'Togetic', 'fairy', 'flying'),

(177, 'Natu', 'psychic', 'flying'),
(178, 'Xatu', 'psychic', 'flying'),

(179, 'Mareep', 'electric', NULL),
(180, 'Flaaffy', 'electric', NULL),
(181, 'Ampharos', 'electric', NULL),

(182, 'Bellossom', 'grass', NULL),

(183, 'Marill', 'water', 'fairy'),
(184, 'Azumarill', 'water', 'fairy'),

(185, 'Sudowoodo', 'rock', NULL),

(186, 'Politoed', 'water', NULL),

(187, 'Hoppip', 'grass', 'flying'),
(188, 'Skiploom', 'grass', 'flying'),
(189, 'Jumpluff', 'grass', 'flying'),

(190, 'Aipom', 'normal', NULL),

(191, 'Sunkern', 'grass', NULL),
(192, 'Sunflora', 'grass', NULL),

(193, 'Yanma', 'Bug', 'Flying'),

(194, 'Wooper', 'water', 'ground'),
(195, 'Quagsire', 'water', 'ground'),

(196, 'Espeon', 'psychic', NULL),
(197, 'Umbreon', 'dark', NULL),

(198, 'Murkrow', 'dark', 'flying'),

(199, 'Slowking', 'water', 'psychic'),

(200, 'Misdreavus', 'ghost', NULL),

(201, 'Unown', 'psychic', NULL),

(202, 'Wobbuffet', 'psychic', NULL),

(203, 'Girafarig', 'normal', 'psychic'),

(204, 'Pineco', 'bug', NULL),
(205, 'Forretress', 'bug', 'steel'),

(206, 'Dunsparce', 'normal', NULL),

(207, 'Gligar', 'ground', 'flying'),

(208, 'Steelix', 'steel', 'ground'),

(209, 'Snubbull', 'fairy', NULL),
(210, 'Granbull', 'fairy', NULL),

(211, 'Qwilfish', 'water', 'poison'),

(212, 'Scizor', 'bug', 'steel'),

(213, 'Schuckle', 'bug', 'rock'),

(214, 'Heracross', 'bug', 'fighting'),

(215, 'Sneasel', 'dark', 'ice'),

(216, 'Teddiursa', 'normal', NULL),
(217, 'Ursaring', 'normal', NULL),

(218, 'Slugma', 'fire', NULL),
(219, 'Magcargo', 'fire', 'rock'),

(220, 'Swinub', 'ice', 'ground'),
(221, 'Piloswine', 'ice', 'ground'),

(222, 'Corsola', 'water', 'rock'),

(223, 'Remoraid', 'water', NULL),
(224, 'Octillery', 'water', NULL),

(225, 'Delibird', 'ice', 'flying'),

(226, 'Mantine', 'water', 'flying'),

(227, 'Skarmory', 'steel', 'flying'),

(228, 'Houndour', 'dark', 'fire'),
(229, 'Houndoom', 'dark', 'fire'),

(230, 'Kingdra', 'water', 'dragon'),

(231, 'Phanpy', 'ground', NULL),
(232, 'Donphan', 'ground', NULL),

(233, 'Porygon2', 'normal', NULL),

(234, 'Stantler', 'normal', NULL),

(235, 'Smeargle', 'normal', NULL),

(236, 'Tyrogue', 'fighting', NULL),
(237, 'Hitmontop', 'fighting', NULL),

(238, 'Smoochum', 'ice', 'psychic'),

(239, 'Elekid', 'electric', NULL),

(240, 'Magby', 'fire', NULL),

(241, 'Miltank', 'normal', NULL),
(242, 'Blissey', 'normal', NULL),

(243, 'Raikou', 'electric', NULL),

(244, 'Entei', 'fire', NULL),

(245, 'Suicune', 'water', NULL),

(246, 'Larvitar', 'rock', 'ground'),
(247, 'Pupitar', 'rock', 'ground'),
(248, 'Tyranitar', 'rock', 'dark'),

(249, 'Lugia', 'psychic', 'flying'),

(250, 'Ho-Oh', 'fire', 'flying'),

(251, 'Celebi', 'grass', 'psychic'),

/* GEN 3 */
(252, 'Treecko', 'grass', NULL),
(253, 'Grovyle', 'grass', NULL),
(254, 'Sceptile', 'grass', NULL),

(255, 'Torchic', 'fire', NULL),
(256, 'Combusken', 'fire', 'fighting'),
(257, 'Blaziken', 'fire', 'fighting'),

(258, 'Mudkip', 'water', NULL),
(259, 'Marshtomp', 'water', 'ground'),
(260, 'Swampert', 'water', 'ground');