<?php
require_once 'smarty_initialize.php';

$smarty->assign('title', 'Заголовок');
$smarty->assign('name', 'Вася Пупкин');

$smarty->display('basic.tpl');