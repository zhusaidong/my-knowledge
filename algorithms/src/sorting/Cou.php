<?php
/**
 * 计数排序
 *      获取最大值max最小值min，创建一个桶（索引从min到max）
 *      循环将所有元素分别放入对应桶中
 *      从min到max依次从桶中取出元素。
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\sorting;

use zhusaidong\algorithms\Sorting;

class Cou implements Sorting
{
	public static function getName() : string
	{
		return "计数排序";
	}
	
	public function sort(array $dataArray = []) : array
	{
		$max = $min = $dataArray[0];
		foreach($dataArray as $item)
		{
			if($min > $item)
			{
				$min = $item;
			}
			
			if($max < $item)
			{
				$max = $item;
			}
		}
		
		//将数字放入对应桶中
		$buckets = array_fill($min, $max - $min + 1, 0);
		foreach($dataArray as $item)
		{
			$buckets[$item]++;
		}
		
		//按顺序读取
		$dataArray = [];
		foreach($buckets as $key => $bucket)
		{
			for($i = 0; $i < $bucket; $i++)
			{
				$dataArray[] = $key;
			}
		}
		unset($buckets);
		
		return $dataArray;
	}
}
