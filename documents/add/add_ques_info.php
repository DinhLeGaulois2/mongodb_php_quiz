<?php
	session_start(); // session start
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Question's Info</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		.panel-heading{
			text-align:center;
			font-size:150%;
		}
		
		.btn-primary{
			border-radius:5px;
			margin:1px 0px;
		}
	</style>
</head>
<body>
<br/>

<?php
	if($_SESSION["firstTime"]){
		$_SESSION["quizname"] = $_POST['quizname'];
		$_SESSION["quizsubject"] = $_POST['quizsubject'];
		$_SESSION["firstTime"] = false;
	}
?>

<div class="container">
	<div class="panel panel-primary">
	<div class="panel-heading">Question's Information</div>
		<div class="panel-body">
		<form action="add_proposed_answers.php" method="POST">
			Subject: 
			<input type='text' name='quessubj' class="form-control" />
			<br/>
			Question (Text): 
			<input type='text' name='questxt' class="form-control" />
			<br/>
			Question (Image): 
			<input type='text' name='quesimg' class="form-control" />
			<br/>
			Number of Proposed Answers: 
			<input type='text' name='nbPA' class="form-control" />
			<br/>
			Refs: 
			<input type='text' name='quesrefs' class="form-control" />
			<br/>
			<input type='submit' name='submit' class="btn-primary" />
		</form>
		</div>
	</div>
</div>	
</body>
</html>