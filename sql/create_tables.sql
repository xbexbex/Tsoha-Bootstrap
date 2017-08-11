CREATE TABLE User(
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
	time_added varchar(14) NOT NULL, 
	score INTEGER NOT NULL,
	user_id INTEGER REFERENCES User(id)
);

CREATE TABLE Rating(
	id SERIAL PRIMARY KEY,
	grade INTEGER NOT NULL,
	user_id INTEGER REFERENCES User(id),
	review_id INTEGER REFERENCES Review(id)
);

CREATE TABLE Tag(
	name varchar(50) PRIMARY KEY
);

CREATE TABLE Reviewtag(
	review_id INTEGER REFERENCES Review(id),
	tag_name varchar(50) REFERENCES Tag(sana)
);

