<?php
session_start();
include "dbh.php";
$query = "SELECT * FROM offer o, user u, booking b, status s, timeslot t,district d WHERE o.UserID = u.UserID AND o.BookingID = b.BookingID AND o.StatusID = s.StatusID AND o.StatusID = '5' AND b.SlotID = t.SlotID AND o.districtID = d.districtID  AND u.StatusID != '2' ORDER BY o.OfferID DESC";
$result=mysqli_query($link,$query)or die(mysqli_error($link));
$rcheck = mysqli_num_rows($result);
if($rcheck > 0){
    while($row=mysqli_fetch_array($result)){
    $arrContent[]= $row;
}}


$query2 = "SELECT * FROM offer o, user u, booking b, status s, timeslot t,district d  WHERE o.UserID = u.UserID AND o.BookingID = b.BookingID AND o.StatusID = s.StatusID AND o.StatusID = '11' AND b.SlotID = t.SlotID AND o.districtID = d.districtID AND u.StatusID != '2'";
$result2=mysqli_query($link,$query2)or die(mysqli_error($link));
$rcheck2 = mysqli_num_rows($result2);
if($rcheck2 > 0){
    while($row2=mysqli_fetch_array($result2)){
    $arrContent2[]= $row2;
}}

$query3 = "SELECT * FROM user u, booking b, status s, timeslot t WHERE b.UserID = u.UserID AND b.SlotID = t.SlotID AND b.StatusID = s.StatusID AND b.StatusID = 6 AND u.StatusID != '2'";
$result3=mysqli_query($link,$query3)or die(mysqli_error($link));
$rcheck3 = mysqli_num_rows($result3);
if($rcheck3 > 0){
    while($row3=mysqli_fetch_array($result3)){
    $arrContent3[]= $row3;
}}

$query4 = "SELECT * FROM offer o, user u, booking b, status s, timeslot t,district d  WHERE o.UserID = u.UserID AND o.BookingID = b.BookingID AND o.StatusID = s.StatusID AND o.StatusID = '12' AND b.SlotID = t.SlotID AND o.districtID = d.districtID";
$result4=mysqli_query($link,$query4)or die(mysqli_error($link));
$rcheck4 = mysqli_num_rows($result4);
if($rcheck4 > 0){
    while($row4=mysqli_fetch_array($result4)){
    $arrContent4[]= $row4;
}}

$query5 = "SELECT * FROM user u, booking b, status s, timeslot t WHERE b.UserID = u.UserID AND b.SlotID = t.SlotID AND b.StatusID = s.StatusID AND b.StatusID = 8 AND u.StatusID != '2'";
$result5=mysqli_query($link,$query5)or die(mysqli_error($link));
$rcheck5 = mysqli_num_rows($result5);
if($rcheck5 > 0){
    while($row5=mysqli_fetch_array($result5)){
    $arrContent5[]= $row5;
}}

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
        function myButton() {
            location.href = "BookingPayment.html";
        }

        function view() {
            location.href = "viewofferdetails.php";
        }
        function viewb() {
            location.href = "viewbookingdet.php";
        }

        function back(){
            location.href = "index3.html";
        }
        function review() {
        location.href = "SubmitReview.html";}
    </script>
        <style type="text/css">
        #div1 {
            background-color: #B3B3B3;
        }
        @import url('netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
        .accordion-toggle:after {
            font-family: 'FontAwesome';
            content: "\f078";    
            float: right;
        }
        .accordion-opened .accordion-toggle:after {    
            content: "\f054";    
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
                    </div>
                </li>
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
<div id="accordion">
  <div class="card">
    <div class="card-header" id="heading">
      <h2 class="mb-0">
        <a style="color: #900C3F;" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
          View Offer With Pending Acceptance
        </a>
      </h2>
    </div>

      <div id="collapse" class="collapse show" aria-labelledby="heading" data-parent="#accordion">
      <div class="card-body"> 
        <table class="table table-hover">
            <thead>
                <?php 
                if($rcheck > 0){
                ?>
                <tr>
                    <th scope="col">Booking ID</th>
                    <th scope="col">Host Name</th>
                    <th scope="col">Host's Location</th>
                    <th scope="col">Offer ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Timing</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for($i=0;$i<count($arrContent);$i++){ 
                $id = $arrContent[$i]['OfferID'];
                $hostname = $arrContent[$i]['Name'];
                $loc = $arrContent[$i]['District'];
                $bookid = $arrContent[$i]['BookingID'];
                $date = $arrContent[$i]['BookDate'];
                $time = $arrContent[$i]['Meal'];
                $status = $arrContent[$i]['Status'];

            ?>
                <tr>
                    <td><?php echo $bookid ?></td>
                    <td><?php echo $hostname ?></td>
                    <td><?php echo $loc ?></td>
                    <td><?php echo $id ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $time ?></td>
                    <td>
                        <form id="post" action="viewofferdetails.php?id= <?php echo $id ?>" method="POST">
                        <button class="btn btn-primary" type="submit">View Offer</button>
                            
                        </form>
                        <form id="post" action="viewbookingdet.php?id=<?php echo $bookid ?>" method="POST">
                        <button class="btn btn-info" type="submit" >View Booking</button>

                    </form>
                    </td>
                    <td><?php echo $status ?></td>
                     <td>
                        <form id="post" action="" method="POST">
                        <button class="btn btn-success" type="submit" >Chat</button> 
                    </td>
                </tr>
                <?php
            }}else{
                echo "No Offers Offered!";}
                ?>
            </tbody>
        </table>
              </div>
    </div>
  </div> <br/>

  <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingtwo">
      <h2 class="mb-0">
        <a style="color: #900C3F;" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
          View Booking With No Offer
        </a>
      </h2>
    </div>

          <div id="collapsetwo" class="collapse show" aria-labelledby="headingtwo" data-parent="#accordion">
      <div class="card-body"> 
        <table class="table table-hover">
            <thead>
                <?php 
                if($rcheck3 > 0){
            ?>
                <tr>
                    <th scope="col">Booking ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Timing</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for($i=0;$i<count($arrContent3);$i++){
                        $bookid = $arrContent3[$i]['BookingID'];
                        $date = $arrContent3[$i]['BookDate'];
                        $time = $arrContent3[$i]['Meal'];
                        $status = $arrContent3[$i]['Status'];
                ?>
                <tr>
                    <td><?php echo $bookid ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $time ?></td>
                    <td>
                        <form id="post" action="viewbookingdet.php?id=<?php echo $bookid ?>" method="POST">
                        <button class="btn btn-info" type="submit" >View Booking</button> 
                    </form>
                    </td>
                    <td><?php echo $status ?></td>
                    <td>
                        <form id="post" action="" method="POST">
                        <button class="btn btn-success" type="submit" >Chat</button> 
                    </td>
                </tr>
                <?php
            }}else{
                echo "No Bookings!";
            }
                ?>
            </tbody>
        </table>
        </div>
    </div>
  </div> <br/>

  <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingthree">
      <h2 class="mb-0">
        <a style="color: #900C3F;" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
          View Accpeted Offer
        </a>
      </h2>
    </div>

          <div id="collapsethree" class="collapse show" aria-labelledby="headingthree" data-parent="#accordion">
      <div class="card-body"> 
        <table class="table table-hover">
            <thead>
                 <?php 
                if($rcheck2 > 0){
            ?>
                <tr>
                    <th scope="col">Offer ID</th>
                    <th scope="col">Host Name</th>
                    <th scope="col">Host's Location</th>
                    <th scope="col">Booking ID</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Timing</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for($i=0;$i<count($arrContent2);$i++){
                        $id = $arrContent2[$i]['OfferID'];
                        $hostname = $arrContent2[$i]['Name'];
                        $loc = $arrContent[$i]['District'];
                        $bookid = $arrContent2[$i]['BookingID'];
                        $date = $arrContent2[$i]['BookDate'];
                        $time = $arrContent2[$i]['Meal'];
                        $status = $arrContent2[$i]['Status'];
                        ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $hostname ?></td>
                    <td><?php echo $loc ?></td>
                    <td><?php echo $bookid ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $time ?></td>
                    <td>
                        <form id="post" action="viewbookingdet.php?id=<?php echo $bookid ?>" method="POST">
                        <button class="btn btn-info" type="submit" >View Booking</button> 
                    </form>
                    <!--<form id="post" action="submitR.php?id=<?php //echo $bookid ?>" method="POST">
                        <button class="btn btn-warning" type="submit" >Review</button>
                    </form>-->
                    </td>
                    <td><?php echo $status ?></td>
                     <td>
                        <form id="post" action="" method="POST">
                        <button class="btn btn-success" type="submit" >Chat</button> 
                    </td>
                </tr>
                <?php
            }}else{
                echo "No Accpeted Offers!";}
                ?>
            </tbody>
        </table> </div>
    </div>
  </div> <br/>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingfour">
      <h2 class="mb-0">
        <a style="color: #900C3F;" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
          View Completed Offer
        </a>
      </h2>
    </div>

          <div id="collapsefour" class="collapse show" aria-labelledby="headingfour" data-parent="#accordion">
      <div class="card-body"> 
        <table class="table table-hover">
            <thead>
                <?php 
                if($rcheck4 > 0){
            ?>
                <tr>
                    <th scope="col">Offer ID</th>
                    <th scope="col">Host Name</th>
                    <th scope="col">Host's Location</th>
                    <th scope="col">Booking ID</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Timing</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for($i=0;$i<count($arrContent4);$i++){
                        $id = $arrContent4[$i]['OfferID'];
                        $hostname = $arrContent4[$i]['Name'];
                        $loc = $arrContent[$i]['District'];
                        $bookid = $arrContent4[$i]['BookingID'];
                        $date = $arrContent4[$i]['BookDate'];
                        $time = $arrContent4[$i]['Meal'];
                        $status = $arrContent4[$i]['Status'];
                        ?> 
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $hostname ?></td>
                    <td><?php echo $loc ?></td>
                    <td><?php echo $bookid ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $time ?></td>
                    <td>
                        <form id="post" action="viewbookingdet.php?id=<?php echo $bookid ?>" method="POST">
                        <button class="btn btn-info" type="submit" >View Booking</button> </form>
                        <!--<form id="post" action="viewR.php?id=<?php //echo $bookid ?>" method="POST">
                        <button class="btn btn-warning" type="submit" >View Review</button> </form>-->
                    </td>
                    <td><?php echo $status ?></td>
                </tr>
                <?php
            }}else{
                echo "No Completed Offers!";
            }
                ?>
            </tbody>
        </table></div>
    </div>
  </div><br/>

  <div id="accordion">
  <div class="card">
    <div class="card-header" id="heading5">
      <h2 class="mb-0">
        <a style="color: #900C3F;" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
          Saved Review Drafts
        </a>
      </h2>
    </div>

          <div id="collapse5" class="collapse show" aria-labelledby="heading5" data-parent="#accordion">
      <div class="card-body"> 
        <table class="table table-hover">
            <thead>
                <?php 
                if($rcheck5 > 0){
            ?>
                <tr>
                    <th scope="col">Booking ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Timing</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for($i=0;$i<count($arrContent5);$i++){
                        $bookid = $arrContent5[$i]['BookingID'];
                        $date = $arrContent5[$i]['BookDate'];
                        $time = $arrContent5[$i]['Meal'];
                        $status = $arrContent5[$i]['Status'];
                ?>
                <tr>
                    <td><?php echo $bookid ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $time ?></td>
                    <td>
                        <form id="post" action="viewSavedD.php?id=<?php echo $bookid ?>" method="POST">
                        <button class="btn btn-info" type="submit" >Saved Draft</button> 
                    </form>
                    </td>
                    <td><?php echo $status ?></td>
                    <td>
                        <form id="post" action="" method="POST">
                        <button class="btn btn-success" type="submit" >Chat</button> 
                    </td>
                </tr>
                <?php
            }}else{
                echo "No Drafts Saved!";
            }
                ?>
            </tbody>
        </table>
        </div>
    </div>
  </div> <br/>

        <br/>
        <div class="row row-content align-item-center">
            <button class="btn btn-danger" type="submit" onclick="back()">Back</button>
        </div>
    </div>
    </div></div></div><br/>
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