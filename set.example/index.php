<?php
include 'Set.php';

$set = new Set([2,3,6,8]);
$set1 = new Set([2,3,4]);
$set->sprint();
$set1->sprint();

var_dump($set->IsSubset($set1));

