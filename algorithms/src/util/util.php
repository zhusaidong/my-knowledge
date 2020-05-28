<?php

use zhusaidong\algorithms\util\Node;

/**
 * 随机数字数组
 *
 * @param int $randomNum
 * @param int $min
 * @param int $max
 *
 * @return array
 * @throws Exception
 */
function random(int $randomNum = 10, $min = 1, $max = 100) : array
{
	$randomArray = [];
	for($i = 0; $i < $randomNum; $i++)
	{
		$randomArray[] = random_int($min, $max);
	}
	
	return $randomArray;
}

/**
 * 交换数组元素
 *
 * @param      $data
 * @param      $x
 * @param      $y
 * @param bool $usePhpFunction
 */
function swap(&$data, $x, $y, $usePhpFunction = false)
{
	if($usePhpFunction)
	{
		swapPhpFunction($data, $x, $y);
	}
	else
	{
		$temp     = $data[$x];
		$data[$x] = $data[$y];
		$data[$y] = $temp;
	}
}

/**
 * 使用php方法交换元素
 *
 * @param $data
 * @param $x
 * @param $y
 */
function swapPhpFunction(&$data, $x, $y)
{
	[$data[$x], $data[$y]] = [$data[$y], $data[$x]];
}

/**
 * 数组转字符串
 *
 * @param array $array
 *
 * @return string
 */
function arrayToString(array $array = []) : string
{
	return '[' . implode(",", $array) . ']';
}

/**
 * 输出表格
 *
 * @param     $table
 * @param int $o 表格中需要替换为O的值
 * @param int $x 表格中需要替换为X的值
 */
function echoTable($table, $o = -1, $x = 1)
{
	$len = count($table[0]);
	
	$mid         = "─";
	$topBroad    = str_pad("┌" . $mid, $len * 13, $mid . $mid . "┬" . $mid) . $mid . "┐";
	$middleBroad = str_pad("├" . $mid, $len * 13, $mid . $mid . "─" . $mid) . $mid . "┤";
	$bottomBroad = str_pad("└" . $mid, $len * 13, $mid . $mid . "┴" . $mid) . $mid . "┘";
	
	echoN($topBroad);
	echoN("|   | " . implode(" | ", range(0, $len - 1)) . " |");
	echoN($middleBroad);
	foreach($table as $index => $item)
	{
		echoN("| " . $index . " | " . str_replace([$o, $x], ["O", "X"], implode(" | ", $item)) . " |");
	}
	echoN($bottomBroad);
}

/**
 * 输出数组
 *
 * @param array $array
 */
function echoArray(array $array = [])
{
	echoN(arrayToString($array));
}

function echoN($msg)
{
	echo $msg . PHP_EOL;
}

/**
 * 校验结果
 *
 * @param $sortedData
 * @param $rightData
 *
 * @return bool
 */
function verificationResults($sortedData, $rightData)
{
	return arrayToString($sortedData) == arrayToString($rightData);
}

/**
 * 输出节点
 *
 * @param Node $node
 */
function echoNode(Node $node)
{
	$_node = $node;
	echo "{";
	echo $_node->value . "->";
	while($_node->next != null)
	{
		$_node = $_node->next;
		echo $_node->value . "->";
	}
	echo "null}" . PHP_EOL;
}
