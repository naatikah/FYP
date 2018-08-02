<?php
	session_start();
	include "dbh.php";
	$bookingid = $_POST['BookingID'];
	$userid = $_SESSION['userid'];
	$comments = $_POST['Comments'];
	$message = "";

    // build sql insert query
	$sql = "INSERT INTO offer(OfferID, StatusID, UserID, BookingID, DistrictID, Comments) VALUES (NULL, 5, $userid, $bookingid, 1, '$comments')";

	$result = mysqli_query($link,$sql)or die(mysqli_error($link));

	if($result){
		$message = "Offer made successfully!";
	}
	else{
		$message = "Failed to create user";
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