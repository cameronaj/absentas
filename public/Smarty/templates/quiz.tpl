<!DOCTYPE html>
<html>
    <head>
        <title>Abesnt A's - Quiz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="authors" content="{$AUTHORS}">
        <meta charset="utf-8">
        <link href='Smarty/css/bootstrap.css' rel="stylesheet" type="text/css">
        <link href='Smarty/css/bootstrap.min.css' rel="stylesheet" type="text/css">
        <link href="Smarty/css/quiz.css" rel="stylesheet" type="text/css">
    </head>
    <body class="background">
        <!-- Header bar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h3>Quiz Generated from: <em id="message">{$message}</em></h3>
                </div>
                <ul class="nav navbar-nav" id="newQuiz">
                    <li><a href="upload.php">Upload Another File</a></li>
                    <li><a href="#">Generate New Quiz</a></li>
                </ul>
            </div>
        </nav>
        <!-- Quiz Questions -->
        <div class="row col-md-12 ">
            {assign var=count value=0}
            {foreach from=$questions key=question item=answers}
                <div class="question col-md-offset-1">
                    <h4>{$question}</h4>
                        <form class="btn-group-vertical" action="">
                            {foreach from=$answers item=answer}
                            <div>
                                <input class="btn btn-secondary" type="radio" id="ans{$count}" name="answer" value="{$answers}"></input>
                                <label for="ans{$count++}">{$answer}</label>
                            </div>
                            {/foreach}
                        </form>
                </div>
            {/foreach}
            
        </div>
        <!-- Results Button -->
        <button type="button" class="btn btn-primary btn-md col-md-offset-1" onclick="">Check Your Answers</button>
    </body>
</html>