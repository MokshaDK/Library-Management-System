<?php
	$connection=mysqli_connect("localhost:4306", "root","");
	$db=mysqli_select_db($connection,"library_db");
	$branchid="";
	$isbn="";
	$title="";
	$totalcopies="";
	$currcopies="";

	$query="select * from copies natural join book"
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
		<a href="addbook.php"><button type="button" class="button1">Add a new book</button></a><a><br><br>
		<a href="bookform.php"><button type="button" class="button1">Search for a book</button></a><br><br>
		<form>
			<table style="text-align: center; font-family: sans-serif; align-content: center;" align="center">
				<tr>
					<th width="20%">ISBN</th>
					<th width="20%">Title</th>
					<th width="20%">Branch</th>
					<th width="20%">Total Copies</th>
					<th width="20%">Copies currently available</th>
				</tr>
				<?php
					$query_run=mysqli_query($connection,$query);
	while ($row=mysqli_fetch_assoc($query_run)) {
		$isbn=$row['ISBN'];
		$title=$row['Title'];
		$branchid=$row['Branch_ID'];
		$totalcopies=$row['Total_Copies'];
		$currcopies=$row['Copies_Available'];
	?>
				<tr>
					<td><?php echo $isbn ?></td>
					<td><?php echo $title ?></td>
					<td><?php echo $branchid ?></td>
					<td><?php echo $totalcopies ?></td>
					<td><?php echo $currcopies ?></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
</body>
</html>