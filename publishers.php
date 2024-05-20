<?php
	$connection=mysqli_connect("localhost:4306", "root","");
	$db=mysqli_select_db($connection,"library_db");
	$pubname="";
	$pubaddress="";
	$pubphone="";
	$query="select * from publisher";
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
		<a href="addpub.php"><button type="button" class="button1">Add a new publisher</button></a><br><br>
		<form>
			<table style="text-align: center; font-family: sans-serif; align-content: center;" align="center">
				<tr>
					<th width="10%">Publisher Name</th>
					<th width="10%">Publisher Address</th>
					<th width="10%">Publisher Phone</th>
				</tr>
				<?php
					$query_run=mysqli_query($connection,$query);
					while ($row=mysqli_fetch_assoc($query_run)){
					$pubname=$row['Publisher_Name'];
					$pubaddress=$row['Publisher_Address'];
					$pubphone=$row['Publisher_Phone'];
				?>
				<tr>
					<td><?php echo $pubname ?></td>
					<td><?php echo $pubaddress ?></td>
					<td><?php echo $pubphone ?></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
</body>
</html>