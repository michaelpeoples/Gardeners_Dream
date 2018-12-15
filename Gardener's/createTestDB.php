<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gardeners_dream";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE gardeners_dream";

if($conn->query($sql)===TRUE)
{
}else{
    echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Create Users Table
$sql = "CREATE TABLE users (
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(30) NOT NULL,
ssn VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}

//Create Accounts Table
$sql = "CREATE TABLE account (
account INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
balance float(32) NOT NULL,
type VARCHAR(30)  NOT NULL,
person1 VARCHAR(30) NOT NULL,
SSN1 VARCHAR(30) NOT NULL,
person1Type VARCHAR(30) NOT NULL,
person2 VARCHAR(30),
SSN2 VARCHAR(30),
person2Type VARCHAR(30) NOT NULL,
person3 VARCHAR(30),
SSN3 VARCHAR(30),
person3Type VARCHAR(30) NOT NULL,
person4 VARCHAR(30),
SSN4 VARCHAR(30),
person4Type VARCHAR(30) NOT NULL
)";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
//Create Accounts Table
$sql = "CREATE TABLE billpayers (
id INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
SSN VARChar(30) NULL,
firstName VARCHAR(30)  NULL,
lastName VARCHAR(30) NULL,
phone VARCHAR(30) NULL,
email VARCHAR(30) NULL,
address VARCHAR(30) NULL,
city VARCHAR(30) NULL,
state VARCHAR(30) NULL,
zip VARCHAR(30)
)";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
$sql = "CREATE TABLE billPays (
id INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
sendToAccount VARCHAR(30) NULL,
fromAccount VARCHAR(30) NOT NULL,
amount FLOAT(32) NOT NULL,
SSN VARCHAR(30) NOT NULL,
dateToSend DATE,
routing VARCHAR(30) NOT NULL
)";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
$sql = "CREATE Table transactions (
transactionsNumber INT(30) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
account INT(30) NOT NULL,
transactionAmount float(32) NOT NULL, 
balance float(32) NOT NULL,
description VARCHAR(150)  NOT NULL,
dateTimeStamp DATETIME
)";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}

$sql = "INSERT INTO account (account, balance, type, person1, SSN1, person1Type, person2, SSN2, person2Type, person3, SSN3, person3Type, person4, SSN4, person4Type)
VALUES ('10005000', '500.50', 'Checking', 'John Doe', '000-00-0000', 'Owner', 'Jack Doe', '111-11-1111', 'POD', '', '', '', '', '', '')";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
$sql = "INSERT INTO account (account, balance, type, person1, SSN1, person1Type, person2, SSN2, person2Type, person3, SSN3, person3Type, person4, SSN4, person4Type)
VALUES ('default', '10000.00', 'Checking', 'Bilbo Baggins', '222-22-2222', 'Owner', 'Frodo Baggins', '111-11-1111', 'POD', '', '', '', '', '', '')";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
$sql = "INSERT INTO account (account, balance, type, person1, SSN1, person1Type, person2, SSN2, person2Type, person3, SSN3, person3Type, person4, SSN4, person4Type)
VALUES ('default', '10000.00', 'Checking', 'Tyreek Hill', '333-33-3333', 'Owner', 'Travis Kelce', '444-44-4444', 'POD', '', '', '', '', '', '')";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
$sql = "INSERT INTO account (account, balance, type, person1, SSN1, person1Type, person2, SSN2, person2Type, person3, SSN3, person3Type, person4, SSN4, person4Type)
VALUES ('default', '25000.00', 'Savings', 'John Doe', '000-00-0000', 'Owner', 'Jack Doe', '111-11-1111', 'POD', '', '', '', '', '', '')";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
$sql = "INSERT INTO users (id, name, username, password, ssn, email)
VALUES ('default', 'Michael Peoples', 'admin', 'admin', '000-00-0000', 'admin@admin.com')";
if($conn->query($sql)===TRUE)
{
    echo "Test database successfully created. Should be available for you in your browser at localhost/phpmyadmin :)";
}else
{
    echo "Error: " . $conn->error;
}


    

?>