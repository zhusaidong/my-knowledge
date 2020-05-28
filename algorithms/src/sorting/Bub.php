<?php
/**
 * 冒泡排序
 *      每一轮，每个元素与后面的元素一一对比，大的放后面。
 *      一轮结束，最大的元素出现在最后面（第一轮放在倒数第一位，第二轮放在倒数第二位。。。依次类推）
 *      循环轮数（n-1轮），或者这一轮没有交换过元素（说明当前顺序是对的，提前结束轮数循环）
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\sorting;

use zhusaidong\algorithms\Sorting;

class Bub implements Sorting
{
	/**
	 * @inheritDoc
	 */
	public static function getName() : string
	{
		return "冒泡排序";
	}
	
	/**
	 * @inheritDoc
	 */
	public function sort(array $dataArray = []) : array
	{
		$data = $dataArray;
		$len  = count($data);
		while($len > 1)
		{
			$hasChange = false;
			//一一对比，每一轮把最大的放最后，直到只剩下1个数。
			for($i = 0; $i < $len - 1; $i++)
			{
				if($data[$i] > $data[$i + 1])
				{
					swap($data, $i, $i + 1);
					$hasChange = true;
				}
			}
			
			//如果上一轮没有发生过交换，说明顺序对了，无需进行下一轮
			if(!$hasChange)
			{
				break;
			}
			$len--;
		}
		
		return $data;
	}
}