DROP DATABASE IF EXISTS kerkelanden;
CREATE DATABASE kerkelanden;

USE kerkelanden;

CREATE TABLE Locatie (
    locatie_id INT PRIMARY KEY,
    Adres VARCHAR(255),
    Tel_nr INT
);

CREATE TABLE Patient (
    patient_id INT PRIMARY KEY,
    Naam VARCHAR(255),
    Geboortedatum DATE,
    Adres VARCHAR(255),
    Tel_nr INT,
    user_name VARCHAR(255),
    wachtwoord VARCHAR(255)
);

CREATE TABLE User (
    User_id INT AUTO_INCREMENT PRIMARY KEY,
    Adres VARCHAR(255),
    Password VARCHAR(255),
    Naam VARCHAR(255),
    Geboortedatum DATE,
    Tel_nr INT,
    Rol VARCHAR(255),
    Username VARCHAR(255)
);

CREATE TABLE Behandeling (
    behandeling_id INT PRIMARY KEY,
    behandeling_beschrijving VARCHAR(255),
    kosten DOUBLE
);

CREATE TABLE Factuur (
    factuur_nr INT PRIMARY KEY,
    Bedrag DOUBLE,
    Status VARCHAR(255)
);

CREATE TABLE Afspraak (
    Afspraak_id INT PRIMARY KEY,
    User_id INT,
    Patient_id INT,
    Locatie_id INT,
    status VARCHAR(255),
    Datum DATE,
    Tijd TIME,
    Factuur_id INT,
    FOREIGN KEY (User_id) REFERENCES User(User_id),
    FOREIGN KEY (Patient_id) REFERENCES Patient(patient_id),
    FOREIGN KEY (Locatie_id) REFERENCES Locatie(locatie_id),
    FOREIGN KEY (Factuur_id) REFERENCES Factuur(factuur_nr)
);

CREATE TABLE Afspraak_Behandeling (
    afspraak_id INT,
    behandeling_id INT,
    FOREIGN KEY (afspraak_id) REFERENCES Afspraak(afspraak_id),
    FOREIGN KEY (behandeling_id) REFERENCES Behandeling(behandeling_id),
    PRIMARY KEY (afspraak_id, behandeling_id)
);