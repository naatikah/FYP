<?php
session_start();

include ("dbh.php");

$id=$_POST['id'];

$query = "DELETE FROM payment WHERE BookingID = $id";
$result=mysqli_query($link,$query) or die(mysqli_error($link));

$query2 = "DELETE FROM images WHERE BookingID = $id";
$result2=mysqli_query($link,$query2) or die(mysqli_error($link));

$query1 = "DELETE FROM booking WHERE BookingID = $id";
$result1=mysqli_query($link,$query1) or die(mysqli_error($link));



if($result && $result1 && $result2) {
	$msg="Booking has been successfully cancelled!";
	$msg1="<p><a href='viewbooking.php'>Return to View Bookings</p>";
}
else {
	$msg="Booking is not successfully cancelled.";
	$msg1="<p><a href=''>Return to confirming to close page</p>";
}

mysqli_close($link);

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <!-- build:css css/main.css-->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/styles-old.css">
    <!-- endbuild -->
    <title>Riverside</title>
        
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
                <li class="nav-item"><a class="nav-link" href="./EditProfile.html">Edit Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.html">Log Off</a></li>
        </ul>
      </div>
    </nav>  <br><br><br>
<?php echo $msg ?>
<?php echo $msg1 ?>
    	  </body>
        
</html>
