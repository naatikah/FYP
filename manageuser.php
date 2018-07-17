<?php
session_start();
include "dbconnect.php";


$query="SELECT * FROM user u, roles r, status s WHERE r.RoleID = u.RoleID AND s.StatusID = u.StatusID";
$result=mysqli_query($link,$query)or die(mysqli_error($link));

while($row=mysqli_fetch_assoc($result)){
    $arrContent[]=$row;
    }

    mysqli_close($link);
?>
<!DOCTYPE html>
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
        function newuser() {
            location.href = "createuser.html";
        }

        function updateuser() {
            location.href = "manageuser.php?id=<?php echo userid ?>";
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
                    <a class="navbar-brand" href="./index4.html">Food Culture</a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="./aboutus.html">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="./ContactUs.html">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="./Testimonial.html">Testimonial</a></li>
                        <li class="nav-item"><a class="nav-link" href="./HowItWorks.html">How It Works</a></li>
                        <li class="nav-item"><a class="nav-link" href="./MailingList.html">Mailing List</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="./ManageUser.html">Manage User</a>
                                <a class="dropdown-item" href="./ManageMailingList.html">Manage Mailing List</a>
                            </div>
                        <li>
                        <li class="nav-item"><a class="nav-link" href="./index.html">Manage Mailing List</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">Log Off</a>
                        </li>
                    </ul>
                </div>
            </nav><br><br><br>
<div class="container">
  <h2>Manage Users</h2>
  <p>Users are listed as below:</p>            
  <table class="table table-hover">
    <thead>
      <button class="btn btn-info" type="submit" onclick="newuser()">Create New User</button>
      <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Email</th>
        <th>Phone no.</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php
                    for($i=0;$i<count($arrContent);$i++){
                $userid=$arrContent[$i]['UserID'];
                $name=$arrContent[$i]['Name'];
                $role=$arrContent[$i]['Role'];
                $email=$arrContent[$i]['Email'];
                $phone=$arrContent[$i]['Phone'];
                $status=$arrContent[$i]['Status'];
      ?>
       <?php  $id=1;?>
      <tr>
        <td><?php echo $name ?></td>
        <td><?php echo $role ?></td>
        <td><?php echo $email ?></td>
         <td><?php echo $phone ?></td>
         <td><?php echo $status ?></td>
         <td><a href="updateuser.php?id=<?php echo $userid;?>">Update</a>
            <a href="deleteuser.php?id=<?php echo $userid;?>">Delete</a>
          <button class="btn btn-danger" type="submit">Deactivate</button>
      </td>
      </tr>
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
</body>
</html>
