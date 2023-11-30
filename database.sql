DROP DATABASE IF EXISTS kerkelanden;
CREATE DATABASE kerkelanden;

USE kerkelanden;

CREATE TABLE Locatie (
    LocatieID INT PRIMARY KEY,
    Adres VARCHAR(255),
    TelNr INT
);

CREATE TABLE Patient (
    PatientID INT PRIMARY KEY,
    Naam VARCHAR(255),
    Geboortedatum DATE,
    Adres VARCHAR(255),
    TelNr INT,
    Username VARCHAR(255),
    Password VARCHAR(255)
);

CREATE TABLE User (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Adres VARCHAR(255),
    Password VARCHAR(255),
    Naam VARCHAR(255),
    Geboortedatum DATE,
    TelNr INT,
    Rol VARCHAR(255),
    Username VARCHAR(255)
);

CREATE TABLE Behandeling (
    BehandelingID INT PRIMARY KEY,
    BehandelingBeschrijving VARCHAR(255),
    Kosten DOUBLE
);

CREATE TABLE Factuur (
    FactuurNr INT PRIMARY KEY,
    Bedrag DOUBLE,
    Status VARCHAR(255)
);

CREATE TABLE Afspraak (
    AfspraakID INT PRIMARY KEY,
    UserID INT,
    PatientID INT,
    LocatieID INT,
    Status VARCHAR(255),
    Datum DATE,
    Tijd TIME,
    FactuurID INT,
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (PatientID) REFERENCES Patient(PatientID),
    FOREIGN KEY (LocatieID) REFERENCES Locatie(LocatieID),
    FOREIGN KEY (FactuurID) REFERENCES Factuur(FactuurNr)
);

CREATE TABLE Afspraak_Behandeling (
    AfspraakID INT,
    BehandelingID INT,
    FOREIGN KEY (AfspraakID) REFERENCES Afspraak(AfspraakID),
    FOREIGN KEY (BehandelingID) REFERENCES Behandeling(BehandelingID),
    PRIMARY KEY (AfspraakID, BehandelingID)
);