<?php 
include "dbh.php";
session_start();
$payid = $_GET['id'];
$query = "SELECT * FROM payment p, user u, booking b WHERE p.UserID = u.UserID AND p.PaymentID=$payid";
$result=mysqli_query($link,$query) or die(mysqli_error($link));

$row = mysqli_fetch_array($result);
if(!empty($row)){
    $bookid = $row['BookingID'];
    $name = $row['Name']; 
    $email = $row['Email'];
    $phone = $row['Phone'];
    $amount = $row['Amount'];
    $paydate = $row['PayDate'];
    $paytime = $row['PayTime'];
}      
            
mysqli_close($link);
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
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Food Culture</title>
    <script>
        function back() {
            location.href = "viewpay.php";
        }
        function send(){
            location.href = "sendreceipt.php";
        }
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
        <a class="navbar-brand" href="./index.html">Food Culture</a>
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
                        <a class="dropdown-item" href="./ViewBooking.php">View Booking</a>
                        <a class="dropdown-item" href="./Booking.php">Make Booking</a>
                                                <a class="dropdown-item" href="./viewpastbooking.php">View Past Booking</a>
                    </div>
                </li>
            <li class="nav-item"><a class="nav-link" href="./Viewpay.php">View Transactions</a></li>s
            <li class="nav-item"><a class="nav-link" href="./EditProfile.html">Edit Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.html">Log Off</a></li>
        </ul>
      </div>
    </nav> 
    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-8">
                    <h1>Food Culture </h1>
                    <p>Looking for non-touristy things to do in Singapore? Signing up for a Food Culture is a great way to experience the real Singapore. Learn about Singapore food and way of life by visiting homes from all around the country.</p>
                </div>
                <div class="col col-sm">
                    <img class="d-flex ml-3 img-thumbnail alight-self-center" src="imgs/sg-life.jpg" alt="sglife">
                </div>
            </div>
        </div>
    </header>
    <div class="container">
            <h1>Food Culture - Receipt</h1><hr>

            <h3>Dear <?php echo $name ?>,
            Thank you for your purchase!</h3><br>
                <h3>Purchase Details</h3>
            <p>
                <strong>Payment No:   </strong><?php echo $payid ?><br>
                <strong>Payment date: </strong><?php echo $paydate ?><br>
                <strong>Payment Time: </strong><?php echo $paytime ?><br>


            </p>

            <div class="row">

                <strong class="col-sm-4">Service details</strong>
                <strong class="col-sm-2">Price</strong>

            </div>
            <div class="row">
                  <div class="col-sm-4">Food Culture Experience</div>
                <div class="col-sm-2"><?php echo $amount ?></div>
            </div>
            &nbsp;
        <p>
            <b>TOTAL($USD): </b><?php echo $amount?>
        </p>

        <p>
            Please keep the receipt as proof of purchase
        </p>
        
        <p>
            Thank you for choosing us!<br>
            Food Culture
        </p>

            <p>Address: <br>
            Food Culture <br>
            #04-452,<br>
            Singapore 650131,<br>
            Singapore<br>
        <p>
            <button type="button" class="btn btn-warning" onclick="back()">Back</button>
           <!-- <button type="submit" class="btn btn-primary" onclick="send()">Email Receipt</button> -->
        </p>
    </div>
        <footer class="footer" id="div1">
        <div class="container">
            <div class="row">
                <div class="col-3 col-sm-4">
                    <h5>Links</h5>
                    <li><a href="./Index.html">Home</a></li>
                    <li><a href="./AboutUs.html">About Us</a></li>
                    <li><a href="./ContactUs.html">Contact Us</a></li>
                    <li><a href="./TNC.html">Terms & Condition</a></li>
                    <li><a href="./PrivacyPolicies.html">Privacy Policies</a></li>
                    <li><a href="./FAQ.html">FAQ</a></li>
                </div>
                <div class="col-6">
                    <h5>Our Address</h5>
                    <address>
                        131, Smith Avenue Road<br>
                        #04-452,<br>
                        Singapore 650131<br>
                        Sinagpore<br>
                        Phone: +6518273645<br>
                        Fax: +65172637262<br>
                        Email: foodculture@outlook.com
                    </address>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <p>© Copyright 2018 Food Culture</p>
                    </div>
                </div>
            </div>            
        </div>
    </footer>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/tether/dist/js/tether.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>