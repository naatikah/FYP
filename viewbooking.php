<?php
include "dbconnect.php";
session_start();


$query = "SELECT * FROM booking b, user u, district d, status s, station st, timeslot ts WHERE b.UserID = u.UserID AND d.DistrictID = b.DistrictID 
AND b.StatusID = s.StatusID AND st.StationID = b.StationID AND ts.SlotID = b.SlotID";

$result=mysqli_query($link,$query)or die(mysqli_error($link));

while($row=mysqli_fetch_array($result)){
  $arrContent[]=$row;
}
?>

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
    <script>
    
      function offer() {
        location.href = "MakeOffer.html";
      }

      function view() {
        location.href = "viewbookingdetails.php";
      }

      function book() {
          location.href = "Booking.php";
      }

      function review() {
        location.href = "ViewReview.html";
      }
    </script>
        <style type="text/css">
        #div1 {
            background-color: #B3B3B3;
        }
    </style>
</head>
<body>
<form action="viewbookingdetails.php" method=post>
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
                <li class="nav-item"><a class="nav-link" href="./EditProfile.html">Edit Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.html">Log Off</a></li>
        </ul>
      </div>
    </nav>  <br><br><br>
    <div class="container">
    <h2>View Bookings</h2>
    <p>Bookings are listed as below:</p>            
    <table class="table table-hover">
    <button class="btn btn-info" type="submit" onclick="book()">Create New Booking</button>
      <thead>
         <tr>
          <th>Booking ID</th>
          <th>Tourist's Name</th>
          <th>District</th>
          <th>Start Date</th>
          <th>Meal Time</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>

  <tbody>
   <?php
        for($i=0;$i<count($arrContent);$i++) {
            $bookingid=$arrContent[$i]['BookingID'];
            $user=$arrContent[$i]['Name'];
            $district=$arrContent[$i]['District'];
            $startdate=$arrContent[$i]['BStartDate'];
            $mealtime=$arrContent[$i]['Meal'];
            $statusid=$arrContent[$i]['StatusID'];
            $status=$arrContent[$i]['Status'];
            ?>

        
    
   <tr>
    <?php if ($statusid == "5" OR $statusid == "6") {?>
    <td><?php echo $bookingid ?></td>
    <td><?php echo $user ?></td>
     <td><?php echo $district ?></td>
     <td><?php echo $startdate ?></td>
     <td><?php echo $mealtime ?></td>
     <td><?php echo $status ?></td>
     <td> <a href="viewbookingdetails.php?id=<?php echo $bookingid;?>">View Details</a>
          <a href="cancelbooking.php?id=<?php echo $bookingid;?>">Cancel Booking</a>
        </td>
   </tr>

   <?php } else { ?>
 <td><?php echo $bookingid ?></td>
    <td><?php echo $user ?></td>
     <td><?php echo $district ?></td>
     <td><?php echo $startdate ?></td>
     <td><?php echo $mealtime ?></td>
     <td><?php echo $status ?></td>
     <td> <a href="viewbookingdetails.php?id=<?php echo $bookingid;?>">View Details</a>


   <?php }?>
    <?php
  }
  ?>
        </tbody>
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
  </form>
</body>
</html>