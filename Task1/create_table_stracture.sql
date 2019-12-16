CREATE DATABASE test;
USE test;

CREATE TABLE users
(
    id         INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(255) DEFAULT NULL,
    gender     INT(11) NOT NULL COMMENT '0 - не указан, 1 - мужчина, 2 - женщина',
    birth_date INT(11) NOT NULL COMMENT 'Дата в unixtime.'
);

CREATE TABLE `phone_numbers`
(
    id      INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    phone   VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

# Create foreign key for optimizing join
ALTER TABLE phone_numbers ADD FOREIGN KEY fk_phone_users (user_id) REFERENCES users(id);

# create index on birth_date to speed up finding age;
ALTER TABLE users ADD INDEX idx_users_birth_date (birth_date);

# This is optional index cos it depend on data in the table
# if in the table all woman or most of them (80%) are woman index will make searching slow
# ALTER TABLE users ADD INDEX idx_users_gender (gender);