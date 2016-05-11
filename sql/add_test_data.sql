-- Kayttaja-taulun testidata
INSERT INTO Kayttaja (id, name, password, admin) VALUES ('1', 'Mealy', 'papumuhennos', false); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
-- Rotu-taulun testidata
INSERT INTO Rotu (id, name, status, description, published, country, added) VALUES ('1', 'Alaskanmalamuutti', 'Rekisteröity', 'Raskaiden kuormien vetokoira', '2011-11-11', 'USA', NOW());
-- Roturyhma-taulun testidata
INSERT INTO Roturyhma (name, id, description) VALUES ('Terrierit', '1', 'FCI 3');
-- Lisää INSERT INTO lauseet tähän tiedostoon
