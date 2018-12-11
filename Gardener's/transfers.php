<?php
session_start();
include_once'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
.transfersButton{
    width: 90%;
    text-align: center;
    background-color: whitesmoke;
    margin: auto;
    padding: 1%; 1%;
}
    select{
        border: none;
        padding: 1%; 1%;
        width: 50%;
        background-color: blue;
        opacity: .7;
        color: white;
        margin-bottom: 1%;
        margin-top: 1%;
    }
    .select-items{
        background-color: blue;
        opacity .7;
    }
    .select-selected {
        background-color: lightgrey;
        opacity: .7;
        color: white;
}
    h2{
        text-align: center;
        margin: auto;
        background-color: white;
        color: blue;
        border-radius: 5px;
        opacity: .7;
    }
    h3{
        
        color: blue;
        font-weight: 100;
        border-radius: 5px;
        opacity: .7;
    }
    input[type=text]{
        border: none;
        width: 50%;
        padding: 1%; 1%;
    }
    input[type=submit]{
        border: none;
        width: 50%;
        color: white;
        background-color: blue;
        opacity: .7;
        border-radius: 5px;
        margin-top: 1%;
        margin-bottom: 1%;
        padding: 15px; 10px;
    }
    input[type=submit]:hover{
        background-color: white;
        color: blue;
    }
</style>
</head>
    
 <body>   
<?php
$user = $_SESSION["sessionUser"];
$userSSN = "";

 $sql = "Select ssn FROM users WHERE username='$user'";
 $result = $conn->query($sql);

if($result->num_rows == 1){
 while($row = $result->fetch_assoc()){
      $userSSN = $row['ssn'];
 }
}
else{
    echo "Error: Duplicate SSN in Database";
}

$sql = "Select * FROM account WHERE SSN1 = '$userSSN'";
$result = $conn->query($sql);
echo "<h2>Transfers</h2>" . "<br>" . "<br>";
echo "<div class='transfersButton'>";
//echo "<h3>From:</h3>";
echo "<select name='fromAccount' form='transferForm'><option value='0'>Choose an account to withdraw from</option>";
while($row = $result->fetch_assoc()){
    echo "<option value=" . $row['account'] . ">" . "Withdraw from: " ."$". $row['balance'] . " - " . $row['type'] . " Number - ". $row['account'] . "</option>";
}
echo "</select>";

echo "<br>";

$sql = "Select * FROM account WHERE SSN1 = '$userSSN'";
$result = $conn->query($sql);
//echo "<h3>To:</h3>";
echo "<select name='toAccount'form='transferForm'><option value='0'>Choose an account to deposit into</option>";
while($row = $result->fetch_assoc()){
    echo "<option value=" . $row['account'] . ">" . "Deposit into: " ."$". $row['balance'] . " - " . $row['type'] . " Number - ". $row['account'] . "</option>";
}
echo "</select>";
     
//echo "<h3>Amount:</h3>";
echo "<form method='POST' action='postTransfer.php' id='transferForm'>";
echo "<input type='text' placeholder='Amount' id='amount' name='amount'></input><br><br>";
echo "<input type='submit' value='submit'>";
echo "</from>";
echo "</div>";
     
?>

</body>
</html>    