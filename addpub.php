<?php
	$connection = mysqli_connect("localhost:4306", "root","");
	$db = mysqli_select_db($connection,'library_db');
	$pubname="";
	$pubaddress="";
	$pubphone="";
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
		<form action="\lib\addpub.php" method="post">
			<table>
				<tr>
					<td><label>Publisher Name: </label></td>
					<td><input type="text" name="nameip"></td>
				</tr>
				<tr>
					<td><label>Publisher_Address: </label></td>
					<td><input type="text" name="addip"></td>
				</tr>
				<tr>
					<td><label>Publisher_Phone: </label></td>
					<td><input type="number" name="numip" placeholder="10 digits"></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="submit">
		</form>
		<br>
		<?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$pubname=$_POST['nameip'];
				$pubaddress=$_POST['addip'];
				$pubphone=$_POST['numip'];
				if(!($pubphone>999999999 & $pubphone<100000000000)){
					echo "Invalid phone number-10digits";
				}
				else{
				$query="insert into publisher values('$pubname','$pubaddress',$pubphone)";
					$run=mysqli_query($connection,$query);
				}}
		?>
	</div>
</body>
</html>