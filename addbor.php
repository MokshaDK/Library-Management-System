<?php
	$connection = mysqli_connect("localhost:4306", "root","");
	$db = mysqli_select_db($connection,'library_db');
	$id="";
	$fname="";
	$lname="";
	$addr="";
	$phone="";
	$email="";
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
		<p>Offline Registration- To be done at any of the library branches</p><br>
		<form action="\lib\addbor.php" method="post">
			<table>
				<tr>
					<td><label>Borrower ID: </label></td>
					<td><input type="number" name="idip" min="1"></td>
				</tr>
				<tr>
					<td><label>First Name: </label></td>
					<td><input type="text" name="fip"></td>
				</tr>
				<tr>
					<td><label>Last Name: </label></td>
					<td><input type="text" name="lip"></td>
				</tr>
				<tr>
					<td><label>Address: </label></td>
					<td><input type="text" name="addip" placeholder="optional"></td>
				</tr>
				<tr>
					<td><label>Phone: </label></td>
					<td><input type="number" name="phip" placeholder="10 digits"></td>
				</tr>
				<tr>
					<td><label>Email: </label></td>
					<td><input type="text" name="emip" placeholder="optional"></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="submit">
		</form>
		<br><br>
		<?php
			if(isset($_POST['submit'])){
				$id=$_POST['idip'];
				$fname=$_POST['fip'];
				$lname=$_POST['lip'];
				$addr=$_POST['addip'];
				$phone=$_POST['phip'];
				$email=$_POST['emip'];
				$borins="insert into borrower values($id,'$fname','$lname','$addr',$phone,'$email')";
				if (!($phone>999999999 & $phone<10000000000)) {
					echo "Invalid phone number- should be 10 digits long";
				}
				else{
					$run=mysqli_query($connection,$borins);
				}
			}
		?>
	</div>
</body>
</html>