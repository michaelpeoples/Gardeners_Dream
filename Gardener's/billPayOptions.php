<?php
session_start();
include_once'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
.transfersButton{
    width: 90%;
    text-align: center;
    padding: 1%; 1%;
}
    select{
        border: none;
        padding: 1%; 1%;
        width: 100%;
        background-color: blue;
        opacity: .7;
        color: white;
        margin-bottom: 1%;
        margin-top: 1%;
    }
    .select-items{
        background-color: blue;
        opacity .7;
    }
    .select-selected {
        background-color: lightgrey;
        opacity: .7;
        color: white;
}
    input[type=submit]{
        border: none;
        width: 50%;
        color: white;
        background-color: blue;
        opacity: .7;
        border-radius: 5px;
        margin-top: 1%;
        margin-bottom: 1%;
        padding: 10px; 10px;
    }
    input[type=submit]:hover{
        background-color: white;
        color: blue;
    }
</style>
</head>
    
 <body>   
<?php
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

$sql = "Select * FROM account WHERE SSN1 = '$userSSN'";
$result = $conn->query($sql);
echo "<div class='transfersButton'>";
//echo "<h3>From:</h3>";
echo "<select name='fromAccount' form='billPayForm'><option value='0'>Choose an account to withdraw from</option>";
while($row = $result->fetch_assoc()){
    echo "<option value=" . $row['account'] . ">" . "Withdraw from: " ."$". $row['balance'] . " - " . $row['type'] . " Number - ". $row['account'] . "</option>";
}
echo "</select>";

?>

</body>
</html>    