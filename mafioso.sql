DROP SCHEMA IF EXISTS mafiosoDB;
CREATE SCHEMA IF NOT EXISTS mafiosoDB;
USE mafiosoDB;

/* users - Holds all users in the game. */
CREATE TABLE IF NOT EXISTS users (
	user_id integer not null auto_increment,
    username varchar(255),
    password varchar(255),
    email varchar(255),
    signup_ip varchar(255),
    login_ip varchar(255),
    PRIMARY KEY (user_id)
);
-- Add test data for users
INSERT INTO users (username, password, email, signup_ip, login_ip) VALUES
('Skitzo', '$2y$10$3hWCJVGPyDvtnAO06OayyuKXhfy1lkzhk0UqXmmmYovi/Ei/d6XZi', 'skitzo@mafioso.no', '192.168.1.1', '192.168.1.1'),
('Rob', '$2y$10$3hWCJVGPyDvtnAO06OayyuKXhfy1lkzhk0UqXmmmYovi/Ei/d6XZi', 'rob@mafioso.no', '192.168.1.2', '192.168.1.2');


/* cities - Holds all cities in the game. */
CREATE TABLE IF NOT EXISTS cities (
	city_id int not null auto_increment,
    city_name varchar(50),
    city_travel_price integer not null,
    city_tax integer not null,
    PRIMARY KEY(city_id)
);
INSERT INTO cities (city_name, city_travel_price, city_tax) VALUES
    ('Palermo', 5210, 10),
    ('New York', 4215, 50),
    ('Medellin', 6223, 20),
    ('Napoli', 1523, 30),
    ('Chicago', 5211, 50),
    ('Bangkok', 5213, 15);

/* cars - Holds all cars in the game */
CREATE TABLE cars (
    car_id INT(255) NOT NULL AUTO_INCREMENT,
    car_name varchar(50),
    car_price int,
    car_class varchar(25),
    PRIMARY KEY(car_id)
);
INSERT INTO cars (car_name, car_price, car_class) VALUES
-- Cheap Cars
('Toyota Yaris', 15000, 'Cheap'),
('Honda Fit', 16000, 'Cheap'),
('Ford Fiesta', 14000, 'Cheap'),
('Chevrolet Spark', 13000, 'Cheap'),
('Nissan Versa', 15500, 'Cheap'),
('Kia Rio', 14500, 'Cheap'),
('Hyundai Accent', 14000, 'Cheap'),
('Mitsubishi Mirage', 13500, 'Cheap'),
('Volkswagen Polo', 16000, 'Cheap'),
('Fiat 500', 13000, 'Cheap'),
-- Expensive Cars
('BMW 5 Series', 600000, 'Expensive'),
('Mercedes-Benz E-Class', 580000, 'Expensive'),
('Audi A6', 570000, 'Expensive'),
('Lexus ES', 550000, 'Expensive'),
('Volvo S90', 590000, 'Expensive'),
('Jaguar XF', 620000, 'Expensive'),
('Infiniti Q70', 560000, 'Expensive'),
-- Deluxe Cars
('Porsche 911', 1000000, 'Deluxe'),
('Aston Martin DBS Superleggera', 3000000, 'Deluxe'),
('Rolls-Royce Phantom', 4500000, 'Deluxe');

/* garage - holds all car-user links */
CREATE TABLE IF NOT EXISTS garage (
    garage_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    car_id INT NOT NULL,
    city_id INT NOT NULL,
    PRIMARY KEY (garage_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (car_id) REFERENCES cars(car_id),
    FOREIGN KEY (city_id) REFERENCES cities(city_id)
);
-- Add test data for garage (randomizing car ownership and cities)
INSERT INTO garage (user_id, car_id, city_id) 
SELECT 
    user_id, 
    FLOOR(RAND() * (SELECT MAX(car_id) FROM cars) + 1) AS car_id, 
    FLOOR(RAND() * (SELECT MAX(city_id) FROM cities) + 1) AS city_id 
FROM users;

/* activities - holds all user activities with cooldowns */
CREATE TABLE IF NOT EXISTS activities (
    actitity_id INT NOT NULL AUTO_INCREMENT,
    activity_class varchar(55),
    activity_name varchar(55),
    cooldown int not null,
    chance int not null,
    reward_from int not null,
    reward_to int not null,
    exp int not null,
    PRIMARY KEY (actitity_id)
);
-- Class: crimes
INSERT INTO activities (activity_class, activity_name, cooldown, chance, reward_from, reward_to, exp) VALUES
    ('crimes', 'Utfør enkel kriminalitet', 10, 90, 10, 50, 1),
    ('crimes', 'Utfør middels kriminalitet', 30, 70, 30, 100, 2),
    ('crimes', 'Utfør middels vanskelig kriminalitet', 50, 50, 100, 500, 3),
    ('crimes', 'Utfør vanskelig kriminalitet', 80, 30, 1000, 5000, 4);
-- Class: gta
INSERT INTO activities (activity_class, activity_name, cooldown, chance, reward_from, reward_to, exp) VALUES
    ('gta', 'Stjel klasse D biler', 40, 90, 0, 9, 1),
    ('gta', 'Stjel klasse A biler', 70, 70, 10, 16, 3),
    ('gta', 'Stjel klasse S1 biler', 120, 50, 17, 20, 5);
-- Class: theft
INSERT INTO activities (activity_class, activity_name, cooldown, chance, reward_from, reward_to, exp) VALUES
    ('theft', 'Bryt deg inn i nedslitt hus', 40, 90, 0, 29, 1),
    ('theft', 'Bryt deg inn i pent hus', 70, 70, 30, 60, 3),
    ('theft', 'Bryt deg inn i villa', 120, 50, 60, 83, 5);


/* usercooldown - holds all user cooldowns */
CREATE TABLE IF NOT EXISTS usercooldowns (
    usercooldown_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    usercooldown_type VARCHAR(255) NOT NULL,
    usercooldown_time VARCHAR(25) NOT NULL,
    PRIMARY KEY (usercooldown_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

/* Items - all items in the game */
CREATE TABLE IF NOT EXISTS items (
    item_id INT(25) NOT NULL AUTO_INCREMENT,
    item_name varchar(55) not null,
    item_price integer not null,
    PRIMARY KEY (item_id)
);
INSERT INTO items (item_name, item_price) VALUES
    ('Brukte sokker', 150),
    ('Tomme plastflasker', 120),
    ('Tyggegummi under bordet', 110),
    ('Knuste glassflasker', 200),
    ('Gamle aviser', 100),
    ('Bruskrus', 130),
    ('Brukte blyanter', 110),
    ('Skrapt lotteri', 160),
    ('Småstein', 150),
    ('Brutt paraply', 170),
    ('Plastbestikk', 130),
    ('Kasserte batterier', 120),
    ('Gamle telefonkabler', 140),
    ('Tannpirkere', 110),
    ('Tomme telysholdere', 120),
    ('Brukte binders', 110),
    ('Tomme kaffekapsler', 150),
    ('Knuste plastleker', 170),
    ('Ubrukte nøkkelringer', 140),
    ('Klumpet tørkepapir', 120),
    ('Gamle tannbørster', 110),
    ('Brukte stearinlys', 140),
    ('Defekte lommelykter', 160),
    ('Tomme toalettruller', 130),
    ('Knekkebrødkrummer', 110),
    ('Brukte engangskopper', 140),
    ('Avskårne blomsterstilker', 170),
    ('Tomme sjampoflasker', 130),
    ('Knekte kleshengere', 120),
    ('Brukte tanntrådspoler', 110),
    ('Gullring', 15000),
    ('iPad', 8000),
    ('MacBook', 25000),
    ('Rolex-klokke', 50000),
    ('Diamantøreringer', 30000),
    ('Louis Vuitton-veske', 20000),
    ('Plasma-TV', 12000),
    ('Gitar', 5000),
    ('Skinnjakke', 7000),
    ('Porsche-nøkler', 100000),
    ('Champagnemagnumflaske', 3000),
    ('Antikke mynter', 15000),
    ('Dykkerur', 9000),
    ('Vinylplatesamling', 6000),
    ('Skulptur', 25000),
    ('Vintage whiskeyflaske', 4000),
    ('Fotoutstyr', 20000),
    ('Skreddersydd dress', 12000),
    ('Smykkeskrin', 5000),
    ('Vespa-scooter', 18000),
    ('Designer-solbriller', 8000),
    ('Kameratelefon', 10000),
    ('Akustisk gitar', 6000),
    ('Vintagediamantring', 20000),
    ('Samleobjekter', 15000),
    ('Laptop', 10000),
    ('Safirarmbånd', 25000),
    ('Bilnøkler', 30000),
    ('Champagnekjøler', 5000),
    ('Dykkerutstyr', 8000),
    ('Platespiller', 7000),
    ('Kunstverk', 30000),
    ('Vintage vinkjeller', 40000),
    ('Luksuriøst reisesett', 15000),
    ('Retro videospillkonsoll', 8000),
    ('Kvalitetsvin', 6000),
    ('Diamanthalskjede', 25000),
    ('Rolleksklokke', 40000),
    ('Eksklusive sigarer', 5000),
    ('Drone', 10000),
    ('Vintage motorsykkel', 30000),
    ('Designersko', 7000),
    ('Gaming-pc', 15000),
    ('Whiskeysamling', 20000),
    ('Platinaring', 25000),
    ('Sikkerhetsboks', 5000),
    ('Parfymesamling', 8000),
    ('Vintage sportsbil', 500000),
    ('Tegneseriesamling', 6000),
    ('Diamantarmbånd', 30000),
    ('Gullkjede', 20000),
    ('Vinylsamling', 10000),
    ('Antikke klokker', 15000),
    ('Luksushorlogesett', 30000);


/* storageunit - holds all items and link to users */
CREATE TABLE IF NOT EXISTS storageunit (
	storageunit_id int not null auto_increment,
    user_id int not null,
    item_id int not null,
    PRIMARY KEY(storageunit_id),
    FOREIGN KEY(user_id) REFERENCES users(user_id),
    FOREIGN KEY(item_id) REFERENCES items(item_id)
);
-- Add test data for storageunit (randomizing items and user ownership)
INSERT INTO storageunit (user_id, item_id)
SELECT 
    user_id, 
    FLOOR(RAND() * (SELECT MAX(item_id) FROM items) + 1) AS item_id
FROM users;

CREATE TABLE IF NOT EXISTS notification (
    notification_id INT NOT NULL AUTO_INCREMENT,
    text varchar(255), /* changed to varchar for performance */
    date datetime NOT NULL, /* when the notification is "sent" */
    new int not null default 1, /* if notification is new or not? */
    user_id INT(15) NOT NULL,
    PRIMARY KEY (notification_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

/* ranks - Holds all ranks in the game and required exp */
CREATE TABLE IF NOT EXISTS ranks (
	rank_id int not null auto_increment,
    rank_name varchar(25),
    required_exp int,
    PRIMARY KEY(rank_id)
);
INSERT INTO ranks (required_exp, rank_name) VALUES
    (0, 'Thug'),
    (100, 'Enforcer'),
    (500, 'Associate'),
    (1000, 'Soldier'),
    (2000, 'Caporegime'),
    (5000, 'Consigliere'),
    (10000, 'Underboss'),
    (20000, 'Boss'),
    (50000, 'Don'),
    (100000, 'Godfather'),
    (200000, 'Kingpin'),
    (300000, 'Crime Lord'),
    (400000, 'Mobster'),
    (500000, 'Gang Leader'),
    (600000, 'High Roller'),
    (700000, 'Mastermind'),
    (800000, 'Scarface'),
    (900000, 'Infamous'),
    (1000000, 'Untouchable'),
    (1500000, 'Shadow');

/* Userdata will keep track of all user data such as rank, experience, cash and reputation, 
which faction they belong to etc. */
CREATE TABLE IF NOT EXISTS userdata (
    userdata_id int not null auto_increment, -- unique id for userdata 
    user_id int not null, -- links to user table. 
    money int not null default 10000, -- users start with 10k money on hand
    bullets int not null default 10, -- users start with 10 bullets
    city int not null default 0, -- users start in city 0(see cities table)
    bankBalance int not null default 0, -- users start with 0 money in the bank
    exp int not null default 0, -- users start with 0 exp
    rank int not null default 0, -- users start at rank 0
    points int not null default 10,  -- users start with 10 points
    health int not null default 75,  -- users start with 75% health(for a mission maybe?)
    PRIMARY KEY(userdata_id),
    FOREIGN KEY(user_id) REFERENCES users(user_id),
    FOREIGN KEY(rank) REFERENCES ranks(rank_id),
    FOREIGN KEY(city) REFERENCES cities(city_id)
);

-- Add test data for userdata (randomizing money, bullets, rank, etc.)
INSERT INTO userdata (user_id, money, bullets, rank, exp, city)
SELECT 
    u.user_id, 
    FLOOR(RAND() * 9000) + 1000 AS money, 
    FLOOR(RAND() * 5) + 5 AS bullets, 
    FLOOR(RAND() * (SELECT MAX(rank_id) FROM ranks)) + 1 AS rank, 
    FLOOR(RAND() * 1000) AS exp,
    FLOOR(RAND() * (SELECT MAX(city_id) FROM cities)) + 1 AS city
FROM users u;