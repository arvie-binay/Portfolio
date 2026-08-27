-- Create database if not exists
CREATE DATABASE IF NOT EXISTS businessco;
USE businessco;

-- Create credentials table with correct structure
CREATE TABLE IF NOT EXISTS credentials (
    CredentialID INT(11) NOT NULL AUTO_INCREMENT,
    FullName VARCHAR(45) NOT NULL UNIQUE,
    Email VARCHAR(45) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL, -- Store hashed passwords
    PRIMARY KEY (CredentialID)
);
