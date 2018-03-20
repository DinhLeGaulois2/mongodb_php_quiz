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

	function getProposedAnswers(){
		$paOf1Question = array();
		for($i = 0 ; $i < intval($_SESSION["nbPA"]) ; $i++){
			array_push($paOf1Question, array("isCorrect" => $_POST['check' . $i]==null?false:true, 
				"txt" => $_POST['patxt'. $i], 
				"img" => $_POST['paimg' . $i]
			));
		}

		$qInfo = array("txt" => $_SESSION["questxt"], "img" => $_SESSION["quesimg"]);
		$oneQuestion = array();
		array_push($oneQuestion, array(
			"subject" => $_SESSION["quessubj"],
			"refs" => $_SESSION["quesrefs"],
			"question" => $qInfo,
			"propAnswers" => $paOf1Question
		));
		return $oneQuestion;
	}

	function saveQuizIntoDB(){
		$quiz = array();

		array_push($quiz, array(
			"name" => $_SESSION["quizname"],
			"subject" => $_SESSION["quizsubject"],
			"q_a" => $_SESSION["quizqa"]
		));
		$data = json_encode($quiz);

		
		// extension mongo.so 1.5.x
		$uri = "https://api.mlab.com/api/1/databases/quizfullstackjs/collections/quiz?apiKey=Jsv67FX9RE2ABtw44Y-29K-DQQJuO7Mn";
		

		// "Post" request ...
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/json',
		        'content' => $data 
		    )
		);

		$context  = stream_context_create($opts);

    	$result = file_get_contents($uri, false, $context);		

		// move to "add_ques_info"
		header('Location: /quiz_PHP/documents/home.php');
	}

	// If the button "moreQuestion" is clicked!
	if(isset($_POST['moreQuestion'])){
		// get the last question (and its proposed answers)
		// before moving to the next one
		$ob = getProposedAnswers();
		// save the new question into the Quiz's structure
		array_push($_SESSION["quizqa"], $ob);
		// initiate the form for new question
		$_SESSION["quessubj"] = '';
		$_SESSION["questxt"] = '';
		$_SESSION["quesimg"] = '';
		$_SESSION["pa"] = array();
		$_SESSION["nbPA"] =0;

		// move to "add_ques_info"
		header('Location: /quiz_PHP/documents/add/add_ques_info.php');
	}
	// If the button "quizdone" is clicked!
	else if(isset($_POST['quizdone'])){
		// get the last question then save the new quiz
		$ob = getProposedAnswers();
		// save the new question into the Quiz's structure
		array_push($_SESSION["quizqa"], $ob);
		saveQuizIntoDB();
	}
?>
</body>
</html>