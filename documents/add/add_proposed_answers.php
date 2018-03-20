<?php
	session_start(); // session start
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Proposed Answers</title>
	<style>
		.panel-heading{
			text-align:center;
			font-size:150%;
		}

		.ainput, .btn-primary{
			border-radius:5px;
			margin:1px 0px;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</head>
<body>
<br/>

<div class="container">
	<?php
		$_SESSION["quessubj"] = !empty($_POST['quessubj']) ? $_POST['quessubj'] : '';
		$_SESSION["questxt"] = !empty($_POST['questxt']) ? $_POST['questxt'] : '';
		$_SESSION["quesimg"] = !empty($_POST['quesimg']) ? $_POST['quesimg'] : '';
		$_SESSION["quesrefs"] = !empty($_POST['quesrefs']) ? $_POST['quesrefs'] : '';
		$_SESSION["nbPA"] = !empty($_POST['nbPA']) ? $_POST['nbPA'] : '';
	?>
	<div class="panel panel-primary">
		<div class="panel-heading"><?php echo "Question: " . $_SESSION["questxt"] . "?" ?>
		</div>
		<div class="panel-body">
			<form action='save_new_quiz.php' method='POST'> 
				<?php
					for ($i = 0 ; $i < intval($_SESSION["nbPA"]) ; $i ++){
				?>
					<div class="item">
						<input type='checkbox' name='check<?php echo $i ?>' class="col-md-1" />
						<input type='text' name='patxt<?php echo $i ?>' placeholder="Your Proposed Answer (text)" class="col-md-11 aninput"  />
						<span class="col-md-1"></span>						
						<input type='text' name='paimg<?php echo $i ?>' placeholder="Your Proposed Answer (image: URL)" class="col-md-11 aninput" />
					</div>
					<br/><hr/><br/>
				<?php
					} 
				?>
				<br/>
				<button type="submit" name="moreQuestion" class="btn-primary">More Question</button>&nbsp;&nbsp;
				<button type="submit" name="quizdone" class="btn-primary" >Done</button> 
			</form> 
		</div>
	</div>
</div>	
</body>
</html>