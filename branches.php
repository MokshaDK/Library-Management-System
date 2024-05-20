<?php
	$connection=mysqli_connect("localhost:4306", "root","");
	$db=mysqli_select_db($connection,"library_db");
	$brid="";
	$brname="";
	$braddr="";
	$query="select * from branch";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	<link rel="stylesheet" type="text/css" href="css1.css">
	<script type="text/javascript" src="../bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap-4.0.0-dist/js/juqery_latest.js"></script>
</head>
<body>
	<div id="header">Library</div>
	<div id="navbar">
		<ul>
			<li><a href="file1.php">Home</a></li>
			<li><a href="books.php">Books</a></li>
			<li><a href="borrowers.php">Borrowers</a></li>
			<li><a href="borrowings.php">Borrowings</a></li>
			<li><a href="authors.php">Authors</a></li>
			<li><a href="publishers.php">Publishers</a></li>
			<li><a href="branches.php">Branches</a></li>
		</ul>
	</div>
	<div id="page">
		<br>
		<a href="addbr.php"><button type="button" class="button1">Add a new branch</button></a><br><br>
		<form>
			<table style="text-align: center; font-family: sans-serif; align-content: center;" align="center">
				<tr>
					<th width="10%">Branch ID</th>
					<th width="10%">Branch Name</th>
					<th width="10%">Branch Address</th>
				</tr>
				<?php
					$query_run=mysqli_query($connection,$query);
					while ($row=mysqli_fetch_array($query_run)){
					$brid=$row['Branch_ID'];
					$brname=$row['Branch_Name'];
					$braddr=$row['Branch_Address'];
				?>
				<tr>
					<td><?php echo $brid ?></td>
					<td><?php echo $brname ?></td>
					<td><?php echo $braddr ?></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
</body>
</html>