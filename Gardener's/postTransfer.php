<?php
session_start();
include_once'connection.php';
?>

<?php
$fromAccount = $_POST['fromAccount'];
$toAccount = $_POST['toAccount'];
$amount = $_POST['amount'];

//Withdraw from account

$sql = "UPDATE account
        SET balance = balance - $amount
        WHERE account = $fromAccount";
$result = $conn->query($sql);

//Deposit into account
 
$sql = "UPDATE account
        SET balance = balance + $amount
        WHERE account = $toAccount";
$result = $conn->query($sql);

header("Location:accounts.html");
    
?>