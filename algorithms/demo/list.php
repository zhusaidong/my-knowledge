<?php
/**
 *
 * @author zhusaidong <zhusaidong@gmail.com>
 */

use zhusaidong\algorithms\lists\LinkedList;

require "../vendor/autoload.php";

$linkedList = LinkedList::create([1]);
$linkedList->insert(2);
$linkedList->insert(3);
$linkedList->delete(2);
echoNode($linkedList->getNode());
