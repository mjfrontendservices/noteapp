CREATE DATABASE notes;

CREATE TABLE note (
    id int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    noteTitle varchar(100) NOT NULL,
    note MEDIUMTEXT NOT NULL,
    date varchar(100) NOT NULL
);

CREATE TABLE doneNotes (
    id int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    noteTitle varchar(100) NOT NULL,
    note MEDIUMTEXT NOT NULL,
    date varchar(100) NOT NULL
);

CREATE TABLE restorableNotes (
    id int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    noteTitle varchar(100) NOT NULL,
    note MEDIUMTEXT NOT NULL,
    date varchar(100) NOT NULL
);