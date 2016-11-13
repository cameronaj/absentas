<?php

require_once('../private/init.php');

$message = "";

if(isset($_POST['uploadFileName']) && isset($_POST['originalFileName'])){
    $message = $_POST['originalFileName'];
}

$answers = array("Optio 1","Optio 2","Optio 3","Option 4");

$answers2 = array("tasdfads","Oasd","dfasdf3","asdfads4");

$questions = array("Which options will you choose?" => $answers, "I have a lot of questions for you... which one do you like best?" => $answers2);

$smarty->assign("questions",$questions);
$smarty->assign("message", $message);

$smarty->display("quiz.tpl");