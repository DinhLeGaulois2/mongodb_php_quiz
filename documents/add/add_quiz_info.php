<?php
	session_start(); // session start
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Quiz Info</title>
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
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<br/>

<?php
	$_SESSION["quizname"] = '';
	$_SESSION["quizsubject"] = '';
	$_SESSION["quizqa"] = array();
	$_SESSION["firstTime"] = true;

	// Temporary: just for one question --> to add to "quizqa" above
	$_SESSION["quessubj"] = '';
	$_SESSION["questxt"] = '';
	$_SESSION["quesimg"] = '';
	$_SESSION["quesrefs"] = '';
	$_SESSION["pa"] = array();
	$_SESSION["nbPA"] =0;
?>

<div class="container">
	<div class="panel panel-primary">
	<div class="panel-heading">Quiz's Information</div>
	<div class="panel-body">
		<form action="add_ques_info.php" method="POST">
			Name: 
			<input type='text' name='quizname' class="form-control" />
			Subject: 
			<input type='text' name='quizsubject' class="form-control" />
			<br/>
			<input type='submit' name='submit' class="btn-primary" />
		</form>
		</div>
	</div>
</div>	
</body>
</html>