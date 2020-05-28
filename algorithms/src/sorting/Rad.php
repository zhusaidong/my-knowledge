<?php
/**
 * 基数排序
 *      创建10个位置（0-9）的桶
 *      每一轮分别将元素的个十百千位（没有对应位数，相当于当前位数=0）放入对应桶中。
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\sorting;

use zhusaidong\algorithms\Sorting;

class Rad implements Sorting
{
	public static function getName() : string
	{
		return "基数排序";
	}
	
	public function sort(array $dataArray = []) : array
	{
		$digit = 0;
		while(true)
		{
			//创建10个位置的桶
			$buckets      = [0 => [], 1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => [], 8 => [], 9 => []];
			$hasNextDigit = false;
			foreach($dataArray as $data)
			{
				$string = (string)$data;
				$len    = strlen($string) - 1;
				
				//每一轮分别获取个位，十位，百位放入对应桶中。相当于先排个位，再排十位，再排百位。。。
				$index             = (int)($string[$len - $digit] ?? 0);
				$buckets[$index][] = $data;
				
				//判断有没有下一位
				if(!$hasNextDigit && (int)($string[$len - $digit - 1] ?? -1) != -1)
				{
					$hasNextDigit = true;
				}
			}
			
			//按顺序取出
			$dataArray = [];
			foreach($buckets as $bucket)
			{
				foreach($bucket as $item)
				{
					$dataArray[] = $item;
				}
			}
			
			if(!$hasNextDigit)
			{
				return $dataArray;
			}
			$digit++;
		}
		
		return [];
	}
}
