<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$qtext = "";
	$answer = "";
	$id = 0;
	$update = false;

	//save button
	if (isset($_POST['save'])) {
		$question_text = $_POST['question_text'];
		$question_answer = $_POST['question_answer'];

		mysqli_query($db, "INSERT INTO info (qtext, answer) VALUES ('$question_text', '$question_answer')"); 
		$_SESSION['message'] = "Question and Answer saved"; 
		header('location: index.php');
	}

	//update
	if (isset($_POST['update'])) {
	$qtext = mysql_real_escape_string($db, $_POST['qtext']);
	$answer = mysql_real_escape_string($db, $_POST['answer']);
	$id = mysql_real_escape_string($db, $_POST['question_id']);

	mysqli_query($db, "UPDATE info SET qtext='$question_text', answer='$question_answer' WHERE id=$question_id");
	$_SESSION['message'] = "Answer and Question updated!"; 
	header('location: index.php');
	}

	//delete
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Answer and question deleted!"; 
	header('location: index.php');
	}

	//retrieve
	//$results = mysql_query($db, "SELECT * FROM info");

?>