CREATE TABLE IF NOT EXISTS `user` (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL,
    surname VARCHAR(25) NOT NULL,
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    admin_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS pulse (
    pulseid INT AUTO_INCREMENT PRIMARY KEY,
    pulse_rate INT NOT NULL,
    user_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL
);

ALTER TABLE `user` AUTO_INCREMENT = 1000;
ALTER TABLE pulse AUTO_INCREMENT = 100;
ALTER TABLE admin AUTO_INCREMENT = 1;

ALTER TABLE `user` ADD FOREIGN KEY (admin_id) REFERENCES admin(admin_id);
ALTER TABLE pulse ADD FOREIGN KEY (user_id) REFERENCES `user`(user_id);

INSERT INTO admin VALUES(1, 'admin', '123');
INSERT INTO admin VALUES(2, 'mrnobody', '000');
INSERT INTO admin VALUES(3, 'thenegotiator', '321');
INSERT INTO admin VALUES(4, 'skunkmaster64', '500');
INSERT INTO admin VALUES(5, 'erenyaeger', '123');

INSERT INTO `user` VALUES(1001, 'Deliwe', 'Mahlase', 'delim','674',1);
INSERT INTO `user` VALUES(1002, 'Botlhale', 'Malora', 'tlalefit','456',1);
INSERT INTO `user` VALUES(1003, 'Tshiamo', 'Matiza' ,'thsim','789',1);
INSERT INTO `user` VALUES(1004, 'Smanga', 'Zikalala', 'smanz','098',1);
INSERT INTO `user` VALUES(1005, 'Fundiswa', 'Khanyi', 'fundk','321',1);
INSERT INTO `user` VALUES(1006, 'Felecia', 'Mdlovhu', 'fmdlovhu','765',1);
INSERT INTO `user` VALUES(1007, 'Peter', 'Malope', 'petm','325',1);
INSERT INTO `user` VALUES(1008, 'Theo', 'Mthombeni', 'theom','869',1);

INSERT INTO pulse VALUES(111,64,1001);
INSERT INTO pulse VALUES(112,55,1002);
INSERT INTO pulse VALUES(113,84,1003);
INSERT INTO pulse VALUES(114,68,1004);
INSERT INTO pulse VALUES(115,67,1005);
INSERT INTO pulse VALUES(116,72,1006);
INSERT INTO pulse VALUES(117,78,1007);
INSERT INTO pulse VALUES(118,101,1008);