<?php
session_start();
include "dbh.php";
$query = "SELECT * FROM offer o, user u, booking b, status s WHERE o.UserID = u.UserID AND o.BookingID = b.BookingID AND o.StatusID = s.StatusID AND o.StatusID != '11' ORDER BY o.OfferID ";
$result=mysqli_query($link,$query)or die(mysqli_error($link));
while($row=mysqli_fetch_array($result)){
    $arrContent[]= $row;
}

$query2 = "SELECT * FROM offer o, user u, booking b, status s WHERE o.UserID = u.UserID AND o.BookingID = b.BookingID AND o.StatusID = s.StatusID AND o.StatusID = '11'";
$result2=mysqli_query($link,$query2)or die(mysqli_error($link));
while($row2=mysqli_fetch_array($result2)){
    $arrContent2[]= $row2;
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
        location.href = "SubmitReview.html";
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
        <h1>View Pending Offer</h1>
        <table class="table table-hover">
            <thead>
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
                $bookid = $arrContent[$i]['BookingID'];
                $date = $arrContent[$i]['BookDate'];
                $time = $arrContent[$i]['Meal'];
                $status = $arrContent[$i]['Status'];

            ?>
                
                <tr>
                    <td><?php echo $bookid ?></td>
                    <td><?php echo $hostname ?></td>
                    <td>North</td>
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
                </tr>
                <?php
            }
                ?>
            </tbody>
        </table>
        <h1>View Accpeted Offer</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Host Name</th>
                    <th scope="col">Host's Location</th>
                    <th scope="col">Booking ID</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    for($i=0;$i<count($arrContent2);$i++){
                        $id = $arrContent2[$i]['OfferID'];
                        $hostname = $arrContent2[$i]['Name'];
                        $bookid = $arrContent2[$i]['BookingID'];
                        $date = $arrContent2[$i]['BookDate'];
                        $status = $arrContent2[$i]['Status'];

            ?>
                
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $hostname ?></td>
                    <td>North</td>
                    <td><?php echo $bookid ?></td>
                    <td><?php echo $date ?></td>
                    <td>
                        <form id="post" action="viewbookingdet.php?id=<?php echo $bookid ?>" method="POST">
                        <button class="btn btn-info" type="submit" >View Booking</button> 
                    </form>
                    </td>
                    <td><?php echo $status ?></td>
                </tr>
                <?php
            }
                ?>
            </tbody>
        </table>

        <br/>
        <div class="row row-content align-item-center">
            <button class="btn btn-danger" type="submit" onclick="back()">Back</button>
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
          <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/tether/dist/js/tether.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>