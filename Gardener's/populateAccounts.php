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
tr:hover {
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
echo "<p>" . "Hello, " . $_SESSION["sessionUser"] . "!" . "</p>" . "<br><br><br><br>";

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
echo "<h2>My Accounts</h2>";
echo "<table>
<tr>
<th>Balance</th>
<th>Account Number</th>
<th>Type</th>
</tr>";
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . "$" . $row['balance'] . "</td>";
    echo "<td>" . "<div id='account' " . "onclick=" . "populateHistory(" . $row['account'] . ");" . $row["account"] . ">" . "<a href='accountHistory.html'>" . $row['account'] . "</a>" . "</div>" . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<tr>";
}

echo "</table>";
?>
   
</body>
</html>

