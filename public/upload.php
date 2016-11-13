<?php

require_once('../private/init.php');

$uploadError = "";
$message = "";

if(isset($_FILES['file']) && $_FILES['file']['type'] == "audio/flac"){
    
    $original_name = $_FILES['file']['name'];
    
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    
    if($extension == 'flac'){
        if($_FILES['file']['error'] > 0){
            $uploadError = "Return Code: " . $_FILES['file']['error'];
        }else{
            //$temp_name = substr(basename(hash("sha256",time())),0,16);
            $temp_name = "audioFile";
            $file_name = $temp_name . ".flac";
            $target_dir = WEB_PATH . "/uploads/";
            $target_file = $target_dir . $file_name;
            
            if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
                $smarty->assign('uploadFileName',$file_name);
                $message = $original_name;
                exec("node app2.js &",$output);
            }else{
                $uploadError = "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $uploadError = "Not wav format.";
    }
}

$smarty->assign('error',$uploadError);
$smarty->assign('message',$message);

$smarty->display('home.tpl');