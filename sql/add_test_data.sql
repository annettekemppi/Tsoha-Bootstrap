-- Kayttaja-taulun testidata
INSERT INTO Kayttaja (id, name, password, admin) VALUES ('1', 'Mealy', 'papumuhennos', false); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
-- Rotu-taulun testidata
INSERT INTO Rotu (id, name, status, description, published, country, added) VALUES ('1', 'Alaskanmalamuutti', 'Rekisteröity', 'Raskaiden kuormien vetokoira', '2011-11-11', 'USA', NOW());
-- Roturyhma-taulun testidata
INSERT INTO Roturyhma (id, rotu_id, name, count, class) VALUES ('1', '3', 'Terrierit', '5', 'FCI 3');
-- Lisää INSERT INTO lauseet tähän tiedostoon
