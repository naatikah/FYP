<?php
session_start();
include "dbh.php"; 
$id = $_GET['id'];
$query="DELETE FROM item WHERE OfferId='$id'";
$query1= "DELETE FROM offer WHERE OfferId = '$id'";
$result=mysqli_query($link,$query) or die(mysqli_error($link));
$result1=mysqli_query($link,$query1) or die(mysqli_error($link));
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