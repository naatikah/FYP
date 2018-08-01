﻿<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Become a Member!</title>
    <script>
        function Submit() {
            location.href = "index3.html";
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
        <h1>Register as a Tourist</h1>
        </br>
        <form class="form-horizontal" action = "doTregister.php" method="post">

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Full Name</label>
                    <input pattern="[A-Z][A-Za-z -]+" type="text" class="form-control" name="Name" id="name" placeholder="E.g Mark Lee" required>
                </div>
            </div>

              <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Email Address</label>
                    <input type="email" class="form-control" name="Email" id="email" placeholder="" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="Phone" id="phone" placeholder="E.g 123456789" required pattern="[0-9]{8}">
                    <span>*Exclude spaces</span>
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
                    <input type="text" class="form-control" name="pw2" id="pw" placeholder="" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="Name">Country: </label>
                    <select class="form-control" id="country" required>
                        <option value="USA">USA</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="China">China</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Germany">Germany</option>
                    </select>
                </div>
            </div>

            <div>
                <div class="col-md-4 mb-3">
                    <button type="button" class="btn btn-danger" onclick="Cancel()">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/tether/dist/js/tether.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>