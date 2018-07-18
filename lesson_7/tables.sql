CREATE TABLE images
(
  id         INT AUTO_INCREMENT
    PRIMARY KEY,
  name       VARCHAR(127) NOT NULL,
  path       VARCHAR(127) NOT NULL,
  product_id INT          NOT NULL,
  CONSTRAINT images___fk_product
  FOREIGN KEY (product_id) REFERENCES products (id)
    ON DELETE CASCADE
);
CREATE INDEX images___fk_product
  ON images (product_id);


CREATE TABLE products
(
  id          INT AUTO_INCREMENT
    PRIMARY KEY,
  title       VARCHAR(127) NOT NULL,
  description VARCHAR(255) NOT NULL,
  price       INT          NOT NULL
);


CREATE TABLE users
(
  id    INT AUTO_INCREMENT
    PRIMARY KEY,
  name  VARCHAR(50)  NOT NULL,
  login VARCHAR(50)  NOT NULL,
  pass  VARCHAR(255) NOT NULL,
  CONSTRAINT users_login_uindex
  UNIQUE (login)
);
