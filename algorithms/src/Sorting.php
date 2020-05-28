<?php
/**
 * 排序接口
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms;

interface Sorting extends Algorithms
{
	/**
	 * 排序方法
	 *
	 * @param array $dataArray
	 *
	 * @return array
	 */
	public function sort(array $dataArray = []) : array;
}
