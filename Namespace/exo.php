<?php

namespace Gingerbread{

    function foo()
    {
        echo "foo:".__NAMESPACE__. "<br>";
    }

    function strlen($string)
    {
        var_dump($string);
    }

    echo strlen('foo');
    echo '<br>';

    foo();

    const Foo = "foo";

}

// Honeycomb/Eclair;
namespace Honeycomb\Eclair{

    function foo()
    {
        echo "foo:".__NAMESPACE__."<br>";
    }

    foo();

    \Gingerbread\foo();
}