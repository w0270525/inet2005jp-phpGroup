SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cms
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cms` ;
CREATE SCHEMA IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 ;
USE `cms` ;

-- -----------------------------------------------------
-- Table `cms`.`USER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cms`.`USER` ;

CREATE TABLE IF NOT EXISTS `cms`.`USER` (
  `u_id` INT(11) NOT NULL AUTO_INCREMENT,
  `u_fname` VARCHAR(45) NOT NULL,
  `u_lname` VARCHAR(45) NOT NULL,
  `u_username` VARCHAR(45) NOT NULL,
  `u_pass` VARCHAR(128) NOT NULL,
  `u_salt` VARCHAR(32) NOT NULL,
  `u_createddate` DATETIME NOT NULL ,
  `u_createdby` INT(11) NOT NULL,
  `u_modifieddate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `u_lastmodifiedby` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  CONSTRAINT `u_createdby`
    FOREIGN KEY (`u_createdby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `u_lastmodifiedby`
    FOREIGN KEY (`u_lastmodifiedby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `u_id_UNIQUE` ON `cms`.`USER` (`u_id` ASC);

CREATE UNIQUE INDEX `u_name_UNIQUE` ON `cms`.`USER` (`u_username` ASC);

CREATE UNIQUE INDEX `u_salt_UNIQUE` ON `cms`.`USER` (`u_salt` ASC);

CREATE INDEX `u_createdby_idx` ON `cms`.`USER` (`u_createdby` ASC);

CREATE INDEX `u_lastmodifiedby_idx` ON `cms`.`USER` (`u_lastmodifiedby` ASC);


-- -----------------------------------------------------
-- Table `cms`.`PAGES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cms`.`PAGES` ;

CREATE TABLE IF NOT EXISTS `cms`.`PAGES` (
  `p_id` INT(11) NOT NULL AUTO_INCREMENT,
  `p_name` VARCHAR(90) NOT NULL,
  `p_alias` VARCHAR(45) NOT NULL,
  `p_desc` VARCHAR(255) NULL DEFAULT NULL,
  `p_createdby` INT(11) NOT NULL,
  `p_creationdate` DATETIME NOT NULL ,
  `p_lastmodifiedby` INT(11) NULL DEFAULT NULL,
  `p_modifieddate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`p_id`),
  CONSTRAINT `p_createdby`
    FOREIGN KEY (`p_createdby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `p_lastmodifiedby`
    FOREIGN KEY (`p_lastmodifiedby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `p_id_UNIQUE` ON `cms`.`PAGES` (`p_id` ASC);

CREATE UNIQUE INDEX `p_name_UNIQUE` ON `cms`.`PAGES` (`p_name` ASC);

CREATE UNIQUE INDEX `p_alias_UNIQUE` ON `cms`.`PAGES` (`p_alias` ASC);

CREATE INDEX `p_createdby_idx` ON `cms`.`PAGES` (`p_createdby` ASC);

CREATE INDEX `p_lastmodifiedby_idx` ON `cms`.`PAGES` (`p_lastmodifiedby` ASC);


-- -----------------------------------------------------
-- Table `cms`.`CONTENT_AREAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cms`.`CONTENT_AREAS` ;

CREATE TABLE IF NOT EXISTS `cms`.`CONTENT_AREAS` (
  `c_a_id` INT(11) NOT NULL AUTO_INCREMENT,
  `c_a_name` VARCHAR(90) NOT NULL,
  `c_a_alias` VARCHAR(25) NOT NULL,
  `c_a_desc` VARCHAR(255) NULL DEFAULT NULL,
  `c_a_order` INT(11) NOT NULL,
  `c_a_createdby` INT(11) NOT NULL,
  `c_a_creationdate` DATETIME NOT NULL,
  `c_a_lastmodifiedby` INT(11) NULL DEFAULT NULL,
  `c_a_modifieddate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`c_a_id`),
  CONSTRAINT `c_a_createdby`
    FOREIGN KEY (`c_a_createdby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `c_a_lastmodifiedby`
    FOREIGN KEY (`c_a_lastmodifiedby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `h_id_UNIQUE` ON `cms`.`CONTENT_AREAS` (`c_a_id` ASC);

CREATE UNIQUE INDEX `h_name_UNIQUE` ON `cms`.`CONTENT_AREAS` (`c_a_name` ASC);

CREATE UNIQUE INDEX `c_a_alias_UNIQUE` ON `cms`.`CONTENT_AREAS` (`c_a_alias` ASC);

CREATE UNIQUE INDEX `h_desc_UNIQUE` ON `cms`.`CONTENT_AREAS` (`c_a_desc` ASC);

CREATE INDEX `h_createdby_idx` ON `cms`.`CONTENT_AREAS` (`c_a_createdby` ASC);

CREATE INDEX `h_lastmodifiedby_idx` ON `cms`.`CONTENT_AREAS` (`c_a_lastmodifiedby` ASC);


-- -----------------------------------------------------
-- Table `cms`.`ARTICLE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cms`.`ARTICLE` ;

CREATE TABLE IF NOT EXISTS `cms`.`ARTICLE` (
  `a_id` INT(11) NOT NULL AUTO_INCREMENT,
  `a_contentarea` INT(11) NULL DEFAULT NULL,
  `a_name` VARCHAR(90) NOT NULL,
  `a_title` VARCHAR(90) NOT NULL,
  `a_desc` VARCHAR(255) NULL DEFAULT NULL,
  `a_blurb` TEXT NULL DEFAULT NULL,
  `a_content` LONGTEXT NOT NULL,
  `a_assocpage` INT(11) NULL DEFAULT NULL,
  `a_createdby` INT(11) NOT NULL,
  `a_creationdate` DATETIME NOT NULL ,
  `a_lastmodifiedby` INT(11) NULL DEFAULT NULL,
  `a_modifieddate` TIMESTAMP NULL DEFAULT NULL,
  `a_allpages` TINYINT(1) NULL DEFAULT '0',
  PRIMARY KEY (`a_id`),
  CONSTRAINT `a_assocpage`
    FOREIGN KEY (`a_assocpage`)
    REFERENCES `cms`.`PAGES` (`p_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `a_contentarea`
    FOREIGN KEY (`a_contentarea`)
    REFERENCES `cms`.`CONTENT_AREAS` (`c_a_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `a_createdby`
    FOREIGN KEY (`a_createdby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `a_lastmodifiedby`
    FOREIGN KEY (`a_lastmodifiedby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `a_id_UNIQUE` ON `cms`.`ARTICLE` (`a_id` ASC);

CREATE UNIQUE INDEX `a_name_UNIQUE` ON `cms`.`ARTICLE` (`a_name` ASC);

CREATE UNIQUE INDEX `a_title_UNIQUE` ON `cms`.`ARTICLE` (`a_title` ASC);

CREATE UNIQUE INDEX `a_desc_UNIQUE` ON `cms`.`ARTICLE` (`a_desc` ASC);

CREATE INDEX `a_assocpage_idx` ON `cms`.`ARTICLE` (`a_assocpage` ASC);

CREATE INDEX `a_createdby_idx` ON `cms`.`ARTICLE` (`a_createdby` ASC);

CREATE INDEX `a_lastmodifiedby_idx` ON `cms`.`ARTICLE` (`a_lastmodifiedby` ASC);

CREATE INDEX `a_c_a_id_idx` ON `cms`.`ARTICLE` (`a_contentarea` ASC);


-- -----------------------------------------------------
-- Table `cms`.`LOOKUP_ROLES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cms`.`LOOKUP_ROLES` ;

CREATE TABLE IF NOT EXISTS `cms`.`LOOKUP_ROLES` (
  `l_r_id` INT(11) NOT NULL AUTO_INCREMENT,
  `l_r_name` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`l_r_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `l_ed_id_UNIQUE` ON `cms`.`LOOKUP_ROLES` (`l_r_id` ASC);


-- -----------------------------------------------------
-- Table `cms`.`STYLE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cms`.`STYLE` ;

CREATE TABLE IF NOT EXISTS `cms`.`STYLE` (
  `s_id` INT(11) NOT NULL AUTO_INCREMENT,
  `s_name` VARCHAR(90) NOT NULL,
  `s_desc` VARCHAR(255) NULL DEFAULT NULL,
  `s_style` TEXT NOT NULL,
  `s_active` TINYINT(1) NOT NULL,
  `s_createdby` INT(11) NOT NULL,
  `s_creationdate` DATETIME NOT NULL ,
  `s_lastmodifiedby` INT(11) NULL DEFAULT NULL,
  `s_modifieddate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`s_id`),
  CONSTRAINT `s_createdby`
    FOREIGN KEY (`s_createdby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `s_lastmodifiedby`
    FOREIGN KEY (`s_lastmodifiedby`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `s_id_UNIQUE` ON `cms`.`STYLE` (`s_id` ASC);

CREATE UNIQUE INDEX `s_name_UNIQUE` ON `cms`.`STYLE` (`s_name` ASC);

CREATE UNIQUE INDEX `s_desc_UNIQUE` ON `cms`.`STYLE` (`s_desc` ASC);

CREATE INDEX `s_createdby_idx` ON `cms`.`STYLE` (`s_createdby` ASC);

CREATE INDEX `s_lastmodifiedby_idx` ON `cms`.`STYLE` (`s_lastmodifiedby` ASC);


-- -----------------------------------------------------
-- Table `cms`.`USER_ROLES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cms`.`USER_ROLES` ;

CREATE TABLE IF NOT EXISTS `cms`.`USER_ROLES` (
  `u_r_id` INT(11) NOT NULL AUTO_INCREMENT,
  `u_r_u_id` INT(11) NULL DEFAULT NULL,
  `u_r_l_r_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`u_r_id`),
  CONSTRAINT `u_r_l_d`
    FOREIGN KEY (`u_r_l_r_id`)
    REFERENCES `cms`.`LOOKUP_ROLES` (`l_r_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `u_r_u_id`
    FOREIGN KEY (`u_r_u_id`)
    REFERENCES `cms`.`USER` (`u_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `u_r_id_UNIQUE` ON `cms`.`USER_ROLES` (`u_r_id` ASC);

CREATE INDEX `u_r_u_id_idx` ON `cms`.`USER_ROLES` (`u_r_u_id` ASC);

CREATE INDEX `u_r_l_d_idx` ON `cms`.`USER_ROLES` (`u_r_l_r_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


# l_r_id, l_r_name
INSERT INTO cms.LOOKUP_ROLES VALUES (1, 'admin');
INSERT INTO cms.LOOKUP_ROLES VALUES (2, 'editor');
INSERT INTO cms.LOOKUP_ROLES VALUES (3, 'author');

# u_id, u_fname, u_lname, u_username, u_pass, u_salt, u_createdby
INSERT INTO cms.USER (u_fname, u_lname, u_username, u_pass, u_salt, u_createdby) VALUES ('admin', 'admin', 'admin', 'password', '1234567890', 1);
INSERT INTO cms.USER (u_fname, u_lname, u_username, u_pass, u_salt, u_createdby) VALUES ('user', 'user', 'user', 'password', '1234567890', 1);
INSERT INTO cms.USER (u_fname, u_lname, u_username, u_pass, u_salt, u_createdby) VALUES ('editor', 'editor', 'editor', 'password', '1234567890', 1);
INSERT INTO cms.USER (u_fname, u_lname, u_username, u_pass, u_salt, u_createdby) VALUES ('author', 'author', 'author', 'password', '1234567890', 1);
INSERT INTO cms.USER (u_fname, u_lname, u_username, u_pass, u_salt, u_createdby) VALUES ('Test', 'Testington', 'test', 'password', '1234567890', 1);
INSERT INTO cms.USER (u_fname, u_lname, u_username, u_pass, u_salt, u_createdby) VALUES ('Jimmy', 'Bean', 'jimmy', 'password', '1234567890', 1);


# u_r_id, u_r_u_id, u_r_l_r_id
INSERT INTO cms.USER_ROLES VALUES (1, 1, 1);
INSERT INTO cms.USER_ROLES VALUES (2, 1, 2);
INSERT INTO cms.USER_ROLES VALUES (3, 1, 3);
INSERT INTO cms.USER_ROLES VALUES (4, 1, 2);
INSERT INTO cms.USER_ROLES VALUES (5, 1, 3);
INSERT INTO cms.USER_ROLES VALUES (3, 1, 3);
INSERT INTO cms.USER_ROLES VALUES (3, 1, 3);


# s_id, s_name, s_desc, s_style, s_active, s_createdby
INSERT INTO cms.STYLE (s_id, s_name, s_desc, s_style, s_active, s_createdby)
 VALUES (1, 'Default', 'Default', 'body { display: block }', 1, 1);
INSERT INTO cms.STYLE (s_id, s_name, s_desc, s_style, s_active, s_createdby)
 VALUES (2, 'Inverse', 'Colors inverted.', 'body { background-color: black; text-color: white }', 0, 1);

# p_id, p_name, p_alias, p_desc, p_style, p_createdby
INSERT INTO cms.PAGE (p_id, p_name, p_alias, p_desc, p_style, p_createdby)
		VALUES (1, 'Index', 'test1', 'First test page', 2, 1);
INSERT INTO cms.PAGE (p_id, p_name, p_alias, p_desc, p_style, p_createdby)
		VALUES (2, 'News', 'test2', 'Second test page', 1, 1);

# c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_assocpage, c_a_createdby
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_assocpage, c_a_createdby)
 VALUES (1, 'header1', 'header1', 'First Header', 1, 1, 1);
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_assocpage, c_a_createdby)
 VALUES (2, 'header2', 'header2', 'Second Header', 1, 2, 1);
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_assocpage, c_a_createdby)
 VALUES (3, 'article1', 'article1', 'First Article', 2, 1, 1);
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_assocpage, c_a_createdby)
 VALUES (4, 'article2', 'article2', 'Second Article', 2, 2, 1);
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_assocpage, c_a_createdby)
 VALUES (5, 'footer1', 'footer1', 'First footer', 3, 1, 1);
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_assocpage, c_a_createdby)
 VALUES (6, 'footer2', 'footer2', 'Second footer', 3, 2, 1);

# a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (1, 1, 'header1_test', 'Test1', '<h1>Test Header</h1>', 1, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (2, 2, 'header2_test', 'Test2', '<h1>Test Headerr</h1>', 2, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (3, 3, 'article1_test', 'Test3', '<h1>Test Article</h1>', 1, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (4, 4, 'article2_test', 'Test4', '<h1>Test Articler</h1>', 2, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (5, 5, 'footer1_test', 'Test5', '<h1>Test Footer</h1>', 1, 1);
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby)
 VALUES (6, 6, 'footer2_test', 'Test6', '<h1>Test Footerr</h1>', 2, 1);






select * from users;

select * from page;
