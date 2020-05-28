<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */
namespace zhusaidong\algorithms\util;

class ReflectionUtil
{
	public const INTERFACES_ALL = 1;
	public const INTERFACES_ONCE = 2;
	private static $components = [];
	
	/**
	 * 扫描包下的类
	 *
	 * @param $namespace
	 */
	public static function scanComponents($namespace)
	{
		$classes = [];
		foreach(glob(dirname(dirname(__FILE__)) . '/*/*.php', GLOB_BRACE) as $file)
		{
			preg_match('/(.*)[\\\|\/]src\/(?<nameSpace>.*)\/(?<fileName>.*)\.php/', $file, $res);
			$ns    = $namespace . "\\" . $res['nameSpace'];
			$class = $res['fileName'];
			if((strtoupper($class[0]) == $class[0]) && class_exists($ns . "\\" . $class))
			{
				$classes[$ns][] = [
					'file'  => realpath($file),
					'class' => $class,
				];
			}
		}
		
		self::$components = $classes;
	}
	
	/**
	 * 获取实现接口的所有类
	 *
	 * @param string|array $interfaces
	 *
	 * @param int          $implement
	 *
	 * @return array
	 */
	public function getInterfaceClasses($interfaces, $implement = self::INTERFACES_ONCE) : array
	{
		$interfaces = array_filter((array)$interfaces, function($interface)
		{
			return interface_exists($interface, false);
		});
		
		$beans = [];
		foreach(self::$components as $ns => $classes)
		{
			foreach($classes as $classItem)
			{
				$class = $ns . "\\" . $classItem['class'];
				
				$classImplements = class_implements($class);
				$arrayIntersect  = array_intersect($interfaces, $classImplements);
				if($implement == self::INTERFACES_ONCE && count($arrayIntersect) > 0)
				{
					$beans[] = $class;
				}
				if($implement == self::INTERFACES_ALL && count($arrayIntersect) == count($interfaces))
				{
					$beans[] = $class;
				}
				if(in_array($interfaces, $classImplements))
				{
					$beans[] = $class;
				}
			}
		}
		
		return $beans;
	}
}
