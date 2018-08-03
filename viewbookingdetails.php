<?php
session_start();

include "dbh.php";
$theID=$_GET['id'];
$query = "SELECT * FROM booking b, district d, station s, timeslot t WHERE d.DistrictID = b.DistrictID AND b.StationID = s.StationID AND b.SlotID = t.SlotID AND b.BookingID=$theID"; 

$result=mysqli_query($link,$query)or die(mysqli_error($link));

$row = mysqli_fetch_array($result);
if(!empty($row)){
    $district=$row['District'];
    $station=$row['Station'];
    $date=$row['BookDate'];
    $meal=$row['Meal'];
    $time=$row['Time'];
    $male=$row['NoMale'];
    $female=$row['NoFemale'];
    $child=$row['NoChild'];
    $visit=$row['VisitPurpose'];
    $pinfo=$row['ParticipantInfo'];
    $hosttype=$row['HostType'];
    $diet=$row['Diet'];
    $oinfo=$row['Otherinfo'];
    
}

$querya = "SELECT Name FROM booking b, images i WHERE i.BookingID = $theID";
$resulta=mysqli_query($link,$querya)or die(mysqli_error($link));

$rowa = mysqli_fetch_array($resulta);
if(!empty($rowa)) {
    $image = $rowa['Name'];
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
        function view() {
            location.href = "ViewBooking.php";
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
        <a class="navbar-brand" href="./index2.html">Food Culture</a>
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
                        <li class="nav-item"><a class="nav-link" href="./Viewpay.php">Payment Transactions</a></li>
                <li class="nav-item"><a class="nav-link" href="./EditProfile.html">Edit Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="./index.html">Log Off</a></li>
        </ul>
      </div>
    </nav> 
    <br><br><br>
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
                <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="District">Preferred location: </label>
                  <input type="text" class="form-control" placeholder="" name="District" value="<?php echo $district ?>" required readonly>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="Station">MRT Station: </label>
                  <input type="text" class="form-control"  placeholder="" name="Station" value="<?php echo $station ?>" required readonly>
                </div>
              </div>
            <div class="form-group">
                <div class="form-group">
                    <!-- Date input -->
                    <label class="control-label col-sm-2" for="BookDate">Booking Date: </label>
                    <div class="form-group col-sm-2">
                        <input class="form-control" name="BookDate" placeholder="" value="<?php echo $date?>" type="text" readonly />
                    </div>
                </div>

                <label class="control-label col-sm-2" for="time">Chosen Mealtime: </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" name="Meal" placeholder="" value="<?php echo $meal ?> <?php echo $time ?>" required readonly><br>
                </div>
            </div>

            <!-- Date input -->
            <div class="form-group">
                <label class="control-label col-sm-3" for="nummales">Number of adult males: </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="NoMale" value="<?php echo $male?>" required readonly><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="numfemales">Number of adult females: </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="NoFemale" value="<?php echo $female ?>" required readonly><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="numchildren">Number of children (12 Years and below): </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="NoChild" value="<?php echo $child ?>" required readonly><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="host_msg">Purpose of Visit: </label>
                <div class="form-group col-sm-8">
                    <textarea class="form-control" rows="8" name="VisitPurpose" readonly><?php echo $visit ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="memberdetails">Information of participants:</label>
                <div class="form-group col-sm-8">
                    <textarea class="form-control" rows="8" name="ParticipantInfo" readonly><?php echo $pinfo?></textarea>
                </div>
            </div>

          <div class="form-group row">
                        <label for="photo" class="col-md-2 col-form-label">Photo:</label>
                        <div class="col-md-10">    
                        <img src="uploads/<?php echo $image?>"/>
                        </div>
                    </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="hosttype">Preferred host type <br> (If any):</label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="HostType" value="<?php echo $hosttype ?>" readonly><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="diettext">Dietary Restrictions <br> (If any): </label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="Diet" value="<?php echo $diet?>" readonly><br>
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-sm-3" for="otherinfo">Other information: </label><br>
                    <div class="form-group col-sm-8"> 
                    <textarea class="form-control" rows="8" name="Otherinfo" readonly><?php echo $oinfo ?></textarea>
  
                  </div>
                  </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" type="submit" onclick="view()">Back</button>
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
