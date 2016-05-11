CREATE TABLE Kayttaja ( 
    id SERIAL PRIMARY KEY,
    name varchar(50) NOT NULL,
    password varchar(50) NOT NULL,
    admin boolean default false
);

CREATE TABLE Rotu (
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  status boolean DEFAULT FALSE,
  description varchar(400),
  published DATE,
  country varchar(50),
  added DATE
);

CREATE TABLE Roturyhma (
    id SERIAL PRIMARY KEY,
    rotu_id INTEGER REFERENCES Rotu(id), -- Viiteavain Roturyhma-tauluun
    name varchar(50) NOT NULL,
    maara int DEFAULT NULL,
    luokitus varchar(50) NOT NULL
);
-- Lisää CREATE TABLE lauseet tähän tiedostoon
