<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-13 13:27:20
         compiled from "/home/ubuntu/workspace/public/Smarty/templates/quiz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:797073086582808994b4827-22490306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9304e11dad08b118848277959339edbb0a2376b3' => 
    array (
      0 => '/home/ubuntu/workspace/public/Smarty/templates/quiz.tpl',
      1 => 1479043638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '797073086582808994b4827-22490306',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582808994c1594_03322123',
  'variables' => 
  array (
    'AUTHORS' => 0,
    'message' => 0,
    'questions' => 0,
    'question' => 0,
    'answers' => 0,
    'count' => 0,
    'answer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582808994c1594_03322123')) {function content_582808994c1594_03322123($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Audio Analyzer - Quiz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="authors" content="<?php echo $_smarty_tpl->tpl_vars['AUTHORS']->value;?>
">
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
                    <h3>Quiz Generated from: <em id="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</em></h3>
                </div>
                <ul class="nav navbar-nav" id="newQuiz">
                    <li><a href="upload.php">Upload Another File</a></li>
                    <li><a href="#">Generate New Quiz</a></li>
                </ul>
            </div>
        </nav>
        <!-- Quiz Questions -->
        <div class="row col-md-12 ">
            <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['answers'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['answers']->_loop = false;
 $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['answers']->key => $_smarty_tpl->tpl_vars['answers']->value) {
$_smarty_tpl->tpl_vars['answers']->_loop = true;
 $_smarty_tpl->tpl_vars['question']->value = $_smarty_tpl->tpl_vars['answers']->key;
?>
                <div class="question col-md-offset-1">
                    <h4><?php echo $_smarty_tpl->tpl_vars['question']->value;?>
</h4>
                        <form class="btn-group-vertical" action="">
                            <?php  $_smarty_tpl->tpl_vars['answer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['answer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['answers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['answer']->key => $_smarty_tpl->tpl_vars['answer']->value) {
$_smarty_tpl->tpl_vars['answer']->_loop = true;
?>
                            <div>
                                <input class="btn btn-secondary" type="radio" id="ans<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" name="answer" value="<?php echo $_smarty_tpl->tpl_vars['answers']->value;?>
"></input>
                                <label for="ans<?php echo $_smarty_tpl->tpl_vars['count']->value++;?>
"><?php echo $_smarty_tpl->tpl_vars['answer']->value;?>
</label>
                            </div>
                            <?php } ?>
                        </form>
                </div>
            <?php } ?>
            
        </div>
        <!-- Results Button -->
        <button type="button" class="btn btn-primary btn-md col-md-offset-1" onclick="">Check Your Answers</button>
    </body>
</html><?php }} ?>
