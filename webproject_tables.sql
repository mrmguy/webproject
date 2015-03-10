CREATE TABLE users (
    user_name varchar(255) NOT NULL UNIQUE PRIMARY KEY,
    password varchar(255) NOT NULL,
    name varchar(255)
    ) ENGINE=innodb;