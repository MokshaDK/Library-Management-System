<?php
	$connection = mysqli_connect("localhost:4306", "root","");
	$db = mysqli_select_db($connection,'library_db');
	$isbn="";
	$title="";
	$branchid="";
	$authorid="";
	$publishername="";
	$num="";
	$n="";
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
		<p>Ensure the author and publisher details are already entered</p>
		<form action="\lib\addbook.php" method="post">
			<table>
				<tr>
					<td><label>ISBN: </label></td>
					<td><input type="number" name="isbnip" size="13" placeholder="13 digits"></td>
				</tr>
				<tr>
					<td><label>Title: </label></td>
					<td><input type="text" name="titleip"></td>
				</tr>
				<tr>
					<td><label>Author ID: </label></td>
					<td><input type="number" name="autip"></td>
				</tr>
				<tr>
					<td><label>Publisher Name: </label></td>
					<td><input type="text" name="pubip"></td>
				</tr>
				<tr>
					<td><label>Branch ID: </label></td>
					<td><input type="number" name="branchip"></td>
				</tr>
				<tr>
					<td><label>Number of copies: </label></td>
					<td><input type="number" name="numip"></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="submit">
		</form>
		<br><br>
		<?php
			if(isset($_POST['submit'])){
				$isbn=$_POST['isbnip'];
				$title=$_POST['titleip'];
				$branchid=$_POST['branchip'];
				$num=$_POST['numip'];
				$authorid=$_POST['autip'];
				$publishername=$_POST['pubip'];
				$query1="select * from author where Author_ID=$authorid";
				$result1=mysqli_query($connection,$query1);
				$query2="select * from publisher where Publisher_Name='$publishername'";
				$result2=mysqli_query($connection,$query2);
				$query3="select Branch_ID from branch where Branch_ID='$branchid'";
				$result3=mysqli_query($connection,$query3);
				$bookins="insert into book values('$isbn','$title','$publishername')";
				$writtenbyins="insert into writtenby values('$isbn','$authorid')";
				$copiesins="insert into copies values('$branchid','$isbn','$num','$num')";
				$query4="select * from book where ISBN='$isbn'";
				if (!($isbn>999999999999 & $isbn<10000000000000)) {
					echo "Invalid ISBN- should be 13 digits long";
				}
				else if(mysqli_num_rows($result1)<1){
					echo "Enter the Author first";
				}
				elseif (mysqli_num_rows($result2)<1) {
					echo "Enter the Publisher first";
				}
				elseif (mysqli_num_rows($result3)<1) {
					echo "Invalid Branch";
				}
				else{
					$run4=mysqli_query($connection,$query4);
					$n=mysqli_num_rows($run4);
					if(!($n>0)){
					$run1=mysqli_query($connection,$bookins);
					$run2=mysqli_query($connection,$writtenbyins);}
					$run3=mysqli_query($connection,$copiesins);
				}
			}
		?>
	</div>
</body>
</html>