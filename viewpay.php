<?php
include "dbh.php";
session_start();

$query = "SELECT * FROM payment p, booking b, user u, status s, offer o WHERE p.BookingID = b.BookingID AND u.UserID = p.UserID AND o.StatusID = s.StatusID AND o.BookingID = b.BookingID";

$result=mysqli_query($link,$query)or die(mysqli_error($link));

while($row=mysqli_fetch_array($result)){
  $arrContent[]=$row;
}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Food Culture</title>
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
                    </div>
                </li>
            <li class="nav-item"><a class="nav-link" href="./Viewpay.php">View Transactions</a></li>s
            <li class="nav-item"><a class="nav-link" href="./EditProfile.html">Edit Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.html">Log Off</a></li>
        </ul>
      </div>
    </nav>  <br><br><br>

    <div class="container">

    <h2>View Payment Transactions</h2>
    <p>Transactions are listed as below:</p>
    <!-- <select class="form-control col-sm-3" name="bystatus">
       <option>Select Status</option>
       <option value="offer">Pending Offer</option>
       <option value="cancel">Cancelled</option>
       <option value="confirm">Confirmed</option>
       <option value="complete">Completed</option>
      </div>-->      
    <table class="table table-hover">
      <thead>
         <tr>
          <th>Transaction ID</th>
          <th>Booking ID</th>
          <th>Paid on</th>
          <th>Amount</th>
          <th></th>
        </tr>
      </thead>

  <tbody>
   <?php
        for($i=0;$i<count($arrContent);$i++) {
            $paymentid=$arrContent[$i]['PaymentID'];
            $paydate=$arrContent[$i]['PayDate'];
            $paytime=$arrContent[$i]['PayTime'];
            $bookingid=$arrContent[$i]['BookingID'];
            $amount=$arrContent[$i]['Amount'];
            $statusid=$arrContent[$i]['StatusID'];
            ?>
  <?php if($statusid == "11" OR $statusid == "12") { ?>
   <tr>
    <td><?php echo $paymentid ?></td>
    <td><?php echo $bookingid ?></td>
    <td><?php echo $paydate ?> <?php echo $paytime ?></td>
     <td><?php echo $amount ?></td>
     <td> 
      <form id="post" action="EReceipt.php?id=<?php echo $paymentid ?>" method="POST">
      <button class="btn btn-primary" type="submit">View</button>
    </form>
        </td>
   </tr>
 </tbody>
 <?php } ?>
<?php } ?>
    </table>
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
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/tether/dist/js/tether.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>