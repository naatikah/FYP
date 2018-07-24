<?php
session_start();
include "dbh.php";
$bid = $_GET['id'];
$query = "SELECT * FROM booking b, user u, district d, timeslot t WHERE b.UserID = u.UserID AND b.BookingID = '$bid' AND b.DistrictID = d.DistrictID AND b.SlotID = t.SlotID";
$result=mysqli_query($link,$query)or die(mysqli_error($link));
while($row=mysqli_fetch_assoc($result)){
    $loc = $row['District'];
    $date = $row['BookDate'];
    $time = $row['Time'];
    $male = $row['NoMale'];
    $female = $row['NoFemale'];
    $child = $row['NoChild'];
    $pur = $row['VisitPurpose'];
    $part = $row['ParticipantInfo'];
    $hosttype = $row['HostType'];
    $diet = $row['Diet'];
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
            location.href = "viewoffer.php";
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
        <h2>View Booking Details</h2>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-2" for="location">Requested Location:</label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="hosttype" placeholder="" value="<?php echo $loc;?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <!-- Date input -->
                    <label class="control-label col-sm-2" for="date">Available Date: </label>
                    <div class="form-group col-sm-2">
                        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text" value="<?php echo $date;?>" readonly />
                    </div>
                </div>

                <label class="control-label col-sm-2" for="time">Available Timeslot: </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="time" placeholder="" value="<?php echo $time;?>" required readonly><br>
                </div>
            </div>

            <!-- Date input -->
            <div class="form-group">
                <label class="control-label col-sm-3" for="nummales">Number of adult males: </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="nummales" placeholder="" value="<?php echo $male;?>" required readonly><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="numfemales">Number of adult females: </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="numfemales" placeholder="" value="<?php echo $female;?>" required readonly><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="numchildren">Number of children (12 Years and below): </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="numchildren" placeholder="" value="<?php echo $child;?>" required readonly><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="host_msg">Purpose of Visit: </label>
                <div class="form-group col-sm-8">
                    <textarea class="form-control" rows="8" id="host_msg" readonly=""><?php echo $pur;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="memberdetails">Information of participants:</label>
                <div class="form-group col-sm-8">
                    <textarea class="form-control" rows="8" id="member details" readonly=""><?php echo $part;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="hosttype">Preferred host type <br> (If any):</label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="hosttype" placeholder="" value="<?php echo $hosttype;?>" readonly><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="diettext">Dietary Restrictions <br> (If any): </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="diettext" placeholder="" value="<?php echo $diet;?>" readonly><br>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" type="submit" onclick="back()">Back</button>
                </div>
            </div>
        </div>
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