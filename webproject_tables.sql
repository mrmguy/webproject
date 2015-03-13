CREATE TABLE users (
    user_name varchar(255) NOT NULL UNIQUE PRIMARY KEY,
    password varchar(255) NOT NULL,
    name varchar(255)
    ) ENGINE=innodb;

CREATE TABLE restaurant (
	id INT AUTO_INCREMENT PRIMARY KEY,
	restaurant_name VARCHAR(50) NOT NULL,
	description TEXT,
	address VARCHAR(50),
	city VARCHAR(50),
	state CHAR(2),
	rating TINYINT(2),
	cost FLOAT(6,2),
	diners INT,
	date_of_visit DATE,
	show_public TINYINT(1) DEFAULT NULL,
	user VARCHAR(255),
	FOREIGN KEY (user) REFERENCES users(user_name)
	) ENGINE=innodb;