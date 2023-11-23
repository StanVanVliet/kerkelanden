-- Klant table
CREATE TABLE Klant (
    klantNr INTEGER(10) NOT NULL,
    Achternaam VARCHAR(40),
    Voornaam VARCHAR(40),
    PRIMARY KEY (klantNr)
);

-- Assistent table
CREATE TABLE Assistent (
    AssistentID INTEGER(10) NOT NULL,
    Achternaam VARCHAR(40),
    Voornaam VARCHAR(40),
    PRIMARY KEY (AssistentID)
);

-- Factuur table
CREATE TABLE Factuur (
    FactuurNr INTEGER(10) NOT NULL,
    KlantNr INTEGER(10),
    Datum DATE,
    AssistentID INTEGER(10),
    PRIMARY KEY (FactuurNr),
    FOREIGN KEY (KlantNr) REFERENCES Klant(klantNr),
    FOREIGN KEY (AssistentID) REFERENCES Assistent(AssistentID)
);

-- Locatie table
CREATE TABLE Locatie (
    LocatieID INTEGER(10) NOT NULL,
    Naam VARCHAR(20),
    PRIMARY KEY (LocatieID)
);

-- AfspraakType table
CREATE TABLE AfspraakType (
    AfspraakCode CHAR(3) NOT NULL,
    Naam VARCHAR(20),
    PRIMARY KEY (AfspraakCode)
);

-- Afspraak table
CREATE TABLE Afspraak (
    AfspraakID INTEGER(10) NOT NULL AUTO_INCREMENT,
    FactuurID INTEGER(10),
    LocatieID INTEGER(10),
    Starttijd INTEGER(10),
    Eindtijd INTEGER(10),
    Type CHAR(3),
    PRIMARY KEY (AfspraakID),
    FOREIGN KEY (FactuurID) REFERENCES Factuur(FactuurNr),
    FOREIGN KEY (LocatieID) REFERENCES Locatie(LocatieID),
    FOREIGN KEY (Type) REFERENCES AfspraakType(AfspraakCode)
);

-- Behandeling table
CREATE TABLE Behandeling (
    BehandelingCode CHAR(3) NOT NULL,
    Naam VARCHAR(40),
    Kosten DECIMAL(10, 2),
    PRIMARY KEY (BehandelingCode)
);

-- Bezoek Behandeling
CREATE TABLE Bezoek_Behandeling (
    BezoekID INTEGER(10) NOT NULL,
    BehandelingCode CHAR(3) NOT NULL,
    Vergoeding DECIMAL(10, 2),
    PRIMARY KEY (BezoekID, BehandelingCode),
    FOREIGN KEY (BezoekID) REFERENCES Afspraak(AfspraakID),
    FOREIGN KEY (BehandelingCode) REFERENCES Behandeling(BehandelingCode)
);