-- 
-- Database: `insta`
--
-- -----------------------------------------------------
-- 
-- 
-- Table structure for table `user`
-- 
CREATE TABLE `user` (
  `id` INT(11) NOT NULL,
  `PASSWORD` VARCHAR(15) NOT NULL,
  `EMAIL` VARCHAR(50) NOT NULL,
  `age` INT(11) NOT NULL,
  `username` VARCHAR(50) NOT NULL,
  `tel` INT(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `EMAIL` (`EMAIL` ASC) VISIBLE
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
-- -----------------------------------------------------
-- Table structure for table `post`
-- -----------------------------------------------------
CREATE TABLE `post` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(80) NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id`) REFERENCES `insta`.`user` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARACTER SET = latin1;
-- -----------------------------------------------------
-- Table structure for table `comment`
-- -----------------------------------------------------
CREATE TABLE `comment` (
  `ID` INT(11) NOT NULL,
  `content` VARCHAR(80) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `insta`.`post` (`id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `insta`.`user` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
-- -----------------------------------------------------
-- Table structure for table`comment_like`
-- -----------------------------------------------------
CREATE TABLE `comment_like` (
  `id` INT(11) NOT NULL,
  INDEX `id` (`id` ASC) VISIBLE,
  CONSTRAINT `comment_like_ibfk_1` FOREIGN KEY (`id`) REFERENCES `insta`.`comment` (`ID`),
  CONSTRAINT `comment_like_ibfk_2` FOREIGN KEY (`id`) REFERENCES `insta`.`post` (`id`),
  CONSTRAINT `comment_like_ibfk_3` FOREIGN KEY (`id`) REFERENCES `insta`.`user` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
-- -----------------------------------------------------
-- Table structure for table `follow`
-- -----------------------------------------------------
CREATE TABLE `follow` (
  `id_follower` INT(11) NOT NULL,
  `id_following` INT(11) NOT NULL AUTO_INCREMENT,
  INDEX `id_follower` (`id_follower` ASC) VISIBLE,
  INDEX `id_following` (`id_following` ASC) VISIBLE,
  CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`id_follower`) REFERENCES `insta`.`user` (`id`),
  CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`id_following`) REFERENCES `insta`.`user` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
-- 
-- Table structure for table `images`
-- 
CREATE TABLE `images` (
  `id_image` INT(11) NOT NULL,
  `name` VARCHAR(15) NULL DEFAULT NULL,
  `path` VARCHAR(10) NULL DEFAULT NULL,
  INDEX `id_image` (`id_image` ASC) VISIBLE,
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `insta`.`post` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
-- -----------------------------------------------------
-- Table structure for table `likes`
-- -----------------------------------------------------
CREATE TABLE `likes` (
  `reaction` VARCHAR(15) NOT NULL,
  `id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`reaction`),
  INDEX `id` (`id` ASC) VISIBLE,
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `insta`.`user` (`id`),
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id`) REFERENCES `insta`.`post` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
-- -----------------------------------------------------
-- Table structure for table `user_comment`
-- -----------------------------------------------------
CREATE TABLE `user_comment` (
  `user_id` INT(11) NOT NULL,
  `content` VARCHAR(80) NULL DEFAULT NULL,
  `id` INT(11) NOT NULL,
  INDEX `user_id` (`user_id` ASC) VISIBLE,
  INDEX `id` (`id` ASC) VISIBLE,
  CONSTRAINT `user_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `insta`.`user` (`id`),
  CONSTRAINT `user_comment_ibfk_2` FOREIGN KEY (`id`) REFERENCES `insta`.`comment` (`ID`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;