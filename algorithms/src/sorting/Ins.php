<?php
/**
 * 插入排序
 *  每一轮将第一个没排过序的元素插入之前已经排过序的元素中去
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\sorting;

use zhusaidong\algorithms\Sorting;

class Ins implements Sorting
{
	/**
	 * @inheritDoc
	 */
	public static function getName() : string
	{
		return "插入排序";
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
			//每轮当前值与前面的值比较交换
			for($j = $i; $j > 0; $j--)
			{
				if($data[$j] < $data[$j - 1])
				{
					swap($data, $j, $j - 1);
				}
				else
				{
					break;
				}
			}
		}
		
		return $data;
	}
}
