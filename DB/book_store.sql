/*
Navicat MySQL Data Transfer

Source Server         : dev.server.com
Source Server Version : 50651
Source Host           : localhost:3306
Source Database       : book_store

Target Server Type    : MYSQL
Target Server Version : 50651
File Encoding         : 65001

Date: 2021-07-19 01:55:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', 'My First Learn to Write Workbook', 'Practice for Kids with Pen Control, Line Tracing, Letters, and More! Build communication skills with the ultimate writing workbook for kids ages 3 to 5', 'Crystal Radke', null, null, '1200', 'In Stock', '1', 'books/book1.jpg');
INSERT INTO `books` VALUES ('2', 'Big Preschool Workbook', 'Ages 3 to 5, Colors, Shapes, Numbers 1-10, Early Math, Alphabet, Pre-Writing, Phonics, Following Directions, and More', 'Joan Hoffman ', null, null, '1550', 'in Stock', '1', 'books/book2.jpg');
INSERT INTO `books` VALUES ('3', 'Amari and the Night Brothers', 'Artemis Fowl meets Men in Black in this exhilarating debut middle grade fantasy, the first in a trilogy filled with #blackgirlmagic. Perfect for fans of Tristan Strong Punches a Hole in the Sky, the Percy Jackson series, and Nevermoor.', 'B. B. Alston ', null, null, '2600', 'In Stock', '1', 'books/book3.jpg');
INSERT INTO `books` VALUES ('4', 'The Lion of Mars', 'Blast off with New York Times bestselling and Newbery Honor-winning Jennifer L. Holm\'s out-of-this-world new novel about a kid raised on Mars who learns that he can\'t be held back by the fears of the grown-ups around him.', 'Jennifer L. Holm', null, null, '2800', 'In Stock', '1', 'books/book4.jpg');
INSERT INTO `books` VALUES ('5', 'Ophie’s Ghosts', 'Ophelia Harrison used to live in a small house in the Georgia countryside. But that was before the night in November 1922, and the cruel act that took her home and her father from her. Which was the same night that Ophie learned she can see ghosts.', 'Justina Ireland', null, null, '2650', 'In Stock', '1', 'books/book5.jpg');
INSERT INTO `books` VALUES ('6', 'Hand to Hold', 'This heartwarming picture book reassures children that a parent’s love never lets go—based on the poignant lyrics of JJ Heller’s beloved lullaby “Hand to Hold.”', 'JJ Heller', null, null, '2200', 'In Stock', '2', 'books/book6.jpg');
INSERT INTO `books` VALUES ('7', 'Brave Like Jack', 'Come along with Jack on his journey to find his inner bravery. At first, he feels it\'s impossible to be brave. His Mama teaches him a special prayer that he remembers when he needs it the most. His special prayer helps a friend along the way.', 'Marissa Cunnyngham', null, null, '2100', 'In Stock', '2', 'books/book7.jpg');
INSERT INTO `books` VALUES ('8', 'The Lion, the Witch and the Wardrobe', 'A beautiful paperback edition of The Lion, the Witch and the Wardrobe, book two in the classic fantasy series The Chronicles of Narnia. This edition features cover art by three-time Caldecott Medal-winning illustrator David Wiesner and interior black-and-white illustrations by the series\' original illustrator, Pauline Baynes. ', 'C. S. Lewis ', null, null, '1300', 'In Stock', '2', 'books/book8.jpg');
INSERT INTO `books` VALUES ('9', 'The Secret Lake', 'A lost dog, a hidden time tunnel and a secret lake. A page-turning time travel adventure for children aged 8-11. Now enjoyed by thousands of young readers!', 'Karen Inglis', null, null, '1600', 'In Stock', '2', 'books/book9.jpg');
INSERT INTO `books` VALUES ('10', 'Turtle in Paradise', 'Eleven-year-old Turtle is smart and tough and has seen enough of the world not to expect a Hollywood ending. After all, it\'s 1935 and money—and sometimes even dreams—is scarce. So when Turtle\'s mother gets a job housekeeping for a lady who doesn\'t like kids, Turtle heads off to Florida to live with relatives', 'Jennifer L. Holm', null, null, '1950', 'In Stock', '2', 'Books/book10.jpg');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Children', 'Children books');
INSERT INTO `category` VALUES ('2', 'Fiction', 'Story books');

-- ----------------------------
-- Table structure for `discounts`
-- ----------------------------
DROP TABLE IF EXISTS `discounts`;
CREATE TABLE `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discount_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `discount_for` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `status` tinyint(1) NOT NULL,
  `min_quantity` int(11) DEFAULT NULL,
  `apply_other_discount` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of discounts
-- ----------------------------
INSERT INTO `discounts` VALUES ('1', 'category', '1', null, '10', 'sub', null, null, '2021-07-17 23:57:16', '2021-07-17 23:57:19', '1', '5', '1');
INSERT INTO `discounts` VALUES ('2', 'category', null, null, '5', 'total', null, null, '2021-07-17 23:59:47', '2021-07-17 23:59:49', '1', '10', '1');
INSERT INTO `discounts` VALUES ('3', 'coupon', null, null, '15', 'total', null, null, '2021-07-18 00:00:54', '2021-07-18 00:00:57', '1', null, '0');

-- ----------------------------
-- Table structure for `doctrine_migration_versions`
-- ----------------------------
DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of doctrine_migration_versions
-- ----------------------------
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210711130025', '2021-07-17 02:56:41', '929');
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210717182530', '2021-07-17 18:25:55', '1621');
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210717183650', '2021-07-17 18:37:09', '1120');
