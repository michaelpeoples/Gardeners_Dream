<?php
session_start();
include_once'connection.php';
?>
<?php
$user = $_SESSION["sessionUser"];
$userSSN = "";

 $sql = "Select ssn FROM users WHERE username='$user'";
 $result = $conn->query($sql);

if($result->num_rows == 1){
 while($row = $result->fetch_assoc()){
      $userSSN = $row['ssn'];
 }  
$sql = "Select * FROM billpayers WHERE SSN='$userSSN'";
$result = $conn->query($sql); 
if($result->num_rows > 0){
 echo 1;
 }
}
?>