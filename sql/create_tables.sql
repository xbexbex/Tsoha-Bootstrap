CREATE TABLE Kayttaja(
	id SERIAL PRIMARY KEY,
	kayttajanimi varchar(30) NOT NULL,
	salasana varchar(50) NOT NULL,
	yllapitaja boolean NOT NULL
);

CREATE TABLE Arvostelu(
	id SERIAL PRIMARY KEY,
	otsikko varchar(50) NOT NULL,
	ingressi varchar(100) NOT NULL,
	teksti varchar(2000) NOT NULL,
	aika varchar(14) NOT NULL, 
	arvosana INTEGER NOT NULL,
	kayttaja_id INTEGER REFERENCES Kayttaja(id)
);

CREATE TABLE Arvio(
	id SERIAL PRIMARY KEY,
	arvosana INTEGER NOT NULL,
	kayttaja_id INTEGER REFERENCES Kayttaja(id),
	arvostelu_id INTEGER REFERENCES Arvostelu(id)
);

CREATE TABLE Asiasana(
	sana varchar(50) PRIMARY KEY
);

CREATE TABLE Arvosteluasiasana(
	arvostelu_id INTEGER REFERENCES Arvostelu(id),
	asiasana_string varchar(50) REFERENCES Asiasana(sana)
);

