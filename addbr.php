<?php
	$connection = mysqli_connect("localhost:4306", "root","");
	$db = mysqli_select_db($connection,'library_db');
	$brid="";
	$brname="";
	$braddr="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	<link rel="stylesheet" type="text/css" href="css1.css">
	<script type="text/javascript" src="../bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap-4.0.0-dist/js/juqery_latest.js"></script>
</head>
<body style="font-family: sans-serif;">
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
		<br><br>
		<form action="\lib\addbr.php" method="post">
			<table>
				<tr>
					<td><label>Branch ID: </label></td>
					<td><input type="number" name="idip" min="1"></td>
				</tr>
				<tr>
					<td><label>Branch Name: </label></td>
					<td><input type="text" name="nameip"></td>
				</tr>
				<tr>
					<td><label>Branch Address: </label></td>
					<td><input type="text" name="addip"></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="submit">
		</form>
		<?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$brid=$_POST['idip'];
				$brname=$_POST['nameip'];
				$braddr=$_POST['addip'];
				$query="insert into branch values($brid,'$brname','$braddr')";
					$run=mysqli_query($connection,$query);
				}
		?>
	</div>
</body>
</html>