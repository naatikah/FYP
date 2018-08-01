<?php
	include 'dbh.php';

	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$phone = $_POST['Phone'];
	$nric = $_POST['ric'];
	$address = $_POST['address'];
	$message = "";

	$sql = "INSERT INTO user(UserID, CountryID, RoleID, StatusID, DistrictID, SearchID, StationID, Email, NRIC, Name, Password, Phone, Address, Description, Subscribe) VALUES (NULL , NULL, 3, 1, 1, 1, 1, '$email', '$nric', '$name', '$password', $phone, '$address', NULL, 0)";


	$result = mysqli_query($link,$sql)or die(mysqli_error($link));

	if($result){
		$message = "User created successfully!";
	}
	else{
		$message - "Failed to create user";
	}
	mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
     echo $message
	?>
</body>
</html>