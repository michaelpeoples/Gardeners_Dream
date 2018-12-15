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
$email = $_POST['email'];
$ssn = $_POST['ssn'];
$name = $_POST['name'];
    
$sql = "INSERT INTO users (id, name, username, password, email, ssn) 
VALUES ('default', '$name', '$username', '$password', '$email', '$ssn')";

if($conn->query($sql) === TRUE){
header("Location:accounts.html");
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
    $_SESSION["sessionUser"] = $username;
?>
</body>
</html>