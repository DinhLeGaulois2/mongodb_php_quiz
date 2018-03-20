<?php
	session_start(); // session start
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quiz with PHP and MongoDB</title>
    <style>
        a.button {
            border: 1px solid #808080;
            background: #d9d3d4;
            display: inline-block;
            padding: 5px;
            margin:10px;
        }

        .propaganda{
            text-align: center;
            background-color:black;
            color:cyan;
            font-size:3em;
            padding:100px 20px;
            border-radius:30px;
        }
            
        .btn-primary{
            border-radius:5px;
            margin:1px 0px;
        }

        .hbtn{
            background-color:#2e505d;
            color:cyan;
            border-radius:7px;
            margin:5px;
        }
    </style>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</head>
<body>

<?php
    $_SESSION["playingQuiz"] = array();
    $_SESSION["playingQuestion"] = array();
?>

<br/>
<div class="container">
	<div class="panel panel-primary">
	<div class="panel-heading">
        <div class='row'>
            <div class="col-md-3"></div>        
            <button id="btn_home" class="col-md-2 hbtn">Home</button>
            <button id="btn_add" class="col-md-2 hbtn">Add</button>
            <button id="btn_play" class="col-md-2 hbtn">Play</button>
            <div class="col-md-3"></div>        
        </div>
    </div>
    <div class="panel-body">
        <div class="col-md-3"></div>        
        <div class="col-md-6">
            <h1 class="propaganda">Learn More with Quizzes!!!</h1>
        </div>
        <div class="col-md-3"></div>        
    </div>
</div>
<script>
    $("#btn_home").on("click", function(){
        document.location.href = '.';
    });

    
    $("#btn_add").on("click", function(){
        document.location.href = '/quiz_PHP/documents/add/add_quiz_info.php';
    });

    
    $("#btn_play").on("click", function(){
        document.location.href = '/quiz_PHP/documents/play/answer2question.php';
    });

</script>

</body>
</html>