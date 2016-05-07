-- Kayttaja-taulun testidata
INSERT INTO Kayttaja (name, password) VALUES ('Mealy', 'papumuhennos'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
INSERT INTO Kayttaja (name, password) VALUES ('Shakespeare', 'hamlet');
-- Rotu-taulun testidata
INSERT INTO Rotu (name, description, published, publisher, added) VALUES ('Alaskanmalamuutti', 'Raskaiden kuormien vetokoira', '2011-11-11', 'Mili', NOW());
-- Roturyhma-taulun testidata
INSERT INTO Roturyhma (name, id, description) VALUES ('Terrierit', 0, 'FCI 3');
-- Lisää INSERT INTO lauseet tähän tiedostoon
