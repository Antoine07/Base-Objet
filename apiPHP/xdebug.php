<?php

$data = [
    'hello, world!',
    [
        'foo-1', 'Foo1',
        'foo-2' => (object)['a', 'b'],
    ],
    (object)[
        'bar' => 'John Woo',
        'foo' => simplexml_load_string(<<<A
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <user id="1">
        <firstname>Tony</firstname>
        <lastname>Tony</lastname>
    </user>
    <user id="2">
        <firstname>Anonymous</firstname>
        <lastname>Anonymous</lastname>
    </user>
</root>
A
        ),
    ]
];

echo '<pre>';
print_r($data);
echo '</pre>';

var_dump($data);