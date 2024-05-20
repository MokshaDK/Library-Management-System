<?php
	$connection=mysqli_connect("localhost:4306", "root","");
	$db=mysqli_select_db($connection,"library_db");
	$id="";
	$isbn="";
	$branch="";
	$bordate="";
	$duedate="";
	$amt="";
	$diff="";

	$query="select * from borr_with_amount order by Borrowing_Date desc"
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
		<a href="issue.php"><button type="button" class="button1">Issue A Book</button></a><a><br><br>
		<a href="return.php"><button type="button" class="button1">Return A Book</button></a><br><br><br>
		<form>
			<table style="text-align: left; font-family: sans-serif; align-content: center;" align="center">
				<tr>
					<th width="19%">Borrower ID</th>
					<th width="19%">ISBN</th>
					<th width="19%">Branch ID</th>
					<th width="19%">Borrowing Date</th>
					<th width="19%">Due Date</th>
					<th width="19%">Amt Due (Rupees)</th>
				</tr>
				<?php
					$query_run=mysqli_query($connection,$query);
	while ($row=mysqli_fetch_assoc($query_run)) {
		$id=$row['Borrower_ID'];
		$isbn=$row['ISBN'];
		$branch=$row['Branch_ID'];
		$bordate=$row['Borrowing_Date'];
		$duedate=$row['Due_Date'];
		$amt=$row['Amount_Due'];
	?>
				<tr>
					<td><?php echo $id ?></td>
					<td><?php echo $isbn ?></td>
					<td><?php echo $branch ?></td>
					<td><?php echo $bordate ?></td>
					<td><?php echo $duedate ?></td>
					<td><?php echo $amt ?></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
</body>
</html>