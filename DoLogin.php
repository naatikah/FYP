<?php
	session_start();
	$msg = "";

	if(isset($_SESSION['UserID'])){
		$mg="You are already logged in.";
	}
	else{
		if(isset($_POST['email']) && isset ($_POST['password'])){
			$email_entered = $_POST['email'];
			$pass_entered = $_POST['password'];

			include ("dbh.php");

			$sql = "SELECT * FROM user WHERE Email='$email_entered' AND Password='$pass_entered'";
			$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_array($result);
				$_SESSION['userid'] = $row['UserID'];
				$_SESSION['name'] = $row['Name'];
				$_SESSION['role'] = $row['RoleID'];
				$_SESSION['status'] = $row['Status'];
			}
		}

		if(mysqli_num_rows($result) == 0){
			$msg ="Sorry, invalid email and/or password entered.";
			$msg .= "<p><a href='Login.php'>Go back to Login</p>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Food Culture</title>
</head>
<body>
	<?php header("Location: Home.php") ?>
</body>
</html>