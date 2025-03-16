SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `home_address` text DEFAULT NULL,
  `parent_phone` varchar(10) NOT NULL,
  `parent_email` varchar(254) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `student` (`id`, `first_name`, `surname`, `home_address`, `parent_phone`, `parent_email`, `date_of_birth`, `subscribed`) VALUES
(1, 'Rachel', 'Marshall', 'Ap #241-4842 Ultrices Av.', '0422070861', 'quis.turpis.vitae@aol.edu', '2010-06-18', 1),
(2, 'Yuli', 'Wiggins', 'P.O. Box 452, 5141 Curabitur Street', '0667332373', 'a.purus.duis@yahoo.org', '2007-11-21', 0),
(3, 'Logan', 'Cooper', '600-6203 Fusce Street', '0734736135', 'ligula.aliquam@hotmail.couk', '2009-09-03', 0),
(4, 'Hiroko', 'Spencer', '532-2413 Adipiscing Rd.', '0946764708', 'netus.et.malesuada@outlook.ca', '2008-04-10', 0),
(5, 'Bo', 'Fry', '2800 Justo Rd.', '0316566112', 'lobortis@yahoo.org', '2006-10-10', 0),
(6, 'Rhoda', 'Day', 'Ap #601-4261 Vestibulum Av.', '0265145214', 'mauris.integer@protonmail.edu', '2010-05-05', 0),
(7, 'Len', 'Warner', 'Ap #261-7208 Placerat St.', '0997452745', 'arcu.curabitur@icloud.org', '2008-12-20', 0),
(8, 'Nola', 'Gonzalez', 'P.O. Box 506, 5092 At St.', '0445594378', 'fames.ac@aol.couk', '2010-09-02', 0),
(9, 'Tamara', 'Hart', 'P.O. Box 660, 7111 Dui Ave', '0215869729', 'non.enim.commodo@icloud.edu', '2007-12-19', 0),
(10, 'Urielle', 'Cantrell', '366-8119 Pharetra Avenue', '0424013624', 'ante.ipsum@yahoo.couk', '2009-03-31', 1),
(11, 'Shay', 'Pollard', 'Ap #134-5788 Amet Avenue', '0511625456', 'elit.nulla@google.com', '2009-06-10', 0),
(12, 'Blythe', 'Whitfield', 'Ap #154-1741 Non Ave', '0782608918', 'tempus.eu@aol.com', '2007-08-09', 0),
(13, 'Ulla', 'Weiss', '8438 Donec Rd.', '0704473450', 'cras@aol.org', '2007-11-03', 1),
(14, 'Carol', 'Ball', 'P.O. Box 639, 4054 Nibh St.', '0368439123', 'in.faucibus@icloud.ca', '2007-04-14', 1),
(15, 'Shelley', 'Lowery', '8783 Odio Street', '0307838837', 'rhoncus.proin.nisl@protonmail.ca', '2006-10-21', 0),
(16, 'Lance', 'Barker', 'Ap #906-3825 In Rd.', '0854369636', 'primis.in@yahoo.net', '2009-03-17', 1),
(17, 'Velma', 'Page', '188-3798 Dapibus Street', '0758252255', 'litora.torquent@google.net', '2009-06-28', 1),
(18, 'Allegra', 'Rivera', '9713 Maecenas Rd.', '0816885786', 'mattis.velit@protonmail.edu', '2009-01-30', 1),
(19, 'Summer', 'Ortega', '808-8536 Hendrerit Rd.', '0664685543', 'ornare.lectus.justo@hotmail.net', '2007-05-04', 1),
(20, 'Lillian', 'Walters', 'Ap #239-7192 Aliquet, St.', '0323328402', 'et.nunc@aol.edu', '2008-07-17', 0),
(21, 'Willa', 'Henderson', '2151 Bibendum Avenue', '0695755726', 'ipsum.porta@outlook.org', '2005-06-09', 1),
(22, 'Nevada', 'Vasquez', '843-8756 Eu, Avenue', '0275854543', 'neque.sed@google.com', '2010-06-11', 1),
(23, 'May', 'Owens', '527-4366 Erat Rd.', '0990753221', 'lacus.pede.sagittis@icloud.edu', '2006-07-27', 1),
(24, 'Alice', 'Oneal', '4648 Leo. Rd.', '0369939798', 'rhoncus.id@icloud.couk', '2009-11-16', 1),
(25, 'Bevis', 'Horne', 'Ap #775-9821 Luctus. Road', '0671644234', 'tincidunt.vehicula@google.ca', '2010-08-16', 0),
(26, 'Brennan', 'Sims', '9239 Tellus Av.', '0684622306', 'arcu.ac@outlook.org', '2005-07-13', 0),
(27, 'Buffy', 'Shaw', 'Ap #500-4564 Nascetur Street', '0516048155', 'sociis.natoque.penatibus@yahoo.ca', '2005-06-08', 0),
(28, 'Uriah', 'Nieves', '458-7597 Aliquam Av.', '0546237833', 'non.magna.nam@icloud.ca', '2005-04-24', 0),
(29, 'Shellie', 'Mcintosh', 'Ap #618-5348 Pretium Avenue', '0186742693', 'integer.mollis.integer@protonmail.net', '2007-06-02', 0),
(30, 'Clinton', 'Ball', 'Ap #374-1816 Volutpat Street', '0583790836', 'eu.euismod@hotmail.couk', '2007-08-27', 0),
(31, 'Deacon', 'Slater', '908-1730 Sollicitudin St.', '0427533103', 'magna@protonmail.net', '2005-01-13', 1),
(32, 'Cole', 'Black', '909-8182 Ante. Street', '0551478224', 'vitae.erat.vel@aol.edu', '2009-02-13', 1),
(33, 'Joelle', 'Wong', 'P.O. Box 204, 3760 Mauris Rd.', '0261037110', 'integer.eu.lacus@google.couk', '2010-04-23', 0),
(34, 'Vanna', 'Mcconnell', 'Ap #799-2175 Lacus. Avenue', '0224302352', 'ipsum.primis.in@yahoo.net', '2010-12-17', 0),
(35, 'Raphael', 'Espinoza', 'Ap #472-7332 Hendrerit Rd.', '0699070858', 'tristique.aliquet@aol.com', '2005-09-04', 1),
(36, 'Mark', 'White', 'Ap #189-886 Elit Rd.', '0666012213', 'eleifend.non.dapibus@protonmail.net', '2009-10-22', 0),
(37, 'Athena', 'Fleming', 'Ap #337-2808 Nascetur St.', '0556594073', 'iaculis@icloud.com', '2008-11-02', 1),
(38, 'Bernard', 'Terry', 'P.O. Box 712, 5128 Enim. St.', '0866028242', 'dictum.eu@icloud.edu', '2008-10-07', 0),
(39, 'Declan', 'House', 'Ap #330-1667 Erat Rd.', '0338475656', 'scelerisque.mollis@outlook.couk', '2007-01-01', 0),
(40, 'Eaton', 'Bender', '301-1726 Gravida Rd.', '0564260326', 'eu.tellus@protonmail.ca', '2006-03-17', 1),
(41, 'Merrill', 'Holland', '326-9199 Aliquet. Rd.', '0777303711', 'amet@icloud.edu', '2010-11-13', 0),
(42, 'Graiden', 'Hurley', '7091 Justo Avenue', '0841718421', 'eu.dolor@outlook.org', '2006-04-19', 0),
(43, 'Mohammad', 'Summers', 'Ap #706-5498 Blandit Road', '0242958635', 'ligula.aliquam@outlook.edu', '2007-08-19', 1),
(44, 'Tasha', 'Weiss', 'Ap #849-9935 Bibendum Road', '0761817584', 'turpis.nec.mauris@hotmail.ca', '2009-08-13', 1),
(45, 'Ursula', 'Garcia', '727-2050 Semper Road', '0628147921', 'placerat.velit.quisque@aol.ca', '2007-08-03', 1),
(46, 'Buckminster', 'Franklin', '221-4140 Ultrices. Street', '0543163105', 'a.aliquet.vel@protonmail.net', '2006-12-22', 1),
(47, 'Jarrod', 'Davis', 'Ap #978-4993 Massa Rd.', '0587218962', 'non.vestibulum@aol.com', '2007-03-23', 0),
(48, 'Cora', 'Black', 'Ap #319-4075 Cubilia Ave', '0118182914', 'lacus.ut@protonmail.ca', '2007-04-22', 1),
(49, 'Deanna', 'Delacruz', 'P.O. Box 803, 9639 At St.', '0392743724', 'metus.in@icloud.org', '2008-06-25', 0),
(50, 'Maxine', 'Tucker', '8002 Bibendum Road', '0886797917', 'nec@google.ca', '2007-08-24', 1);

ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

COMMIT;
