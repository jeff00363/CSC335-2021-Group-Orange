CREATE DATABASE trainData;
    USE trainData;

        CREATE TABLE passenger (
        passenger_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
        fullname varchar(25) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        passwords VARCHAR(255) NOT NULL,
        phoneNumber INT NOT NULL,
        email varchar(50) NOT NULL,
        gender varchar(10) NOT NULL,
        PRIMARY KEY (userid,username)
        );

        CREATE TABLE train (
        train_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        depature_station varchar(25) NOT NULL,
        destination_station VARCHAR(25) NOT NULL UNIQUE,
        depature_time INT,
        est_arrival_time INT,
        depature_date INT,
        arrival_date INT,
        number_stops INT,
        train_capacity INT,
        depature_track INT,
        PRIMARY KEY (train_id,depature_station)
        );

        CREATE TABLE ticket (
        ticket_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        passenger_id INT,
        train_id INT,
        ticket_class VARCHAR(25) NOT NULL UNIQUE,
        price INT,
        trip_date INT,
        tracker_number INT,
        PRIMARY KEY (ticket_id)
        FOREIGN KEY (train_id) REFERENCES train,
        FOREIGN KEY (passenger_id) REFERENCES passenger,
        );

    CREATE TABLE station (
        ticket_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        train_id INT,
        city VARCHAR(25) NOT NULL UNIQUE,
        state_us VARCHAR(25) NOT NULL UNIQUE,
        num_tracks INT,
        PRIMARY KEY (station_id)
        FOREIGN KEY (train_id) REFERENCES train,
        );
