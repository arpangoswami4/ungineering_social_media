CREATE DATABASE social_media;
USE social_media;

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    college VARCHAR(255)  NULL,
    phone_no VARCHAR(255)  NULL,
    PRIMARY KEY(id)
);

CREATE TABLE statuses(
    id INT NOT NULL AUTO_INCREMENT,
    users_id INT NOT NULL,
    status VARCHAR(255) NOT NULL,
    time VARCHAR(255) NOT NULL,
    date VARCHAR(255) NOT NULL,  
    PRIMARY KEY(id),
    FOREIGN KEY(users_id)   REFERENCES users(id)
);



    
    
