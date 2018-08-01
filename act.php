<?php
session_start();
include "dbh.php"; 
$id = $_GET['id'];
$pid = $_GET['pid'];
$paydate=date("Y-m-d");
$paytime=date("H:i:s");
$query= "UPDATE offer SET StatusID = 11 WHERE OfferID = '$id'";
$result=mysqli_query($link,$query) or die(mysqli_error($link));

$query1= "UPDATE payment SET PayTime='$paytime', PayDate='$paydate' WHERE PaymentID = '$pid'";
$result=mysqli_query($link,$query1) or die(mysqli_error($link));

?>

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
         
        <title></title>
    </head>
    <body>
    <?php header("Location: viewoffer.php")?>
        
    </body>
</html>