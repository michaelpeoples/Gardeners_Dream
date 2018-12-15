<?php
session_start();
include_once'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
    border: 1px solid #ddd;
    padding: 5px;
}
th {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: blue;
        color: white;
        opacity: .7;
}
td:hover {
    background-color: #ddd;
}
    table{
        width: 90%;
         border-collapse: collapse;
        margin: auto;
    }
h2{
    text-align: center;
    color: blue;
    opacity: .7;
    }
th {
    text-align: left;
    }
    th, td{
        border-bottom: 1px solid lightgray;
        padding: 15px;
    }
    
    p {float: right;}
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

$sql = "Select * FROM billpays WHERE SSN = '$userSSN'";
$result = $conn->query($sql);
echo "<br><br><br>";
echo "<h2>My Bill Pays</h2>";
echo "<br>";
echo "<table>
<tr>
<th>Amount</th>
<th>Withdraw From</th>
<th>Pay To</th>
<th>Send On</th>
<th>Routing Number</th>
<th>Delete</th>
</tr>";
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . "$" . $row['amount'] . "</td>";
    echo "<td>" . $row['fromAccount'] . "</td>";
    echo "<td>" . $row['sendToAccount'] . "</td>";
    echo "<td>" . $row['dateToSend'] . "</td>";
    echo "<td>" . $row['routing'] . "</td>";
    echo "<td>" . "<div id='delete' " . "onclick=" . "deleteBill(" . $row['id'] . ");" . ">"  . "Delete" . "</div>" . "</td>";
    echo "<tr>";
}
echo "<td>" . "<div id='addBill' " . "onclick=" . "addBill();" . ">" . "Add another Bill Pay" . "</div>" . "</td>";
echo "</table>";
?>
   
</body>
</html>

