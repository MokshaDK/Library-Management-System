<?php
	$connection = mysqli_connect("localhost:4306", "root","");
	$db = mysqli_select_db($connection,'library_db');
	$id="";
	$isbn="";
	$branch="";
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
		<form action="\lib\return.php" method="post">
			<table>
				<tr>
					<td><label>Borrower ID: </label></td>
					<td><input type="number" name="idip"></td>
				</tr>
				<tr>
					<td><label>ISBN: </label></td>
					<td><input type="text" name="isbnip"></td>
				</tr>
				<tr>
					<td><label>Branch ID: </label></td>
					<td><input type="text" name="brip"></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="submit">
		</form>
		<br><br>
		<?php
			if(isset($_POST['submit'])){
				$id=$_POST['idip'];
				$isbn=$_POST['isbnip'];
				$branch=$_POST['brip'];
				$date=date('Y-m-d');
				$bordel="delete from borrowings where Borrower_ID='$id' and ISBN='$isbn' and Branch_ID='$branch'";
				if (!($isbn>999999999999 & $isbn<10000000000000)) {
					echo "Invalid isbn- should be 13 digits long";
				}
				else{
					$run=mysqli_query($connection,$bordel);
				}
			}
		?>
	</div>
</body>
</html>