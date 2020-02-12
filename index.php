<?php  include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$qtext = $n['question_text'];
			$answer = $n['question_answer'];
		}
	} 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Bicol Travel & Tours</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

	<form method="post" action="server.php" >

		<div class="input-group">
			<label>Question</label>
			<input type="text" name="qtext" value="">
		</div>
		<div class="input-group">
			<label>Answer</label>
			<input type="text" name="answer" value="">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #2E8B57;">Update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" style="background: #E4CD05;">Book now!</button>
			<?php endif ?>
		</div>
	</form>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<table>
	<thead>
		<tr>
			<th>Question</th>
			<th>Answer</th>
			<th colspan="2">Update/Delete</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['qtext']; ?></td>
			<td><?php echo $row['answer']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Remove</a>
			</td>
		</tr>
	<?php } ?>
</table>
</body>
</html>