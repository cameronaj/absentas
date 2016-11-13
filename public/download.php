<?php
header('Content-type: application/json');

require_once("../private/init.php");

if(isset($_GET['fname'])){
    header("Content-disposition: attachment; filename=transcription.txt");
    //header("Content-type: application/txt");
    flush();
    readfile("../transcription.txt");
    //unlink("../" . $_GET['fname']);
}