DROP DATABASE IF EXISTS bugme;
CREATE DATABASE bugme;
USE bugme;


create table Users(
    userid INTEGER(7) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    Userpassword VARCHAR(255),
    email VARCHAR(255),
    dateJoined DATETIME
);


create table Issues(
    iid INTEGER(255) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(255),
    IssueDesc TEXT(100),
    Issuetype VARCHAR(255),
    IssuePriority VARCHAR(255),
    IssueStatus VARCHAR(255),
    assignedTo INTEGER(7),
    createdBy INTEGER(7),
    created DATETIME,
    updated DATETIME
);

insert into Users values (1, "John", "Brown", "$2y$10$MrzWKXOgYswzol8OEzk4BOM2eWKbIgi.ZDd530d2KkUsgxXO64h7O","admin@project2.com", 11/11/2021);