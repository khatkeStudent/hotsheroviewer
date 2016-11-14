CREATE DATABASE heroesblackbook;
USE blackbook;

CREATE TABLE users ( 
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(20) NOT NULL,
  lastlogin DATETIME NOT NULL DEFAULT NOW(),
  badlogincount INT DEFAULT 0
); 

CREATE TABLE heroes ( 
  id NVARCHAR(30) NOT NULL PRIMARY KEY,
  attributeid NVARCHAR(20) NOT NULL,
  name NVARCHAR(30) NOT NULL,
  title NVARCHAR(30) NOT NULL,
  description NVARCHAR(255) NOT NULL,
  icon NVARCHAR(255) NOT NULL,
  role NVARCHAR(10) NOT NULL,
  type NVARCHAR(20) NOT NULL,
  gender NVARCHAR(6) NOT NULL,
  franchise NVARCHAR(20) NOT NULL,
  difficulty NVARCHAR(20) NOT NULL,
  releaseDate Date NOT NULL
); 

CREATE TABLE ratings (
    heroid NVARCHAR(30) NOT NULL,
    damage INT NOT NULL,
    utility INT NOT NULL,
    survivability INT NOT NULL,
    complexity INT NOT NULL
);

CREATE TABLE talents (
    heroid NVARCHAR(30) NOT NULL,
    level INT NOT NULL,
    id NVARCHAR(255) NOT NULL,
    name NVARCHAR(255) NOT NULL,
    description NVARCHAR(255) NOT NULL,
    icon NVARCHAR(255) NOT NULL,
    cooldown INT NOT NULL
)