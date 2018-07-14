
CREATE TABLE comments
(
  id       INT(32) AUTO_INCREMENT
    PRIMARY KEY,
  name     VARCHAR(128)       NOT NULL,
  text     VARCHAR(256)       NOT NULL,
  approved INT(2) DEFAULT '0' NOT NULL
);



INSERT INTO CourseProject.comments (id, name, text, approved) VALUES (3, 'Иван', 'Все понравилось)', 1);
INSERT INTO CourseProject.comments (id, name, text, approved) VALUES (4, 'Сергей', 'Круто))', 0);
