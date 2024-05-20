<?php
	$connection=mysqli_connect("localhost:4306", "root","");
	$db=mysqli_select_db($connection,"library_db");
	$id="";
	$fname="";
	$lname="";
	$address=NULL;
	$phone="";
	$email=NULL;

	$query="select * from borrower"
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
		<a href="addbor.php"><button type="button" class="button1">Add a new borrower</button></a><a><br><br>
		<a href="newbor.php"><button type="button" class="button1">Search for a borrower</button></a><br><br>
		<form>
			<table style="text-align: center; font-family: sans-serif; align-content: center;" align="center">
				<tr>
					<th width="17%">Borrower ID</th>
					<th width="17%">First Name</th>
					<th width="17%">Last Name</th>
					<th width="17%">Address</th>
					<th width="17%">Phone</th>
					<th width="19%">Email</th>
				</tr>
				<?php
					$query_run=mysqli_query($connection,$query);
	while ($row=mysqli_fetch_assoc($query_run)) {
		$id=$row['Borrower_ID'];
		$fname=$row['F_Name'];
		$lname=$row['L_Name'];
		$address=$row['Borrower_Address'];
		$phone=$row['Borrower_Phone'];
		$email=$row['Borrower_Email'];
	?>
				<tr>
					<td><?php echo $id ?></td>
					<td><?php echo $fname ?></td>
					<td><?php echo $lname ?></td>
					<td><?php echo $address ?></td>
					<td><?php echo $phone ?></td>
					<td><?php echo $email ?></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
</body>
</html>