<?php
 include_once'connection.php';
 session_start();
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
$name = $_POST['name'];
    
$sql = "INSERT INTO users (name, username, password, email, ssn) 
VALUES ('$name', $username', '$password', '$email', '$ssn')";

if($conn->query($sql) === TRUE){
   
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$_SESSION["sessionUser"] = $username;
header("Location:accounts.html");
?>
</body>
</html>