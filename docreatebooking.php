<?php
include "dbh.php";
session_start();


$targetPath = "uploads/";

$fileName = basename($_FILES["dataFile"]["name"]);
$completePath = $targetPath . $fileName;


    $district=$_POST['District'];
    $station=$_POST['Station'];
    $bookdate=strtotime($_POST['BookDate']);
    $bookdate=date("Y-m-d", $bookdate);
    $meal=$_POST['Meal'];
    $male=$_POST['NoMale'];
    $female=$_POST['NoFemale'];
    $child=$_POST['NoChild'];
    $visitp=$_POST['VisitPurpose'];
    $pinfo=$_POST['ParticipantInfo'];
    $hosttype=$_POST['HostType'];
    $diet=$_POST['Diet'];
    $oinfo=$_POST['Otherinfo'];
    $createdon=date("Y-m-d");
    $pay=$_POST['tot_amount'];
    $paydate=date("Y-m-d");
    $paytime=date("H:i:s");
    $a=1;

$query="INSERT INTO booking(BStartDate, NoFemale, NoMale, NoChild, BookDate, VisitPurpose, ParticipantInfo, HostType, Diet, Otherinfo, DistrictID, StatusID, StationID, SlotID, UserID) 
VALUES ('$createdon', $female, $male, $child, '$bookdate', '$visitp', '$pinfo', '$hosttype', '$diet', '$oinfo', $district, 6, $station, $meal, 2)";


$resulta=mysqli_query($link,$query) or die(mysqli_error($link));

$last_id = mysqli_insert_id($link);

$query1="INSERT INTO payment(UserID, BookingID, Amount, PayDate, PayTime) VALUES(2,$last_id, $pay, '$paydate', '$paytime')";

$resultb=mysqli_query($link,$query1) or die(mysqli_error($link));

if (move_uploaded_file($_FILES["dataFile"]["tmp_name"], $completePath)) {
$query2="INSERT INTO images(BookingID, Name) VALUES($last_id, '$fileName')";

$resultc=mysqli_query($link,$query2) or die(mysqli_error($link));
}

if ($resulta && $resultb && $resultc) {
    $msg="<p>Booking has been created successfully!</p><br><p><a href='Booking.php'>Return to create booking</a></p><br><p><a href='viewbooking.php'>Return to view bookings</a></p>";
}
else {
    $msg="<p>Error creating booking!</p>";
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

            <?php echo $msg ?>
        </body>
</html>
<!-- $query1="SELECT LAST_INSERT_ID() FROM booking;
INSERT INTO payment(UserID, BookingID, Amount, PayDate, PayTime) 
VALUES(2,LAST_INSERT_ID,$pay, '$paydate', '$paytime');"

$resultInsert1=mysqli_query($link,$query1) or die(mysqli_error($link)); -->

<!--$targetPath = "uploads/";
$fileName = basename($_FILES['file']['name']);
$completePath = $targetPath . $fileName; -->