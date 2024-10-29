CREATE DATABASE projetfinal;
USE projetfinal;

CREATE TABLE news(
    id      INT             NOT NULL    AUTO_INCREMENT,
    title   VARCHAR(128)    NOT NULL,
    slug    VARCHAR(128)    NOT NULL,
    body    TEXT            NOT NULL,
    PRIMARY KEY (id),
    UNIQUE slug (slug)    
);

CREATE TABLE role(
    role_id     INT              NOT NULL   AUTO_INCREMENT,
    role_name   VARCHAR(10)      NOT NULL,
    PRIMARY KEY(role_id)
);

CREATE TABLE utilisateur(
    id          INT                 NOT NULL    AUTO_INCREMENT,
    role_id     INT                 NOT NULL,
    username    VARCHAR(50)         NOT NULL UNIQUE,
    password    VARCHAR(255)        NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE userAttempt(
    user_id         INT         NOT NULL,
    last_attempt    DATETIME    NULL,
    attempts        INT         NOT NULL,
    blocked         BOOLEAN     NOT NULL
);

ALTER TABLE utilisateur
ADD FOREIGN KEY (role_id) REFERENCES `role` (role_id);

ALTER TABLE userAttempt
ADD FOREIGN KEY (user_id) REFERENCES utilisateur (id);

INSERT INTO `role`(`role_name`) VALUES
('Admin'),
('Visiteur'),
('Standard');


INSERT INTO news VALUES
(1,'Elvis sighted','elvis-sighted','Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.'),
(2,'Say it isn\'t so!','say-it-isnt-so','Scientists conclude that some programmers have a sense of humor.'),
(3,'Caffeination, Yes!','caffeination-yes','World\'s largest coffee shop open onsite nested coffee shop for staff only.');