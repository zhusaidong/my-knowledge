<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms;

use zhusaidong\algorithms\util\Node;

interface Lists
{
	public const HEAD = 1;
	public const TAIL = -1;
	
	/**
	 * 创建
	 *
	 * @param array $datas
	 *
	 * @return mixed
	 */
	public static function create(array $datas = []) : Lists;
	
	public function getNode() : Node;
	
	/**
	 * 插入数据
	 *
	 * @param     $data
	 * @param int $position 位置
	 *
	 * @return mixed
	 */
	public function insert($data, $position = self::HEAD) : bool;
	
	/**
	 * 删除
	 *
	 * @param $data
	 *
	 * @return mixed
	 */
	public function delete($data) : bool;
	
	/**
	 * 搜索
	 *
	 * @param $data
	 *
	 * @return mixed
	 */
	public function search($data);
}
