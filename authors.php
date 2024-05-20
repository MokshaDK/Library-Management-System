<?php
	$connection=mysqli_connect("localhost:4306", "root","");
	$db=mysqli_select_db($connection,"library_db");
	$authorid="";
	$authorname="";
	$query="select * from author";
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
		<a href="addauth.php"><button type="button" class="button1">Add a new author</button></a><br><br>
		<form>
			<table style="text-align: center; font-family: sans-serif; align-content: center;" align="center">
				<tr>
					<th width="5%">Author ID</th>
					<th width="5%">Author Name</th>
				</tr>
				<?php
					$query_run=mysqli_query($connection,$query);
					while ($row=mysqli_fetch_assoc($query_run)) {
					$authorid=$row['Author_ID'];
					$authorname=$row['Author_Name'];
				?>
				<tr>
					<td><?php echo $authorid ?></td>
					<td><?php echo $authorname ?></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
</body>
</html>