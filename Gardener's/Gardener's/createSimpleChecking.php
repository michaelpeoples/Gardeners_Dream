<?php
 include_once'connection.php';
  session_start();
?>

<?php

$user = $_SESSION["sessionUser"];
$userSSN = "";

$sql = "Select * FROM users WHERE username = '$user'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
   $userSSN = $row['ssn'];
}

$sql = "INSERT INTO account (account, balance, type, person1, SSN1, person2, SSN2, person3, SSN3, person4, SSN4)
VALUES ('default', '0', 'Simple Checking', '', '$userSSN', '', '', '', '', '', '')";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
    echo "A new account has been created.";
?>