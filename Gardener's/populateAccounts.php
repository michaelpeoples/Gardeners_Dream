<?php
session_start();
include_once'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
    table {
    width: 50%;
    border-collapse: collapse;
    margin: auto;
}

table, td, th {
    border: 1px solid #ddd;
    padding: 5px;
}
th {
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: blue;
        color: white;
        opacity: .7;
}
tr:hover {
    background-color: #ddd;
}
h3{text-align: center;}
th {text-align: left;}
    
    p {float: right;}
</style>
</head>
    
 <body>   
<?php
echo "<p>" . "Hello, " . $_SESSION["sessionUser"] . "!" . "</p>" . "<br>";
echo "<h3>" . "Accounts" . "</h3>";

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

echo "<table>
<tr>
<th>Type</th>
<th>Account Number</th>
<th>Balance</th>
</tr>";
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['account'] . "</td>";
    echo "<td>" . "$" . $row['balance'] . "</td>";
    echo "<tr>";
}

echo "</table>";
?>
    
</body>
</html>

