<?php
 include_once'connection.php';
?>
<!Doctype html>
<html>
<body>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPass = $_POST['confirmPass'];
$email = $_POST['email'];
$ssn = $_POST['ssn'];
    
$sql = "INSERT INTO users (username, password, email, ssn) 
VALUES ('$username', '$password', '$email', '$ssn')";

if($conn->query($sql) === TRUE){
   
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
header("Location:home.html");
?>
</body>
</html>