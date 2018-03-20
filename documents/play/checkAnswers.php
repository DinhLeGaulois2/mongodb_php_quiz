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

		.ainput, .btn-primary{
			border-radius:5px;
			margin:1px 0px;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<br/>

<div class="container">
	<div class="panel panel-primary">
	    <div class="panel-heading"><?php echo "[" . $_SESSION["playingQuiz"]["name"] . 
            " - " . $_SESSION["playingQuiz"]["subject"] . "]";
            echo "<br/><b><u>Question:</u></b> " . ($_SESSION["playingQuiz"]["q_a"][$_SESSION["playingPosition"]]["question"]["txt"]);
        ?>
		</div>
		<div class="panel-body">
        <br/>
			<form action='morestop.php' method='POST'> 
				<?php
					$obj = $_SESSION["playingQuiz"]["q_a"][$_SESSION["playingPosition"]]["propAnswers"];
					for($i = 0 ; $i < count($obj) ; $i++){
						if (isset($_POST["check$i"])){ $obj[$i]["isSelected"] = true; }
						else { $obj[$i]["isSelected"] = false; }
					}
					for($i = 0 ; $i < count($obj) ; $i++){
				?>
					<div class="item">
						<?php
							if($obj[$i]["isSelected"]==true){ echo "<input type='checkbox' checked class='col-md-1' disabled />"; }
							else{ echo "<input type='checkbox' class='col-md-1' disabled />"; }
						?>
						<div class="col-md-11 aninput">
						<?php 
							if($obj[$i]["isSelected"]==true){
								if($obj[$i]["isCorrect"]==true){
									echo "<font color='green'><b>" . $obj[$i]["txt"] . "</b></font>";
								}
								else
									echo "<font color='red'><b><strike>" . $obj[$i]["txt"] . "</strike></b></font>";
							}
							else{
								if($obj[$i]["isCorrect"]==true){
									echo "<font color='green'><b>" . $obj[$i]["txt"] . "</b></font>";
								}
								else{
									echo $obj[$i]["txt"];
								}
							}
						?>
						</div>
					</div>
					<br/><hr/><br/>
				<?php } ?>
			
				<br/>
				<button type="submit" name="keepplaying" class="btn-primary">More</button>&nbsp;&nbsp;
				<button type="submit" name="stopplaying" class="btn-primary" >Done</button> 
			</form>
		</div>
	</div>
</div>
</body>
</html>