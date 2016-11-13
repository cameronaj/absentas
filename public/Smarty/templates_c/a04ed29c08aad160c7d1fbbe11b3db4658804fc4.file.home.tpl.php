<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-13 16:10:35
         compiled from "/home/ubuntu/workspace/public/Smarty/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110591442058277b9578f826-82612400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a04ed29c08aad160c7d1fbbe11b3db4658804fc4' => 
    array (
      0 => '/home/ubuntu/workspace/public/Smarty/templates/home.tpl',
      1 => 1479053421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110591442058277b9578f826-82612400',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58277b957f9c13_76711104',
  'variables' => 
  array (
    'AUTHORS' => 0,
    'error' => 0,
    'message' => 0,
    'uploadFileName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58277b957f9c13_76711104')) {function content_58277b957f9c13_76711104($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title>Absent A's</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="authors" content="<?php echo $_smarty_tpl->tpl_vars['AUTHORS']->value;?>
">
    <meta charset="utf-8">
    <link href='Smarty/css/bootstrap.css' rel="stylesheet" type="text/css">
    <link href='Smarty/css/bootstrap.min.css' rel="stylesheet" type="text/css">
    <link href="Smarty/css/home.css" rel="stylesheet" type="text/css">
    
    <?php echo '<script'; ?>
 type="text/javascript">
        function upload(){
            document.getElementById('file').click();
            document.getElementById('file').onchange =
            function(){
                document.getElementById('submit').click();
            };
        }
        function downloadClicked(){
            document.getElementById('downloadMsg').hidden = "";
            document.getElementById('pdfLink').click();
        }
    <?php echo '</script'; ?>
>
</head>   
<body class="background">
    <!-- Page Title -->
    <div class="row col-md-12">
        <h1 class="text-center" id="title">Absent A's</h1>
    </div>
    <!-- Brief Explaination -->
    <div class="row col-md-12" id="description">
        <h4 class="text-center">Upload an .flac audio file to download the text or take a quiz on the material!</h4>
    </div>
    <!-- Upload Button -->
    <div class="row col-md-12 text-center"  id="lessButton">
        <input type="button" id="clickToUpload" class="btn btn-primary btn-lg" value="Click to Upload" onclick="upload();"/>
    </div>
    <div class="row col-md-12">
    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
    <div class="row alert alert-danger col-md-4 col-md-offset-4" role="alert">
        <span aria-hidden="true">
            <img class="warning-sign" src="Smarty/fonts/glyphicons-79-warning-sign.png"/>
        </span>
        <span class="sr-only">Error:</span>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['message']->value) {?>
    <div class="row col-md-4 col-md-offset-4 text-center" id="moreButtons"> <!-- if successful, show more buttons-->
        <h5>Success!</h5>
        <h6>File Uploaded: <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h6>
        <a type="button" id="downloadPdf" class="btn btn-default btn-lg" onclick="downloadClicked();">Download PDF</a>
        <a type="button" id="pdfLink" class="hidden" href="download.php?fname=<?php echo $_smarty_tpl->tpl_vars['uploadFileName']->value;?>
"></a>
        
        <button id="takeQuiz" class="btn btn-default btn-lg" name="quiz" type="submit" form="quizForm"> TAKE A QUIZ </button>
        <form class="hidden" name="quizForm" id="quizForm" method="post" action="quiz.php">
            <input name="uploadFileName" value="<?php echo $_smarty_tpl->tpl_vars['uploadFileName']->value;?>
" class="hidden"/>
            <input name="originalFileName" value="<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
" class="hidden"/>
        </form>
        
    </div>
    
    <div class="navbar navbar-fixed-bottom" hidden="hidden" id="downloadMsg">
        <h4 class="col-md-offset-1">Your download should appear below!</h4>
        <img id="arrows" src="Smarty/fonts/red-arrows.png"/>
    </div>
    <?php }?>
    </div>
    
    <form action="upload.php" id="formUpload" name="formUpload" method="post" enctype="multipart/form-data">
        <input type="file" accept=".wav" name="file" id="file"/>
        <button type="submit" value="Test" form="formUpload" id="submit" name="submit">Submit</button>
    </form>
    
    
</body>
</html>
<?php }} ?>
