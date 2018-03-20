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

<?php
	// extension mongo.so 1.5.x
	$uri = "https://api.mlab.com/api/1/databases/quizfullstackjs/collections/quiz?apiKey=Jsv67FX9RE2ABtw44Y-29K-DQQJuO7Mn";

    $opts = array('http' =>
        array(
            'method'  => 'GET',
            'header'  => 'Content-type: application/json',
        )
    );
    
    if(count($_SESSION["playingQuiz"])==0){
        $context  = stream_context_create($opts);

        $result = file_get_contents($uri, false, $context);
        // Getting the playing quiz
        $_SESSION["playingQuiz"] = json_decode($result, true)[0];  
        $_SESSION["playingQuestion"] = array();

        $playingQuestions = array();
        // Get "question" one-by-one
        foreach($_SESSION["playingQuiz"]["q_a"] as $qa){
            $paList = array();
            foreach($qa[0]["propAnswers"] as $oneProposedAnswer){                
                // Adding all proposed answers (with added "isSelected")
                array_push($paList, array(
                        "isSelected" => false, // Adding this field to be able to give an answer
                        "isCorrect" => $oneProposedAnswer["isCorrect"],
                        "txt" => $oneProposedAnswer["txt"],
                        "img" => $oneProposedAnswer["img"]
                ));
            }
            array_push($playingQuestions, array(
                    "propAnswers" => $paList, 
                    "refs" => $qa[0]["refs"], 
                    "subject" => $qa[0]["subject"], 
                    "question" => $qa[0]["question"])
                );
        }
        // insert the new one
        $_SESSION["playingQuiz"] = array(
            "name" => $_SESSION["playingQuiz"]["name"],
            "subject" => $_SESSION["playingQuiz"]["subject"],
            "q_a" => $playingQuestions
        );     

        $_SESSION["playingPosition"] = 0;        
        $_SESSION["randomIndex"] = array();
        setRandom();
        setNewPosition2Play();
    } else{        
        setNewPosition2Play();
    }

    function setNewPosition2Play(){
        $val = $_SESSION["playingPosition"] + 1;
        $_SESSION["playingPosition"] = $val % count($_SESSION["playingQuiz"]["q_a"]);
    }

    function setRandom(){
        $length = count($_SESSION["playingQuiz"]["q_a"]);
        $isTaken = array();
        for($i = 0 ; $i < $length ; $i++)
            array_push($isTaken, false);
         
        $list = array();
        for($i = 0 ; $i < $length ; $i++){
            $counter = 0;
            $num = rand(0, $length);
            while($counter<=$length){
                $val = $num % $length;
                if($isTaken[$val]==false){
                    array_push($list, $val);
                    $isTaken[$val] = true;
                    break;
                }
                $num++;
                $counter++;
            }
        }
        $_SESSION["randomIndex"] = $list;
    }
?>

<div class="container">
    <div class="panel panel-primary">
	    <div class="panel-heading"><?php echo "[" . $_SESSION["playingQuiz"]["name"] . 
            " - " . $_SESSION["playingQuiz"]["subject"] . "]";
            echo "<br/><b><u>Question:</u></b> " . ($_SESSION["playingQuiz"]["q_a"][$_SESSION["playingPosition"]]["question"]["txt"]);
        ?>
		</div>
		<div class="panel-body">
        <br/>
		<form action='checkAnswers.php' method='POST'> 
            <?php
                $obj = $_SESSION["playingQuiz"]["q_a"][$_SESSION["playingPosition"]]["propAnswers"];
                for($i = 0 ; $i < count($obj) ; $i++){
            ?>
                <div class="item">
                    <input type='checkbox' name='check<?php echo $i ?>' class="col-md-1" />
                    <div class="col-md-11 aninput"><?php echo $obj[$i]["txt"] ?></div>
                </div>
                <br/><hr/><br/>
            <?php } ?>
        
            <br/>
            <button type="submit" class="btn-primary">Check</button>
        </form>
		</div>
	</div>
</div>


</body>
</html>