<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\lists;

use zhusaidong\algorithms\Lists;
use zhusaidong\algorithms\util\Node;

class LinkedList implements Lists
{
	private $head;
	private $tail;
	
	public static function create(array $datas = []) : Lists
	{
		$linkedList = new LinkedList();
		foreach($datas as $data)
		{
			$node        = new Node();
			$node->value = $data;
			
			$linkedList->insertNode($node);
		}
		
		return $linkedList;
	}
	
	private function insertNode(Node $node)
	{
		if($this->head == null)
		{
			$this->head = $node;
		}
		else
		{
			$_node = $this->head;
			while($_node->next != null)
			{
				$_node = $_node->next;
			}
			$_node->next = $node;
		}
		$this->tail = $node;
	}
	
	public function insert($data, $position = self::HEAD) : bool
	{
		$node        = new Node();
		$node->value = $data;
		
		$this->insertNode($node);
		
		return false;
	}
	
	public function delete($data) : bool
	{
		/**
		 * @var Node $_node
		 */
		$_node = $this->head;
		if($data == $_node->value)
		{
			$this->head = $_node->next;
			
			return true;
		}
		while($_node->next != null)
		{
			if($data == $_node->next->value)
			{
				$_node->next = $_node->next->next;
				
				return true;
			}
			$_node = $_node->next;
		}
		
		return false;
	}
	
	public function search($data)
	{
		/**
		 * @var Node $_node
		 */
		$_node = $this->head;
		if($data == $_node->value)
		{
			$this->head = $_node->next;
			
			return true;
		}
		while($_node->next != null)
		{
			if($data == $_node->next->value)
			{
				return true;
			}
			$_node = $_node->next;
		}
		
		return false;
	}
	
	public function getNode() : Node
	{
		return $this->head;
	}
}
