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
<!--     <script>
        function Login() {
            location.href = "index4.html";
        }
    </script> -->
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
                            <li class="nav-item"><a class="nav-link" href="./ALogin.html">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="./RegisterUser.html">Register</a></li>
                        </ul>
                    </div>
                </nav><br><br><br>
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
        <div class="body"></div>
    <div class="grad"></div>
    <div class="header">

    </div><br>
    <div class="container">
            <h4>Login!</h4>
            <form name="login" action="DoLogin.php" method="post">
        <div class="login">
            <div class="form-row">
                <div class="col-md-3 mb-2">
                    <label for="name">Email Address:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-2">
                    <label for="name">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
            </div>
                <button class="btn btn-primary" type="submit" value="Login">Login</button> <br>

                <div><span style="color: red;" id="login_failed"></span></div>
        </div>
    </form>
    <h5>Don't Have an Account? Join us!</h5>
    <ul>
        <li><a href="RegisterUser.html">Register Here!</a></li>
    </ul>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/tether/dist/js/tether.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>