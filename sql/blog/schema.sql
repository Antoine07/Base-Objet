
CREATE DATABASE IF NOT EXISTS
  `db_blog`
  DEFAULT CHARACTER
  SET utf8
  COLLATE utf8_general_ci;

CREATE TABLE `users`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`  VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1;

CREATE TABLE `posts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id`  INT UNSIGNED ,
  `title`  VARCHAR(100) NOT NULL,
  CONSTRAINT `posts_user_id_users` FOREIGN KEY(`user_id`) REFERENCES `users` (`id`),
  PRIMARY KEY (`id`)
) ENGINE =InnoDB AUTO_INCREMENT =1;



INSERT INTO `users` (`name`) VALUES ('Mathéo'), ('Eric'), ('Marine'), ('Thomas'), ('Jordan'), ('Antoine');



-- test d'intégrité
INSERT INTO posts (title, user_id) VALUES ('php 7', 6), ('MariaDB', 9); -- contrainte d'intégrité user_id 9 n'existe pas
INSERT INTO posts (title, user_id) VALUES ('php 7', 6), ('MariaDB', 3);


# supprimer le post qui a pour titrre "php 7"


DELETE FROM posts WHERE id = 1;

# supprimer un user da la table users qui a écrit un post

DELETE FROM users WHERE id=3;


# Supprimer Marine mais pas ces posts !!!

ALTER TABLE posts DROP FOREIGN KEY posts_user_id_users;


-- supprimer un user sans supprimer ses posts
-- attention  a bien vérifier que le type user_id peut etre NULL dans la table posts
ALTER TABLE posts ADD CONSTRAINT posts_user_id_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE SET NULL;


-- comment

CREATE TABLE `comments` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` INT UNSIGNED,
  `email` VARCHAR(100),
  `content` TEXT,
  PRIMARY KEY(`id`),
  CONSTRAINT `comments_post_id_posts` FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`) ON DELETE CASCADE
)ENGINE=innoDB AUTO_INCREMENT=1;


-- afficher les titres avec les noms des personnes qui on écrit les posts => JOINTURE INTERNE

SELECT u.`name`, p.title FROM posts as p
INNER JOIN users as u
ON p.user_id=u.id


-- Jointure externe affiché les posts avec le nom des auteurs si il existe

SELECT
p.title, u.`name`
FROM posts as p
LEFT OUTER JOIN users as u
ON p.user_id=u.id


-- compter le nombre d'article écrit par auteur

SELECT
COUNT(p.title), u.name
FROM posts as p
RIGHT OUTER JOIN users as u
ON p.user_id=u.id
GROUP BY u.`name`;

-- tous les articles d'Antoine

SELECT u.`name`, p.title FROM posts as p
INNER JOIN users as u
ON p.user_id=u.id
WHERE u.id=6;


-- tous les articles d'Antoine one-to-many

SELECT title FROM posts WHERE user_id=6;

-- qui a écrit le post "Stars Wars"  many-to-one

SELECT u.`name` FROM posts as p INNER JOIN users as u ON p.user_id=u.id WHERE p.title = 'Stars Wars';

CREATE TABLE tags(
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
   `name` VARCHAR(100),
   PRIMARY KEY (`id`)
)ENGINE=InnoDB, AUTO_INCREMENT=1;

CREATE TABLE post_tag (
    `post_id` INT UNSIGNED,
    `tag_id` INT UNSIGNED,
    CONSTRAINT `post_tag_post_id_posts` FOREIGN KEY(`post_id`) REFERENCES `posts`(`id`) ON DELETE CASCADE,
    CONSTRAINT `post_tag_tag_id_tags` FOREIGN KEY(`tag_id`) REFERENCES `tags`(`id`) ON DELETE CASCADE,
    UNIQUE (`post_id`,`tag_id` )
);

-- sélectionner tous les tags du post Stars Wars id = 2

SELECT t.`name` FORM tags as t
INNER JOIN post_tag as pt
ON pt.tag_id=t.id
WHERE pt.post_id=2;

-- trouver tous les tags des posts écrit pas Marine


