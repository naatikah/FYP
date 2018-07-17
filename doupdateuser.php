<?php
session_start();
include ("dbconnect.php");

// include a php file that contains the common database connection codes

//retrieve computer details from the textarea on the previous page
//retrieve id from the hidden form field of the previous page
$userid=$_POST['user_id'];
$name=$_POST['name'];
$role=$_POST['role'];
$status=$_POST['status'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$description=$_POST['description'];
$nric=$_POST['nric'];
$msg="";
//build a query to update the table
$query="UPDATE user SET Name='$name', RoleID=$role, StatusID=$status , Email='$email',Password='$password', Phone='$phone', 
Address='$address', Description='$description', NRIC='$nric' WHERE UserID=$userid";

//update the record with the details from the form

//execute the query
$result=mysqli_query($link,$query) or die(mysqli_error($link));
//if statement to check whether the update is successful
//store the success or error message into variable $msg
if($result){
    $msg="<p>Profile updated successfully!</p>";
    $msg1="<p><a href='manageuser.php'>Return to Manage User page</a></p>";
} else{
    $msg="Error";
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Food Culture</title>
    <body>
        <nav class="navbar navbar-inverse navbar-toggleable-sm bg-inverse fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="./index4.html">Food Culture</a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="./aboutus.html">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="./ContactUs.html">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="./Testimonial.html">Testimonial</a></li>
                        <li class="nav-item"><a class="nav-link" href="./HowItWorks.html">How It Works</a></li>
                        <li class="nav-item"><a class="nav-link" href="./MailingList.html">Mailing List</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="./ManageUser.html">Manage User</a>
                                <a class="dropdown-item" href="./ManageMailingList.html">Manage Mailing List</a>
                            </div>
                        <li>
                        <li class="nav-item"><a class="nav-link" href="./index.html">Manage Mailing List</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">Log Off</a>
                        </li>
                    </ul>
                </div>
            </nav><br><br><br>
            <?php
            echo $msg;
            	echo $msg1;
            ?>
        </body>
        </html>