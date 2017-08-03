INSERT INTO Kayttaja (kayttajanimi, salasana, yllapitaja) VALUES ('jäbä', '1234', FALSE);
INSERT INTO Kayttaja (kayttajanimi, salasana, yllapitaja) VALUES ('admin', 'admin', TRUE);

INSERT INTO Arvostelu (otsikko, ingressi, teksti, arvosana, kayttaja_id) VALUES ('Kirves', 'Oli tylsä, osui polveen', 'Löysin mökiltä kirveen, mutta pahaksi onneksi se olikin tylsä. Halkoa hakatessa se sitten kimposi polveen. Kirottua! Tuli sairaalakeikka, ja nyt kävelen sauvoilla. Surkea laite, en suosittele. 0/5', 0, 1);

INSERT INTO Arvio (arvosana, kayttaja_id, arvostelu_id) VALUES (3, 2, 1);

INSERT INTO Asiasana (sana) VALUES ('kirves');
INSERT INTO Asiasana (sana) VALUES ('polvi');
INSERT INTO Asiasana (sana) VALUES ('murhe');

INSERT INTO Arvosteluasiasana (arvostelu_id, asiasana_string) VALUES (1, 'kirves');
INSERT INTO Arvosteluasiasana (arvostelu_id, asiasana_string) VALUES (1, 'polvi');
INSERT INTO Arvosteluasiasana (arvostelu_id, asiasana_string) VALUES (1, 'murhe');