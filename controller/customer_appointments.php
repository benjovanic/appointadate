<?php
if (isset($_GET['delete_appointment'])) {
	$sql = "DELETE FROM appointment
			WHERE appointment_id = '{$mysqli->real_escape_string($_GET['delete_appointment'])}'
			AND customer_id = '{$_SESSION['customer_id']}'
			AND datetime > NOW()";
	$result = $mysqli->query($sql);
	$mysqli->error;

	if ($result) {
		$message = "The appointment has been deleted successfully.";
	}
	else {
		$errorMessage = "There has been an unexpected error, please try again.";
	}
}
?>