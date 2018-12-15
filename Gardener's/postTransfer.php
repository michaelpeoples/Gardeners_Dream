<?php
session_start();
include_once'connection.php';
include_once'newTransaction.php';
?>

<?php
$fromAccount = $_POST['fromAccount'];
$toAccount = $_POST['toAccount'];
$amount = $_POST['amount'];
$currentBalance = "";

//Withdraw from account
 $sql = "Select balance FROM account WHERE account='$fromAccount'";
 $result = $conn->query($sql);

if($result->num_rows == 1){
 while($row = $result->fetch_assoc()){
      $currentBalance = $row['balance'];
 }
}

if($currentBalance - $amount >= 0 && $fromAccount != $toAccount)
{
newTransaction($fromAccount, -$amount, $currentBalance - $amount, "Transfer from " . $fromAccount . " to " . $toAccount, $conn);
$sql = "UPDATE account
        SET balance = balance - $amount
        WHERE account = $fromAccount";
$result = $conn->query($sql);

//Deposit into account
 
$sql = "UPDATE account
        SET balance = balance + $amount
        WHERE account = $toAccount";
    $result = $conn->query($sql);
 
    
//Get Current balance of the account transfer to
$sql = "Select balance FROM account WHERE account='$toAccount'";
$result = $conn->query($sql);

if($result->num_rows == 1){
 while($row = $result->fetch_assoc()){
      $currentBalance = $row['balance'];
 }
}
    
//Update the transaction table with the information
newTransaction($toAccount, $amount, $currentBalance, "Transfer from " . $fromAccount, $conn);
$result = $conn->query($sql);

header("Location:accounts.html");
}
else{
    echo "Error processing Transaction";
}
    
?>

