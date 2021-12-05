
DROP DATABASE IF EXISTS bugme;
CREATE DATABASE bugme;
USE bugme;

drop table if EXISTS Users;
create table Users(
    id INTEGER(7) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    u_password VARCHAR(255),
    email VARCHAR(255),
    date_joined DATETIME,
    privilege ENUM('admin', 'regular')
);

drop table if exists Issues;
create table Issues(
    id INTEGER(255) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(255),
    i_description TEXT(100),
    i_type VARCHAR(255),
    i_priority VARCHAR(255),
    i_status VARCHAR(255),
    assigned_to INTEGER(7),
    created_by INTEGER(7),
    created DATETIME,
    updated DATETIME
);

insert into Users values (1, "John", "Brown", "password123","admin@project2.com", '2021-12-01 12:00:00', 'admin');
