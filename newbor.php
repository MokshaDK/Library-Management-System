<?php
	$connection = mysqli_connect("localhost:4306", "root","");
	$db = mysqli_select_db($connection,'library_db');
		$borid="";
		$borfname="";
		$borlname="";
		$borphone="";
		$boremail="";
		$boraddr="";
		$duedate="";
		$amtdue="";
		$isbn="";
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
		<form action="\lib\newbor.php" method="post">
		<table>
			<tr>
				<td><label>Enter ID: </label></td>
				<td><input name="identr" type="number"></td>
				<td><input type="submit" name="idsub"></td>
			</tr>
			<tr>
				<td><label>Enter first name: </label></td>
				<td><input name="fentr" type="text"></td>
				<td><input type="submit" name="fsub"></td>
			</tr>
			<tr>
				<td><label>Enter last name: </label></td>
				<td><input name="lentr" type="text"></td>
				<td><input type="submit" name="lsub"></td>
			</tr>
			<tr>
				<td><label>Enter amount due: </label></td>
				<td><input name="aentr" type="number"></td>
				<td><input type="submit" name="asub"></td>
			</tr>
			<tr>
				<td><label>Enter amount due (at least): </label></td>
				<td><input name="maentr" type="number"></td>
				<td><input type="submit" name="masub"></td>
			</tr>
		</table>
	</form>
	<table style="text-align: center; font-family: sans-serif; align-content: center;" align="center">
				<tr>
					<th width="10%">Borrower ID</th>
					<th width="10%">First Name</th>
					<th width="10%">Last Name</th>
					<th width="10%">Address</th>
					<th width="10%">Phone</th>
					<th width="10%">Email</th>
					<th width="10%">Borrowed Book ISBN</th>
					<th width="10%"> Borrowing Due Date</th>
					<th width="10%">Amount Due</th>
				</tr>
	<?php
	if(isset($_POST['idsub'])){
		$borid=$_POST['identr'];
		$query="SELECT bor.Borrower_ID, bor.F_Name, bor.L_Name, bor.Borrower_Address, bor.Borrower_Phone, bor.Borrower_Email, b.ISBN, b.Due_Date, b.Amount_Due 
				FROM borr_with_amount AS b, borrower as bor
				WHERE b.Borrower_ID=bor.Borrower_ID and bor.Borrower_ID='$borid'";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
			$borid=$row['Borrower_ID'];
		$borfname=$row['F_Name'];
		$borlname=$row['L_Name'];
		$borphone=$row['Borrower_Phone'];
		$boremail=$row['Borrower_Email'];
		$boraddr=$row['Borrower_Address'];
		$duedate=$row['Due_Date'];
		$amtdue=$row['Amount_Due'];
		$isbn=$row['ISBN'];  ?>
			<tr>
		<td><?php echo $borid ?></td>
		<td><?php echo $borfname ?></td>
		<td><?php echo $borlname ?></td>
		<td><?php echo $borphone ?></td>
		<td><?php echo $boremail ?></td>
		<td><?php echo $boraddr ?></td>
		<td><?php echo $isbn ?></td>
		<td><?php echo $duedate ?></td>
		<td><?php echo $amtdue ?></td>
		</tr>
			<?php
		}
	}
	else if(isset($_POST['fsub'])){
		$borfname=$_POST['fentr'];
		$query="SELECT bor.Borrower_ID, bor.F_Name, bor.L_Name, bor.Borrower_Address, bor.Borrower_Phone, bor.Borrower_Email, b.ISBN, b.Due_Date, b.Amount_Due 
				FROM borr_with_amount AS b, borrower as bor
				WHERE b.Borrower_ID=bor.Borrower_ID and bor.F_Name like '%$borfname%'";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
			$borid=$row['Borrower_ID'];
		$borfname=$row['F_Name'];
		$borlname=$row['L_Name'];
		$borphone=$row['Borrower_Phone'];
		$boremail=$row['Borrower_Email'];
		$boraddr=$row['Borrower_Address'];
		$duedate=$row['Due_Date'];
		$amtdue=$row['Amount_Due'];
		$isbn=$row['ISBN'];   ?>
		<tr>
		<td><?php echo $borid ?></td>
		<td><?php echo $borfname ?></td>
		<td><?php echo $borlname ?></td>
		<td><?php echo $borphone ?></td>
		<td><?php echo $boremail ?></td>
		<td><?php echo $boraddr ?></td>
		<td><?php echo $isbn ?></td>
		<td><?php echo $duedate ?></td>
		<td><?php echo $amtdue ?></td>
	</tr>
		<?php
		} 
	}
	else if(isset($_POST['lsub'])){
		$borlname=$_POST['lentr'];

		$query="SELECT bor.Borrower_ID, bor.F_Name, bor.L_Name, bor.Borrower_Address, bor.Borrower_Phone, bor.Borrower_Email, b.ISBN, b.Due_Date, b.Amount_Due 
				FROM borr_with_amount AS b, borrower as bor
				WHERE b.Borrower_ID=bor.Borrower_ID and bor.L_Name like '%$borlname%'";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
		$borid=$row['Borrower_ID'];
		$borfname=$row['F_Name'];
		$borlname=$row['L_Name'];
		$borphone=$row['Borrower_Phone'];
		$boremail=$row['Borrower_Email'];
		$boraddr=$row['Borrower_Address'];
		$duedate=$row['Due_Date'];
		$amtdue=$row['Amount_Due'];
		$isbn=$row['ISBN'];
		?>
		<tr>
		<td><?php echo $borid ?></td>
		<td><?php echo $borfname ?></td>
		<td><?php echo $borlname ?></td>
		<td><?php echo $borphone ?></td>
		<td><?php echo $boremail ?></td>
		<td><?php echo $boraddr ?></td>
		<td><?php echo $isbn ?></td>
		<td><?php echo $duedate ?></td>
		<td><?php echo $amtdue ?></td>
	</tr>
		<?php
		}
	}
	else if(isset($_POST['asub'])){
		$amtdue=$_POST['aentr'];

		$query="SELECT bor.Borrower_ID, bor.F_Name, bor.L_Name, bor.Borrower_Address, bor.Borrower_Phone, bor.Borrower_Email, b.ISBN, b.Due_Date, b.Amount_Due 
				FROM borr_with_amount AS b, borrower as bor
				WHERE b.Borrower_ID=bor.Borrower_ID and b.Amount_Due='$amtdue'";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
			$borid=$row['Borrower_ID'];
		$borfname=$row['F_Name'];
		$borlname=$row['L_Name'];
		$borphone=$row['Borrower_Phone'];
		$boremail=$row['Borrower_Email'];
		$boraddr=$row['Borrower_Address'];
		$duedate=$row['Due_Date'];
		$amtdue=$row['Amount_Due'];
		$isbn=$row['ISBN'];   ?>
		<tr>
		<td><?php echo $borid ?></td>
		<td><?php echo $borfname ?></td>
		<td><?php echo $borlname ?></td>
		<td><?php echo $borphone ?></td>
		<td><?php echo $boremail ?></td>
		<td><?php echo $boraddr ?></td>
		<td><?php echo $isbn ?></td>
		<td><?php echo $duedate ?></td>
		<td><?php echo $amtdue ?></td>
	</tr>
		<?php
		} 
	}
	else if(isset($_POST['masub'])){
		$amtdue=$_POST['maentr'];

		$query="SELECT bor.Borrower_ID, bor.F_Name, bor.L_Name, bor.Borrower_Address, bor.Borrower_Phone, bor.Borrower_Email, b.ISBN, b.Due_Date, b.Amount_Due 
				FROM borr_with_amount AS b, borrower as bor
				WHERE b.Borrower_ID=bor.Borrower_ID and b.Amount_Due>='$amtdue'
				ORDER BY Amount_Due";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
			$borid=$row['Borrower_ID'];
		$borfname=$row['F_Name'];
		$borlname=$row['L_Name'];
		$borphone=$row['Borrower_Phone'];
		$boremail=$row['Borrower_Email'];
		$boraddr=$row['Borrower_Address'];
		$duedate=$row['Due_Date'];
		$amtdue=$row['Amount_Due'];
		$isbn=$row['ISBN'];   ?>
		<tr>
		<td><?php echo $borid ?></td>
		<td><?php echo $borfname ?></td>
		<td><?php echo $borlname ?></td>
		<td><?php echo $borphone ?></td>
		<td><?php echo $boremail ?></td>
		<td><?php echo $boraddr ?></td>
		<td><?php echo $isbn ?></td>
		<td><?php echo $duedate ?></td>
		<td><?php echo $amtdue ?></td>
	</tr>
		<?php
		} 
	}
	?>
</table>
	</div>
</body>
</html>