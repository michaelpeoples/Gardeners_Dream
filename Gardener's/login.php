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

    

    $sql = "Select * FROM users WHERE username='$username' AND password='$password';";
    $result = $conn->query($sql);
    
    if($result->num_rows == 1){
        header("Location:accounts.html");
    }else{
        echo "Error: Incorrect username or password";
    }
    
    $_SESSION["sessionUser"] = $username;
    
   
?>
</body>
</html>