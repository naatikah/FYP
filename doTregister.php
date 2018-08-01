<?php
	session_start();
	include 'dbh.php';

	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$phone = $_POST['Phone'];
	$password = $_POST['Password'];
	$message = "";

	$sql = "INSERT INTO user(UserID, CountryID, RoleID, StatusID, DistrictID, SearchID, StationID, Email, NRIC, Name, Password, Phone, Address, Description, Subscribe) VALUES (NULL, NULL, 3, 1, NULL, 1, 1, '$email', NULL , '$name', '$password', $phone, NULL , NULL, 0)";


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