<?php
session_start();
//Include DB configuration file
include 'dbh.php';
//get booking id
$bookid = $_GET['id'];
$offerid = $_GET['oid'];
//Set useful variables for paypal form
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'foodculturesg@gmail.com'; //Business Email


    //Fetch products from the database
    $query = ("SELECT * FROM payment p, booking b, offer o, user u WHERE p.BookingID = $bookid AND u.UserID = p.UserID AND b.UserID = p.UserID");
    $result=mysqli_query($link,$query)or die(mysqli_error($link));
        $row=mysqli_fetch_array($result);
        if(!empty($row)) {
            $payid=$row['PaymentID'];
            $price=$row['Amount'];
            $tourist=$row['Name'];
            $quantity=$row['NoFemale'] + $row['NoMale'] + $row['NoChild'];
        } 
?>
    
   <!-- PaymentID: <?php echo $payid ?>
    BookingID: <?php echo $bookid?>
    Price: <?php echo $price ?>
    Host's Name: <?php echo $tourist?> -->
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <title>Food Culture</title>
    <script>
        function back() {
              window.history.back();
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
            <a class="navbar-brand" href="./index3.html">Food Culture</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="./aboutus.html">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="./ContactUs.html">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="./Testimonial.html">Testimonial</a></li>
                <li class="nav-item"><a class="nav-link" href="./HowItWorks.html">How It Works</a></li>
                <li class="nav-item"><a class="nav-link" href="./MailingList.html">Mailing List</a></li>
                <li class="nav-item"><a class="nav-link" href="./ViewOffer.php">View Offer</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="./ViewBooking.php">View Booking</a>
                        <a class="dropdown-item" href="./Booking.php">Make Booking</a>
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
        <h1>Payment</h1><hr>
    <h2>WE ACCEPT PAYPAL</h2>
    <img id="myImg" src="imgs/paypal-logo.png">
    <form action="<?php echo $paypalURL; ?>" name="frmPaypal" method="post">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="item_name" value="Food Culture Experience">
        <!-- Specify details about the item that buyers will purchase. -->

        <input type="hidden" name="bookingid" value="<?php echo $bookid ?>">
        <input type="hidden" name="paymentid" value="<?php echo $payid ?>">
        <input type="hidden" name="amount" value="<?php echo $price ?>">
        <input type="hidden" name="currencycode" value="SGD">
         <input type="hidden" name="quantity" value="1">
        <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault03">Payment ID </label>
                        <input type="text" class="form-control" id="validationDefault03" value="<?php echo $payid ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationDefault03">Booking ID </label>
                            <input type="text" class="form-control" id="validationDefault03" value="<?php echo $bookid?>" readonly>
                        </div>
                    </div>
                                     <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault03">Host Name: </label>
                                <input type="text" class="form-control" id="validationDefault03" value="<?php echo $tourist?>" readonly>
                            </div>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault03">Number of people </label>
                        <input type="text" class="form-control" id="validationDefault03" value="<?php echo $quantity ?>" readonly>
                    </div>
                </div>
   
                <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault03">Payment Amount(USD$): </label>
                                <input type="text" class="form-control" id="validationDefault03" value="<?php echo $price?>" readonly>
                            </div>
        <!-- Specify URLs -->
        <!--<input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>-->
        <input type='hidden' name='cancel_return' value='http://localhost:8080/FYP/cancel.php'>
        <!--<input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'> -->
        <input type='hidden' name='return' value='http://localhost:8080/FYP/success.php?oid=<?php echo $offerid ?>&pid=<?php echo $payid?>'>
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
           <p>
            <button type="button" class="btn btn-warning" onClick="javascript:history.go(-1)">Back</button>

            <!--<div id="paypal-button-container"></div> --></p>
            </div>
        </div>
        </form>
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