<?php

function generate($nb)
{
    $list = '';
    for ($i = 0; $i < $nb; $i++) {
        $list .= chr(rand(97, 122)) . chr(rand(97, 122)) . chr(rand(97, 122)) . chr(rand(97, 122)) . "\n";
    }

    return $list;
}

function generateNumber($nb)
{
    $lists = range(1, $nb);

    foreach($lists as $list) $randList[] = rand(1, 10000);

    sort($randList);

    $res = '';

    foreach ($randList as $l) $res .= $l . "\n";

    return $res;
}


$list1 = new SplFileObject('./list1.txt', 'a+');
$list2 = new SplFileObject('./list2.txt', 'a+');
$list3 = new SplFileObject('./orderList.txt', 'a+');

$list1->fwrite(generate(1000));
$list2->fwrite(generate(1000));
$list3->fwrite(generateNumber(1000));

exec('chmod 777 *.txt');