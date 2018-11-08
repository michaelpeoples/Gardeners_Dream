<?php
session_start();
include_once'connection.php';
?>

<?php
$fromAccount = $_POST['fromAccount'];
$toAccount = $_POST['toAccount'];
$amount = $_POST['amount'];

echo $fromAccount . " " . $toAccount . " " . $amount;
?>