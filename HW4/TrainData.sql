-- Updated with normalized tables

CREATE DATABASE railway_data;
    
USE railway_data;

    CREATE TABLE passengers (
        passenger_id INT NOT NULL AUTO_INCREMENT,
        fullname varchar(25) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        passwords VARCHAR(255) NOT NULL,
        phoneNumber INT NOT NULL,
        email varchar(50) NOT NULL,
        gender varchar(10) NOT NULL,
        PRIMARY KEY (passenger_id,fullname),
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
        PRIMARY KEY (train_id,depature_station),
        );




    CREATE TABLE ticket (
        ticket_id INT NOT NULL AUTO_INCREMENT,
        passenger_id INT NOT NULL,
        train_id INT NOT NULL,
        ticket_class VARCHAR(25) NOT NULL,
        price INT NOT NULL,
        trip_date INT NOT NULL,
        tracker_number INT NOT NULL,
        PRIMARY KEY (ticket_id)
        FOREIGN KEY (train_id) REFERENCES train,
        FOREIGN KEY (passenger_id) REFERENCES passenger,
        );

    -- Normalized Verion Below for train

    CREATE TABLE ticketNormal1 (
        ticket_id INT NOT NULL AUTO_INCREMENT,
        tracker_number INT NOT NULL,
        ticket_class VARCHAR(25) NOT NULL,
        price INT NOT NULL,
        trip_date INT NOT NULL,
        passenger_id INT NOT NULL,
        train_id INT NOT NULL,
        PRIMARY KEY (ticket_id)
        FOREIGN KEY (train_id) REFERENCES train,
        FOREIGN KEY (passenger_id) REFERENCES passenger,
        );

    CREATE TABLE ticketNormal2point1 (
        passenger_id INT NOT NULL,
        train_id INT NOT NULL,
        tracker_number INT NOT NULL,
        price INT NOT NULL,
        PRIMARY KEY (tracker_number)
        FOREIGN KEY (train_id) REFERENCES train,
        FOREIGN KEY (passenger_id) REFERENCES passenger,
        );

    CREATE TABLE ticketNormal2point2 (
        ticket_id INT NOT NULL AUTO_INCREMENT,
        ticket_class VARCHAR(25) NOT NULL,
        trip_date INT NOT NULL,
        PRIMARY KEY (ticket_id, ticket_class)
        );

    CREATE TABLE station (
        station_id INT NOT NULL AUTO_INCREMENT,
        train_id INT NOT NULL,
        city VARCHAR(25) NOT NULL,
        state_us VARCHAR(25) NOT NULL,
        num_tracks INT NOT NULL,
        PRIMARY KEY (station_id)
        FOREIGN KEY (train_id) REFERENCES train,
        );
-- Normal forums for Station
    CREATE TABLE stationNormal1 (
        station_id INT NOT NULL AUTO_INCREMENT,
        city VARCHAR(25) NOT NULL,
        state_us VARCHAR(25) NOT NULL,
        num_tracks INT NOT NULL,
        train_id INT NOT NULL,
        PRIMARY KEY (station_id)
        FOREIGN KEY (train_id) REFERENCES train,
        );

    CREATE TABLE stationNormal2point1 (
        station_id INT NOT NULL AUTO_INCREMENT,
        city VARCHAR(25) NOT NULL,
        train_id INT NOT NULL,
        PRIMARY KEY (station_id)
        FOREIGN KEY (train_id) REFERENCES train,
        );
        
    CREATE TABLE stationNormal2point2 (
        station_id INT NOT NULL AUTO_INCREMENT,
        state_us VARCHAR(25) NOT NULL,
        num_tracks INT NOT NULL,
        PRIMARY KEY (station_id)
        );
    
    CREATE TABLE stationNormal3point1 (
        station_id INT NOT NULL AUTO_INCREMENT,
        state_us VARCHAR(25) NOT NULL,
        PRIMARY KEY (station_id)
        );
    CREATE TABLE stationNormal3point2 (
        station_id INT NOT NULL AUTO_INCREMENT,
        num_tracks INT NOT NULL,
        PRIMARY KEY (station_id)
        );
    CREATE TABLE stationNormal3point3 (
        station_id INT NOT NULL AUTO_INCREMENT,
        city VARCHAR(25) NOT NULL,
        train_id INT NOT NULL,
        PRIMARY KEY (station_id)
        FOREIGN KEY (train_id) REFERENCES train,
        );