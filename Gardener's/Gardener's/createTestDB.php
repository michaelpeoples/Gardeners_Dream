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
username VARCHAR(30) NOT NULL,
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
person2 VARCHAR(30),
SSN2 VARCHAR(30),
person3 VARCHAR(30),
SSN3 VARCHAR(30),
person4 VARCHAR(30),
SSN4 VARCHAR(30)
)";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}

$sql = "INSERT INTO account (account, balance, type, person1, SSN1, person2, SSN2, person3, SSN3, person4, SSN4)
VALUES ('10005000', '500.50', 'Checking', 'John Doe', '000-00-0000', '', '', '', '', '', '')";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
$sql = "INSERT INTO account (account, balance, type, person1, SSN1, person2, SSN2, person3, SSN3, person4, SSN4)
VALUES ('', '25000.50', 'Savings', 'John Doe', '000-00-0000', '', '', '', '', '', '')";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
$sql = "INSERT INTO users (id, username, password, ssn, email)
VALUES ('', 'admin', 'admin', '000-00-0000', 'admin@admin.com')";
if($conn->query($sql)===TRUE)
{
    echo "Test database successfully created. Should be available for you in your browser at localhost/phpmyadmin :)";
}else
{
    echo "Error: " . $conn->error;
}


    

?>