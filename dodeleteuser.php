<?php
session_start();
include ("dbconnect.php");

$userid=$_POST['user_id'];

$query="DELETE FROM user WHERE UserID=$userid";
$query1="DELETE FROM booking WHERE UserID=$userid";

$result=mysqli_query($link,$query) or die(mysqli_error($link));
$result1=mysqli_query($link,$query1) or die(mysqli_error($link));


if ($result && $result1){
    $msg="User has been deleted successfully!";
    $msg1="<p><a href='manageuser.php'>Return to Manage User page</a></p>";
}
else {
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