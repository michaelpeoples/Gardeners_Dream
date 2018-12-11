<?php
 include_once'connection.php';
?>
<?php

function newTransaction($account, $transactionAmount, $balance, $description, $conn){    
$sql = "INSERT INTO transactions (account, transactionAmount, balance, description, dateTimeStamp) 
VALUES ('$account', '$transactionAmount', '$balance', '$description', CURRENT_TIMESTAMP)";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
}
?>
