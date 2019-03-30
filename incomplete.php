<?php
	$id = $_GET['id'];
	include 'db/db_config.php';

	$sql = "UPDATE tasks SET status=0,completed_date=NULL WHERE sno=$id";

	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	header("Location: completed.php");
?>