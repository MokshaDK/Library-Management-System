<?php
	$connection = mysqli_connect("localhost:4306", "root","");
	$db = mysqli_select_db($connection,'library_db');
	$isbn="";
		$title="";
		$branchid="";
		$author="";
		$publisher="";
		$totalcopies="";
		$currcopies="";
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
	<div id="page" style="font-family: sans-serif; font-size: 20px;">
		<br><br>
		<form action="\lib\bookform.php" method="post">
		<table>
			<tr>
				<td><label>Enter isbn: </label></td>
				<td><input name="isbnentr" type="number" name="isbnsrc"></td>
				<td><input type="submit" name="isbnsub"></td>
			</tr>
			<tr>
				<td><label>Enter book title: </label></td>
				<td><input name="titleentr" type="text" name="titlesrc"></td>
				<td><input type="submit" name="titlesub"></td>
			</tr>
			<tr>
				<td><label>Enter Author: </label></td>
				<td><input name="autentr" type="text" name="autsrc"></td>
				<td><input type="submit" name="autsub"></td>
			</tr>
			<tr>
				<td><label>Enter Publisher: </label></td>
				<td><input name="pubentr" type="text" name="pubsrc"></td>
				<td><input type="submit" name="pubsub"></td>
			</tr>
		</table>
	</form>
	<table style="text-align: center; font-family: sans-serif; align-content: center;" align="center">
				<tr>
					<th width="10%">ISBN</th>
					<th width="10%">Title</th>
					<th width="10%">Author</th>
					<th width="10%">Publisher</th>
					<th width="10%">Branch</th>
					<th width="10%">Total Copies</th>
					<th width="10%">Copies currently available</th>
				</tr>
	<?php
	if(isset($_POST['isbnsub'])){
		$isbnentr=$_POST['isbnentr'];

		$query="select b.isbn, b.title, a.author_name, p.publisher_name, c.branch_id, c.total_copies, c.copies_available from book as b,writtenby as w, author as a, publisher as p, copies as c where b.publisher_name=p.publisher_name and b.isbn=w.isbn and a.author_id=w.author_id and b.isbn=c.isbn and b.isbn='$isbnentr' ";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
		$isbn=$row['isbn'];
		$title=$row['title'];
		$branchid=$row['branch_id'];
		$author=$row['author_name'];
		$publisher=$row['publisher_name'];
		$totalcopies=$row['total_copies'];
		$currcopies=$row['copies_available'];
		?>
		<tr>
		<td><?php echo $isbn ?></td>
		<td><?php echo $title ?></td>
		<td><?php echo $author ?></td>
		<td><?php echo $publisher ?></td>
		<td><?php echo $branchid ?></td>
		<td><?php echo $totalcopies ?></td>
		<td><?php echo $currcopies ?></td>
	</tr>
		<?php
		}
	}
	else if(isset($_POST['titlesub'])){
		$titleentr=$_POST['titleentr'];

		$query="select b.isbn, b.title, a.author_name, p.publisher_name, c.branch_id, c.total_copies, c.copies_available from book as b,writtenby as w, author as a, publisher as p, copies as c where b.publisher_name=p.publisher_name and b.isbn=w.isbn and a.author_id=w.author_id and b.isbn=c.isbn and b.title like '%$titleentr%' ";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
		$isbn=$row['isbn'];
		$title=$row['title'];
		$branchid=$row['branch_id'];
		$author=$row['author_name'];
		$publisher=$row['publisher_name'];
		$totalcopies=$row['total_copies'];
		$currcopies=$row['copies_available'];
		?>
		<tr>
		<td><?php echo $isbn ?></td>
		<td><?php echo $title ?></td>
		<td><?php echo $author ?></td>
		<td><?php echo $publisher ?></td>
		<td><?php echo $branchid ?></td>
		<td><?php echo $totalcopies ?></td>
		<td><?php echo $currcopies ?></td>
	</tr>
		<?php
		}
	}
	else if(isset($_POST['autsub'])){
		$author=$_POST['autentr'];

		$query="select b.isbn, b.title, a.author_name, p.publisher_name, c.branch_id, c.total_copies, c.copies_available from book as b,writtenby as w, author as a, publisher as p, copies as c where b.publisher_name=p.publisher_name and b.isbn=w.isbn and a.author_id=w.author_id and b.isbn=c.isbn and a.author_name like '%$author%' ";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
		$isbn=$row['isbn'];
		$title=$row['title'];
		$branchid=$row['branch_id'];
		$author=$row['author_name'];
		$publisher=$row['publisher_name'];
		$totalcopies=$row['total_copies'];
		$currcopies=$row['copies_available'];
		?>
		<tr>
		<td><?php echo $isbn ?></td>
		<td><?php echo $title ?></td>
		<td><?php echo $author ?></td>
		<td><?php echo $publisher ?></td>
		<td><?php echo $branchid ?></td>
		<td><?php echo $totalcopies ?></td>
		<td><?php echo $currcopies ?></td>
	</tr>
		<?php
		}
	}
	else if(isset($_POST['pubsub'])){
		$pubentr=$_POST['pubentr'];

		$query="select b.isbn, b.title, a.author_name, p.publisher_name, c.branch_id, c.total_copies, c.copies_available from book as b,writtenby as w, author as a, publisher as p, copies as c where b.publisher_name=p.publisher_name and b.isbn=w.isbn and a.author_id=w.author_id and b.isbn=c.isbn and p.publisher_name like '%$pubentr%' ";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
		$isbn=$row['isbn'];
		$title=$row['title'];
		$branchid=$row['branch_id'];
		$author=$row['author_name'];
		$publisher=$row['publisher_name'];
		$totalcopies=$row['total_copies'];
		$currcopies=$row['copies_available'];
		?>
		<tr>
		<td><?php echo $isbn ?></td>
		<td><?php echo $title ?></td>
		<td><?php echo $author ?></td>
		<td><?php echo $publisher ?></td>
		<td><?php echo $branchid ?></td>
		<td><?php echo $totalcopies ?></td>
		<td><?php echo $currcopies ?></td>
	</tr>
		<?php
		}
	}
	?>
</table>
	</div>
</body>
</html>