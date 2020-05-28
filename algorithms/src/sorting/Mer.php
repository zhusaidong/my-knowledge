<?php
/**
 * 归并排序
 *      先把元素拆分。然后一对一对比较，小的排在前面，大的在后面。组成元素组。
 *      新的元素组再两两比较。直到合并成一个大数组。
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\sorting;

use zhusaidong\algorithms\Sorting;

class Mer implements Sorting
{
	/**
	 * @inheritDoc
	 */
	public static function getName() : string
	{
		return "归并排序";
	}
	
	/**
	 * @inheritDoc
	 */
	public function sort(array $dataArray = []) : array
	{
		return $this->sortArrays(array_chunk($dataArray, 1))[0];
	}
	
	private function sortArrays(array $data = [])
	{
		$nData = [];
		for($i = 0; $i < count($data); $i++)
		{
			$lefts = $data[$i];
			$i++;
			if($i < count($data))
			{
				$rights = $data[$i];
			}
			else
			{
				$rights = [];
			}
			
			$nData[] = $this->getMerge($lefts, $rights);
			//如果数组里有2个元素，进行递归合并。
			if(count($nData) == 2)
			{
				$nData = $this->sortArrays($nData);
			}
		}
		
		return $nData;
	}
	
	/**
	 * 归并
	 *
	 * @param array $lefts
	 * @param array $rights
	 *
	 * @return array
	 */
	private function getMerge(array $lefts = [], array $rights = []) : array
	{
		$lLen = count($lefts);
		$rLen = count($rights);
		$data = [];
		$x    = $y = 0;
		for($j = 0; $j < $lLen + $rLen; $j++)
		{
			if($x < $lLen)
			{
				$left = $lefts[$x];
			}
			else
			{
				$left = null;
			}
			
			if($y < $rLen)
			{
				$right = $rights[$y];
			}
			else
			{
				$right = null;
			}
			
			//左右两边各取一个元素，小的存起来
			if($left != null && $right != null)
			{
				if($left < $right)
				{
					$data[] = $left;
					$x++;
				}
				else
				{
					$data[] = $right;
					$y++;
				}
			}
			else
			{
				if($left != null)
				{
					$data[] = $left;
					$x++;
				}
				if($right != null)
				{
					$data[] = $right;
					$y++;
				}
			}
		}
		
		return $data;
	}
}
