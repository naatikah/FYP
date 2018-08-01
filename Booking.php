<?php
session_start();
if($_SESSION['status']=='2' || $_SESSION['status']=='3') {
    header("Location: Login.php");
    die();
}
include "dbh.php";
$query="SELECT * FROM station s, district d WHERE d.DistrictID = s.DistrictID";
$result=mysqli_query($link,$query) or die(mysqli_error($link));
$row=mysqli_fetch_array($result);
if(!empty($row)){
        $stationid=$row['StationID'];
        $station=$row['Station'];
        $districtid=$row['DistrictID'];
        $district=$row['District'];
    }

$query1="SELECT s.StationID, s.Station FROM station s, district d WHERE d.DistrictID = s.DistrictID ORDER BY s.DistrictID";
$result1=mysqli_query($link,$query1) or die(mysqli_error($link));
while($row=mysqli_fetch_assoc($result1)){
    $arrContent[]=$row;
}

$query3="SELECT * FROM timeslot";
$result3=mysqli_query($link,$query3) or die(mysqli_error($link));
$row=mysqli_fetch_array($result3);
if(!empty($row)){
        $slotid=$row['SlotID'];
        $meal=$row['Meal'];
    }
$query4="SELECT * FROM timeslot";
$result4=mysqli_query($link,$query4) or die(mysqli_error($link));
while($row=mysqli_fetch_assoc($result4)){
    $arrContents[]=$row;
}
$query5="SELECT * FROM district";
$result5=mysqli_query($link,$query5) or die(mysqli_error($link));
$row=mysqli_fetch_array($result5);
if(!empty($row)){
        $districtid=$row['DistrictID'];
        $district=$row['District'];
    } 
$query6="SELECT * FROM district";
$result6=mysqli_query($link,$query6) or die(mysqli_error($link));
while($row=mysqli_fetch_assoc($result6)){
    $arrContent2[]=$row;
}
?>
<!-- -->
<html>
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Food Culture</title>

    <script>
             
        function cancel() {
            location.href = "ViewBooking.php";
        }
        function ValidateFileUpload() {
    var fuData = document.getElementById('fileChooser');
    var FileUploadPath = fuData.value;
    if (FileUploadPath == '') {
    alert("Please upload an image");
} 
else {
    var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
    if (Extension == "gif" || Extension == "png" || Extension == "bmp"
            || Extension == "jpeg" || Extension == "jpg") {

        if (fuData.files && fuData.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(fuData.files[0]);
        }} 
        else {
        alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
    }}}

    </script>
    <script>
        $(document).ready(function() {
             $("#District").change(function(){
                var did = $(this).val();
                var dataString = 'id='+ did;
            $.ajax({
                method: "post",
                url: "getstations.php",
                data: dataString,
                cache: false,
                success: function(response) {
                    $("#Station").html(response);
                }
            });
            });
         });
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
        <h1>Booking Request Application Details</h1>

        <form enctype="multipart/form-data" action="./docreatebooking.php" id="bookform" method="post" onsubmit="return confirm('Submit Booking?');">
            <div class="form-group">
            <div class="row">
                 <div class="col-md-4 mb-3">
                    <label for="Name">Preferred District: </label>
                     <select id="District" class="form-control District" name="District" required>
                        <option value disabled selected>--Select District--</option>
                                  <?php for ($i=0;$i<count($arrContent2);$i++){
                                    $districtID=$arrContent2[$i]['DistrictID'];
                                    $district=$arrContent2[$i]['District'];
                                    if ( $districtID !=$district) {?>
                                    
                                <option value=<?php echo $districtID ?>><?php echo $district ?></option>
                                <?php }}?>


                    </select>
                </div>
                <!--
                                                      include "dbh.php";
                                  $query7 = "SELECT * FROM district";
                                 $results=mysqli_query($link,$query7) or die(mysqli_error($link));
                                 while($row=mysqli_fetch_array($results)) {
                                    $id=$row['DistrictID'];
                                    $district=$row['District'];
                                    echo '<option value="'.$id.'">'.$district.'</option>';
 
                                  }?>-->
    
               <!-- <script src="stationnames.js"></script>
                <div class="col-md-4 mb-3">
                    <label for="Name">Preferred District: </label>
                    <select class="form-control" name="District" id="mainMenu" onchange="displayAccordingly()" required>
                        <option>Choose:</option>
                        <option value="1">North</option>
                        <option value="2">North-East</option>
                        <option value="3">East</option>
                        <option value="4">West</option>
                        <option value="5">Central</option>
                    </select>
                </div> -->
               
                
                 <!--<div class="col-md-4 mb-3">
                    <label for="StationName">Preferred MRT Station: </label>
                    <select id="station-list" class="form-control Station" name="Station">
                        <option value disabled selected>Select District First</option>
                    </select>
                </div> --> 


                    <div class="col-md-4 mb-3">
                        <label for="StationName">Preferred MRT Station: </label>
                        <select class="form-control" id="station_list" name="Station" required>
    
                                  <?php  for ($i=0;$i<count($arrContent);$i++){
                                    $stationID=$arrContent[$i]['StationID'];
                                    $station=$arrContent[$i]['Station'];
                                    if ( $stationID !=$station) {?>
                                    
                                <option value=<?php echo $stationID ?>><?php echo $station ?></option>
                                <?php }}?>
                        </select>       
                    </div>
            </div>
        </div>
        <!--<div class="container">

            <div class="form-group">
                <label for="title">Select District:</label>
                <select name="district" class="form-control">
                    <option value="">--- Select District ---</option>


                    <?php
                        include('dbconnect.php');
                        $sql="SELECT * FROM district";
                        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                       while($row=mysqli_fetch_assoc($result)) {

                        echo "<option value='".$row['DistrictID']."'>".$row['District']."</option>";
                       }
                    ?>


                </select>
            </div>


            <div class="form-group">
                <label for="title">Select Station:</label>
                <select name="station" class="form-control" style="width:350px">
                    <option selected="selected">--Select Station--</option>
                </select>
            </div>
</div>--> 

     <div class="form-group">
                <div class="col-md-4 mb-3">
                    <label class="control-label" for="BookDate">Date: </label>
                        <input type="date" name="BookDate" id="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" required/>
                </div>
            </div>


            <div class="form-group col-sm-4">
                <label class="control-label" for="TimeSlot">Meal: </label>
                <select class="form-control" name="Meal" id="Meal" required>
                       <option>Choose Mealtime: </option>
                        <option value="1">Lunch 12pm</option>
                        <option value="2">Afternoon Tea 3pm</option>
                        <option value="3">Dinner 5pm</option>
                </select>
            </div>
           <div class="form-group">
                <label class="control-label col-sm-3" for="NoMale">Number of Adult Males:</label><br>
                <div class="form-group col-sm-3">
                    <input type="text" pattern="[0-9]" name="NoMale" class="form-control numeric_value" id="NoMale" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="NoFemale">Number of Adult Females:</label><br>
                <div class="form-group col-sm-3">
                    <input type="text" pattern="[0-9]" name="NoFemale" class="form-control numeric_value" id="NoFemale" required><br>
                </div>
            </div>
 
            <div class="form-group">
                <label class="control-label col-sm-2" for="NoChild">Number of children (12 years and below):</label>
                <div class="form-group col-sm-3">
                    <input type="text" pattern="[0-9]" name="NoChild" class="form-control numeric_value" id="NoChild"><br>
                </div>
            </div>
        <script>
             $('.numeric_value').keyup(function() {
                var male = document.getElementById('NoMale').value;
                var female = document.getElementById('NoFemale').value;
                var child = document.getElementById('NoChild').value;
                var sum = 0;
                var adultamt = 40;
                var childamt = 30;
                var total = 0;

            $('.numeric_value').each(function() {
                    total = (adultamt * male) + (childamt * child) + (adultamt * female);
                    totala = (adultamt * male);
                    totalc = (childamt * child);
                     totalb = (adultamt * female);
                       });

                $('#total').val(total);
                 $('#totala').val(totala);
                  $('#totalc').val(totalc);
                document.getElementById("adultsm").innerHTML = "$40 * " + male + " = $" + totala;
                document.getElementById("adultsf").innerHTML = "$40 * " + female + " = $" + totalb;
                document.getElementById("children").innerHTML = "$30 * " + child + " = $" + totalc;
            });      
        </script>
        <h3>Estimated Costs</h3>
              <div class="alert alert-info col-sm-6">
            <strong>Cost of total adult males: </strong><div id="adultsm"></div><div id="totala"></div>
            <strong>Cost of total adult females: </strong><div id="adultsf"></div><div id="totalb"></div>
            <strong>Cost of total children: </strong><div id="children"></div><div id="totalc"></div>
            </div>

            <div class="form-group">
                <strong class="control-label col-sm-3" for="NoChild">Total Price of booking (USD$): </strong>
                <div class="form-group col-sm-3">
                    <input type="text" name="tot_amount" class="form-control" id="total" value"" readonly><br>
                </div>
            </div>
           


           <!-- <div class="form-group">
                <label class="control-label col-sm-3" for="NoChild">Calculation: </label>
                <div class="form-group col-sm-5">
                    <textarea type="text" class="form-control" rows="5" id="totala" readonly></textarea><br>
                </div>
            </div> -->

            <h1>About You</h1>
            <div class="form-group">
                <label class="control-label col-sm-2" for="VisitPurpose">Purpose of Visit: </label><br>
                <div class="form-group col-sm-8">
                    <textarea class="form-control" pattern="[A-Za-z0-9 -]+{3000}" placeholder="E.g Are you friends or family? Tell us why are you coming to visit? What are you looking forward to most? " rows="8" name="VisitPurpose" id="VisitPurpose" required></textarea>
                    <span>*Maximum 3000 Characters</span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-3" for="ParticipantInfo">Information of participants:</label><br>
                <div class="form-group col-sm-8">
                    <textarea class="form-control" name="ParticipantInfo" pattern="[A-Za-z0-9 -]+{3000}" rows="12" placeholder="Introduce each participant to the hosts with their name, age and profile. For Example, Name: ,Age: ,Profile: E.g Hobbies, jobs, school etc." id="ParticipantInfo" required></textarea>
                    <span>*Maximum 3000 Characters</span>
                </div>
            </div>

           <div class="form-group">
                        <label for="photo">Upload a Photo</label>
                        <div class="col-md-10">                           
                                <input type="file" id="fileChooser" name="dataFile" onchange="return ValidateFileUpload()">
                                <img src="" id="blah">
                        </div>
                    </div>

           <!-- <div class="form-group">
                <label for="image-upload">Upload a Photo</label>
                <input type="file" name="dataFile1" id="fileChooser"   /><br>
                <img src="" id="blah">
            </div> -->

            <div class="form-group">
                <label class="control-label col-sm-2" for="HostType">Preferred host type <br> (If any): </label>
                <div class="form-group col-sm-4">
                    <select class="form-control" name="HostType" id="HostType">
                        <option>Choose...</option>
                        <option>Couple</option>
                        <option>Family with children</option>
                        <option>Solo Host</option>
                        <option>Elderly</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Diet">Dietary Restrictions<br> (If any): </label>
                <div class="form-group col-sm-6">
                    <select class="form-control" name="Diet" id="Diet">

                        <option>Choose...</option>
                        <option value="Vegeterian">Vegeterian (Will eat animal products, but not meat, poultry or fish)</option>
                        <option value="Lactose Intolerant">Lactose Intolerant (Dairy free)</option>
                        <option value="Lacto-Vegeterian">Lacto-Vegeterian (Will not eat eggs, meat, poultry and fish)</option>
                        <option value="Vegan">Vegan (No consumption of animal products)</option>
                        <option value="Diabetic">Diabetic diet</option>
                        <option value="Gluten Free">Gluten free</option>
                    </select>
                </div>
            </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="otherinfo">Any other useful information?</label><br>
                    <div class="form-group col-sm-8">
                        <textarea class="form-control" name="Otherinfo" pattern="[A-Za-z0-9 -]+{3000}" rows="8" id="Otherinfo"></textarea>
                        <span>*Maximum 3000 Characters</span>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button class="btn btn-default" type="submit" onclick="cancel()">Cancel</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
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
