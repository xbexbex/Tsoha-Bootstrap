INSERT INTO Account (name, password, admin) VALUES ('jäbä', '1234', FALSE);
INSERT INTO Account (name, password, admin) VALUES ('admin', 'admin', TRUE);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Kirves', 
	'Oli tylsä, osui polveen', 
	'Löysin mökiltä kirveen, mutta pahaksi onneksi se olikin tylsä. Halkoa hakatessa se sitten kimposi polveen. Kirottua! Tuli sairaalakeikka, ja nyt kävelen sauvoilla. Surkea laite, en suosittele. 0/5', 
	'2017.02.12.13.14.15', 
	0, 
	1);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2016.02.12.13.14.15', 
	3, 
	1);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 2', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2016.01.12.13.14.15', 
	3, 
	1);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 3', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2016.01.11.13.14.15', 
	3, 
	1);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 4', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2016.01.11.12.14.15', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 5', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2016.01.11.12.13.15', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 6', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2016.01.11.12.13.14', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 7', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2016.01.11.12.13.13', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 8', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2015.02.12.13.14.15', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 9', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2015.01.13.14.15.16', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (
	'Lorem ipsum 10', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'2015.01.12.19.19.19', 
	3, 
	2);


INSERT INTO Rating (grade, account_id, review_id) VALUES (3, 2, 1);

INSERT INTO Tag (name) VALUES ('kirves');
INSERT INTO Tag (name) VALUES ('polvi');
INSERT INTO Tag (name) VALUES ('murhe');

INSERT INTO Reviewtag (Review_id, tag_name) VALUES (1, 'kirves');
INSERT INTO Reviewtag (Review_id, tag_name) VALUES (1, 'polvi');
INSERT INTO Reviewtag (Review_id, tag_name) VALUES (1, 'murhe');