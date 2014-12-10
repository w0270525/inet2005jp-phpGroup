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
  `u_pass` VARCHAR(512) NOT NULL,
  `u_salt` VARCHAR(512) NOT NULL,
  `u_createddate` DATETIME NOT NULL ,
  `u_createdby` INT(11) NOT NULL,
  `u_modifieddate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `u_lastmodifiedby` INT(11) NULL DEFAULT NULL,
  `u_key` VARCHAR(512) NULL DEFAULT NULL,
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
CREATE UNIQUE INDEX `u_username_UNIQUE` ON `cms`.`USER` (`u_username` ASC);

CREATE INDEX `u_createdby_idx` ON `cms`.`USER` (`u_createdby` ASC);

CREATE INDEX `u_lastmodifiedby_idx` ON `cms`.`USER` (`u_lastmodifiedby` ASC);
CREATE TRIGGER USER_INSERT_TRIGGER BEFORE INSERT ON USER FOR EACH ROW   SET   nEW.u_createddate = NOW(),NEW.u_modifieddate= NOW();
CREATE TRIGGER USER_UPDATE_INSERT_TRIGGER BEFORE UPDATE ON USER FOR EACH ROW   SET   NEW.u_modifieddate= NOW();





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
 `p_style` TEXT NULL DEFAULT NULL ,
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
CREATE TRIGGER PAGES_ADD_TRIGGER BEFORE INSERT ON PAGES FOR EACH ROW   SET  NEW.p_creationdate = NOW(),NEW.p_modifieddate= NOW();
CREATE TRIGGER PAGES_UPDATE_TRIGGER BEFORE UPDATE ON PAGES FOR EACH ROW   SET   NEW.p_modifieddate= NOW();



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
CREATE TRIGGER CONTENT_AREA_INSERT_TRIGGER BEFORE INSERT ON CONTENT_AREAS FOR EACH ROW   SET   nEW.c_a_creationdate = NOW(),NEW.c_a_modifieddate= NOW();
CREATE TRIGGER CONTENT_UPDATE_INSERT_TRIGGER BEFORE UPDATE ON CONTENT_AREAS FOR EACH ROW   SET   NEW.c_a_modifieddate= NOW();


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
  `a_inactive` TINYINT(1) NULL DEFAULT '0',
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

CREATE INDEX `a_assocpage_idx` ON `cms`.`ARTICLE` (`a_assocpage` ASC);

CREATE INDEX `a_createdby_idx` ON `cms`.`ARTICLE` (`a_createdby` ASC);

CREATE INDEX `a_lastmodifiedby_idx` ON `cms`.`ARTICLE` (`a_lastmodifiedby` ASC);

CREATE INDEX `a_c_a_id_idx` ON `cms`.`ARTICLE` (`a_contentarea` ASC);
CREATE TRIGGER ARTICLE_INSERT_TRIGGER BEFORE INSERT ON ARTICLE FOR EACH ROW   SET   nEW.a_creationdate = NOW(),NEW.a_modifieddate= NOW();
CREATE TRIGGER ARTICLE_UPDATE_INSERT_TRIGGER BEFORE UPDATE ON ARTICLE FOR EACH ROW   SET   NEW.a_modifieddate= NOW();



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
CREATE TRIGGER STYLE_INSERT_TRIGGER BEFORE INSERT ON STYLE FOR EACH ROW   SET   nEW.s_creationdate = NOW(),NEW.s_modifieddate= NOW();
CREATE TRIGGER STYLE_UPDATE_INSERT_TRIGGER BEFORE UPDATE ON STYLE FOR EACH ROW   SET   NEW.s_modifieddate= NOW();



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
INSERT INTO cms.USER  VALUES ('1', 'superuser', 'superuser', 'superuser', 'password', 'password', '2014-12-04 12:50:50', '1', '2014-12-04 12:50:50', '1', NULL);
INSERT INTO cms.USER  VALUES (2,'admin', 'User', 'admin', 'password', 'password',NOW(), 1,NOW(),1,NULL);
INSERT INTO cms.USER  VALUES (3,'editor', 'User', 'editor', 'password', 'password',NOW(), 1,NOW(),1,NULL);
INSERT INTO cms.USER  VALUES (4,'author', 'User', 'author', 'password', 'password',NOW(), 1,NOW(),1,NULL);
INSERT INTO cms.USER  VALUES (5,'Inactive', 'User', 'inactive', 'password', 'password', NOW(),1,NOW(),1,"inactive");
# u_r_id, u_r_u_id, u_r_l_r_id
INSERT INTO cms.USER_ROLES VALUES (1, 1, 1);
INSERT INTO cms.USER_ROLES VALUES (2, 1, 2);
INSERT INTO cms.USER_ROLES VALUES (3, 1, 3);

# s_id, s_name, s_desc, s_style, s_active, s_createdby
INSERT INTO cms.STYLE (s_id, s_name, s_desc, s_style, s_active, s_createdby,s_creationdate)
 VALUES (1, 'Default', 'Default Style Selection', 'body { display: block }', 1, 1,NOW());
INSERT INTO cms.STYLE (s_id, s_name, s_desc, s_style, s_active, s_createdby,s_creationdate)
 VALUES (2, 'Inverse', 'Colors inverted Style Selection.', 'body { background-color: black; text-color: white }', 0, 1,NOW());

# p_id, p_name, p_alias, p_desc, p_style, p_createdby
INSERT INTO cms.PAGES (p_id, p_name, p_alias, p_desc, p_createdby,p_creationdate)
		VALUES (1, 'INDEX', 'index', 'This is the main page for all your content', 1,NOW());
INSERT INTO cms.PAGES (p_id, p_name, p_alias, p_desc, p_createdby,p_creationdate)
		VALUES (2, 'NEWS', 'news', 'This page is forn all your news and updates', 1,NOW());

# c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_createdby
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_createdby,c_a_creationdate)
 VALUES (1, 'Header', 'header', 'Header content area', 1, 1,NOW());
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_createdby,c_a_creationdate)
 VALUES (2, 'Article', 'article', 'Article content area', 2, 1,NOW());
INSERT INTO cms.CONTENT_AREAS (c_a_id, c_a_name, c_a_alias, c_a_desc, c_a_order, c_a_createdby,c_a_creationdate)
 VALUES (3, 'Footer', 'footer', 'Footer content area', 3, 1,NOW());

# a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby,a_creationdate)
 VALUES (1, 1, 'header1_test', 'Test Tile Artilc1', 'New content areas can be added to the front-end site from the administrative back-end and they will be stored in the CMS database with their name, alias (used for the DIV ids that will tie into CSS directives), order on the page (e.g. a header content area should show up first on the page), and description all stored appropriately. In addition, fields for created by indicator, creation date, modify by indicator, and modify date will be maintained in accordance with Security requirement: REQ-0018. ', 1, 1,NOW());
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby,a_creationdate)
 VALUES (2, 1, 'header2_test', 'Artic trst', '<h1>Test Headerr</h1>New content areas can be added to the front-end site from the administrative back-end and they will be stored in the CMS database with their name, alias (used for the DIV ids that will tie into CSS directives), order on the page (e.g. a header content area should show up first on the page), and description all stored appropriately. In addition, fields for created by indicator, creation date, modify by indicator, and modify date will be maintained in accordance with Security requirement: REQ-0018. ', 2, 1,NOW());
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby,a_creationdate)
 VALUES (3, 2, 'article1_test', 'MVC WHAT', '<h1>Test Article</h1>', 1, 1,NOW());
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby,a_creationdate)
 VALUES (4, 2, 'article2_test', 'Fantatsc', '
There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 2, 1,NOW());
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby,a_creationdate)
 VALUES (5, 3, 'footer1_test', 'Test5 i think', '<h1>Test Footer</h1>fsdfsdfsdfdsfsdfsdfsdfsdfsdfsdfsdf', 1, 1,NOW());
INSERT INTO cms.ARTICLE (a_id, a_contentarea, a_name, a_title, a_content, a_assocpage, a_createdby,a_creationdate)
 VALUES (6, 3, 'footer2_test', 'lupa ipsm', '"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using -Content here, content here-, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

', 2, 1,NOW());




