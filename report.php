<?php
session_start();

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
	header("Location: login.php");

?>

<html>

<head>
	<title>Viewing Student Data</title>

	<head>

	<body>

		<h1>View Student Details </h1>

		<?php
		require("config.php");

		$sql = "SELECT * FROM form ORDER BY name";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) { 	?>

			<table width="600" border="1" cellspacing="0" cellpadding="3">

				<tr>
					<td align="center"><strong>Name</strong></td>
					<td align="center"><strong>ID</strong></td>
					<td align="center"><strong>Start Date</strong></td>
					<td align="center"><strong>End Date</strong></td>
					<td align="center"><strong>Number of Days</strong></td>
					<td align="center"><strong>Reason</strong></td>
					<td align="center"><strong>Status</strong></td>
				</tr>

				<?php
				while ($rows = mysqli_fetch_assoc($result)) {
				?>

					<tr>
						<td><?php echo $rows['name']; ?></td>
						<td><?php echo $rows['id']; ?></td>
						<td><?php echo $rows['Sdate']; ?></td>
						<td><?php echo $rows['Edate']; ?></td>
						<td><?php echo $rows['days']; ?></td>
						<td><?php echo $rows['reason']; ?></td>
						<td><?php echo $rows['status']; ?></td>
					</tr>

				<?php }


				mysqli_close($conn);
				?>

			</table>

		<?php }



		?>
		<button onclick="window.location.href='check_login.php';">Previous Page</button>
	</body>

</html>