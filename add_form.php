<?php
session_start();

if ($_SESSION["Login"] != "YES")
	header("Location: login.php");

if ($_SESSION["LEVEL"] == 3) {


	$name = $_POST["name"];
	$id = $_SESSION["id"];
	$days = $_POST["numdays"];
	$reason = $_POST["reason"];
	$status = "New Application";
	$Sdate = $_POST["start_date"];
	$Edate = $_POST["end_date"];

	$_SESSION["Start_Date"] = $Sdate;
	$_SESSION["End_Date"] =  $Edate;


	require("config.php");

	$sql = "INSERT INTO form(id, name, Sdate, Edate, days, reason, status) VALUES ('$id','$name','$Sdate','$Edate','$days', '$reason', '$status' )";

	if (mysqli_query($conn, $sql)) {
		echo "<h3>New record created successfully</h3>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	mysqli_close($conn);
	echo "<p> <a href= 'staff_main.php'> Go back to main page</a> </p>";
}
