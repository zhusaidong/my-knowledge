<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */

namespace zhusaidong\algorithms;

use function strlen;
use function substr;

class ReverseString
{
	public static function reverseLoop(string $string) : string
	{
		$len    = strlen($string);
		$newStr = "";
		for($i = 0; $i < $len; $i++)
		{
			$newStr .= substr($string, $len - $i - 1, 1);
		}
		
		return $newStr;
	}
	
	public static function reverseRecursion(string $string) : string
	{
		if(empty($string))
		{
			return $string;
		}
		
		return self::reverseRecursion(substr($string, 1, strlen($string) - 1)) . substr($string, 0, 1);
	}
}
