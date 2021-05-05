CREATE DATABASE retail_webstore;

USE retail_webstore;

    CREATE TABLE userLogin(

        userid INT NOT NULL AUTO_INCREMENT,
        username CHAR(20) NOT NULL,
        pass CHAR(20) NOT NULL,
        phoneNumber INT NOT NULL,
        PRIMARY KEY (userid),

    );
    CREATE TABLE addressBook(

        addressid INT NOT NULL AUTO_INCREMENT,
        streetname CHAR(50) NOT NULL,
        town CHAR(20) NOT NULL,
        zipcode INT NOT NULL,
        PRIMARY KEY (addressid),
    );

    CREATE TABLE cart(

        cartid INT NOT NULL AUTO_INCREMENT,
        totalItems INT NOT NULL,
        iventoryid INT NOT NULL,
        purchaser CHAR(20) NOT NULL,
        PRIMARY KEY (cartid),
    );

    CREATE TABLE orders(

        ordersid INT NOT NULL AUTO_INCREMENT,
        totalItems INT NOT NULL,
        iventoryid INT NOT NULL,
        PRIMARY KEY (ordersid),
    );

   CREATE TABLE reviews(

        reviewid INT NOT NULL AUTO_INCREMENT,
        iventoryid INT NOT NULL,
        reviewText VARCHAR(200) NOT NULL,
        FOREIGN KEY (invetoryid) REFERENCES inventory,
        PRIMARY KEY (reviewid),
    );

    CREATE TABLE inventory(

        inventoryid INT NOT NULL AUTO_INCREMENT,
        sku VARCHAR(50) NOT NULL,
        brand VARCHAR(50) NOT NULL,
        model VARCHAR(50) NOT NULL,
        stockState VARCHAR(50) NOT NULL,
        stockQuanity INT NOT NULL,
        cost FLOAT NOT NULL,
        PRIMARY KEY (inventoryid),
    );