<?php
/**
 * 选择排序
 *      每一轮选出最小值放到前面（第一轮，第一个位置，第二轮第二个位置，以此类推）
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\sorting;

use zhusaidong\algorithms\Sorting;

class Sel implements Sorting
{
	/**
	 * @inheritDoc
	 */
	public static function getName() : string
	{
		return "选择排序";
	}
	
	/**
	 * @inheritDoc
	 */
	public function sort(array $dataArray = []) : array
	{
		$data = $dataArray;
		$len  = count($data);
		for($i = 0; $i < $len; $i++)
		{
			//每一轮在未排序的元素中查询最小值
			$minIndex = $i;
			for($j = $i + 1; $j < $len; $j++)
			{
				if($data[$minIndex] > $data[$j])
				{
					$minIndex = $j;
				}
			}
			//每轮的找到最小值与起始值交换位置
			swap($data, $i, $minIndex);
		}
		
		return $data;
	}
}
