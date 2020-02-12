<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$qtext = "";
	$answer = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['question_text'];
		$contact = $_POST['question_aswer'];

		mysqli_query($db, "INSERT INTO info (qtext, answer) VALUES ('$question_text', '$question_answer')"); 
		$_SESSION['message'] = "Question saved!"; 
		header('location: index.php');
	}

	//update
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$contact = $_POST['contact'];

	mysqli_query($db, "UPDATE info SET name='$name', contact='$contact' WHERE id=$id");
	$_SESSION['message'] = "Answer/Question updated!"; 
	header('location: index.php');
}
?>