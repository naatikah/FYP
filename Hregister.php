﻿<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Food Culture</title>
    <script>
        function HReg() {
            location.href = "Payment.html";
        }

        function Cancel() {
            location.href = "index.html";
        }
    </script>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="./Login.html">Host Login</a>
                        <a class="dropdown-item" href="./TLogin.html">Tourist Login</a>
                        <a class="dropdown-item" href="./ALogin.html">Admin Login</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="./Register.html">Host Register</a>
                        <a class="dropdown-item" href="./TRegister.html">Tourist Register</a>
                    </div>
                <li>
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
        <h1>Register with us!</h1>
        <form class="form-horizontal">
            <form action="doHregister.php" method="post">

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Full Name:</label>
                    <input pattern="[A-Z][A-Za-z -]+" type="text" class="form-control" name="Name" id="name" placeholder="E.g Mark Lee" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Email Address:</label>
                    <input type="email" class="form-control" name="Email" id="email" placeholder="" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Password:</label>
                    <input type="text" class="form-control" name="Password" id="pw" placeholder="" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Confirm Password:</label>
                    <input type="text" class="form-control" id="pw2" placeholder="" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="phonenum">Phone Number:</label>
                    <input type="text" class="form-control" name="Phone" id="phone" placeholder="E.g 123456789" required pattern="[0-9]{8}">
                    <span>*Exclude spaces</span>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">NRIC</label>
                    <input type="text" class="form-control" name="NRIC" id="nric" placeholder="Enter NRIC no. (capitalized)" pattern="[STFG][0-9]{7}[A-Z]" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 mb-3">
                    <label for="image-upload">Upload NRIC photo:</label>
                    <input type="file" class="form-control" id="image-upload">
                </div>
            </div>

            <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="Name">Preferred District: </label>
                     <select class="form-control" name="DistrictID" id="mainMenu" onchange="displayAccordingly()" required>
                        <option value="">Choose: </option>
                        <option value="north">North</option>
                        <option value="south">South</option>
                        <option value="east">East</option>
                        <option value="west">West</option>
                        <option value="central">Central</option>
                    </select>
                    </div>
                    <div class="col-md-4 mb-3">
                            <label for="StationName">Nearest MRT Station: </label>
                        <div name="StationID" id="StationName"></div>
                    </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="address">Address: </label>
                <div class="form-group col-sm-8">
                        <textarea class="form-control" rows="4" name="Address" id="address"></textarea>
                </div>
            </div> 
  

            <div>
                <button type="button" class="btn btn-danger" onclick="Cancel()">Cancel</button>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

        </form>
        </div>

            </div>
        </div>
    </div>
    <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <label>Konbanwa</label>
        <input type="text" class="form-control" />
    </div> -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/tether/dist/js/tether.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="stationnames.js"></script>
</body>
</html>