CREATE TABLE Account(
	id SERIAL PRIMARY KEY,
	name varchar(30) NOT NULL,
	password varchar(50) NOT NULL,
	admin boolean DEFAULT false NOT NULL
);

CREATE TABLE Review(
	id SERIAL PRIMARY KEY,
	heading varchar(50) NOT NULL,
	lead varchar(100) NOT NULL,
	content varchar(2000) NOT NULL,
	time_added varchar(19) NOT NULL, 
	score INTEGER NOT NULL,
	account_id INTEGER REFERENCES Account(id)
);

CREATE TABLE Rating(
	id SERIAL PRIMARY KEY,
	grade INTEGER NOT NULL,
	account_id INTEGER REFERENCES account(id),
	review_id INTEGER REFERENCES Review(id)
);

CREATE TABLE Tag(
	name varchar(50) PRIMARY KEY
);

CREATE TABLE Reviewtag(
	review_id INTEGER REFERENCES Review(id),
	tag_name varchar(50) REFERENCES Tag(name)
);

