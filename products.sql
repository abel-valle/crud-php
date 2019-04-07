--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `brand` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `visible` int(11) NOT NULL,
  PRIMARY KEY (`id_product`)
) AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `description`, `brand`, `price`, `image`, `visible`) VALUES
(1, 'LG P880 3X HD', 'Un teléfono increible!', 'LG', 6701.5, 'images/hqdefault.jpg', 0),
(2, 'Cafecito', 'Perfecto para el oficinista.', 'Starsucks', 30, 'images/cup_of_coffee.JPG', 1),
(3, 'Samsung Galaxy Tab 10.1', 'Una buena tablet.', 'Samsung', 5051, 'images/galaxy-tablet.jpg', 1),
(4, 'Spot It', 'Juego divertido para toda la familia.', 'Blue Orange', 345, 'images/spotit.jpg', 1);

