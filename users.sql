CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;
--
-- Dumping data for table `users`
--
INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `date_added`) VALUES
(1, 'Arjun', 'PHP', 'arjunphp@gmail.com', '$2y$10$8mVSGv/bIGgcvCikXBPfTu7HfXMl3jqfiirtQGyRwV5bvOzNGmmLG', '2017-10-12 18:09:10');