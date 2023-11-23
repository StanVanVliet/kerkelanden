CREATE TABLE Klant (
    klantNr INTEGER(10) NOT NULL,
    Achternaam VARCHAR(40),
    Voornaam VARCHAR(40),
    PRIMARY KEY (klantNr)
);

CREATE TABLE Assistent (
    AssistentID INTEGER(10) NOT NULL,
    Achternaam VARCHAR(40),
    Voornaam VARCHAR(40),
    Username VARCHAR(40),
    Password VARCHAR(40),
    PRIMARY KEY (AssistentID)
);

CREATE TABLE Factuur (
    FactuurNr INTEGER(10) NOT NULL,
    KlantNr INTEGER(10),
    Datum DATE,
    AssistentID INTEGER(10),
    PRIMARY KEY (FactuurNr),
    FOREIGN KEY (KlantNr) REFERENCES Klant(klantNr),
    FOREIGN KEY (AssistentID) REFERENCES Assistent(AssistentID)
);

CREATE TABLE Locatie (
    LocatieID INTEGER(10) NOT NULL,
    Naam VARCHAR(20),
    PRIMARY KEY (LocatieID)
);

CREATE TABLE AfspraakType (
    AfspraakCode CHAR(3) NOT NULL,
    Naam VARCHAR(20),
    PRIMARY KEY (AfspraakCode)
);

CREATE TABLE MedewerkersRole (
    RoleID INTEGER(10) NOT NULL,
    RoleName VARCHAR(40),
    PRIMARY KEY (RoleID)
);

CREATE TABLE Medewerkers (
    MedewerkersID INTEGER(10) NOT NULL,
    Achternaam VARCHAR(40),
    Voornaam VARCHAR(40),
    UserNAME VARCHAR(40),
    Password VARCHAR(40),
    MedewerkersRole INTEGER(10),
    PRIMARY KEY (MedewerkersID),
    FOREIGN KEY (MedewerkersRole) REFERENCES MedewerkersRole(RoleID)
);

CREATE TABLE Afspraak (
    AfspraakID INTEGER(10) NOT NULL,
    FactuurID INTEGER(10),
    LocatieID INTEGER(10),
    Starttijd INTEGER(10),
    Eindtijd INTEGER(10),
    MedewerkersID IntEGER(10),
    Type CHAR(3),
    PRIMARY KEY (AfspraakID),
    FOREIGN KEY (FactuurID) REFERENCES Factuur(FactuurNr),
    FOREIGN KEY (LocatieID) REFERENCES Locatie(LocatieID),
    FOREIGN KEY (Type) REFERENCES AfspraakType(AfspraakCode),
    FOREIGN KEY (MedewerkersID) REFERENCES Medewerkers(MedewerkersID)
);

CREATE TABLE Behandeling (
    BehandelingCode CHAR(3) NOT NULL,
    Naam VARCHAR(40), 
    Kosten DECIMAL(10, 2),
    PRIMARY KEY (BehandelingCode)
);

CREATE TABLE Bezoek_Behandeling (
    BezoekID INTEGER(10) NOT NULL,
    BehandelingCode CHAR(3) NOT NULL,
    Vergoeding DECIMAL(10, 2),
    PRIMARY KEY (BezoekID, BehandelingCode),
    FOREIGN KEY (BezoekID) REFERENCES Afspraak(AfspraakID),
    FOREIGN KEY (BehandelingCode) REFERENCES Behandeling(BehandelingCode)
);
