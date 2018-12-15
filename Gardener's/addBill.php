<?php
 include_once'connection.php';
 session_start();
?>
<?php
$fromAccount = $_POST['fromAccount'];
$toAccount = $_POST['toAccount'];
$amount = $_POST['amount'];
$amount = $_POST['amount'];
$dateToSend = $_POST['dateToSend'];
$routing = $_POST['routing'];


$user = $_SESSION["sessionUser"];
$userSSN = "";

 $sql = "Select ssn FROM users WHERE username='$user'";
 $result = $conn->query($sql);

if($result->num_rows == 1){
 while($row = $result->fetch_assoc()){
      $userSSN = $row['ssn'];
 }
}
    
$sql = "INSERT INTO billpays (id, sendToAccount, fromAccount, amount, SSN, dateToSend, routing) 
VALUES ('default', '$toAccount', '$fromAccount', '$amount', '$userSSN', '$dateToSend', '$routing')";

if($conn->query($sql) === TRUE){
   
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  
  header("Location:billPayHome.html");
?>    