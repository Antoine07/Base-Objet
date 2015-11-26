DROP DATABASE `db_trombi`;

CREATE DATABASE
  `db_trombi`
  DEFAULT CHARACTER
  SET utf8
  COLLATE utf8_general_ci;

USE `db_trombi`;

CREATE TABLE `users` (
  `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`      VARCHAR(100) NOT NULL,
  `biography` TEXT,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =1;

CREATE TABLE `tags` (
  `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100),
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB, AUTO_INCREMENT =1;

CREATE TABLE `links` (
  `id`      INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED,
  `uri`     VARCHAR(100),
  PRIMARY KEY (`id`),
  CONSTRAINT `links_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ON DELETE CASCADE
)
  ENGINE =InnoDB, AUTO_INCREMENT =1;

CREATE TABLE `tag_user` (
  `user_id` INT UNSIGNED,
  `tag_id`  INT UNSIGNED,
  CONSTRAINT `tag_user_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `tag_user_tag_id_tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
    ON DELETE CASCADE,
  UNIQUE (`user_id`, `tag_id`)
);

ALTER TABLE `users` ADD published_at DATETIME
AFTER biography;

INSERT INTO `tags` (`name`) VALUES ('Science fiction'), ('techno'), ('database');
INSERT INTO `users` (`name`) VALUES ('Mathéo'), ('Eric'), ('Marine'), ('Thomas'), ('Jordan'), ('Antoine');

INSERT INTO `tag_user` (`user_id`, `tag_id`) VALUES (1, 1), (1, 2), (2, 3), (2, 1), (4, 1), (5, 2);

INSERT INTO `links` (uri, user_id) VALUES ('han.jpg', 1), ('yoda.jpg', 2), ('padme.jpg', 3);