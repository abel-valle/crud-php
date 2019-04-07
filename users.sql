--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `appat` varchar(100) NOT NULL,
  `apmat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `user`, `pass`, `name`, `appat`, `apmat`) VALUES
(1, 'admin@mail.com', '*75C7230067DB30FA97E55648A206415E9B5ECA68', 'Admin', 'Van', 'Buuren');
