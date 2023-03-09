CREATE DATABASE Rental_Project;

USE Rental_Project;

CREATE TABLE User (
                      UserID INT AUTO_INCREMENT PRIMARY KEY,
                      username VARCHAR(50) NOT NULL,
                      Password VARCHAR(50) NOT NULL,
                      UserType VARCHAR(10) NOT NULL,
                      CONSTRAINT chk_User_UserType CHECK (UserType IN ('landlord', 'tenant'))
);

INSERT INTO User
                    (username, Password, UserType) VALUES
                    ('john_doe', 'pass123', 'landlord'),
                    ('jane_doe', 'pass456', 'tenant');


CREATE TABLE Landlord (
                          LandlordID INT AUTO_INCREMENT PRIMARY KEY,
                          FirstName VARCHAR(50) NOT NULL,
                          LastName VARCHAR(50) NOT NULL,
                          Email VARCHAR(100) NOT NULL,
                          Phone VARCHAR(20) NOT NULL);

INSERT INTO Landlord
                        (FirstName, LastName, Email, Phone) VALUES
                        ('John', 'Doe', 'john.doe@example.com', '555-1234');

CREATE TABLE Tenant (
                        TenantID INT AUTO_INCREMENT PRIMARY KEY,
                        FirstName VARCHAR(50) NOT NULL,
                        LastName VARCHAR(50) NOT NULL,
                        Email VARCHAR(100) NOT NULL,
                        Phone VARCHAR(20) NOT NULL);

INSERT INTO Tenant
                        (FirstName, LastName, Email, Phone) VALUES
                        ('Jane', 'Doe', 'jane.doe@example.com', '555-2345');

CREATE TABLE Property (
                          PropertyID INT AUTO_INCREMENT PRIMARY KEY,
                          Name VARCHAR(50) NOT NULL,
                          Address VARCHAR(100) NOT NULL,
                          City VARCHAR(50) NOT NULL,
                          State VARCHAR(50) NOT NULL,
                          Zip VARCHAR(20) NOT NULL);

INSERT INTO Property
                        (Name, Address, City, State, Zip) VALUES
                        ('The Heights', '123 Main St', 'Anytown', 'CA', '12345'),
                        ('The Valley', '456 Elm St', 'Anytown', 'CA', '12345'),
                        ('The Pines', '789 Oak St', 'Anytown', 'CA', '12345');

CREATE TABLE Lease (
                       LeaseID INT AUTO_INCREMENT PRIMARY KEY,
                       StartDate DATE NOT NULL,
                       EndDate DATE NOT NULL,
                       Rent DECIMAL(10,2) NOT NULL);

INSERT INTO Lease
                    (StartDate, EndDate, Rent) VALUES
                    ('2022-01-01', '2022-12-31', 1500.00),
                    ('2022-06-01', '2023-05-31', 1200.00),
                    ('2022-03-01', '2023-02-28', 2000.00);

CREATE TABLE Payment (
                         PaymentID INT AUTO_INCREMENT PRIMARY KEY,
                         Date DATE NOT NULL,
                         Amount DECIMAL(10,2) NOT NULL);

INSERT INTO Payment
                        (Date, Amount) VALUES
                        ('2022-02-01', 1500.00),
                        ('2022-07-01', 1200.00),
                        ('2022-04-01', 2000.00);

CREATE TABLE Maintenance (
                             MaintenanceID INT AUTO_INCREMENT PRIMARY KEY,
                             Description VARCHAR(200) NOT NULL,
                             Date DATE NOT NULL,
                             Cost DECIMAL(10,2) NOT NULL);

INSERT INTO Maintenance
                            (Description, Date, Cost) VALUES
                            ('Replaced water heater', '2022-03-15', 500.00),
                            ('Painted interior walls', '2022-08-15', 1000.00),
                            ('Fixed leaky faucet', '2022-05-15', 50.00);
