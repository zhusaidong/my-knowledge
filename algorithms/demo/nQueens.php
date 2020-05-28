<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */

use zhusaidong\algorithms\query\Nqueens;

require "../vendor/autoload.php";

/*
$nQueens   = new Nqueens(8);
$searchRes = $nQueens->search();

echoN("结果:");
echoArray($searchRes);
var_dump(verificationResults([0, 4, 7, 5, 2, 6, 1, 3], $searchRes));
*/
$nQueens   = new Nqueens(9);
$searchRes = $nQueens->search(true);
echoArray($searchRes);
