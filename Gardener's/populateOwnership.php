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


$sql = "Select * FROM account WHERE account = '$account'";
$result = $conn->query($sql);
echo "<h2>Account Ownership</h2>";
echo "<table>
<tr>
<th>Linked Customer</th>
<th>Relationship Type</th>
<th>Account</th>
<th>Account Type</th>
</tr>";
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $row['person1'] . "</td>";
    echo "<td>" . $row['person1Type'] . "</td>";
    echo "<td>" . $row['account'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<tr>";
    if($row['person2'] != null)
    {
    echo "<tr>";
    echo "<td>" . $row['person2'] . "</td>";
    echo "<td>" . $row['person2Type'] . "</td>";
    echo "<td>" . $row['account'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<tr>";
    }
     if($row['person3'] != null)
    {
    echo "<tr>";
    echo "<td>" . $row['person3'] . "</td>";
    echo "<td>" . $row['person3Type'] . "</td>";
    echo "<td>" . $row['account'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<tr>";
    }
     if($row['person4'] != null)
    {
    echo "<tr>";
    echo "<td>" . $row['person4'] . "</td>";
    echo "<td>" . $row['person4Type'] . "</td>";
    echo "<td>" . $row['account'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<tr>";
    }
}
     
 echo "<td>" . "<div id='addOwner' " . "onclick=" . "addOwner(" . $account . ");" . ">" . "Add another Owner/Beneficiary" . "</div>" . "</td>";
echo "</table>";
?>
    
</body>
</html>