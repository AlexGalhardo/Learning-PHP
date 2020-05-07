CREATE TABLE employees (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    salary INT(10) NOT NULL
);

CREATE TABLE countries (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

INSERT INTO countries (name)
VALUES ('Brazil');
INSERT INTO countries (name)
VALUES ('Argentina');
INSERT INTO countries (name)
VALUES ('Peru');
INSERT INTO countries (name)
VALUES ('Estados Unidos');
INSERT INTO countries (name)
VALUES ('Chile');
INSERT INTO countries (name)
VALUES ('Inglaterra');