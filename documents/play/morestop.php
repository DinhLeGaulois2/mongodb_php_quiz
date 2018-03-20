<?php
	session_start(); // session start
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Save New Quiz</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<br/>


<?php
	// If the button "keepplaying" is clicked!
	if(isset($_POST['keepplaying'])){
		// move to "add_ques_info"
		header('Location: /quiz_PHP/documents/play/answer2question.php');
	}
	// If the button "stopplaying" is clicked!
	else if(isset($_POST['stopplaying'])){
		// move to "add_ques_info"
		header('Location: /quiz_PHP/documents/home.php');
	}
?>
</body>
</html>