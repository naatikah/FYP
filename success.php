<?php
include 'dbh.php';
session_start();
//Get payment information from PayPal
$offerid = $_GET['oid'];
$paymentid = $_GET['pid'];
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Food Culture</title>
    </script>
    <style type="text/css">
        #div1 {
            background-color: #B3B3B3;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-toggleable-sm bg-inverse fixed-top">
        <div class="container">
            <a class="navbar-brand" href="./index3.html">Food Culture</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="./aboutus.html">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="./ContactUs.html">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="./Testimonial.html">Testimonial</a></li>
                <li class="nav-item"><a class="nav-link" href="./HowItWorks.html">How It Works</a></li>
                <li class="nav-item"><a class="nav-link" href="./MailingList.html">Mailing List</a></li>
                <li class="nav-item"><a class="nav-link" href="./ViewOffer.html">View Offer</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="./ViewBooking.html">View Booking</a>
                        <a class="dropdown-item" href="./Booking.html">Make Booking</a>
                                                <a class="dropdown-item" href="./viewpastbooking.php">View Past Booking</a>
                    </div>
                </li>
                        <li class="nav-item"><a class="nav-link" href="./Viewpay.php">View Transactions</a></li>
                <li class="nav-item"><a class="nav-link" href="./EditTProfile.html">Edit Profile</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.html">Log Off</a>
                </li>
            </ul>
        </div>
    </nav><br><br><br>
    <h1>Your payment has been successful.</h1>
<form id="Post" action="act.php?id=<?php echo $offerid?>&pid=<?php echo $paymentid ?>" method="POST">
                        <button class="btn btn-success">Ok</button>
</form>
            </body>
        </html>


<!--paymentid = $_GET['paymentid']; 
$paymentamt = $_GET['amt'];;
$bookingid = $_GET['bookingid'];
$paydate=date("Y-m-d");
$paytime=date("H:i:s");
//Get product price from database
$query = "SELECT Amount FROM payment WHERE id = ".$paymentid;
$productResult = mysqli_query($link,$query) or die(mysqli_error($link));

$productRow = mysqli_fetch_assoc($productResult);
$productPrice = $productRow['amount'];

if(!empty($paymentid) && $paymentamt == $productPrice){
    //Check if payment data exists with the same TXN ID.
    $query1 = "SELECT PaymentID FROM payment";
    $prevPaymentResult =  mysqli_query($link,$query1) or die(mysqli_error($link));

    if(!empty($paymentRow)){

        $paymentRow = mysqli_fetch_assoc($prevPaymentResult);
        $last_insert_id = $paymentRow['PaymentID'];
    }else{
        //Insert tansaction data into the database
        $query2 = ("INSERT INTO payment(PaymentID, Amount, PayDate, PayTime, BookingID) VALUES('".$paymentid."','".$paymentamt."','".$paydate."','".$paytime."','".$bookingid."')");
        $insert = mysqli_query($link,$query1) or die(mysqli_error($link));
        $last_insert_id = mysqli_insert_id($insert);
    }-->