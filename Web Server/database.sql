
CREATE TABLE writer(
    wid INT NOT NULL AUTO_INCREMENT,
    wname VARCHAR(20),
    PRIMARY KEY (wid)
);

INSERT INTO writer (wname) VALUES('Timothy');
INSERT INTO writer (wname) VALUES('Alex');

CREATE TABLE note(
    n_id INT NOT NULL AUTO_INCREMENT,
    w_id INT REFERENCES writer(wid),
    note_txt VARCHAR(100) NOT NULL,
    PRIMARY KEY (n_id, w_id)
);

INSERT INTO note (w_id, note_txt) VALUES(1,'Welcome to the Shared Note Page.');
INSERT INTO note (w_id, note_txt) VALUES(2,'Note1: Study Hard');
INSERT INTO note (w_id, note_txt) VALUES(1,'Note2: Note 1 is shared');