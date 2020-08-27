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
            'water', 'grass', 'electric', 'psychic', 'ice', 'dragon', 'dark', 'fairy') NULL,
  Team INT NOT NULL DEFAULT 0
);

/* Trainer table */
CREATE TABLE Trainer (
  Id INT NOT NULL PRIMARY KEY, 
  Username VARCHAR(25) NOT NULL,
  Password VARCHAR(25) NOT NULL,
  Pokemon1ID INT,
  Pokemon2ID INT,
  Pokemon3ID INT,
  Pokemon4ID INT,
  Pokemon5ID INT,
  Pokemon6ID INT
); 

/* Populate Pokemon table */
INSERT INTO Pokemon(Id, Species, Type1, Type2) VALUES
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

(151, 'Mew', 'psychic', NULL);