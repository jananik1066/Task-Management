<?php
	$id = $_GET['id'];
	include 'db/db_config.php';

	date_default_timezone_set('Asia/Kolkata');
	//date_default_timezone_set('Asia/India');
	//echo "<script>alert('".date('d/m/Y h:i:s')."');</script>";
	echo date('d/m/Y h:i:s a');

	$sql = "UPDATE tasks SET status=1,completed_date='".date('Y-m-d H:i:s')."' WHERE sno=$id";

	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	header("Location: tasks.php");
?>