<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */

namespace zhusaidong\algorithms;

class Fibonacci
{
	public static function Recursive(int $num) : int
	{
		if($num <= 1)
		{
			return 1;
		}
		else
		{
			$sum = self::Recursive($num - 1) + self::Recursive($num - 2);
			return $sum;
		}
	}
}