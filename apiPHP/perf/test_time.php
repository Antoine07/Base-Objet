<?php

//$time = microtime(1);
//
//function test_time($seconds) {
//    sleep($seconds);
//}
//
//test_time(3);
//printf("duration : %f", microtime(1) - $time);

//function test_time_xdebug($seconds)
//{
//    sleep($seconds);
//}
//
//test_time_xdebug(3);
//printf("duration : %f", xdebug_time_index());


function test_foreach($list1, $list2)
{
    $nb = 0;
    foreach ($list1 as $value1) {
        foreach ($list2 as $value2) {
            if ($value1 == $value2) $nb++;
        }
    }

    return $nb;

}

function test_intersect($list1, $list2)
{
    return count(array_intersect($list1, $list2));
}

function test_order_dicto_while($list, $elem)
{
    $start = 0;
    $end = count($list);

    while ($start < $end) {

        $middle = (int)(($start + $end) / 2);

        if ($list[$middle] == $elem || $list[$start] == $elem) {
            return true;
        }

        if ($elem > $list[$middle]) {
            $start = $middle + 1;
        } else {
            $end = $middle - 1;
        }

    }

    return false;
}


$list1 = file('./list1.txt');
$list2 = file('./list2.txt');

$elem = 9682;

//if (test_order_dicto_while(file('./orderList.txt'), $elem)) echo "find : $elem"; else echo "not found $elem";

if(array_search($elem,file('./orderList.txt') ));

//echo test_foreach($list1, $list2);
printf("duration : %f", xdebug_time_index());