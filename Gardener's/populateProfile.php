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

$sql = "Select * FROM users WHERE SSN = '$userSSN'";
$result = $conn->query($sql);
echo "<h2>My Profile</h2>";
echo "<table>
<tr>
<th>Name</th>
<th>Username</th>
<th>SSN</th>
<th>Email Address</th>
<th>Password</th>
</tr>";
echo "<tr>";
while($row = $result->fetch_assoc()){
    echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['ssn'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
}
echo "</tr>";
echo "</table>";

?>
    
</body>
</html>

