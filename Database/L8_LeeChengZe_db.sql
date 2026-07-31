-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2021 at 06:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l8_leechengze_db`
--
CREATE DATABASE IF NOT EXISTS `l8_leechengze_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `l8_leechengze_db`;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `memid`, `productid`, `quantity`, `unitPrice`) VALUES
(74, 19, 1, 1, 36),
(68, 17, 1, 1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `active`) VALUES
(1, 'Spicebox', 1),
(2, 'Spices', 1),
(3, 'Blends', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Name`, `Email`, `Message`, `Time`) VALUES
(1, 'Winnie Tan.', 'winnie@gmail.com', 'Testing 123', '2021-07-25 14:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `memberName` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `deliveryAddress` varchar(200) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `profilePicture` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `memberName`, `password`, `deliveryAddress`, `phoneNumber`, `profilePicture`, `time`, `active`) VALUES
(25, 'winnie@gmail.com', 'Winnie', 'Passw0rd123', 'Ang Mo Kio', 12345678, 'profiles/20210812_150435wp3830845.jpg', '2021-08-12 07:04:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orderid`, `productid`, `quantity`, `unitPrice`) VALUES
(36, 33, 8, 1, 5),
(35, 32, 13, 2, 18),
(34, 31, 6, 2, 5),
(33, 30, 1, 2, 36),
(32, 29, 1, 1, 36),
(31, 28, 2, 1, 78),
(30, 27, 8, 2, 5),
(29, 26, 1, 1, 36),
(28, 26, 2, 1, 78),
(27, 25, 1, 1, 36),
(26, 24, 8, 1, 5),
(25, 23, 2, 2, 78),
(37, 34, 11, 2, 18),
(38, 35, 1, 1, 36),
(39, 36, 2, 2, 78),
(40, 37, 1, 3, 36);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `requireDate` datetime NOT NULL,
  `deliveryDate` datetime DEFAULT NULL,
  `cancelDate` datetime DEFAULT NULL,
  `orderStatus` enum('O','D','C') NOT NULL,
  `totalQuantity` int(11) DEFAULT NULL,
  `totalPrice` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `memberid`, `orderDate`, `requireDate`, `deliveryDate`, `cancelDate`, `orderStatus`, `totalQuantity`, `totalPrice`) VALUES
(27, 18, '2021-08-11 09:26:31', '2021-08-12 09:26:00', NULL, NULL, 'O', NULL, 10),
(26, 18, '2021-08-11 09:26:00', '2021-08-20 09:25:00', NULL, '2021-08-11 09:28:36', 'C', NULL, 114),
(25, 17, '2021-08-11 01:14:49', '2021-08-13 01:14:00', NULL, NULL, 'O', NULL, 36),
(24, 17, '2021-08-10 22:32:17', '2021-08-18 22:32:00', NULL, '2021-08-10 22:32:26', 'C', NULL, 5),
(23, 17, '2021-08-10 22:31:41', '2021-08-12 22:31:00', NULL, NULL, 'O', NULL, 156),
(28, 18, '2021-08-11 22:12:03', '2021-08-21 22:12:00', NULL, '2021-08-11 22:12:10', 'C', NULL, 78),
(29, 23, '2021-08-12 01:58:14', '2021-08-20 01:58:00', NULL, '2021-08-13 16:38:32', 'C', NULL, 36),
(30, 26, '2021-08-12 23:51:26', '2021-08-21 23:51:00', NULL, '2021-08-12 23:51:52', 'C', NULL, 72),
(31, 23, '2021-08-13 10:47:46', '2021-08-14 10:47:00', NULL, NULL, 'O', NULL, 10),
(32, 28, '2021-08-13 11:05:31', '2021-08-21 11:05:00', NULL, '2021-08-13 11:05:46', 'C', NULL, 36),
(33, 23, '2021-08-13 16:40:11', '2021-08-21 16:40:00', NULL, NULL, 'O', NULL, 5),
(34, 23, '2021-08-13 23:39:18', '2021-08-20 23:39:00', NULL, NULL, 'O', NULL, 36),
(35, 25, '2021-08-13 23:54:16', '2021-08-27 23:54:00', NULL, NULL, 'O', NULL, 36),
(36, 25, '2021-08-13 23:54:37', '2021-08-31 23:54:00', NULL, NULL, 'O', NULL, 156),
(37, 30, '2021-08-14 02:27:42', '2021-08-20 02:27:00', NULL, NULL, 'O', NULL, 108);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `productDescription` varchar(2000) NOT NULL,
  `productPicture` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `unitPrice` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `feature` enum('N','Y') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productDescription`, `productPicture`, `categoryid`, `unitPrice`, `quantity`, `active`, `feature`) VALUES
(1, 'Travel - Art of Spice Mini-Kit', 'A taste of the Indian heritage of Singapore! Celebrate your love for flavourful food with this selection of 4 organic spices from Indian Spicebox beautifully packaged together with 4 recipe cards. Everything you need to whip up a gorgeous Indian meal.\r\n\r\nSpices: Red Chili, Garam Masala, Cumin Seeds, Turmeric\r\nRecipes: Chana Masala, Daal, Aloo Tikki, Pakoras\r\n\r\nDimensions: 16 x 16 x 8.5 cm\r\nProduct weight: 600g\r\nNet weight: 120g', 'spiceboxMini.jpg', 1, 36, 100, 1, 'Y'),
(2, 'Spicebox Kit: Silver', 'Treat yourself to the entire package! Our gorgeous silver finish spicebox kit includes the \'Cooking with Indian Spicebox\' cookbook featuring more than 30 recipes, foodie stories and gorgeous color photos that will leave you drooling.\r\n\r\nAlong with the book you will receive a stunning tin-plated steel (silver finish) spicebox along with 9 wooden containers, 9 silver finish tins with individually packaged organic spices (all the spices you need to cook the recipes in the book!).\r\n\r\nThe book, spicebox and spices all come beautifully packaged in recyclable materials and this product is guaranteed to impress! With each box purchased, 10 street children in India will be fed a hot, nutritious, meal.\r\n\r\nThe book, spicebox and spices all come beautifully packaged in recyclable materials and this product is guaranteed to impress! With each box purchased, 10 street children in India will be fed a hot, nutritious, meal.', 'sliverSpicebox.jpg', 1, 78, 100, 1, 'N'),
(3, 'Spicebox Kit: Gold', 'Treat yourself to the entire package! Our gorgeous gold finish spicebox kit includes the \'Cooking with Indian Spicebox\' cookbook featuring more than 30 recipes, foodie stories and gorgeous color photos that will leave you drooling.\r\n\r\nAlong with the book you will receive a stunning tin-plated steel (gold finish) spicebox along with 9 wooden containers, 9 gold finish tins with individually packaged organic spices (all the spices you need to cook the recipes in the book!).\r\n\r\nThe book, spicebox and spices all come beautifully packaged in recyclable materials and this product is guaranteed to impress! With each box purchased, 10 street children in India will be fed a hot, nutritious, meal.', 'spiceboxGold.jpg', 1, 78, 100, 1, 'Y'),
(4, 'Ground Turmeric - Silver', 'A vibrant and sunny spice, you will want to be best friends with turmeric because of its powerful medicinal properties, specifically as an anti-inflammatory.\r\n\r\nRemember that this spice turns everything to a bright yellow-gold, so handle with care!\r\n\r\nTin dimensions: 6.5 x 6.5 x 5 cm\r\nNet weight: 30g', 'GroundTurmericSilver.jpg', 2, 5, 100, 1, 'N'),
(5, 'Whole Cinnamon - Silver', 'Everyone loves Cinnamon. A global warrior, full of substance and adventure, the lure of this spice is unbeatable.\r\n\r\nCinnamon is warm, charming, and has astonishing superpowers such as helping to lower cholesterol and fight infections in the body.\r\n\r\nTin dimensions: 6.5 x 6.5 x 5 cm\r\nNet weight: 15g', 'WholeCinnamonSilver.jpg', 2, 4, 100, 1, 'N'),
(6, 'Ground Coriander - Silver', 'Seeds of the cilantro or coriander plant, coriander powder helps lower the cholesterol in our bodies. But this spice must be fresh in order to provide both flavor and health benefits.\r\n\r\nGround coriander is a subtle tasting spice and popular when cooking meat dishes.\r\n\r\nTin dimensions: 6.5 x 6.5 x 5 cm\r\nNet weight: 30g', 'GroundCorianderSilver.jpg', 2, 5, 100, 1, 'N'),
(8, 'Red Chili Powder - Silver', 'Oh red chili will break your heart, set you on fire, and you won\'t even know what hit you.\r\n\r\nA gorgeous and tempting spice-but keep in mind red chili can often be too hot to handle and much more satisfying in small doses.\r\n\r\nTin dimensions: 6.5 x 6.5 x 5 cm\r\nNet weight: 30g', 'RedChiliPowderSilver.jpg', 2, 5, 100, 1, 'N'),
(9, 'Garam Masala - Silver', 'Garam masala is essentially a mix of whole spices ground into a powder. The basic blend uses cloves, cinnamon, cardamom, cumin seeds, coriander seeds, and pepper. In India, garam masala spice blends vary not only by region but also by home, and many Indian housewives boast of having their own secret garam masala blend that includes additional exotic and locally sourced spices.\r\n\r\nGaram masala, popular in North Indian cooking, is used in many traditional curries as well as in biryani. It can be lovingly sprinkled over a daal (lentil curry) as a garnish and also adds a good kick of flavor to a simple sauteed vegetable dish. Just stick to using the pinched finger method (sprinkle, don\'t spoon) with this spice; you will love it and you forever.\r\n\r\nTin dimensions: 6.5 x 6.5 x 5 cm\r\nNet weight: 30g', 'GaramMasalaSilver.jpg', 2, 6, 100, 1, 'N'),
(10, 'Organic Chai Masala', 'Our organic Chai spice blend in a gorgeous re-usable tin box, allows you to make the perfect cup of Indian tea. The blend features organic cinnamon from Kerala, organic cardamom and organic dried ginger. To make Masala Chai just add one teaspoon of this blend into boiling water, a splash of milk and a teaspoon of your favourite black tea. Boil, strain and enjoy!\r\n100 g foil pack inside a re-usable tin.\r\n\r\nSpice blend ingredients: cardamom, cinnamon, dry ginger\r\n\r\nTin dimensions: 6.25 x 4.25 inches\r\nNet weight: 100g', 'OrganicChaiMasala.png', 3, 18, 100, 1, 'Y'),
(11, 'Organic Chaat Masala', 'Chaat masala is dried mango powder that can be used to add a sweet and sour and tangy touch to fruit, Indian street food dishes and snacks. It can even be sprinkled over grilled vegetables and meat for a unique Indian flavour.\r\n\r\nSpice blend ingredients: dry mango, cumin, black salt, coriander, pepper, cloves, ajwain (caraway).\r\n\r\nTin dimensions: 6.25 x 4.25 inches\r\nNet weight: 100g', 'OrganicChaatMasala.jpg', 3, 18, 100, 1, 'N'),
(12, 'Organic Tandoori Masala', 'Tandoori spice blend instantly transforms any meat or veg into a beloved Indian restaurant dish with a simple yogurt based marinade. No red colouring or artificial ingredients. All spices in this blend are organic.\r\n\r\nSpice blend Ingredients: coriander, cumin, red chilli, garam masala, turmeric, garlic, ginger.\r\n\r\nTin dimensions: 6.25 x 4.25 inches\r\nNet weight: 100g', 'OrganicTandooriMasala.png', 3, 18, 100, 1, 'N'),
(13, 'Organic Chana Masala', 'Our organic Chana Masala will allow you to quickly and easily re-create this restaurant favourite at home. No other spices are required and all spices in this blend are organic.\r\n\r\nSpice blend Ingredients: cumin, coriander, black cardamom, black pepper, cloves, nutmeg, cinnamon, dry ginger\r\n\r\nTin dimensions: 6.25 x 4.25 inches\r\nNet weight: 100g', 'OrganicChanaMasala.png', 3, 18, 100, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Picture` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `About` varchar(1000) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Serve` varchar(50) NOT NULL,
  `Ingredients` varchar(500) NOT NULL,
  `Preparation` varchar(1200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `Name`, `Picture`, `Description`, `About`, `Time`, `Serve`, `Ingredients`, `Preparation`) VALUES
(1, 'Poha', 'Poha.jpg', 'Poha, also known as pauwa, chira, or aval, among many other names, is flattened rice originating from the Indian subcontinent. Rice is parboiled before flattening so that it can be consumed with very little to no cooking.', 'On the weekend, and especially if it\'s raining or gloomy outside, there\'s nothing better than putting on some soothing music, wearing cozy socks, and tucking into a yummy bowl of poha with a steaming cup of chai!\r\n\r\n \r\n\r\nA little spicy, a whole lot delicious, and super easy to prepare, poha is both the name of the dish and its main ingredient.', '15 minutes', '2 Servings', '1 cup (100 g) thick poha (flattened rice)          \r\n1 tablespoon (15 ml) oil\r\n1/4 teaspoon mustard seeds\r\n1/4 teaspoon cumin seeds\r\n1 green chili, finely chopped (leave it whole if you don\'t want too\r\nmuch heat)\r\n8 curry leaves\r\n1/2 medium onion, finely chopped\r\n1/2 teaspoon turmeric powder\r\n1/2 teaspoon salt\r\n1/2 lemon or lime\r\nFresh coriander, finely chopped, for garnish', 'Put the poha in a large bowl, wash well, and drain the water. Set the flakes aside for 5 minutes.\r\n\r\nHeat the oil in a wok or kadhai on medium heat, and add the mustard seeds, cumin seeds, green chili, and curry leaves. Stir until the seeds crackle, and then add the chopped onion. \r\nSaute the onion until translucent.\r\n\r\nAdd the turmeric and salt; stir well and saute for a few minutes.\r\n\r\nAdd the poha flakes, one heaped tablespoon at a time, mixing in well so that the flakes evenly absorb all the spices and yellow turmeric coloring.\r\n\r\nTurn the heat down to a simmer, sprinkle a handful of water over the top, cover the pot, and let the poha steam through for a minute or two.\r\n\r\nTurn off the heat; remove the cover, and squeeze some lemon or lime juice over the top. Sprinkle with fresh coriander and serve hot.\r\n'),
(2, 'Masala Chai', 'masalaChai.jpg', 'Masala chai is a tea beverage made by boiling black tea in milk and water with a mixture of aromatic herbs and spices. Originating in India, the beverage has gained worldwide popularity, becoming a feature in many coffee and tea houses.', 'This is the sweet, fragrant goodness that takes me back home to the magical streets of India in a single sip. In India, masala chai is served up at carts on just about any street corner, where the tea bubbles and boils in a big steel pot all day long. The chai is artfully poured into a small glass for your slurping pleasure. Masala chai is always superstrong, very sweet, and highly addictive. No need to buy a premixed, tea-bag version of masala chai when you can make it like a street vendor.\r\n\r\nThis is my husband\'s recipe, and it\'s a keeper. It makes two BIG cups (I\'m greedy when it comes to chai).', '10 minutes', '2 Servings', '3 cups water 1/2 inch piece fresh ginger, peeled and roughly chopped 1 cardamom pod 1/2 inch piece whole cinnamon 1/2 cup (125 ml) whole or 2% milk (don\'t use fat-free) 3 teaspoons loose black tea leaves (we use Brooke Bond\'s Red Label or Taj Mahal tea, which can be bought at Indian grocery stores- but feel free to use any brand of loose-leaf Assam black tea) Sugar', 'Put the water and ginger into a saucepan, and bring the water to a boil. The ginger will flavor the water.\r\nIn the meanwhile, using a mortar and pestle, crush the cardamom and cinnamon slightly to release their flavors and oils. The cardamom pod needs a hard smack to break it open.\r\nThrow the crushed spices into the boiling water, and continue to boil for another minute.\r\nThen add the milk to the water. As soon as the mixture starts bubbling, add the loose tea, let it boil for 20 seconds, and then lower to a simmer (be watchful to reduce the heat before the tea boils over!). Let the chai simmer for 10 to 20 seconds, then turn off the heat and cover the saucepan for a minute (this allows the tea to brew further). The tea should be a nice golden brown color.\r\nPour the chai into a kettle or teapot using a strainer, or strain directly into cups. Add sugar to taste (it\'s supposed to be a tad sweeter than what you are used to) and enjoy!\r\n'),
(3, 'Masala Bhindi', 'masalaBhindi.jpg', 'Bhendi Fry is stir fried okra that is slit and stuffed with spice mix such as garam masala and other locally available ground spices. This dish is stir-fried or sauteed slightly, which is distinct from batter-fried okra, which involves deep frying.', 'In this super-quick and easy recipe, good-for-you okra (bhindi) is lightly sauteed and spiced. This is a very popular vegetarian side dish in many regions of India.\r\n\r\n \r\n\r\nGrowing up, I really hated okra. I have major texture issues, and the stringy, gooey nature of this vegetable-plus the fact that it is also popularly known in India as \"lady fingers\" was a major turnoff. Many years later, while on a mission to increase the green in my diet, I re-embraced this vegetable and figured out a way to make it crisper and non-gooey. I do overcook it a bit so that it\'s crisp and nicely browned, but if you\'re into a softer finished product, feel free to cook it a little less.', '30 Minutes', '2 Servings', '3 cups (500 g) frozen or fresh okra, chopped into 1/2-inch (1 cm) pieces\r\n1 tablespoon oil\r\n1/2 medium yellow onion, finely diced\r\n1 green chili, sliced lengthwise (optional)\r\n1  teaspoon ginger-garlic paste (or use 1/2 teaspoon\r\nminced fresh ginger and 1 small clove garlic, minced)\r\n1/4 teaspoon red chili powder\r\n1/2 teaspoon cumin powder\r\n1 teaspoon coriander powder\r\n1/4 teaspoon turmeric powder\r\n1/2 teaspoon salt\r\n1/4 teaspoon dry mango powder (amchur), optional', 'Wipe the okra clean with a damp cloth (do not wash under running water), and set it aside to dry completely.\r\nHeat the oil in a shallow pan. Add the onions and saute till translucent on a medium-low flame. Add the green chili and ginger-garlic paste, and continue sauteing until the onion starts to brown slightly.\r\nAdd the okra and stir with a wooden spoon for 1 minute. Cover and cook on low heat for 5 minutes. Add the chili powder, cumin, coriander powder, and turmeric; stir well so that the spices coat the okra evenly.\r\nCover again and continue to cook on low heat for 5 to 7 minutes to allow the okra to completely cook through. Remove the cover, and stir well a few times during this step to ensure that the okra cooks evenly and is not sticking to the pan or burning.\r\nRemove the lid and increase the heat to medium for 2 to 3 minutes until desired crispiness or doneness is achieved (I like mine more brown than green and quite crunchy). Add the salt and the dry mango powder, and mix well.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `ProfilePicture` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `Name`, `ProfilePicture`, `Description`) VALUES
(1, 'Raveen', 'Raveens.jpg', '\"I love Indian cooking and when I discovered Indian Spicebox, it changed things very much because the spices are so fresh, so aromatic and when you cook with them, you can feel and taste the difference. And it makes cooking so much easier and your dishes turn out so well. I\'ve had a wonderful experience with Indian Spicebox and I\'m never turning back.\"'),
(3, 'Christina Adams', 'Christina.jpg', '\"I love my spicebox and use it often. It was a gift for Christmas last year and it will last for years!\"'),
(5, 'Jenny Boyce', 'Jenny.jpg', '\"I\'ve been using my Indian Spicebox for 2 years now and I love it. It\'s fantastic! I\'ve been making all these amazing recipes and great dishes. My husband is a vegetarian and has been for 2 years so it\'s been so brilliant for that.\"'),
(7, 'Sally Harris', 'Sallys.jpg', '\"I love Indian Spicebox spices. They\'re really fresh, look beautifully packaged and really bring out all the flavours.\"'),
(9, 'Sylvia Shyu', 'Sylvias.jpg', '\"The Cooking with Indian Spicebox book has been very easy to follow to start cooking Indian food. And my favourite is butter chicken and chai from the recipe book. It\'s great!\"'),
(11, 'Shruti Santosh', 'Shrutis.jpg', '\"I really like the Indian Spicebox because of the way it looks, it gives an antique-y feel to it. And having everything in one box makes it easier while cooking and it\'s also a standout piece in my kitchen.\"'),
(12, 'Janine Pentzien', 'Janines.jpg', '\"I bought the Indian Spicebox recipe book about a year ago and since that time, I\'ve enjoyed looking through the pages and trying new Indian recipes.\"\r\n\r\n'),
(13, 'Ida Lindstrom', 'Idas.jpg', '\"Hello! I\'ve used the organic spices - cinnamon and chilli and they were both very delicious.\"');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
