<?php
session_start();
include ("dbconnect.php");

$theID=$_GET['id'];

$query="SELECT * FROM user u, roles r,status s WHERE u.UserID=$theID AND r.RoleID = u.RoleID AND s.StatusID = u.StatusID"; 

$result=mysqli_query($link,$query) or die(mysqli_error($link));

$row = mysqli_fetch_array($result);
if (!empty($row)) {
     $user=$row['UserID'];
     $name=$row['Name'];
     $roleid=$row['RoleID'];
     $role=$row['Role'];
     $status=$row['Status'];
     $statusid=$row['StatusID'];
     $email=$row['Email'];
     $password=$row['Password'];
     $phone=$row['Phone'];
     $address=$row['Address'];
     $description=$row['Description'];
     $nric=$row['NRIC'];
}
$query1="SELECT * FROM roles WHERE RoleID != 4";
$result1=mysqli_query($link,$query1) or die(mysqli_error($link));
while($row=mysqli_fetch_assoc($result1)){
    $arrContent1[]=$row;
}

$query2="SELECT * FROM status WHERE StatusID = 1 OR StatusID = 3";
$result2=mysqli_query($link,$query2) or die(mysqli_error($link));
while($row=mysqli_fetch_assoc($result2)){
    $arrContent2[]=$row;
}

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css">
    <title></title>

    <script>
        function back() {
            location.href = "manageuser.html";

        }
        function submit() {
            location.href = "manageuser.html";
        }
        function ValidateFileUpload() {
            var fuData = document.getElementById('fileChooser');
            var FileUploadPath = fuData.value;
            var is = true;
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

                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(fuData.files[0]);
                        return is;
                    }
                }
                else {
                    alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.");
                    return is = false;
                }
            }
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
                        <a class="dropdown-item" href="#">Tourist Register</a>
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
        <h1>Edit User details</h1>
        <form action="doupdateuser.php" id="updateuserForm" onsubmit="return confirm('Are you sure you want to update?');" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user ?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name: </label>
                <div class="form-group col-sm-6">
                    <input class="form-control" pattern="[A-Z][A-Za-z -]+{80}" id="name" name="name" value="<?php echo $name ?>" placeholder="" type="text" required />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="role">User's Role: </label>
                <div class="form-group col-sm-4">
                    <select class="form-control" id="role" name="role" required>
                         <?php for ($i=0;$i<count($arrContent1);$i++){
                                    $roleid=$arrContent1[$i]['RoleID'];
                                    $role=$arrContent1[$i]['Role'];
                                    if ( $roleid !=$role) {?>
                                    
                                <option value=<?php echo $roleid ?>><?php echo $role ?></option>
                                <?php }}?>    
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="Status">User's Status: </label>
                <div class="form-group col-sm-4" required>
                    <select class="form-control" name="status" id="Status">
                         <?php for ($i=0;$i<count($arrContent2);$i++){
                                    $statusid=$arrContent2[$i]['StatusID'];
                                    $status=$arrContent2[$i]['Status'];
                                    if ( $statusid !=$status) {?>
                                    
                                <option value=<?php echo $statusid ?>><?php echo $status ?></option>
                                <?php }}?>  
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email: </label>
                <div class="form-group col-sm-6">
                    <input pattern="\w+@(hotmail|gmail|outlook|live|ymail)\.com" class="form-control" id="Email" name="email" placeholder="" value="<?php echo $email ?>" type="text" required />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password: </label>
                <div class="form-group col-sm-4">
                    <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" id="Password" value="<?php echo $password?>" name="password" placeholder="" type="text" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Phone">Phone Number: </label>
                <div class="form-group col-sm-4">
                    <input class="form-control" id="Phone" name="phone" placeholder="" value="<?php echo $phone ?>" type="text" required />
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-sm-2" for="Phone">NRIC: </label>
                <div class="form-group col-sm-4">
                    <input pattern="[ST][0-9]{7}[JZIHGFEDCBA]" class="form-control" id="NRIC" name="nric" placeholder="" value="<?php echo $nric ?>" type="text" required />
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <!-- Date input -->
                    <label class="control-label col-sm-2" for="address">Address: </label>
                    <div class="form-group col-sm-6">
                        <input class="form-control" id="Address" name="address" placeholder="" value="<?php echo $address ?>" type="text" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image-upload">Upload User Image</label>
                    <input type="file" name="dataFile" id="fileChooser" onchange="return ValidateFileUpload()"  /><br>
                    <img src="" id="blah" width=350px>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Description: </label>
                    <div class="form-group col-sm-8">
                        <textarea class="form-control" pattern="[A-Za-z0-9 -]+{3000}" rows="12" id="description" name="description" placeholder="" value="<?php echo $Description ?>"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button class="btn btn-default" type="submit" onclick="back()">Back</button>
                        <button class="btn btn-success" type="submit">Update</button>
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