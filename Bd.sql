
CREATE DATABASE projetfinal;
USE projetfinal;

CREATE TABLE input(
    id     INT              NOT NULL   AUTO_INCREMENT,
    inputName       VARCHAR(10)     NOT NULL,
    used	BIT				NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE score(
    id_user      	  INT      NOT NULL,
    score       	  INT      NOT NULL,
    up_input          INT      NOT NULL,
    down_input        INT      NOT NULL,
    left_input        INT      NOT NULL,
    right_input       INT      NOT NULL,
    pressed_input     INT      NOT NULL
);

CREATE TABLE role(
    role_id     INT              NOT NULL   AUTO_INCREMENT,
    role_name   VARCHAR(10)      NOT NULL,
    PRIMARY KEY(role_id)
);

CREATE TABLE utilisateur(
    id          INT                 NOT NULL    AUTO_INCREMENT,
    role_id     INT                 NOT NULL,
    sel         VARCHAR(40)         NOT NULL,
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

ALTER TABLE score
ADD FOREIGN KEY (id_user) REFERENCES utilisateur (id);

ALTER TABLE score
ALTER score SET DEFAULT 0,
ALTER up_input SET DEFAULT 0,
ALTER down_input SET DEFAULT 0,
ALTER left_input SET DEFAULT 0,
ALTER right_input SET DEFAULT 0,
ALTER pressed_input SET DEFAULT 0;

ALTER TABLE input
ALTER used SET DEFAULT 0;

INSERT INTO `role`(`role_name`) VALUES
('Admin'),
('Visiteur'),
('Standard');
