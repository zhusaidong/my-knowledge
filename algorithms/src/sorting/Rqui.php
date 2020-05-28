<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\sorting;

use Exception;
use zhusaidong\algorithms\Sorting;

class Rqui implements Sorting
{
	/**
	 * @inheritDoc
	 */
	public static function getName() : string
	{
		return "随机快速排序";
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
		
		try
		{
			swap($data, $start, random_int($start, $end - 1));
		}
		catch(Exception $e)
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
