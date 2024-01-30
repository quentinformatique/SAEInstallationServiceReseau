CREATE TABLE tpersonne(
    id INT PRIMARY KEY NOT NULL,
    nom VARCHAR(40),
    prenom VARCHAR(30),
    age INT() CHECK (age > 0)
);

INSERT INTO tpersonne
VALUES (1,"Perez","Joan",12);

INSERT INTO tpersonne
VALUES (2,"Payen","Milo",22);

INSERT INTO tpersonne
VALUES (3,"Traversac","Corinne",55);