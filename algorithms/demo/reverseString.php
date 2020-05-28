<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */

use zhusaidong\algorithms\ReverseString;

require "../vendor/autoload.php";

var_dump(ReverseString::reverseLoop("abcdefg"));
var_dump(ReverseString::reverseRecursion("abcdefg"));
