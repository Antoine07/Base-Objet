-- création des tables
CREATE DATABASE IF NOT EXISTS
  `db_company`
  DEFAULT CHARACTER
  SET utf8
  COLLATE utf8_general_ci;

-- se connecter à la base de données db_bar
USE `db_company`;

-- une fois connecté à db_bar on crée la table Foo
CREATE TABLE `pilots` (
  `id`            INT         NOT NULL AUTO_INCREMENT,
  `certificate`   CHAR(6) UNIQUE,
  `name`          VARCHAR(30) NOT NULL,
  `number_flight` INT,
  `company`      CHAR(3),
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =1;

INSERT INTO `pilots` (`certificate`, `name`, `number_flight`, `company`)
VALUES ('PL1', 'Antoine', 100, 'AF'), ('PL2', 'Jérôme', 0, 'AF'), ('PL3', 'Thierry', 89, 'SI'),
  ('PL4', 'Jean-Marie', 20, 'AC'), ('PL5', 'Pascale', 30, 'AC'), ('PL6', 'Cécile', 120, 'AF'),
  ('PL7', 'Naoudi', 30, 'AF'), ('PL8', 'Fenley', 2, 'AF');

ALTER TABLE pilots ADD ( bonus DECIMAL(6,2), type_plane CHAR(5), job_date DATETIME);

# ALTER TABLE pilots MODIFY bonus DECIMAL(7,2);
# ALTER TABLE pilots DROP bonus, type_plane, job_date;






