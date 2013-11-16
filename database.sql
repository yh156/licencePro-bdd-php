DROP TABLE IF EXISTS message;
DROP TABLE IF EXISTS citoyen;

CREATE TABLE citoyen
(
    id SERIAL,
    pseudo VARCHAR(50),
    nom VARCHAR(50),
    prenom VARCHAR(100),
    mail VARCHAR(100),
    dateInscription TIMESTAMP DEFAULT current_timestamp,
    password VARCHAR(150),
    PRIMARY KEY (id)
);

CREATE TABLE message
(
    id SERIAL,
    id_citoyen_link INTEGER,
    data_message TEXT,
    PRIMARY KEY (id)
);

ALTER TABLE message ADD CONSTRAINT fk_message_client FOREIGN KEY (id_citoyen_link) REFERENCES citoyen(id);
