INSERT INTO User (name, password, admin) VALUES ('jäbä', '1234', FALSE);
INSERT INTO User (name, password, admin) VALUES ('admin', 'admin', TRUE);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Kirves', 
	'Oli tylsä, osui polveen', 
	'Löysin mökiltä kirveen, mutta pahaksi onneksi se olikin tylsä. Halkoa hakatessa se sitten kimposi polveen. Kirottua! Tuli sairaalakeikka, ja nyt kävelen sauvoilla. Surkea laite, en suosittele. 0/5', 
	'20170212131415', 
	0, 
	1);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20160212131415', 
	3, 
	1);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 2', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20160112131415', 
	3, 
	1);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 3', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20160111131415', 
	3, 
	1);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 4', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20160111121415', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 5', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20160111121315', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 6', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20160111121314', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 7', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20160111121313', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 8', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20150212131415', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 9', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20150113141516', 
	3, 
	2);

INSERT INTO Review (heading, lead, content, time_added, score, user_id) VALUES (
	'Lorem ipsum 10', 
	'Ferri nulla placerat sit et', 
	'Ex omittam evertitur eam, ex aliquip sadipscing sed. Fabulas propriae adolescens eu nam. Evertitur appellantur ex usu. Dicant scripta adolescens qui ne. Ad tota timeam sea, ea eos essent euismod epicuri, sed an posse appareat necessitatibus. Autem essent eirmod per te, at per primis civibus.', 
	'20150112191919', 
	3, 
	2);


INSERT INTO Rating (score, user_id, review_id) VALUES (3, 2, 1);

INSERT INTO Tag (name) VALUES ('kirves');
INSERT INTO Tag (name) VALUES ('polvi');
INSERT INTO Tag (name) VALUES ('murhe');

INSERT INTO Reviewtag (Review_id, tag_name) VALUES (1, 'kirves');
INSERT INTO Reviewtag (Review_id, tag_name) VALUES (1, 'polvi');
INSERT INTO Reviewtag (Review_id, tag_name) VALUES (1, 'murhe');