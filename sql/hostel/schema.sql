DROP DATABASE IF EXISTS `db_hostel`;

CREATE DATABASE
  `db_hostel`
  DEFAULT CHARACTER
  SET utf8
  COLLATE utf8_general_ci;

USE `db_hostel`;

CREATE TABLE `rooms` (
  `id`       INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(100) NOT NULL,
  `capacity` SMALLINT,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =1;

CREATE TABLE `guests` (
  `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =1;

CREATE TABLE `reservations` (
  `guest_id`    INT UNSIGNED NOT NULL,
  `room_id`     INT UNSIGNED NOT NULL,
  `reserved_at` DATE         NOT NULL,
  PRIMARY KEY (`guest_id`, `room_id`, `reserved_at`),
  CONSTRAINT `guest_room_guest_id_guests` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `guest_room_room_id_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
    ON DELETE CASCADE
);

INSERT INTO `rooms` (`name`, `capacity`)
VALUES ('Canour', 3), ('Sipame', 1), ('Bône', 2), ('Outont', 2), ('Samuire', 1);

INSERT INTO `guests` (`name`)
VALUES ('Lother'), ('Brimond'), ('Elior'), ('Cemin');

INSERT INTO `reservations` (`guest_id`, `room_id`, `reserved_at`)
VALUES (1, 1, '1975-07-03'), (2, 1, '1975-07-03'), (2, 2, '1975-07-04'), (3, 3, '1975-07-03'), (1, 1, '1976-07-03'),
  (1, 1, '2015-07-03'), (4, 1, '1975-07-03');
