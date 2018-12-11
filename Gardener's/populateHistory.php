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
$user = $_SESSION["sessionUser"];
$str_json = file_get_contents('php://input');
$response = json_decode($str_json, true);
$account = $response['accountNumber'];


$sql = "Select * FROM transactions WHERE account = '$account'
ORDER BY dateTimeStamp DESC";
$result = $conn->query($sql);
echo "<h2>Account History</h2>";
echo "<table>
<tr>
<th>Balance</th>
<th>Description</th>
<th>Amount</th>
<th>Time</th>
</tr>";
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . "$" . $row['balance'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['transactionAmount'] . "</td>";
    echo "<td>" . $row['dateTimeStamp'] . "</td>";
    echo "<tr>";
}

echo "</table>";
?>
    
</body>
</html>
