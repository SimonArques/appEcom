CREATE TABLE IF NOT EXISTS USER (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(50) NOT NULL,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    isAdmin TINYINT DEFAULT 0

);

CREATE INDEX "idUser" ON "USER" ("id");
CREATE TABLE IF NOT EXISTS PRODUCT (

    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    productName VARCHAR(50) NOT NULL,
    price DOUBLE NOT NULL,
    desc VARCHAR(255),
    quantity INTEGER
);

CREATE INDEX "idProduct" ON "PRODUCT" ("id");

CREATE TABLE IF NOT EXISTS USER_PRODUCT(
     user_id  integer REFERENCES USER(id) ON UPDATE CASCADE ON DELETE CASCADE
    ,product_id integer REFERENCES PRODUCT(id) ON UPDATE CASCADE ON DELETE CASCADE
    ,PRIMARY KEY (user_id, product_id)
);

CREATE TABLE IF NOT EXISTS PRODUCTCATEGORY (

    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    categoryName VARCHAR(50) NOT NULL
);
