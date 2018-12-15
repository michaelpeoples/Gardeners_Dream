<?php
session_start();
include_once'connection.php';
?>
<?php
$user = $_SESSION["sessionUser"];
$str_json = file_get_contents('php://input');
$response = json_decode($str_json, true);
$bill = $response['billID'];

 $sql = "DELETE FROM billpays WHERE id='$bill'";
    $result = $conn->query($sql);
    
    if($result->num_rows == 1){
        header("Location:accounts.html");
    }else{
        echo "Error: Incorrect username or password";
    }
?>