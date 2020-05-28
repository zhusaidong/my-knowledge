<?php
/**
 * sorting demo
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
include "../vendor/autoload.php";

use zhusaidong\algorithms\Sorting;
use zhusaidong\algorithms\Algorithms;
use zhusaidong\algorithms\util\ReflectionUtil;

ReflectionUtil::scanComponents("zhusaidong\\algorithms");

//生成随机数组
try
{
	$randomData = random(10, 10, 200);
}
catch(Exception $e)
{
}
echoArray($randomData);

//生成正确排序
$rightData = $randomData;
sort($rightData);
echoArray($rightData);

$reflectionUtil = new ReflectionUtil();
$sorts          = $reflectionUtil->getInterfaceClasses(Sorting::class);
foreach($sorts as $sort)
{
	if(!($sortObj = new $sort) instanceof Algorithms)
	{
		unset($sortObj);
		continue;
	}
	
	$sortName = $sortObj::getName();
	echo "==============$sortName start==============" . PHP_EOL;
	
	//排序
	echoArray($sortedData = $sortObj->sort($randomData));
	
	//校验
	echo "校验" . (verificationResults($sortedData, $rightData) ? "成功" : "失败") . PHP_EOL;
	echo "==============$sortName end================" . PHP_EOL . PHP_EOL;
}
