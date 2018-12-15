<?php
 include_once'connection.php';
session_start();
?>
<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
    
$user = $_SESSION["sessionUser"];
$userSSN = "";

 $sql = "Select ssn FROM users WHERE username='$user'";
 $result = $conn->query($sql);
 while($row = $result->fetch_assoc()){
      $userSSN = $row['ssn'];
 }
    
$sql = "INSERT INTO billpayers (id, SSN, firstName, lastName, phone, email, address, city, state, zip) 
VALUES (1, '$userSSN', '$firstname', '$lastname', '$phone', '$email', '$address', '$city', '$state', '$zip')";
if($conn->query($sql) === TRUE){
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
header("Location:billPayHome.html");
?>