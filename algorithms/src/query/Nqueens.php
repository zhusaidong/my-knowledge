<?php
/**
 * [0,4,7,5,2,6,1,3]
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\query;

class Nqueens
{
	private $size;
	private $positions;
	private $board;
	private $putted = 0;
	private $log;
	
	/**
	 * Nqueens constructor.
	 *
	 * @param int $size
	 */
	public function __construct($size = 8)
	{
		$this->size      = $size;
		$this->positions = array_fill(0, $size, -1);
		for($i = 0; $i < $size; $i++)
		{
			$this->board[$i] = array_fill(0, $size, -1);
		}
	}
	
	/**
	 * @param bool $isPrintLog
	 *
	 * @return array
	 */
	public function search($isPrintLog = false)
	{
		$this->log = $isPrintLog;
		while($this->putted >= 0 && $this->putted < $this->size)
		{
			$searched = $this->searchOne($this->putted);
			
			$this->consoleLog("搜索第" . ($this->putted + 1) . "个点");
			if($searched != -1)
			{
				$this->consoleLog("搜索到了,坐标(" . $this->putted . "," . $searched . ")");
				$this->board[$searched][$this->putted] = 1;
				$this->positions[$this->putted]        = $searched;
				$this->putted++;
			}
			else
			{
				$this->putted--;
				$this->consoleLog("搜索失败,返回重新向下搜索第" . ($this->putted + 1) . "个点");
				if($this->putted < 0)
				{
					break;
				}
				//重置上一个点的数据
				$searched                              = $this->positions[$this->putted];
				$this->board[$searched][$this->putted] = -1;
			}
			$this->consoleLog(arrayToString($this->positions));
			$this->consoleLog("----------------------");
			if($this->log)
			{
				usleep(1000 * 100);
			}
		}
		if($this->log)
		{
			echoTable($this->board);
		}
		
		return $this->positions;
	}
	
	/**
	 * search one queen
	 *
	 * @param $current
	 *
	 * @return int|mixed
	 */
	private function searchOne($current)
	{
		$x = $current;
		for($y = $this->positions[$x] + 1; $y < $this->size; $y++)
		{
			if($this->isEmptyPosition($y, $x))
			{
				return $y;
			}
		}
		$this->positions[$x] = -1;
		
		return -1;
	}
	
	/**
	 * 当前位置的横向纵向对角线是否为空
	 *
	 * @param $orginX
	 * @param $orginY
	 *
	 * @return bool
	 */
	private function isEmptyPosition($orginX, $orginY)
	{
		//横向有queen
		for($i = 0; $i < $this->size; $i++)
		{
			if($this->board[$orginX][$i] != -1)
			{
				return false;
			}
		}
		
		//纵向有queen
		for($i = 0; $i < $this->size; $i++)
		{
			if($this->board[$i][$orginY] != -1)
			{
				return false;
			}
		}
		
		//对角线(\)有queen
		$min = min($orginX, $orginY);
		//到左上角
		$x = $orginX - $min;
		$y = $orginY - $min;
		while($x <= $this->size - 1 && $y <= $this->size - 1)
		{
			if($this->board[$x][$y] != -1)
			{
				return false;
			}
			$x++;
			$y++;
		}
		
		//对角线(/)有queen
		$min = min($this->size - 1 - $orginX, $orginY);
		//到右上角
		$x = $orginX + $min;
		$y = $orginY - $min;
		while($x >= 0 && $y <= $this->size - 1)
		{
			if($this->board[$x][$y] != -1)
			{
				return false;
			}
			$x--;
			$y++;
		}
		
		return true;
	}
	
	/**
	 * print console log
	 *
	 * @param $msg
	 */
	private function consoleLog($msg)
	{
		if($this->log)
		{
			echoN($msg);
		}
	}
}
