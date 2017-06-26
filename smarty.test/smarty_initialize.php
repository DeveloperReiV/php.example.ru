<?php
define('SMARTY_DIR', $_SERVER['DOCUMENT_ROOT'] . '/smarty.test/smarty/libs/');
require_once SMARTY_DIR . 'Smarty.class.php';

$smarty = new Smarty();
$smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/smarty.test/templates/compile/';
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/smarty.test/templates/html/';