-- Insert data into the cities table
INSERT INTO `cities` (`city`) VALUES
('Abidjan'),
('Bouaké'),
('Daloa'),
('Yamoussoukro'),
('San-Pédro'),
('Divo'),
('Korhogo'),
('Anyama'),
('Abengourou'),
('Man'),
('Gagnoa'),
('Soubré'),
('Agboville'),
('Dabou'),
('Grand-Bassam'),
('Bouaflé'),
('Issia'),
('Sinfra'),
('Katiola'),
('Bingerville'),
('Adzopé'),
('Séguéla'),
('Bondoukou'),
('Oumé'),
('Ferkessedougou'),
('Dimbokro'),
('Odienné'),
('Duékoué'),
('Danané'),
('Tingréla'),
('Guiglo'),
('Boundiali'),
('Agnibilékrou'),
('Daoukro'),
('Vavoua'),
('Zuénoula'),
('Tiassalé'),
('Toumodi'),
('Akoupé'),
('Lakota');


-- Insert data into the manager table
INSERT INTO `manager` (`firstname`, `lastname`) VALUES
('Jean-Louis', 'Gasset'),
('Baciro', 'Candé'),
('Jose', 'Peseiro'),
('Juan', 'Micha'),
('Rui', 'Vitória'),
('Chiquinho', 'Conde'),
('Chris', 'Hughton'),
('Pedro Leitão', 'Brito'),
('Aliou', 'Cissé'),
('Tom', 'Saintfiet'),
('Rigobert', 'Song'),
('Kaba', 'Diawara'),
('Djamel', 'Belmadi'),
('Pedro', 'Gonçalves'),
('Hubert', 'Velud'),
('Amir', 'Abdou'),
('Jalel', 'Kadri'),
('Collin', 'Benjamin'),
('Éric', 'Chelle'),
('Hugo', 'Broos'),
('Walid', 'Regragui'),
('Adel', 'Amrouche'),
('Sébastien', 'Desabre'),
('Avram', 'Grant');

-- Insert data into the teams table
INSERT INTO `teams` (`name`, `manager`, `logo`) VALUES
('Côte d’Ivoire', 1, NULL),
('Guinée-Bissau', 2, NULL),
('Nigeria', 3, NULL),
('Guinée équatoriale', 4, NULL),
('Egypte', 5, NULL),
('Mozambique', 6, NULL),
('Ghana', 7, NULL),
('Cap-Vert', 8, NULL),
('Sénégal', 9, NULL),
('Gambie', 10, NULL),
('Cameroun', 11, NULL),
('Guinée', 12, NULL),
('Algérie', 13, NULL),
('Angola', 14, NULL),
('Burkina Faso', 15, NULL),
('Mauritanie', 16, NULL),
('Tunisie', 17, NULL),
('Namibie', 18, NULL),
('Mali', 19, NULL),
('Afrique du Sud', 20, NULL),
('Maroc', 21, NULL),
('Tanzanie', 22, NULL),
('RDC', 23, NULL),
('Zambie', 24, NULL);



-- Insert data into the stadiums table
INSERT INTO `stadiums` (`Name`, `Address`, `capacity`, `img`, `city`) VALUES
('ALASSANE OUATTARA D’EBIMPE', 'Ebimpé', 60012, NULL, 1),
('LA PAIX', 'Bouaké', 40000, NULL, 2),
('AMADOU GON COULIBALY', 'Korhogo', 20000, NULL, 7),
('LAURENT POKOU', 'San Pédro', 20000, NULL, 5),
('CHARLES KONAN BANNY', 'Yamoussoukro', 20000, NULL, 4),
('FÉLIX HOUPHOUËT-BOIGNY', '8XHJ+7FW Boulevard de la Republique', 33000, NULL, 1);


-- Insert data into the matche table
INSERT INTO `matche` (`date`, `stadium`, `team_1`, `team_2`) VALUES
('2024-01-13', 1, 1, 2),
('2024-01-14', 1, 3, 4),
('2024-01-14', 6, 5, 6),
('2024-01-14', 6, 7, 8),
('2024-01-15', 5, 9, 10),
('2024-01-15', 5, 11, 12),
('2024-01-15', 2, 13, 14),
('2024-01-16', 2, 15, 16),
('2024-01-16', 3, 17, 18),
('2024-01-16', 3, 19, 20),
('2024-01-17', 4, 21, 22),
('2024-01-17', 4, 23, 24),
('2024-01-18', 1, 4, 2),
('2024-01-18', 1, 1, 3),
('2024-01-18', 6, 5, 7),
('2024-01-19', 6, 8, 6),
('2024-01-19', 5, 9, 11),
('2024-01-19', 5, 12, 10),
('2024-01-20', 2, 13, 15),
('2024-01-20', 2, 16, 14),
('2024-01-20', 3, 17, 19),
('2024-01-21', 4, 21, 23),
('2024-01-21', 4, 24, 22),
('2024-01-21', 3, 20, 18),
('2024-01-22', 1, 4, 1),
('2024-01-22', 6, 2, 3),
('2024-01-22', 1, 6, 7),
('2024-01-22', 1, 8, 5),
('2024-01-23', 1, 12, 9),
('2024-01-23', 1, 10, 11),
('2024-01-23', 1, 14, 15),
('2024-01-23', 1, 16, 13),
('2024-01-24', 1, 20, 17),
('2024-01-24', 1, 18, 19),
('2024-01-24', 1, 22, 23),
('2024-01-24', 1, 24, 21);
