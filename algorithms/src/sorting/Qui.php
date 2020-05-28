<?php
/**
 * 快速排序
 *      第一轮，选择第一个元素为比较值，比比较值小的放前面（第二位，第三位，依次类推），大的放后面，
 *      最后交换第一个元素和最后一个小元素（middle），是这个元素前面比自己小，后面比自已大。
 *      然后分2部分，每部分重复上面的步骤。
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\sorting;

use zhusaidong\algorithms\Sorting;

class Qui implements Sorting
{
	/**
	 * @inheritDoc
	 */
	public static function getName() : string
	{
		return "快速排序";
	}
	
	/**
	 * @inheritDoc
	 */
	public function sort(array $dataArray = []) : array
	{
		$data = $dataArray;
		
		$this->quickSort($data, 0, count($data));
		
		return $data;
	}
	
	private function quickSort(&$data, $start, $end)
	{
		if($end - $start <= 1)
		{
			return;
		}
		
		$middle = $start;
		for($i = $start + 1; $i < $end; $i++)
		{
			//比起始值小的放在起始值后面
			if($data[$start] > $data[$i] && $middle != $i)
			{
				$middle++;
				swap($data, $i, $middle);
			}
		}
		//最后把起始值放到中间，得到了起始值左边比起始值小，右边比起始值大
		swap($data, $start, $middle);
		
		//二分法递归
		$this->quickSort($data, $start, $middle);
		$this->quickSort($data, $middle + 1, $end);
	}
}
