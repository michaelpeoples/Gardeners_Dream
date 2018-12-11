<?php
 include_once'connection.php';
 session_start();
?>
<?php
$name = $_POST['name'];
$ssn = $_POST['ssn'];
$account = $_POST['account'];
$type = $_POST['ownershipType'];
    
    
$sql = "Select * FROM account WHERE account = '$account'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
   if($row['person1'] == null || $row['person1'] == "")
    {
        $sql = "UPDATE account 
           SET person1 = '$name', SSN1 = '$ssn', person1Type = '$type'
           Where account = '$account'";

        if($conn->query($sql) === TRUE){
   
        }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else if($row['person2'] == null || $row['person2'] == "")
    {
             $sql = "UPDATE account 
           SET person2 = '$name', SSN2 = '$ssn', person2Type = '$type'
           Where account = '$account'";

        if($conn->query($sql) === TRUE){
   
        }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
     else if($row['person3'] == null || $row['person3'] == "")
    {
           $sql = "UPDATE account 
           SET person3 = '$name', SSN3 = '$ssn', person3Type = '$type'
           Where account = '$account'";

        if($conn->query($sql) === TRUE){
   
        }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    {

    }
    }
    else if($row['person4'] == null || $row['person4'] == "")
    {
        $sql = "UPDATE account 
           SET person4 = '$name', SSN4 = '$ssn', person4Type = '$type'
           Where account = '$account'";

        if($conn->query($sql) === TRUE){
   
        }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    header("Location:accounts.html");
}
?>    