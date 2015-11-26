-- création des tables
CREATE DATABASE IF NOT EXISTS
  `db_company`
  DEFAULT CHARACTER
  SET utf8
  COLLATE utf8_general_ci;

-- connect database
USE `db_company`;

-- create table
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

-- exo 1
SELECT DISTINCT (company)
FROM pilots
ORDER BY company ASC;

-- exo 2
SELECT *
FROM pilots
WHERE id > 2 AND id < 5;

SELECT *
FROM pilots
WHERE id BETWEEN 3 AND 4;

-- 3.bis
# SELECT
#   company,
#   `name`
# FROM pilot
# ORDER BY company, `name`;

-- exo 3
SELECT MAX(number_flight) AS max_flight
FROM pilots;

SELECT MIN(number_flight) AS min_flight
FROM pilots;

SELECT
  MIN(number_flight) AS min_flight,
  MAX(number_flight) AS max_flight
FROM pilots;

-- SELECT MAX(number_flight), name FROM pilots; #max and first name table ...
-- exo 4
SELECT name
FROM pilots
WHERE number_flight = (SELECT MAX(number_flight)
                       FROM pilots);

-- exo 5 DDL

--  ALTER TABLE pilots DROP type_plane;

ALTER TABLE pilots ADD (bonus DECIMAL(6, 2) UNSIGNED, type_plane CHAR(6), job_date DATETIME);

UPDATE pilot
SET bonus = 100, type_plane = 'A380', job_date = '2012-12-31 20:59:59'
WHERE id > 5 AND id <= 7;
UPDATE pilot
SET bonus = 300, type_plane = 'A320', job_date = '2010-12-31 15:10:59'
WHERE id <= 5;
UPDATE pilot
SET bonus = 500, type_plane = 'A340', job_date = '2009-12-31 18:00:00'
WHERE id = 8;

-- exo 6
-- search character "a" into name field
SELECT `name`
FROM pilots
WHERE `name` LIKE '%a%';

-- words start with a letter
SELECT `name`
FROM pilots
WHERE `name` LIKE 'a%';

-- tous les noms dont l'avant dernière lettre est un "l"
SELECT `name`
FROM pilots
WHERE `name` LIKE '%l_';

-- exo 7 avg
SELECT
  AVG(number_flight),
  AVG(bonus)
FROM pilots
WHERE company = 'AF';

-- exo 8
SELECT COUNT(DISTINC `bonus`)
FROM `pilots`;

SELECT COUNT(DISTINC `company`)
FROM `pilots`;

-- exo 9
SELECT GROUP_CONCAT(`name`)
FROM pilots
WHERE company = 'AF';

-- exo 10
-- rappel si on ne met pas GROUP BY  sur le champ company par exemple MySQL fait la moyenne générale sur l'ensemble des champs
SELECT
  company,
  AVG(number_flight),
  AVG(bonus)
FROM pilots
GROUP BY (company);

-- SELECT company, AVG(number_flight), AVG(bonus) FROM pilots GROUP BY (company) HAVING(AVG(number_flight) < 40);

-- exo 11 max number flight by company
SELECT
  company,
  MAX(number_flight)
FROM pilots
GROUP BY (company);

-- exo 12, number pilot by company
SELECT
  company,
  COUNT(DISTINCT name)
FROM pilots
GROUP BY company;

-- exo 13, number plane distinct by company
SELECT
  company,
  count(DISTINCT type_plane)
FROM pilots
GROUP BY company;

-- exo 14
SELECT
  COUNT(id) AS number_pilot,
  company
FROM pilots
GROUP BY company
HAVING (COUNT(id) > 1);

-- exo 15
SELECT DISTINCT type_plane
FROM
  pilots
WHERE company = 'AF' AND type_plane IN (SELECT type_plane
                                         FROM pilots
                                         WHERE company = 'AC');

-- exo 15.bis type plane exploiter par AF et pas par AC
SELECT DISTINCT type_plane
FROM pilots
WHERE company = 'AF' AND type_plane NOT IN (SELECT type_plane
                                             FROM pilots
                                             WHERE company = 'AC');

