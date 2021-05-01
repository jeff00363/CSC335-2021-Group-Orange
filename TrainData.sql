CREATE DATABASE [IF NOT EXISTS] railway_data;
    
USE railway_data;
    CREATE TABLE passenger (
        passenger_id INT NOT NULL AUTO_INCREMENT,
        fullname varchar(25) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        passwords VARCHAR(255) NOT NULL,
        phoneNumber INT NOT NULL,
        email varchar(50) NOT NULL,
        gender varchar(10) NOT NULL,
        PRIMARY KEY (passenger_id,username)
    );

    CREATE TABLE train (
        train_id INT NOT NULL AUTO_INCREMENT,
        depature_station varchar(25) NOT NULL,
        destination_station VARCHAR(25) NOT NULL UNIQUE,
        depature_time INT NOT NULL,
        est_arrival_time INT NOT NULL,
        depature_date INT NOT NULL,
        arrival_date INT NOT NULL,
        number_stops INT NOT NULL,
        train_capacity INT NOT NULL,
        depature_track INT NOT NULL,
        PRIMARY KEY (train_id,depature_station)
    );

    CREATE TABLE ticket (
        ticket_id INT NOT NULL AUTO_INCREMENT,
        passenger_id INT NOT NULL,
        train_id INT NOT NULL,
        ticket_class VARCHAR(25) NOT NULL UNIQUE,
        price INT NOT NULL,
        trip_date INT NOT NULL,
        tracker_number INT NOT NULL,
        PRIMARY KEY (ticket_id)
        FOREIGN KEY (train_id) REFERENCES train,
        FOREIGN KEY (passenger_id) REFERENCES passenger,
        );

    CREATE TABLE station (
        ticket_id INT NOT NULL AUTO_INCREMENT,
        train_id INT NOT NULL,
        city VARCHAR(25) NOT NULL UNIQUE,
        state_us VARCHAR(25) NOT NULL UNIQUE,
        num_tracks INT NOT NULL,
        PRIMARY KEY (station_id)
        FOREIGN KEY (train_id) REFERENCES train,
        );
